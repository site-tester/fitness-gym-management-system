<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
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
        CRUD::setModel(User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $show = request()->get('show');


        if ($show == 'Client') {
            $this->crud->query->whereHas('roles', function ($query) {
                $query->where('name', 'member'); // Adjust 'Normal User' to your exact role name
            });
            CRUD::setRoute(config('backpack.base.route_prefix') . '/user?show=Client');
            CRUD::setEntityNameStrings('client', 'clients');
            CRUD::setOperationSetting('showEntryCount', false);
            CRUD::removeButton('create');
            $this->data['breadcrumbs'] = [
                trans('backpack::base.dashboard') => backpack_url('dashboard'),
                'Manage Users' => false,
                'Clients' => false,
            ];

            $this->crud->addColumn([
                'name' => 'name', // assumes you have a name field in your User model
                'label' => 'Name',
                'type' => 'text',
            ]);

            $this->crud->addColumn([
                'name' => 'email',
                'label' => 'Email',
                'type' => 'email',
            ]);

            // Add related Membership Details columns
            $this->crud->addColumn([
                'name' => 'rfid_number', // rfid_card from MembershipDetail
                'label' => 'RFID Card',
                'type' => 'text',
            ]);

        }

        if ($show == 'Trainer') {
            $this->crud->query->whereHas('roles', function ($query) {
                $query->where('name', 'trainer'); // Adjust 'Normal User' to your exact role name
            });

            // Apply a filter to the query based on the status
            CRUD::setEntityNameStrings('trainer', 'trainers');
            CRUD::setOperationSetting('showEntryCount', false);
            CRUD::removeAllButtons();
            $this->data['breadcrumbs'] = [
                trans('backpack::base.dashboard') => backpack_url('dashboard'),
                'Manage Users' => false,
                'Trainers' => false,
            ];

            $this->crud->setColumns([
                [
                    'name' => 'name',
                    'label' => 'Name',
                ]
            ]);



        }
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::addfield([
            'name' => 'rfid_number',
            'type' => 'text',
            'label' => 'RFID Number',
            'attributes' => [
                'id' => 'rfid-input',
                'autocomplete' => 'off',
            ],
        ]);

        // CRUD::addfield([
        //     'name' => 'user_type',
        //     'label' => 'User type',
        //     'type' => 'select_from_array',
        //     'options' => [
        //         'client' => 'Client',
        //         'trainer' => 'Trainer',
        //     ],
        //     'allows_multiple' => false,
        // ]);

        CRUD::addfield([
            'name' => 'name',
            'label' => 'Full Name',
            'type' => 'text',
        ]);

        CRUD::addfield([
            'name' => 'email',
            'label' => 'Email Address',
            'type' => 'email',
        ]);

        CRUD::addfield([
            'name' => 'password',
            'label' => 'Password',
            'type' => 'password'
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
        CRUD::addField([
            'name' => 'password',
            'type' => 'password',
            'label' => 'Password',
            'hint' => 'Leave empty if you don’t want to change the password',
        ]);
        // CRUD::field('name')->validationRules('required|min:5');
        // CRUD::field('email')->validationRules('required|email|unique:users,email,' . CRUD::getCurrentEntryId());
        // CRUD::field('password')->hint('Type a password to change it.');
    }

    public function store()
    {
        $request = $this->crud->validateRequest();

        // Hash the password if it's provided
        if ($request->filled('password')) {
            $request->merge(['password' => Hash::make($request->password)]);
        }

        return $this->traitStore();
    }

    public function update()
    {
        $request = $this->crud->validateRequest();


        // Only hash and update the password if it is provided (non-empty)
        if ($request->filled('password')) {
            $request->merge(['password' => Hash::make($request->password)]);
        } else {
            // Remove password field from the request to avoid updating it
            $request->request->remove('password');
        }

        return $this->traitUpdate();
    }
}
