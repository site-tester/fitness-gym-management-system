<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TrainerDetailRequest;
use App\Models\TrainerDetail;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

/**
 * Class TrainerDetailCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TrainerDetailCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore;
    }
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
        CRUD::addButtonFromView('line', 'delete', 'custom_delete_trainer', 'end');
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
        // CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
        CRUD::addField([
            'name' => 'name',
            'label' => 'Trainer Name',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => 'profile_picture',
            'label' => 'Trainer Picture',
            'type' => 'upload',
            'withFiles' => true,
        ]);
        CRUD::addField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email'
        ]);
        CRUD::addField([
            'name' => 'password',
            'label' => 'Password',
            'type' => 'password'
        ]);
        CRUD::addField([
            'name' => 'gender',
            'label' => 'Gender',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'contact_number',
            'label' => 'Contact Number',
            'type' => 'text',
            'hint' => 'eg. 09123456789',
        ]);
        CRUD::addField([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'date_of_birth',
            'label' => 'Date of birth',
            'type' => 'date',
        ]);
        CRUD::addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => [
                'active' => 'Active',
                'on_leave' => 'On Leave',
                'retired' => 'Retired',
            ],
            'allows_multiple' => false,
        ]);
        CRUD::addField([
            'name' => 'trainer_type',
            'label' => 'Trainer Type',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => 'experience_years',
            'label' => 'Years of Experience',
        ]);
        CRUD::addField([
            'name' => 'hire_date',
            'label' => 'Date Hired',
        ]);
        CRUD::addField([
            'name' => 'contract_type',
            'label' => 'Contract Type',
            'type' => 'select_from_array',
            'options' => [
                'full-time' => 'Full-Time',
                'part-time' => 'Part-Time',
                'contract' => 'Contract',
            ],
            'allows_multiple' => false,
        ]);
        CRUD::addField([
            'name' => 'availability',
            'label' => 'Availability',
            'type' => 'textarea',
            'hint' => 'Enter availability in format: {"Day": "Time"}. If multiple days: {"Day1": "Time1", "Day2": "Time2", ...}. eg. {"Monday": "10:00 AM - 2:00 PM"}',
        ]);
        CRUD::addField([
            'name' => 'bio',
            'label' => 'Bio',
            'type' => 'textarea'
        ]);
        CRUD::addField([
            'name' => 'facebook_link',
            'label' => 'Facebook Link',
            'type' => 'text',
            'hint' => 'eg. https://www.example.com',
        ]);
        CRUD::addField([
            'name' => 'twitter_link',
            'label' => 'Twitter Link',
            'type' => 'text',
            'hint' => 'eg. https://www.example.com',
        ]);
    }

    public function store()
    {
        $request = $this->crud->getRequest();

        // Define validation rules
        $rules = [
            'name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'contact_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address' => 'nullable|string',
            'trainer_type' => 'required|string',
            'experience_years' => 'required|integer|min:0',
            'availability' => 'required|json',
            'hire_date' => 'required|date',
            'status' => 'required|in:active,on_leave,retired',
            'contract_type' => 'required|in:full-time,part-time,contract',
            'average_rating' => 'nullable|numeric|min:0|max:5',
            'profile_picture' => 'nullable|image|max:2048', // Accepts image files up to 2MB
            'bio' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
        ];

        // Define custom error messages
        $messages = [
            'gender.required' => 'Gender is required.',
            'date_of_birth.required' => 'The date of birth is required.',
            'contact_number.required' => 'The contact number is required.',
            'contact_number.regex' => 'The contact number format is invalid.',
            'trainer_type.required' => 'The trainer type is required.',
            'experience_years.required' => 'Experience years is required.',
            'availability.required' => 'Availability is required in JSON format.',
            'hire_date.required' => 'The hire date is required.',
            'status.required' => 'Status is required.',
            'contract_type.required' => 'The contract type is required.',
            'average_rating.numeric' => 'The average rating must be a number between 0 and 5.',
            'profile_picture.image' => 'The profile picture must be an image file.',
            'profile_picture.max' => 'The profile picture must not exceed 2MB.',
            'facebook_link.url' => 'The Facebook link must be a valid URL.',
            'twitter_link.url' => 'The Twitter link must be a valid URL.',
        ];

        // Validate the request
        $request->validate($rules, $messages);

        $username = $this->generateUsername($request['name']);

        $user = User::create([
            'rfid_number' => $request['rfid_number'],
            'name' => $request['name'],
            'username' => $username,
            'email' => $request['email'],
            'password' => Hash::make($request['password']), // Hash the password
        ]);

        $trainerRole = Role::where('name', 'trainer')->first();
        $user->assignRole($trainerRole);

        // Handle profile picture upload if provided
        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $availability = json_encode($request->availability);

        // Create the trainer record
        TrainerDetail::create([
            'user_id' => $user->id,
            'gender' => $request['gender'],
            'date_of_birth' => $request['date_of_birth'],
            'contact_number' => $request['contact_number'],
            'address' => $request['address'],
            'trainer_type' => $request['trainer_type'],
            'experience_years' => $request['experience_years'],
            'availability' => $availability,
            'hire_date' => $request['hire_date'],
            'status' => $request['status'],
            'contract_type' => $request['contract_type'],
            'profile_picture' => $profilePicturePath,
            'bio' => $request['bio'],
            'facebook_link' => $request['facebook_link'],
            'twitter_link' => $request['twitter_link'],
        ]);

        \Alert::success('Trainer Created Successfully!')->flash();

        return redirect()->route('trainer-detail.index');
    }

    public function generateUsername($fullName)
    {
        // Convert the full name to lowercase and remove extra spaces
        $formattedName = strtolower(trim($fullName));

        // Split the name into parts
        $nameParts = explode(' ', $formattedName);

        // Use the first part and last part of the name for the username
        $username = $nameParts[0]; // First name
        if (count($nameParts) > 1) {
            $username .= '.' . end($nameParts); // Append last name
        }

        // Add a random number to ensure uniqueness
        $username .= rand(100, 999);

        return $username;
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        // $this->setupCreateOperation();
        CRUD::addField([
            'name' => 'name',
            'label' => 'Trainer Name',
            'type' => 'text',
            'value' => $this->crud->getCurrentEntry()->user->name,
        ]);
        CRUD::addField([
            'name' => 'profile_picture',
            'label' => 'Trainer Picture',
            'type' => 'upload',
            'withFiles' => true,
        ]);
        CRUD::addField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
            'value' => $this->crud->getCurrentEntry()->user->email,
        ]);
        CRUD::addField([
            'name' => 'password',
            'label' => 'Password',
            'type' => 'password',
            'hint' => 'Fill in password field to change password',
        ]);
        CRUD::addField([
            'name' => 'gender',
            'label' => 'Gender',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'contact_number',
            'label' => 'Contact Number',
            'type' => 'text',
            'hint' => 'eg. 09123456789',
        ]);
        CRUD::addField([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'date_of_birth',
            'label' => 'Date of birth',
            'type' => 'date',
        ]);
        CRUD::addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => [
                'active' => 'Active',
                'on_leave' => 'On Leave',
                'retired' => 'Retired',
            ],
            'allows_multiple' => false,
            'value' => $this->crud->getCurrentEntry()->status,
        ]);
        CRUD::addField([
            'name' => 'trainer_type',
            'label' => 'Trainer Type',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => 'experience_years',
            'label' => 'Years of Experience',
        ]);
        CRUD::addField([
            'name' => 'hire_date',
            'label' => 'Date Hired',
        ]);
        CRUD::addField([
            'name' => 'contract_type',
            'label' => 'Contract Type',
            'type' => 'select_from_array',
            'options' => [
                'full-time' => 'Full-Time',
                'part-time' => 'Part-Time',
                'contract' => 'Contract',
            ],
            'allows_multiple' => false,
            'value' => $this->crud->getCurrentEntry()->contract_type,
        ]);
        CRUD::addField([
            'name' => 'availability',
            'label' => 'Availability',
            'type' => 'textarea',
            'hint' => 'Enter availability in format: {"Day": "Time"}. If multiple days: {"Day1": "Time1", "Day2": "Time2", ...}. eg. {"Monday": "10:00 AM - 2:00 PM"}',
            'value' => $this->crud->getCurrentEntry()->availability ? json_decode($this->crud->getCurrentEntry()->availability, true) : 'No Entered Availability',
        ]);
        CRUD::addField([
            'name' => 'bio',
            'label' => 'Bio',
            'type' => 'textarea'
        ]);
        CRUD::addField([
            'name' => 'facebook_link',
            'label' => 'Facebook Link',
            'type' => 'text',
            'hint' => 'eg. https://www.example.com',
        ]);
        CRUD::addField([
            'name' => 'twitter_link',
            'label' => 'Twitter Link',
            'type' => 'text',
            'hint' => 'eg. https://www.example.com',
        ]);
    }

    public function update($id)
    {
        $request = $this->crud->getRequest();

        // Define validation rules
        $rules = [
            'name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'contact_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address' => 'nullable|string',
            'trainer_type' => 'required|string',
            'experience_years' => 'required|integer|min:0',
            'availability' => 'required|json',
            'hire_date' => 'required|date',
            'status' => 'required|in:active,on_leave,retired',
            'contract_type' => 'required|in:full-time,part-time,contract',
            'average_rating' => 'nullable|numeric|min:0|max:5',
            'profile_picture' => 'nullable|image|max:2048', // Accepts image files up to 2MB
            'bio' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
        ];

        // Define custom error messages
        $messages = [
            'gender.required' => 'Gender is required.',
            'date_of_birth.required' => 'The date of birth is required.',
            'contact_number.required' => 'The contact number is required.',
            'contact_number.regex' => 'The contact number format is invalid.',
            'trainer_type.required' => 'The trainer type is required.',
            'experience_years.required' => 'Experience years is required.',
            'availability.required' => 'Availability is required in JSON format.',
            'hire_date.required' => 'The hire date is required.',
            'status.required' => 'Status is required.',
            'contract_type.required' => 'The contract type is required.',
            'average_rating.numeric' => 'The average rating must be a number between 0 and 5.',
            'profile_picture.image' => 'The profile picture must be an image file.',
            'profile_picture.max' => 'The profile picture must not exceed 2MB.',
            'facebook_link.url' => 'The Facebook link must be a valid URL.',
            'twitter_link.url' => 'The Twitter link must be a valid URL.',
        ];

        // Validate the request
        $request->validate($rules, $messages);

        // Find the user and membership detail records
        $trainerDetail = TrainerDetail::findOrFail($id);
        $user = User::findOrFail($trainerDetail->user_id);

        $user->update([
            'rfid_number' => $request['rfid_number'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'] ? Hash::make($request['password']) : $user->password, // Retain old password if not updated
        ]);

        // Handle profile picture upload if provided
        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('/profile_pictures', 'public');
        }

        $availability = json_encode($request['availability']);

        // Create the trainer record
        $trainerDetail->update([
            'user_id' => $user->id,
            'gender' => $request['gender'],
            'date_of_birth' => $request['date_of_birth'],
            'contact_number' => $request['contact_number'],
            'address' => $request['address'],
            'trainer_type' => $request['trainer_type'],
            'experience_years' => $request['experience_years'],
            'availability' => $availability,
            'hire_date' => $request['hire_date'],
            'status' => $request['status'],
            'contract_type' => $request['contract_type'],
            'profile_picture' => $profilePicturePath,
            'bio' => $request['bio'],
            'facebook_link' => $request['facebook_link'],
            'twitter_link' => $request['twitter_link'],
        ]);

        \Alert::success('Trainer Updated Successfully!')->flash();

        return redirect()->route('trainer-detail.index');
    }

    public function setupShowOperation()
    {
        CRUD::addColumn([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'closure',  // Use a closure to display the value
            'function' => function ($entry) {
                // Check the 'status' value and assign the appropriate class
                $statusClass = '';

                if ($entry->status == 'active') {
                    $statusClass = 'text-bg-success';
                } elseif ($entry->status == 'on_leave') {
                    $statusClass = 'text-bg-warning';
                } elseif ($entry->status == 'retired') {
                    $statusClass = 'text-bg-secondary';
                }

                // Return the value with the appropriate class
                return "<span class='badge {$statusClass}'>" . ucwords($entry->status) . "</span>";

            },
            'escaped' => false,
        ]);
        CRUD::addColumn([
            'name' => 'user_id',
            'label' => 'Trainer Name',
            'entity' => 'user',
            'model' => 'App\Models\User',
            'attribute' => 'name',
            'pivot' => false,
        ]);
        CRUD::addColumn([
            'name' => 'email',
            'label' => 'Email',
            'entity' => 'user',
            'model' => 'App\Models\User',
            'attribute' => 'email',
            'pivot' => false,
        ]);
        CRUD::addColumn([
            'name' => 'contact_number',
            'label' => 'Contact Number',
        ]);
        CRUD::addColumn([
            'name' => 'address',
            'label' => 'Address',
        ]);
        CRUD::addColumn([
            'name' => 'gender',
            'label' => 'Gender',
            'value' => ucwords($this->crud->getCurrentEntry()->gender),
        ]);
        CRUD::addColumn([
            'name' => 'date_of_birth',
            'label' => 'Birthdate',
        ]);
        CRUD::addColumn([
            'name' => 'trainer_type',
            'label' => 'Trainer Type',
            'value' => ucwords($this->crud->getCurrentEntry()->trainer_type),
        ]);
        CRUD::addColumn([
            'name' => 'experience_years',
            'label' => 'Years of Experience',
        ]);
        CRUD::addColumn([
            'name' => 'availability',
            'label' => 'Availability',
            'type' => 'closure',  // Use a closure to display the value
            'function' => function ($entry) {
                // Decode the JSON stored in the availability column
                $availability = json_decode($entry->availability, true);

                if (is_string($availability)) {
                    $availability = json_decode($availability, true);
                }

                // Check if the availability data is present
                if (is_array($availability)) {
                    // Loop through each day and time slot and create a list
                    $formattedAvailability = '';
                    foreach ($availability as $day => $time) {
                        $formattedAvailability .= "<strong>{$day}:</strong> {$time}<br>";
                    }
                    return $formattedAvailability;
                }

                // If no availability data exists, return a fallback message
                return $availability;
            },
            'escaped' => false, // Allow the HTML to render
        ]);
        CRUD::addColumn([
            'name' => 'hire_date',
            'label' => 'Date Hired',
            'type' => 'text',
        ]);
        CRUD::addColumn([
            'name' => 'experience_years',
            'label' => 'Years of Experience',
            'type' => 'text',
        ]);
        CRUD::addColumn([
            'name' => 'contract_type',
            'label' => 'Contract Type',
            'value' => ucwords($this->crud->getCurrentEntry()->contract_type),
        ]);
        CRUD::addColumn([
            'name' => 'average_rating',
            'label' => 'Rating',
            'type' => 'text',
        ]);
        CRUD::addColumn([
            'name' => 'bio',
            'label' => 'Bio',
            'type' => 'textarea',
        ]);
        CRUD::addColumn([
            'name' => 'facebook_link',
            'label' => 'Facebook URL',
            'type' => 'closure',  // Use a closure to display the value
            'function' => function ($entry) {
                // Decode the JSON stored in the twitter_link column
                $facebookLink = $entry->facebook_link;

                // If the URL is present, display it as a clickable link
                if ($facebookLink) {
                    return '<a href="' . $facebookLink . '" target="_blank">' . $facebookLink . '</a>';
                }

                // If the URL is not set, return a fallback message or empty string
                return 'No Facebook URL';
            },
            'escaped' => false,
        ]);
        CRUD::addColumn([
            'name' => 'twitter_link',
            'label' => 'X(Twitter) URL',
            'type' => 'closure',  // Use a closure to display the value
            'function' => function ($entry) {
                // Decode the JSON stored in the twitter_link column
                $twitterLink = $entry->twitter_link;

                // If the URL is present, display it as a clickable link
                if ($twitterLink) {
                    return '<a href="' . $twitterLink . '" target="_blank">' . $twitterLink . '</a>';
                }

                // If the URL is not set, return a fallback message or empty string
                return 'No Twitter URL';
            },
            'escaped' => false,
        ]);

    }


    public function deleteTrainer($id)
    {

        $this->crud->hasAccessOrFail('delete');

        $trainerDetails = TrainerDetail::find($id);
        $user = User::findOrFail($trainerDetails->user_id);

        $trainerDetails->delete();
        $user->delete();

        \Alert::success('Trainer has been deleted successfully!')->flash();

        return redirect()->route('membership-detail.index');
    }
}
