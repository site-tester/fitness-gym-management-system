<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WorkoutRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class WorkoutCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WorkoutCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Workout::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/workout');
        CRUD::setEntityNameStrings('workout', 'workouts');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */

        CRUD::addColumn([
            'name' => 'name',
            'label' => 'Workout Name',
            'type' => 'closure',
            'function' => function ($entry) {
                return ucwords($entry->name);
            },
        ]);

        CRUD::addColumn([
            'name' => 'experience_level',
            'label' => 'Skill Level',
            'type' => 'closure',
            'function' => function ($entry) {
                return ucwords($entry->experience_level);
            },
        ]);

        CRUD::addColumn([
            'name' => 'target_muscle_group',
            'label' => 'Target Muscle',
            'type' => 'closure',
            'function' => function ($entry) {
                return ucwords($entry->target_muscle_group);
            },
        ]);

        CRUD::addColumn([
            'name' => 'excercise_type',
            'label' => 'Excercise Type',
            'type' => 'closure',
            'function' => function ($entry) {
                return ucwords($entry->excercise_type);
            },
        ]);

        CRUD::addColumn([
            'name' => 'equipment_required',
            'label' => 'Equipment Required',
            'type' => 'closure',
            'function' => function ($entry) {
                return ucwords($entry->equipment_required);
            },
        ]);

        CRUD::addColumn([
            'name' => 'mechanics',
            'label' => 'Mechanics',
            'type' => 'closure',
            'function' => function ($entry) {
                return ucwords($entry->mechanics);
            },
        ]);

        CRUD::addColumn([
            'name' => 'force_type',
            'label' => 'Force Type',
            'type' => 'closure',
            'function' => function ($entry) {
                return ucwords($entry->force_type);
            },
        ]);


    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(WorkoutRequest::class);
        // CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
        CRUD::addField([
            'name' => 'name',
            'label' => 'Workout Name',
        ]);

        CRUD::addField([
            'name' => 'target_muscle_group',
            'label' => 'Muscle Group',
            'type' => 'select_from_array',
            'options' => [
                'abs' => 'Abs',
                'abductors' => 'Abductors',
                'adductors' => 'Adductors',
                'biceps' => 'Biceps',
                'calves' => 'Calves',
                'chest' => 'Chest',
                'forearms' => 'Forearms',
                'glutes' => 'Glutes',
                'hamstrings' => 'Hamstrings',
                'hip_flexors' => 'Hip Flexors',
                'it_band' => 'IT Band',
                'lats' => 'Lats',
                'lower_back' => 'Lower Back',
                'neck' => 'Neck',
                'obliques' => 'Obliques',
                'palmar_fascia' => 'Palmar Fascia',
                'plantar_fascia' => 'Plantar Fascia',
                'quads' => 'Quads',
                'shoulders' => 'Shoulders',
                'traps' => 'Traps',
                'triceps' => 'Triceps',
            ],

            'allows_multiple' => false,
        ]);

        CRUD::addField([
            'name' => 'experience_level',
            'label' => 'Skill',
            'type' => 'select_from_array',
            'options' => [
                'beginner' => 'Beginner',
                'intermediate' => 'Intermediate',
                'advance' => 'Advance',
            ],

            'allows_multiple' => false,
        ]);

        CRUD::addField([
            'name' => 'excercise_type',
            'label' => 'Excercise Type',
        ]);

        CRUD::addField([
            'name' => 'equipment_required',
            'label' => 'Equipment Required (if any)',
        ]);

        CRUD::addField([
            'name' => 'mechanics',
            'label' => 'Mechanics',
        ]);

        CRUD::addField([
            'name' => 'force_type',
            'label' => 'Force Type',
        ]);

        CRUD::addField([
            'name' => 'video_url',
            'label' => 'Video URL',
        ]);

        CRUD::addField([
            'name' => 'description', // Database column name
            'label' => 'Description',
            'type' => 'custom_html',
            'value' => '<textarea id="workoutDesc" name="description" class="form-control">' . old('description', optional($this->crud->getCurrentEntry())->description) . '</textarea>',
        ]);

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
}
