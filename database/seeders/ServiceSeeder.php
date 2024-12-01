<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Box',
            'Yoga',
            'Group Lesson',
            'Private Lesson',
            'Cardio',
        ];

        $services = [
            [
                'category_id' => 1,
                'trainer_id' => 4,
                'name' => 'Box with Trainer 1',
                'price' => 2500,
            ],
            [
                'category_id' => 1,
                'trainer_id' => 5,
                'name' => 'Box with Trainer 2',
                'price' => 2500,
            ],
            [
                'category_id' => 2,
                'trainer_id' => 6,
                'name' => 'Yoga with Trainer 3',
                'price' => 2000,
            ],
            [
                'category_id' => 3,
                'trainer_id' => 5,
                'name' => 'Group Yoga with Trainer 2',
                'price' => 1500,
            ],
            [
                'category_id' => 4,
                'trainer_id' => 4,
                'name' => 'Private Lesson with Trainer 1',
                'price' => 3000,
            ],
            [
                'category_id' => 5,
                'trainer_id' => 6,
                'name' => 'Cardio with Trainer 3',
                'price' => 2350,
            ],



        ];

        foreach ($categories as $value) {
            ServiceCategory::create([
                'name' => $value,
            ]);
        }

        foreach ($services as $value) {
            Service::create([
                'category_id' => $value['category_id'],
                'trainer_id' => $value['trainer_id'],
                'name' => $value['name'],
                'price' => $value['price'],
            ]);
        }


    }
}
