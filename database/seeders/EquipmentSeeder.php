<?php

namespace Database\Seeders;

use App\Models\EquipmentInventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipment = [
            [
                'equipment_name' => 'Treadmill',
                'image' => 'treadmill.jpg',
            ],
            [
                'equipment_name' => 'Ball',
                'image' => 'ball.jpg',
            ],
            [
                'equipment_name' => 'barbell',
                'image' => 'barbell.jpg',
            ],
            [
                'equipment_name' => 'bench',
                'image' => 'bench.jpg',
            ],
            [
                'equipment_name' => 'Bike',
                'image' => 'bike.jpg',
            ],
            [
                'equipment_name' => 'Chest Press',
                'image' => 'chestpress.jpg',
            ],
            [
                'equipment_name' => 'Dumbell',
                'image' => 'dumbell.jpg',
            ],
            [
                'equipment_name' => 'Plate',
                'image' => 'plate.jpg',
            ],
            [
                'equipment_name' => 'Roller',
                'image' => 'roller.jpg',
            ],
            [
                'equipment_name' => 'Elliptical',
                'image' => 'elliptical.jpg',
            ],

        ];

        foreach ($equipment as $equip) {
            EquipmentInventory::create($equip);
        }
    }
}
