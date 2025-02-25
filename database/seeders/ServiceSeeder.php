<?php

namespace Database\Seeders;

use App\Models\Amenity;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $categories = [
        //     'Box',
        //     'Yoga',
        //     'Group Lesson',
        //     'Private Lesson',
        //     'Cardio',
        // ];
        // $amenities = [
        //     'One-on-one sessions with a certified trainer to create personalized workout plans and monitor progress',
        //     'Access to a variety of instructor-led classes like yoga, spinning, or Zumba.',
        //     'Unlimited use of machines like treadmills, bikes, weight machines, and free weights',
        //     'Secure lockers, private changing areas, and showers for personal use.',
        //     'Personalized dietary guidance and meal planning to support fitness goals.',
        //     'Regular body measurements, strength tests, and progress tracking to evaluate fitness improvements.',
        // ];

        $services = [
            [
                // 'category_id' => 1,
                // 'trainer_id' => 4,
                'name' => 'Gain / Loss Workout',
                // 'price' => 2500,
            ],
            [
                // 'category_id' => 1,
                // 'trainer_id' => 5,
                'name' => 'Strength Training Workout',
                // 'price' => 2500,
            ],
            [
                // 'category_id' => 2,
                // 'trainer_id' => 6,
                'name' => 'Weight Loss Workout',
                // 'price' => 2000,
            ],
            // [
            //     // 'category_id' => 3,
            //     // 'trainer_id' => 5,
            //     'name' => 'Locker Rooms',
            //     // 'price' => 1500,
            // ],
            [
                // 'category_id' => 4,
                // 'trainer_id' => 4,
                'name' => 'Body Development Workout',
                // 'price' => 3000,
            ],
            // [
            //     // 'category_id' => 5,
            //     // 'trainer_id' => 6,
            //     'name' => 'Fitness Assessments',
            //     // 'price' => 2350,
            // ],



        ];

        // foreach ($categories as $value) {
        //     ServiceCategory::create([
        //         'name' => $value,
        //     ]);
        // }

        foreach ($services as $value) {
            Service::create([
                // 'category_id' => $value['category_id'],
                // 'trainer_id' => $value['trainer_id'],
                'name' => $value['name'],
                // 'price' => $value['price'],
            ]);
        }

        // foreach ($amenities as $value) {
        //     Amenity::create([
        //         'name' => $value,
        //         // 'class' => '<i class="bi bi-suit-diamond-fill"></i>',
        //     ]);
        // }

        // $service_amenity = [];
        // for ($i = 1; $i <= 6; $i++) {
        //     $service_amenity[] = [
        //         'service_id' => $i,
        //         'amenity_id' => $i,
        //     ];
        // }

        // DB::table('service_amenity')->insert($service_amenity);

    }
}
