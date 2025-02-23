<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ServiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ServiceCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Service::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/service');
        CRUD::setEntityNameStrings('service', 'services');
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
            'name' => 'category_id',
            'label' => 'Service Category',
            'entity' => 'category',
            'model' => 'App\Models\ServiceCategory',
            'attribute' => 'name',
            'pivot' => false,
        ]);
        CRUD::addColumn([
            'name' => 'trainer_id',
            'label' => 'Trainer',
            'entity' => 'trainer',
            'model' => 'App\Models\User',
            'attribute' => 'name',
            'pivot' => false,
        ]);
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
        CRUD::addColumn([
            'label' => 'Amenities',
            'type' => 'select_multiple',
            'name' => 'amenities', // the relationship name
            'entity' => 'amenities', // the related model
            'attribute' => 'name', // attribute shown in the list
            'model' => 'App\Models\Amenity', // fully qualified class name of the related model
            'separator' => ',', // for the select_multiple field type
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
        CRUD::setValidation(ServiceRequest::class);

        // CRUD::addField([
        //     'name' => 'category_id',
        //     'label' => 'Service Category',
        //     'entity' => 'category',
        //     'model' => 'App\Models\ServiceCategory',
        //     'attribute' => 'name',
        //     'pivot' => false,
        // ]);
        // CRUD::addField([
        //     'name' => 'trainer_id',
        //     'label' => 'Trainer',
        //     'entity' => 'trainer',
        //     'model' => 'App\Models\User',
        //     'attribute' => 'name',
        //     'pivot' => false,
        // ]);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
        CRUD::addField([
            'label' => 'Amenities',
            'type' => 'select_multiple',
            'name' => 'amenities', // the relationship name in the model
            'entity' => 'amenities', // the related model
            'attribute' => 'name', // attribute shown in the select dropdown
            'model' => 'App\Models\Amenity', // fully qualified class name of the related model
            'pivot' => true, // required for many-to-many relationships
            'separator' => ',', // for the select_multiple field type
            'attributes' => [
                'id' => 'amenities_select_multiple',
            ]
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
