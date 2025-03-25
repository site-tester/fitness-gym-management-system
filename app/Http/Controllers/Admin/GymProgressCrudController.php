<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GymProgressRequest;
use App\Models\GymProgress;
use App\Models\MembershipDetail;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GymProgressCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GymProgressCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\GymProgress::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/gym-progress');
        CRUD::setEntityNameStrings('client progress', 'client progress');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name' => 'user_id',
            'label' => 'Client',
            'type' => 'select',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => 'App\Models\User',
        ]);
        CRUD::addColumn([
            'name' => 'workout_name',
            'label' => 'Workout Name',
            'type' => 'text',
        ]);
        CRUD::addColumn([
            'name' => 'progress_date',
            'label' => 'Progress Date',
            'type' => 'date',
        ]);
        CRUD::addColumn([
            'name' => 'weight',
            'label' => 'Weight (kg)',
            'type' => 'number',
        ]);
        CRUD::addColumn([
            'name' => 'height',
            'label' => 'Height (cm)',
            'type' => 'number',
        ]);
        CRUD::addColumn([
            'name' => 'bmi',
            'label' => 'BMI',
            'value' => function ($entry) {
                return $entry->bmi ? number_format($entry->bmi, 2) : '-';
            }
        ]);
        CRUD::addColumn([
            'name' => 'reps',
            'label' => 'Reps',
            'type' => 'number',
        ]);
        CRUD::addColumn([
            'name' => 'notes',
            'label' => 'Notes',
            'type' => 'text',
        ]);

        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(GymProgressRequest::class);
        CRUD::addField([
            'name' => 'user_id',
            'label' => 'Client',
            'entity' => 'user',
            'model' => 'App\Models\User',
            'attribute' => 'name',
            'pivot' => false,
            'options' => function ($query) {
                // Filter users with the role 'member'
                return $query->whereHas('roles', function ($q) {
                    $q->where('name', 'member');
                })->get();
            },
        ]);
        CRUD::addField([
            'name' => 'workout_name',
            'label' => 'Workout Name',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'progress_date',
            'label' => 'Progress Date',
            'type' => 'date',
        ]);
        CRUD::addField([
            'name' => 'weight',
            'label' => 'Weight (kg)',
            'type' => 'number',
        ]);
        CRUD::addField([
            'name' => 'height',
            'label' => 'Height (cm)',
            'type' => 'number',
        ]);
        CRUD::addField([
            'name' => 'reps',
            'label' => 'Reps',
            'type' => 'number',
        ]);
        CRUD::addField([
            'name' => 'notes',
            'label' => 'Notes',
            'type' => 'textarea',
        ]);

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();

    }

    public function store()
    {
        $request = $this->crud->getRequest();

        $rules = [
            'user_id' => 'required|exists:users,id',
            'workout_name' => 'required',
            'progress_date' => 'required|date',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'reps' => 'required|numeric',
            'notes' => 'nullable',
        ];

        $messages = [
            'user_id.required' => 'The client field is required.',
            'user_id.exists' => 'The selected client is invalid.',
            'workout_name.required' => 'The workout name field is required.',
            'progress_date.required' => 'The progress date field is required.',
            'progress_date.date' => 'The progress date field must be a date.',
            'weight.required' => 'The weight field is required.',
            'weight.numeric' => 'The weight field must be a number.',
            'height.required' => 'The height field is required.',
            'height.numeric' => 'The height field must be a number.',
            'reps.required' => 'The reps field is required.',
            'reps.numeric' => 'The reps field must be a number.',
        ];

        $request->validate($rules, $messages);

        $user = MembershipDetail::where('client_id' ,$request->user_id)->first();
        if (!$user) {
            \Alert::error('Error', 'Client not found');
            return redirect()->back();
        }
        $bmi = $request['weight'] / (($request['height'] / 100) ** 2);

        $user->weight = $request->weight;
        $user->height = $request->height;
        $user->bmi = $bmi;
        $user->save();

        $gymProgress = new GymProgress();
        $gymProgress->user_id = $request->user_id;
        $gymProgress->workout_name = $request->workout_name;
        $gymProgress->progress_date = $request->progress_date;
        $gymProgress->weight = $request->weight;
        $gymProgress->height = $request->height;
        $gymProgress->reps = $request->reps;
        $gymProgress->bmi = $bmi;
        $gymProgress->notes = $request->notes;
        $gymProgress->save();

        \Alert::success('Success', 'Client progress added successfully');
        return redirect()->route('gym-progress.index');
    }
}
