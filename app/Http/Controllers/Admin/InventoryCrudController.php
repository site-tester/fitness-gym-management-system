<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InventoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class InventoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InventoryCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Inventory::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/inventory');
        CRUD::setEntityNameStrings('inventory', 'inventories');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
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
        CRUD::setValidation(InventoryRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */

         CRUD::addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => [
                'in_stock' => 'In Stock',
                'out_of_stock' => 'Out of Stock',
                'ordered' => 'Ordered',
            ],
            'allows_multiple' => false, // Set to true if you want to allow multiple selections
        ]);

        CRUD::addField([
            'name' => 'category',
            'label' => 'Category',
            'type' => 'select_from_array',
            'options' => [
                'consumable' => 'Consumable',
                'office_supply' => 'Office Supply',
                'maintenance_supply' => 'Maintenance Supply',
                'retail_item' => 'Retail Item',
            ],
            'allows_multiple' => false, // Set to true if you want to allow multiple selections
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
