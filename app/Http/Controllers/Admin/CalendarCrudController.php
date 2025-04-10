<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Requests\CalendarRequest;

/**
 * Class CalendarCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CalendarCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Calendar::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/booking-calendar');
        CRUD::setEntityNameStrings('calendar', 'calendars');

    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        $events = [];

        $appointments = \App\Models\Reservation::all();

        foreach ($appointments as $appointment) {



            $events[] = [
                'id' => $appointment->id,
                'title' => $appointment->name . ' - ' . $appointment->service_name,
                'allDay' => true,
                'start' => $appointment->reservation_date,
                'url' => backpack_url('reservation/' . $appointment->id . '/show'),
                'name' => $appointment->service_name,
                'status' => $appointment->status,
                'backgroundColor' => $appointment->status == 'Pending Approval' ? 'RGBA(247, 103, 7, var(--tblr-bg-opacity, 1))' : ($appointment->status == 'Approved' ? 'RGBA(47, 179, 68, var(--tblr-bg-opacity, 1))' : ($appointment->status == 'Rejected' ? 'RGBA(102, 115, 130, var(--tblr-bg-opacity, 1)' : 'RGBA(247, 103, 7, var(--tblr-bg-opacity, 1))')),
            ];
        }

        $this->data['events'] = $events;

        $this->crud->setListView('vendor.backpack.theme-tabler.booking-calendar');
        // CRUD::setFromDb(); // set columns from db columns.
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CalendarRequest::class);
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
