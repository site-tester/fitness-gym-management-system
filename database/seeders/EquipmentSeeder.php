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

        ];

        // EquipmentInventory::crea
    }
}
