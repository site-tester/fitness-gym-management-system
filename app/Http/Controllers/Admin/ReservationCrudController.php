<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReservationRequest;
use App\Models\Payment;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ReservationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReservationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation { destroy as traitDestroy;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Reservation::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/reservation');
        CRUD::setEntityNameStrings('booking', 'Bookings');
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
            'name' => 'status',
            'label' => 'Status',
            'type' => 'text',
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {
                    // Determine the badge class based on the status value
                    if ($column['text'] == 'Pending Approval') {
                        return 'badge text-bg-warning'; // Yellow indicates awaiting action
                    }
                    if ($column['text'] == 'Approved') {
                        return 'badge text-bg-success'; // Green indicates approval
                    }
                    if ($column['text'] == 'Rejected') {
                        return 'badge text-bg-secondary'; // Yellow indicates a warning
                    }
                    return 'badge badge-default';
                },
            ],
        ]);

        CRUD::addColumn([
            'name' => 'user_id',
            'label' => 'Client',
            'entity' => 'user',
            'model' => 'App\Models\User',
            'attribute' => 'name',
            'pivot' => false,
        ]);
        CRUD::addColumn([
            'name' => 'service_category_id',
            'label' => 'Service Category',
            'entity' => 'serviceCategory',
            'model' => 'App\Models\ServiceCategory',
            'attribute' => 'name',
            'pivot' => false,
        ]);
        CRUD::addColumn([
            'name' => 'service_name_id',
            'label' => 'Service',
            'entity' => 'service',
            'model' => 'App\Models\Service',
            'attribute' => 'name',
            'pivot' => false,

        ]);
        CRUD::addColumn([
            'name' => 'reservation_date',
            'label' => 'Reservation Date',
            'type' => 'closure',
            'function' => function ($entry) {
                return \Carbon\Carbon::parse($entry->reservation_time)->format('M-d-Y');
            },
        ]);
        CRUD::addColumn([
            'name' => 'reservation_time',
            'label' => 'Reservation Time',
            'type' => 'closure',
            'function' => function ($entry) {
                return \Carbon\Carbon::parse($entry->reservation_time)->format('h:i A');
            },
        ]);
        CRUD::addColumn([
            'name' => 'payment_method',
            'label' => 'Payment Method',
            'entity' => 'paymentMethod',
            'model' => 'App\Models\PaymentMethod',
            'attribute' => 'name',
            'pivot' => false,
        ]);
        // set columns from db columns.

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
        CRUD::setValidation(ReservationRequest::class);

        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
        CRUD::addField([
            'name' => 'user_id',
            'label' => 'Client Name',
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
        // CRUD::addField([
        //     'name' => 'service_category_id',
        //     'label' => 'Service Category',
        //     'entity' => 'serviceCategory',
        //     'model' => 'App\Models\ServiceCategory',
        //     'attribute' => 'name',
        //     'pivot' => false,
        // ]);
        // CRUD::addField([
        //     'name' => 'service_name_id',
        //     'label' => 'Service Name',
        //     'entity' => 'service',
        //     'model' => 'App\Models\Service',
        //     'attribute' => 'name',
        //     'pivot' => false,
        // ]);
        CRUD::addField([
            'name' => 'service_category_id',
            'label' => 'Service Category',
            'type' => 'select',
            'entity' => 'serviceCategory',
            'model' => 'App\Models\ServiceCategory',
            'attribute' => 'name',
            'pivot' => false,
            'attributes' => [
                'id' => 'service_category_id',
            ],
        ]);

        CRUD::addField([
            'name' => 'service_name_id',
            'label' => 'Service Name',
            'type' => 'select',
            'entity' => 'service',
            'model' => 'App\Models\Service',
            'attribute' => 'name',
            'pivot' => false,
            'attributes' => [
                'id' => 'service_name_id',
            ],
        ]);


        CRUD::addField([
            'name' => 'reservation_date',
            'label' => 'Reservation Date',
            'type' => 'date',
        ]);
        CRUD::addField([
            'name' => 'reservation_time',
            'label' => 'Reservation Time',
            'type' => 'time',
        ]);
        CRUD::addField([
            'name' => 'payment_method',
            'label' => 'Payment Method',
            'entity' => 'paymentMethod',
            'model' => 'App\Models\PaymentMethod',
            'attribute' => 'name',
            'pivot' => false,
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
        CRUD::addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => [
                'Pending' => 'Pending',
                'Approved' => 'Approved',
                'Rejected' => 'Rejected',
            ],
            'allows_multiple' => false,
        ]);
        $this->setupCreateOperation();
    }

    public function setupShowOperation()
    {
        CRUD::addColumn([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'text',
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {
                    // Determine the badge class based on the status value
                    if ($column['text'] == 'Pending Approval') {
                        return 'badge text-bg-warning'; // Yellow indicates awaiting action
                    }
                    if ($column['text'] == 'Approved') {
                        return 'badge text-bg-success'; // Green indicates approval
                    }
                    if ($column['text'] == 'Rejected') {
                        return 'badge text-bg-secondary'; // Yellow indicates a warning
                    }
                    return 'badge badge-default';
                },
            ],
        ]);
        CRUD::addColumn([
            'name' => 'user_id',
            'label' => 'Client',
            'entity' => 'user',
            'model' => 'App\Models\User',
            'attribute' => 'name',
            'pivot' => false,
        ]);
        CRUD::addColumn([
            'name' => 'service_name_id',
            'label' => 'Service',
            'entity' => 'service',
            'model' => 'App\Models\Service',
            'attribute' => 'name',
            'pivot' => false,

        ]);
        CRUD::addColumn([
            'name' => 'service_category_id',
            'label' => 'Service Category',
            'entity' => 'serviceCategory',
            'model' => 'App\Models\ServiceCategory',
            'attribute' => 'name',
            'pivot' => false,
        ]);
        CRUD::addColumn([
            'name' => 'reservation_date',
            'label' => 'Reservation Date',
            'type' => 'closure',
            'function' => function ($entry) {
                return \Carbon\Carbon::parse($entry->reservation_time)->format('M-d-Y');
            },
        ]);
        CRUD::addColumn([
            'name' => 'reservation_time',
            'label' => 'Reservation Time',
            'type' => 'closure',
            'function' => function ($entry) {
                return \Carbon\Carbon::parse($entry->reservation_time)->format('h:i A');
            },
        ]);
        CRUD::addColumn([
            'name' => 'name',
            'label' => 'Client Name',
        ]);
        CRUD::addColumn([
            'name' => 'email',
            'label' => 'Client Email',
        ]);
        CRUD::addColumn([
            'name' => 'phone',
            'label' => 'Client Contact Number',
        ]);
        CRUD::addColumn([
            'name' => 'payment_method',
            'label' => 'Payment Method',
            'entity' => 'paymentMethod',
            'model' => 'App\Models\PaymentMethod',
            'attribute' => 'name',
            'pivot' => false,
        ]);
        CRUD::addColumn([
            'name' => 'total_amount',
            'label' => 'Amount',
            'type' => 'closure',
            'function' => function ($entry) {
                return ucwords($entry->total_amount);
            },
        ]);
    }

    public function destroy($id)
    {
        CRUD::hasAccessOrFail('delete');

        Payment::where('reservation_id', $id)->delete();

        return CRUD::delete($id);
    }
}
