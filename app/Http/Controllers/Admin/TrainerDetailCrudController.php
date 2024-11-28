<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TrainerDetailRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TrainerDetailCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TrainerDetailCrudController extends CrudController
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
        CRUD::setModel(\App\Models\TrainerDetail::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/trainer-detail');
        CRUD::setEntityNameStrings('trainer detail', 'trainer details');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::removeButton('create');
        CRUD::addColumn([
            'name' => 'user_id',
            'label' => 'Trainer Name',
            'entity' => 'user',
            'model' => 'App\Models\User',
            'attribute' => 'name',
            'pivot' => false,
        ]);

        CRUD::addColumn([
            'name' => 'gender',
            'label' => 'Gender',
            'type' => 'closure',
            'function' => function ($entry) {
                return ucfirst($entry->gender);
            },
        ]);
        CRUD::addColumn([
            'name' => 'trainer_type',
            'label' => 'Trainer Type',
            'type' => 'closure',
            'function' => function ($entry) {
                return ucwords($entry->trainer_type);
            },
        ]);

        CRUD::addColumn([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'closure',
            'function' => function ($entry) {
                return ucwords(str_replace('_', ' ', $entry->status));
            },
            'wrapper' => [
                    'element' => 'span',
                    'class' => function ($crud, $column, $entry, $related_key) {
                        // Determine the badge class based on the status value
                        if ($column['text'] == 'Active') {
                            return 'badge text-bg-success'; // Yellow indicates awaiting action
                        }
                        if ($column['text'] == 'On Leave') {
                            return 'badge text-bg-warning'; // Green indicates approval
                        }
                        if ($column['text'] == 'Retired') {
                            return 'badge text-bg-danger'; // Yellow indicates a warning
                        }
                        return 'badge badge-default';
                    },
                ],
        ]);
        // CRUD::setFromDb(); // set columns from db columns.

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
        CRUD::setValidation(TrainerDetailRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

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
}
