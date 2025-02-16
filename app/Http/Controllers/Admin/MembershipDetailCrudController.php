<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MembershipDetailRequest;
use App\Models\MembershipDetail;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

/**
 * Class MembershipDetailCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MembershipDetailCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation { destroy as traitDelete;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\MembershipDetail::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/membership-detail');
        CRUD::setEntityNameStrings('membership detail', 'membership details');
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
            'name' => 'rfid_number',
            'label' => 'RFID',
            'type' => 'text'
        ]);
        CRUD::addColumn([
            'name' => 'client_id',
            'label' => 'Client Name',
            'entity' => 'user',
            'model' => 'App\Models\User',
            'attribute' => 'name',
            'pivot' => false,
            // 'options' => function ($query) {
            //     // Filter users with the role 'member'
            //     return $query->whereHas('roles', function ($q) {
            //         $q->where('name', 'member');
            //     })->get();
            // },
        ]);
        CRUD::addColumn([
            'name' => 'phone',
            'label' => 'Contact Number',
            'type' => 'text'
        ]);
        CRUD::addColumn([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text'
        ]);
        // CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
        CRUD::addButtonFromView('line', 'delete', 'custom_delete_member', 'end');
        CRUD::addButtonFromView('line', 'generate_card', 'generate_card_button', 'beginning');

    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        // CRUD::setValidation(MembershipDetailRequest::class);
        // CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
        CRUD::addField([
            'name' => 'user_id',
            'label' => 'Client Name',
            'type' => 'select_from_array',
            'options' => User::whereHas('roles', function ($query) {
                $query->where('name', 'member');
            })
                ->whereNull('rfid_number')
                ->orWhere('rfid_number', '')

                ->pluck('name', 'id')
                ->toArray(),
            'allows_null' => false,
            'default' => '',
        ]);
        // CRUD::addField([
        //     'name' => 'email',
        //     'label' => 'Email',
        //     'type' => 'email'
        // ]);
        // CRUD::addField([
        //     'name' => 'password',
        //     'label' => 'Password',
        //     'type' => 'password'
        // ]);
        CRUD::addField([
            'name' => 'rfid_number',
            'label' => 'RFID Card Number',
            'type' => 'password',
            'attributes' => [
                'placeholder' => 'Select the Field then Tap the Card',
                'id' => 'rfidCard',
            ]
        ]);
        CRUD::addField([
            'name' => 'phone',
            'label' => 'Phone',
            'type' => 'text',
            'hint' => 'eg. 09123456789',
        ]);
        CRUD::addField([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'birthdate',
            'label' => 'Birthdate',
            'type' => 'date',
        ]);
        CRUD::addField([
            'name' => 'height',
            'label' => 'Height',
        ]);
        CRUD::addField([
            'name' => 'weight',
            'label' => 'Weight',
        ]);
        CRUD::addField([
            'name' => 'civil_status',
            'label' => 'Civil Status',
        ]);
        CRUD::addField([
            'name' => 'gender',
            'label' => 'Gender',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'membership_type',
            'label' => 'Membership Type',
            'type' => 'select_from_array',
            'options' => [
                'basic' => 'Basic',
                'seasonal' => 'Seasonal',
            ],
            'allows_multiple' => false,
        ]);
        CRUD::addField([
            'name' => 'guardian',
            'label' => 'Guardian',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'medical_info',
            'label' => 'Medical Info',
            'type' => 'textarea',
        ]);
        CRUD::addField([
            'name' => 'script',
            'type' => 'custom_html',
            'value' => '
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        let rfidCardInput = document.getElementById("rfidCard");

                        rfidCardInput.addEventListener("input", function(e) {
                            e.preventDefault();
                        });

                        rfidCardInput.addEventListener("keypress", function(e) {
                            if (e.key === "Enter") {
                                e.preventDefault();
                            }
                        });
                    });
                </script>
            ',
        ]);
    }

    public function store()
    {
        $request = $this->crud->getRequest();

        // dd($request->all());

        $rules = [
            'rfid_number' => 'required|unique:users,rfid_number',
            // 'name' => 'required|min:2',
            // 'email' => 'required|email|unique:users,email',
            // 'password' => 'required|min:6',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address' => 'required',
            'birthdate' => 'required|date',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'civil_status' => 'required',
            'gender' => 'required|in:Male,Female,Other',
            'membership_type' => 'required',
            'guardian' => 'required|min:2',
            'medical_info' => 'nullable|string',
        ];

        $messages = [
            'rfid_number.required' => 'The RFID number is required.',
            'rfid_number.unique' => 'The RFID number already in use, must be unique.',
            // 'name.required' => 'The name is required.',
            // 'name.min' => 'The name must be at least 2 characters.',
            // 'email.required' => 'The email address is required.',
            // 'email.email' => 'Please provide a valid email address.',
            // 'email.unique' => 'This email address is already registered.',
            // 'password.required' => 'The password is required.',
            // 'password.min' => 'The password must be at least 6 characters.',
            'phone.required' => 'The phone number is required.',
            'phone.regex' => 'The phone number format is invalid.',
            'address.required' => 'The address is required.',
            'birthdate.required' => 'The birthdate is required.',
            'birthdate.date' => 'The birthdate must be a valid date.',
            'height.numeric' => 'The height must be a number.',
            'weight.numeric' => 'The weight must be a number.',
            'civil_status.required' => 'The civil status is required.',
            'gender.required' => 'The gender is required.',
            'membership_type.required' => 'The membership type is required.',
            'guardian.required' => 'The guardian name is required.',
            'guardian.min' => 'The guardian name must be at least 2 characters.',
            'medical_info.string' => 'The medical information must be a string.',
        ];

        $request->validate($rules, $messages);

        // $username = $this->generateUsername($request['name']);

        // $user = User::createOrFirst([
        //     'rfid_number' => $request['rfid_number'],
        //     'name' => $request['name'],
        //     'username' => $username,
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password']), // Hash the password
        // ]);

        // $memberRole = Role::where('name', 'member')->first();
        // $user->assignRole($memberRole);

        $user = User::where('id', $request['user_id'])->first();

        $user->update([
            'rfid_number' => $request['rfid_number'],
        ]);

        // Create the MemberDetails record and associate it with the User
        MembershipDetail::create([
            'client_id' => $user->id,
            'rfid_number' => $request['rfid_number'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'birthdate' => $request['birthdate'],
            'height' => $request['height'],
            'weight' => $request['weight'],
            'civil_status' => $request['civil_status'],
            'gender' => $request['gender'],
            'membership_type' => $request['membership_type'],
            'guardian' => $request['guardian'],
            'medical_info' => $request['medical_info'],
        ]);

        \Alert::success('New Client Created Successfully!')->flash();

        return redirect()->route('membership-detail.index');
    }

    // public function generateUsername($fullName)
    // {
    //     // Convert the full name to lowercase and remove extra spaces
    //     $formattedName = strtolower(trim($fullName));

    //     // Split the name into parts
    //     $nameParts = explode(' ', $formattedName);

    //     // Use the first part and last part of the name for the username
    //     $username = $nameParts[0]; // First name
    //     if (count($nameParts) > 1) {
    //         $username .= '.' . end($nameParts); // Append last name
    //     }

    //     // Add a random number to ensure uniqueness
    //     $username .= rand(100, 999);

    //     return $username;
    // }


    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::addField([
            'name' => 'name',
            'label' => 'Client Name',
            'type' => 'text',
            'value' => $this->crud->getCurrentEntry()->user->name,
        ]);
        CRUD::addField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text',
            'value' => $this->crud->getCurrentEntry()->user->email,
            'hint' => '<span class=" badge ' . ($this->crud->getCurrentEntry()->user->email_verified_at ? 'text-bg-success' : 'text-bg-secondary') . ' ">Email ' . ($this->crud->getCurrentEntry()->user->email_verified_at ? 'Verified' : ' Not Verified') . '</span>',
        ]);
        CRUD::addField([
            'name' => 'password',
            'label' => 'Password',
            'type' => 'password',
            'hint' => 'Fill in password field to change password',
        ]);
        CRUD::addField([
            'name' => 'rfid_number',
            'label' => 'RFID Card Number',
            'type' => 'text',
            'attributes' => [
                'placeholder' => 'Select the Field then Tap the Card',
                'id' => 'rfidCard',
            ],
        ]);
        CRUD::addField([
            'name' => 'phone',
            'label' => 'Phone',
            'type' => 'text',
            'hint' => 'eg. 09123456789',
        ]);
        CRUD::addField([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'birthdate',
            'label' => 'Birthdate',
            'type' => 'date',
        ]);
        CRUD::addField([
            'name' => 'height',
            'label' => 'Height',
        ]);
        CRUD::addField([
            'name' => 'weight',
            'label' => 'Weight',
        ]);
        CRUD::addField([
            'name' => 'civil_status',
            'label' => 'Civil Status',
        ]);
        CRUD::addField([
            'name' => 'gender',
            'label' => 'Gender',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'membership_type',
            'label' => 'Membership Type',
            'type' => 'select_from_array',
            'options' => [
                'basic' => 'Basic',
                'seasonal' => 'Seasonal',
            ],
            'allows_multiple' => false,
            'value' => $this->crud->getCurrentEntry()->membership_type,
        ]);
        CRUD::addField([
            'name' => 'guardian',
            'label' => 'Guardian',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'medical_info',
            'label' => 'Medical Info',
            'type' => 'textarea',
        ]);
        CRUD::addField([
            'name' => 'script',
            'type' => 'custom_html',
            'value' => '
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        let rfidCardInput = document.getElementById("rfidCard");

                        rfidCardInput.addEventListener("input", function(e) {
                            e.preventDefault();
                        });

                        rfidCardInput.addEventListener("keypress", function(e) {
                            if (e.key === "Enter") {
                                e.preventDefault();
                            }
                        });
                    });
                </script>
            ',
        ]);
    }

    public function update($id)
    {
        $request = $this->crud->getRequest();

        $rules = [
            'rfid_number' => 'required',
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address' => 'required',
            'birthdate' => 'required|date',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'civil_status' => 'required',
            'gender' => 'required|in:Male,Female,Other',
            'membership_type' => 'required',
            'guardian' => 'required|min:2',
            'medical_info' => 'nullable|string',
        ];

        $messages = [
            'rfid_number.required' => 'The RFID number is required.',
            'rfid_number.unique' => 'The RFID number already in use, must be unique.',
            'name.required' => 'The name is required.',
            'name.min' => 'The name must be at least 2 characters.',
            'email.required' => 'The email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'password.min' => 'The password must be at least 6 characters.',
            'phone.required' => 'The phone number is required.',
            'phone.regex' => 'The phone number format is invalid.',
            'address.required' => 'The address is required.',
            'birthdate.required' => 'The birthdate is required.',
            'birthdate.date' => 'The birthdate must be a valid date.',
            'height.numeric' => 'The height must be a number.',
            'weight.numeric' => 'The weight must be a number.',
            'civil_status.required' => 'The civil status is required.',
            'gender.required' => 'The gender is required.',
            'membership_type.required' => 'The membership type is required.',
            'guardian.required' => 'The guardian name is required.',
            'guardian.min' => 'The guardian name must be at least 2 characters.',
            'medical_info.string' => 'The medical information must be a string.',
        ];

        // Validate the request
        $request->validate($rules, $messages);

        // Find the user and membership detail records
        $membershipDetail = MembershipDetail::findOrFail($id);
        $user = User::findOrFail($membershipDetail->client_id);

        // Update the User record
        $user->update([
            'rfid_number' => $request['rfid_number'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'] ? Hash::make($request['password']) : $user->password, // Retain old password if not updated
        ]);

        // Update the MembershipDetail record
        $membershipDetail->update([
            'rfid_number' => $request['rfid_number'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'birthdate' => $request['birthdate'],
            'height' => $request['height'],
            'weight' => $request['weight'],
            'civil_status' => $request['civil_status'],
            'gender' => $request['gender'],
            'membership_type' => $request['membership_type'],
            'guardian' => $request['guardian'],
            'medical_info' => $request['medical_info'],
        ]);

        // Show success message and redirect
        \Alert::success('Client updated successfully!')->flash();
        return redirect()->route('membership-detail.index');
    }

    public function setupShowOperation()
    {
        CRUD::addColumn([
            'name' => 'client_id',
            'label' => 'Client Name',
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
            'name' => 'rfid_number',
            'label' => 'RFID Card Number',
        ]);
        CRUD::addColumn([
            'name' => 'phone',
            'label' => 'Phone',
            'type' => 'text',
            'hint' => 'eg. 09123456789',
        ]);
        CRUD::addColumn([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text',
            'limit' => 1000,
        ]);
        CRUD::addColumn([
            'name' => 'birthdate',
            'label' => 'Birthdate',
            'type' => 'date',
        ]);
        CRUD::addColumn([
            'name' => 'height',
            'label' => 'Height',
        ]);
        CRUD::addColumn([
            'name' => 'weight',
            'label' => 'Weight',
        ]);
        CRUD::addColumn([
            'name' => 'civil_status',
            'label' => 'Civil Status',
        ]);
        CRUD::addColumn([
            'name' => 'gender',
            'label' => 'Gender',
            'type' => 'text',
        ]);
        CRUD::addColumn([
            'name' => 'membership_type',
            'label' => 'Membership Type',
            'type' => 'select_from_array',
            'options' => [
                'basic' => 'Basic',
                'seasonal' => 'Seasonal',
            ],
            'allows_multiple' => false,
        ]);
        CRUD::addColumn([
            'name' => 'guardian',
            'label' => 'Guardian',
            'type' => 'text',
        ]);
        CRUD::addColumn([
            'name' => 'medical_info',
            'label' => 'Medical Info',
            'type' => 'textarea',
        ]);
    }

    public function deleteMember($id)
    {

        $this->crud->hasAccessOrFail('delete');

        $memberDetails = MembershipDetail::find($id);
        $user = User::findOrFail($memberDetails->client_id);

        $memberDetails->delete();
        $user->delete();

        \Alert::success('Client has been deleted successfully!')->flash();

        return redirect()->route('membership-detail.index');
    }

    public function generateCard($id)
    {
        // Fetch data from the database using the ID
        $entry = MembershipDetail::where('id', $id)->first();
        $name = $entry->user->name;
        $address = $entry->address;
        $rfidCardnumber = $entry->id;
        $expirationDate = 'None';

        // Path to your PNG template
        $imagePath = public_path('templates/rfid_template.png'); // Adjust path if necessary

        // Load the template image
        $templateImage = imagecreatefrompng($imagePath);

        // Set ID card size (1012 x 637 pixels for 300 DPI)
        $cardWidth = 1012;
        $cardHeight = 637;

        // Create a blank image for the ID card
        $idCard = imagecreatetruecolor($cardWidth, $cardHeight);

        // Preserve transparency if the template supports it
        imagesavealpha($idCard, true);
        $transparent = imagecolorallocatealpha($idCard, 0, 0, 0, 127); // Fully transparent
        imagefill($idCard, 0, 0, $transparent);

        // Resize the template image to fit the ID card dimensions
        imagecopyresampled(
            $idCard,
            $templateImage,
            0,
            0,
            0,
            0, // Destination x, y and source x, y
            $cardWidth,
            $cardHeight, // Destination width, height
            imagesx($templateImage),
            imagesy($templateImage) // Source width, height
        );

        // Allocate a color for the text (e.g., black)
        $textColor = imagecolorallocate($idCard, 0, 0, 0); // RGB (0, 0, 0) for black

        // Define font size and path
        $fontSizeLarge = 24; // Adjust for larger text like the name
        $fontSizeSmall = 20; // Adjust for smaller text like the address or RFID number
        $fontPath = public_path('fonts/fredoka.ttf'); // Ensure you have a valid .ttf font file

        // Add text to the ID card with proper alignment
        imagettftext($idCard, $fontSizeLarge, 0, 540, 210, $textColor, $fontPath, $name); // Name
        imagettftext($idCard, 15, 0, 540, 310, $textColor, $fontPath, $address); // Address
        imagettftext($idCard, $fontSizeSmall, 0, 540, 455, $textColor, $fontPath, $rfidCardnumber); // RFID number
        imagettftext($idCard, $fontSizeSmall, 0, 840, 455, $textColor, $fontPath, $expirationDate); // Expiration date

        // // Output the image in the browser
        // header('Content-Type: image/png');
        // imagepng($idCard);

        // // Clean up memory
        // imagedestroy($idCard);
        // imagedestroy($templateImage);
        // exit;

        // Save the image temporarily
        // Save the image
        $imageFileName = "rfid_card_{$id}.png";
        $imageFilePath = storage_path("app/public/{$imageFileName}");
        imagepng($idCard, $imageFilePath);
        imagedestroy($idCard);
        imagedestroy($templateImage);

        // Pass image path to the admin view
        return view('vendor.backpack.ui.rfid_card', ['imagePath' => asset("storage/{$imageFileName}")]);
    }


}
