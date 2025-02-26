<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EquipmentInventoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EquipmentInventoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EquipmentInventoryCrudController extends CrudController
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
        CRUD::setModel(\App\Models\EquipmentInventory::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/equipment-inventory');
        CRUD::setEntityNameStrings('equipment inventory', 'equipment inventories');
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
        CRUD::setValidation(EquipmentInventoryRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
        CRUD::addField([
            'name' => 'category',
            'label' => 'Category',
            'type' => 'select_from_array',
            'options' => [
                'cardio_equipment' => 'Cardio Equipment',
                'strength_equipment' => 'Strength Equipment',
                'free_weight' => 'Free Weight',
                'machine' => 'Machine',
                'flexibility_and_mobility_tool' => 'Flexibility and Mobility Tool',
                'functional_training' => 'Functional Training',
                'group_exercise_equipment' => 'Group Exercise Equipment',
                'recovery_tool' => 'Recovery Tools',
                'accessory' => 'Accessories',
            ],
            'allows_multiple' => false, // Set to true if you want to allow multiple selections
        ]);

        CRUD::addField([
            'name' => 'condition',
            'label' => 'Condition',
            'type' => 'select_from_array',
            'options' => [
                'new' => 'New',
                'good' => 'Good',
                'needs_repair' => 'Needs Repair',
                'out_of_order' => 'Out of Order',
            ],
            'allows_multiple' => false, // Set to true if you want to allow multiple selections
        ]);

        CRUD::addField([
            'name' => 'usage_frequency',
            'label' => 'Usage Frequency',
            'type' => 'select_from_array',
            'options' => [
                'high' => 'High',
                'medium' => 'Medium',
                'low' => 'Low',
            ],
            'allows_multiple' => false, // Set to true if you want to allow multiple selections
        ]);

        CRUD::addfield([   // Upload
            'name'      => 'image',
            'label'     => 'Image',
            'type'      => 'upload',
            'disk'      => 'uploads',
            'upload'    => true,
            'withFiles' => true
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
