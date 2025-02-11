<?php

namespace Database\Seeders;

use App\Models\MembershipDetail;
use App\Models\MembershipDetails;
use App\Models\TrainerDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        //
        // Create admin user
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'), // Ensure password is hashed
            'remember_token' => Str::random(60),
        ]);

        $superAdmin = User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@email.com',
            'password' => Hash::make('password'), // Ensure password is hashed
            'remember_token' => Str::random(60),
        ]);
        //
        $members = [
            [
                'rfid_number' => '1019735270',
                'name' => 'John Doe',
                'username' => 'jdoe',
                'email' => 'jdoe@email.com',
                'password' => Hash::make('password'), // Ensure password is hashed
                'remember_token' => Str::random(60),
            ],
        ];

        // Assign the admin role to the user
        $adminRole = Role::where('name', 'admin')->first();
        if (!$adminRole) {
            dd('Role not found'); // This will help you see if the role is being created
        }
        $admin->assignRole($adminRole);

        $superAdminRole = Role::where('name', 'superadmin')->first();
        if (!$superAdminRole) {
            dd('Role not found'); // This will help you see if the role is being created
        }
        $superAdmin->assignRole($superAdminRole);

        // Assign the member role to the user
        $memberRole = Role::where('name', 'member')->first();
        foreach ($members as $member) {

            $memberUser = User::create([
                'rfid_number' => $member['rfid_number'],
                'name' => $member['name'],
                'username' => $member['username'],
                'email' => $member['email'],
                'password' => $member['password'],
                'remember_token' => $member['remember_token'],
                'email_verified_at' => now(),
            ]);

            $memberUser->assignRole($memberRole);

            MembershipDetail::create([
                'client_id' => $memberUser->id,
                'rfid_number' => $member['rfid_number'],
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'birthdate' => $faker->date($format = 'Y-m-d', $max = '2005-12-31'),
                'medical_info' => $faker->sentence,
                'height' => $faker->randomFloat(2, 1.5, 2.1),
                'weight' => $faker->randomFloat(2, 50, 120),
                'civil_status' => $faker->randomElement(['Single', 'Married', 'Widowed', 'Divorced']),
                'gender' => $faker->randomElement(['Male', 'Female', 'Other']),
                'guardian' => $faker->name,
            ]);
        }

        $trainers = [
            [
                'name' => 'Trainer 1',
                'username' => 'trainer1',
                'email' => 'trainer1@email.com',
                'password' => Hash::make('password'), // Ensure password is hashed
                'remember_token' => Str::random(60),
                'gender' => 'male', // Add gender
                'date_of_birth' => '1985-04-10', // Add date_of_birth
                'contact_number' => '09171234567', // Add contact_number
                'trainer_type' => 'personal trainer', // Add trainer_type
                'experience_years' => 5, // Add experience_years
                'availability' => json_encode(['Monday' => '9:00 AM - 12:00 PM', 'Wednesday' => '2:00 PM - 5:00 PM']), // Add availability
                'hire_date' => '2019-01-15', // Add hire_date
                'status' => 'active', // Add status
                'contract_type' => 'full-time', // Add contract_type
                'average_rating' => 4.5, // Add average_rating
                'profile_picture' => 'trainer1.jpg', // Add profile_picture
                'bio' => 'Certified personal trainer with 5 years of experience.', // Add bio
                'facebook_link' => 'https://facebook.com/trainer1', // Add facebook_link
                'twitter_link' => 'https://twitter.com/trainer1', // Add twitter_link
            ],
            // [
            //     'name' => 'Trainer 2',
            //     'username' => 'trainer2',
            //     'email' => 'trainer2@email.com',
            //     'password' => Hash::make('password'), // Ensure password is hashed
            //     'remember_token' => Str::random(60),
            //     'gender' => 'female',
            //     'date_of_birth' => '1990-08-22',
            //     'contact_number' => '09179876543',
            //     'trainer_type' => 'yoga instructor',
            //     'experience_years' => 3,
            //     'availability' => json_encode(['Monday' => '8:00 AM - 11:00 AM', 'Friday' => '4:00 PM - 7:00 PM']),
            //     'hire_date' => '2021-06-10',
            //     'status' => 'active',
            //     'contract_type' => 'part-time',
            //     'average_rating' => 4.8,
            //     'profile_picture' => 'trainer2.jpg',
            //     'bio' => 'Certified yoga instructor specializing in Vinyasa flow.',
            //     'facebook_link' => 'https://facebook.com/trainer2',
            //     'twitter_link' => 'https://twitter.com/trainer2',
            // ],
            [
                'name' => 'Trainer 3',
                'username' => 'trainer3',
                'email' => 'trainer3@email.com',
                'password' => Hash::make('password'), // Ensure password is hashed
                'remember_token' => Str::random(60),
                'gender' => 'male',
                'date_of_birth' => '1987-02-15',
                'contact_number' => '09170123456',
                'trainer_type' => 'group fitness instructor',
                'experience_years' => 7,
                'availability' => json_encode(['Tuesday' => '10:00 AM - 1:00 PM', 'Thursday' => '3:00 PM - 6:00 PM']),
                'hire_date' => '2018-03-25',
                'status' => 'on_leave',
                'contract_type' => 'contract',
                'average_rating' => 4.2,
                'profile_picture' => 'trainer3.jpg',
                'bio' => 'Experienced group fitness trainer with a passion for high-energy workouts.',
                'facebook_link' => 'https://facebook.com/trainer3',
                'twitter_link' => 'https://twitter.com/trainer3',
            ]
        ];

        // Assign the trainer role to the user
        $trainerRole = Role::where('name', 'trainer')->first();
        foreach ($trainers as $trainer) {

            // Create the trainer user
            $trainerUser = User::create([
                'name' => $trainer['name'],
                'username' => $trainer['username'],
                'email' => $trainer['email'],
                'password' => $trainer['password'],
                'remember_token' => $trainer['remember_token'],
                'email_verified_at' => now(),
            ]);

            // Assign the role to the trainer
            $trainerUser->assignRole([$trainerRole]); //assin admin role to the trainer

            // Create the associated TrainerDetail
            TrainerDetail::create([
                'user_id' => $trainerUser->id,
                'gender' => $trainer['gender'],
                'date_of_birth' => $trainer['date_of_birth'],
                'contact_number' => $trainer['contact_number'],
                'trainer_type' => $trainer['trainer_type'],
                'experience_years' => $trainer['experience_years'],
                'availability' => $trainer['availability'],
                'hire_date' => $trainer['hire_date'],
                'status' => $trainer['status'],
                'contract_type' => $trainer['contract_type'],
                'average_rating' => $trainer['average_rating'],
                'profile_picture' => $trainer['profile_picture'],
                'bio' => $trainer['bio'],
                'facebook_link' => $trainer['facebook_link'],
                'twitter_link' => $trainer['twitter_link'],
            ]);
        }
    }
}
