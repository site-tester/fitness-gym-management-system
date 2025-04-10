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
            'name' => 'height',
            'label' => 'Height',
            // 'suffix' => function ($entry) {
            //     return $entry->height_raw_unit;
            // },
            'value' => function ($entry) {
                return $entry->height ? number_format($entry->height, 2) . ' ' . $entry->height_raw_unit : '-';
            }
        ]);
        CRUD::addColumn([
            'name' => 'weight',
            'label' => 'Weight',
            // 'suffix' => function ($entry) {
            //     return $entry->weight_raw_unit;
            // },
            'value' => function ($entry) {
                return $entry->weight ? number_format($entry->weight, 2) . ' ' . $entry->weight_raw_unit : '-';
            }
        ]);
        CRUD::addColumn([
            'name' => 'bmi',
            'label' => 'BMI',
            'value' => function ($entry) {
                $bmiCategory = '';
                if (isset($entry->bmi)) {
                    $bmi = $entry->bmi;
                    if ($bmi < 18.5) {
                        $bmiCategory = 'Underweight';
                    } elseif ($bmi >= 18.5 && $bmi < 24.9) {
                        $bmiCategory = 'Normal';
                    } elseif ($bmi >= 25 && $bmi < 29.9) {
                        $bmiCategory = 'Overweight';
                    } else {
                        $bmiCategory = 'Obese';
                    }
                }

                return $entry->bmi ? number_format($entry->bmi, 2).' ('. $bmiCategory .') ' : '-';}
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
        // CRUD::addField([
        //     'name' => 'weight',
        //     'label' => 'Weight (kg)',
        //     'type' => 'number',
        //     'attributes' => [
        //         'id' => 'weight',
        //         'step' => '0.01', // Allows decimal values
        //     ],
        // ]);

        // CRUD::addField([
        //     'name' => 'height',
        //     'label' => 'Height (cm)',
        //     'type' => 'number',
        //     'attributes' => [
        //         'id' => 'height',
        //         'step' => '0.1', // Allows decimal values
        //     ],
        // ]);

        CRUD::addField([
            'name' => 'height_value',
            'label' => 'Height',
            'type' => 'number',
            'attributes' => [
                'id' => 'height_value',
                'min' => 0,
                'step' => 'any',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-10',
            ],
        ]);

        CRUD::addField([
            'name' => 'height_unit',
            'label' => 'Height Unit',
            'type' => 'radio',
            'options' => ['cm' => 'cm', 'ft' => 'ft'],
            'default' => 'cm',
            'inline' => true, // Display radio buttons horizontally
            'wrapperAttributes' => [
                'class' => 'form-group col-md-2',
            ],
        ]);

        CRUD::addField([
            'name' => 'weight_value',
            'label' => 'Weight',
            'type' => 'number',
            'attributes' => [
                'id' => 'weight_value',
                'min' => 0,
                'step' => 'any',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-10',
            ],
        ]);

        CRUD::addField([
            'name' => 'weight_unit',
            'label' => 'Weight Unit',
            'type' => 'radio',
            'options' => ['kg' => 'kg', 'lbs' => 'lbs'],
            'default' => 'kg',
            'inline' => true,
            'attributes' => [
                'id' => 'weight_unit',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-2',
            ],
        ]);
        CRUD::addField([
            'name' => 'bmi',
            'label' => 'BMI <button type="button" id="calculateBmi" class="btn btn-primary btn-sm">Calculate</button>',
            'attributes' => [
                'id' => 'bmi',
                'readonly' => 'readonly', // Makes the field uneditable
                'disabled' => 'disabled', // Disables the field
            ],
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
            'weight_value' => 'required',
            'height_value' => 'required',
            'weight_unit' => 'required|in:kg,lbs',
            'height_unit' => 'required|in:cm,ft',
            'reps' => 'required|numeric',
            'notes' => 'nullable',
        ];

        $messages = [
            'user_id.required' => 'The client field is required.',
            'user_id.exists' => 'The selected client is invalid.',
            'workout_name.required' => 'The workout name field is required.',
            'progress_date.required' => 'The progress date field is required.',
            'progress_date.date' => 'The progress date field must be a date.',
            'weight_value.required' => 'The weight field is required.',
            'weight_value.numeric' => 'The weight field must be a number.',
            'height_value.required' => 'The height field is required.',
            'height_value.numeric' => 'The height field must be a number.',
            'weight_unit.required' => 'The weight unit field is required.',
            'weight_unit.in' => 'The selected weight unit is invalid.',
            'height_unit.required' => 'The height unit field is required.',
            'height_unit.in' => 'The selected height unit is invalid.',
            'reps.required' => 'The reps field is required.',
            'reps.numeric' => 'The reps field must be a number.',
        ];

        $request->validate($rules, $messages);

        $user = MembershipDetail::where('client_id', $request->user_id)->first();
        if (!$user) {
            \Alert::error('Error', 'Client not found');
            return redirect()->back();
        }
        // $bmi = $request['weight'] / (($request['height'] / 100) ** 2);

        $heightValue = $request['height_value'];
        $heightUnit = $request['height_unit'];
        $weightValue = $request['weight_value'];
        $weightUnit = $request['weight_unit'];

        // Convert height and weight to cm and kg respectively
        if ($heightUnit == 'inches') {
            $heightCm = $heightValue * 2.54;
            $heightMeters = $heightCm / 100;
        } elseif ($heightUnit == 'ft') {
            $heightCm = $heightValue * 30.48;
            $heightMeters = $heightCm / 100;
        } else {
            $heightCm = $heightValue;
            $heightMeters = $heightValue / 100;
        }

        if ($weightUnit == 'lbs') {
            $weightKg = $weightValue * 0.453592;
        } else {
            $weightKg = $weightValue;
        }

        // Calculate BMI
        $bmi = $heightMeters > 0 ? $weightKg / ($heightMeters * $heightMeters) : null;


        $user->height = $heightCm;
        $user->height_raw = $heightValue;
        $user->height_raw_unit = $heightUnit;
        $user->weight = $weightKg;
        $user->weight_raw = $weightValue;
        $user->weight_raw_unit = $weightUnit;
        $user->bmi = $bmi;
        $user->save();

        $gymProgress = new GymProgress();
        $gymProgress->user_id = $request->user_id;
        $gymProgress->workout_name = $request->workout_name;
        $gymProgress->progress_date = $request->progress_date;
        $gymProgress->height = $heightValue;
        $gymProgress->height_raw = $heightValue;
        $gymProgress->height_raw_unit = $heightUnit;
        $gymProgress->weight = $weightKg;
        $gymProgress->weight_raw = $weightValue;
        $gymProgress->weight_raw_unit = $weightUnit;
        $gymProgress->reps = $request->reps;
        $gymProgress->bmi = $bmi;
        $gymProgress->notes = $request->notes;
        $gymProgress->save();

        \Alert::success('Success', 'Client progress added successfully');
        return redirect()->route('gym-progress.index');
    }

    protected function update()
    {
        $request = $this->crud->getRequest();

        $rules = [
            'user_id' => 'required|exists:users,id',
            'workout_name' => 'required',
            'progress_date' => 'required|date',
            'weight_value' => 'required',
            'height_value' => 'required',
            'weight_unit' => 'required|in:kg,lbs',
            'height_unit' => 'required|in:cm,ft',
            'reps' => 'required|numeric',
            'notes' => 'nullable',
        ];

        $messages = [
            // Custom validation messages
        ];

        $request->validate($rules, $messages);

        $user = MembershipDetail::where('client_id', $request->user_id)->first();
        if (!$user) {
            \Alert::error('Error', 'Client not found');
            return redirect()->back();
        }
        // $bmi = $request['weight'] / (($request['height'] / 100) ** 2);
        $heightValue = $request['height_value'];
        $heightUnit = $request['height_unit'];
        $weightValue = $request['weight_value'];
        $weightUnit = $request['weight_unit'];

        // Convert height and weight to cm and kg respectively
        if ($heightUnit == 'inches') {
            $heightCm = $heightValue * 2.54;
            $heightMeters = $heightCm / 100;
        } elseif ($heightUnit == 'ft') {
            $heightCm = $heightValue * 30.48;
            $heightMeters = $heightCm / 100;
        } else {
            $heightCm = $heightValue;
            $heightMeters = $heightValue / 100;
        }

        if ($weightUnit == 'lbs') {
            $weightKg = $weightValue * 0.453592;
        } else {
            $weightKg = $weightValue;
        }

        // Calculate BMI
        $bmi = $heightMeters > 0 ? $weightKg / ($heightMeters * $heightMeters) : null;

        // Update the MembershipDetail entry
        $user->weight = $weightValue;
        $user->weight_raw = $weightValue;
        $user->weight_raw_unit = $weightUnit;
        $user->height = $heightValue;
        $user->height_raw = $heightValue;
        $user->height_raw_unit = $heightUnit;
        $user->bmi = $bmi;
        $user->save();

        // Update the GymProgress entry
        $gymProgress = GymProgress::find($request->id);
        if ($gymProgress) {
            $gymProgress->workout_name = $request->workout_name;
            $gymProgress->progress_date = $request->progress_date;
            $gymProgress->weight = $weightValue;
            $gymProgress->weight_raw = $weightValue;
            $gymProgress->weight_raw_unit = $weightUnit;
            $gymProgress->height = $heightValue;
            $gymProgress->height_raw = $heightValue;
            $gymProgress->height_raw_unit = $heightUnit;
            $gymProgress->reps = $request->reps;
            $gymProgress->bmi = $bmi;
            $gymProgress->notes = $request->notes;
            $gymProgress->save();
        }

        \Alert::success('Success', 'Client progress updated successfully');
        return redirect()->route('gym-progress.index');
    }
}
