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
                'equipment_name' => 'STABILITY Ball',
                'image' => 'STABILITY BALL.jpg',
            ],
            [
                'equipment_name' => 'Barbells and Olympic Barbells',
                'image' => 'BARBELLS AND OLYMPIC BARBELL.jpg',
            ],
            [
                'equipment_name' => 'bench',
                'image' => 'BENCH.jpg',
            ],
            [
                'equipment_name' => 'STATIONARY BIKE',
                'image' => 'STATIONARY BIKES.jpg',
            ],
            [
                'equipment_name' => 'Chest Press Machine',
                'image' => 'CHEST PRESS MACHINE.jpg',
            ],
            [
                'equipment_name' => 'Dumbell',
                'image' => 'dumbell.jpg',
            ],
            [
                'equipment_name' => 'Plate',
                'image' => 'plates.jpg',
            ],
            [
                'equipment_name' => 'Roller',
                'image' => 'roller.jpg',
            ],
            [
                'equipment_name' => 'Ellipticals',
                'image' => 'ELLIPTICALS.jpg',
            ],
            [
                'equipment_name' => 'AB ROLLER',
                'image' => 'AB ROLLER.jpg',
            ],
            [
                'equipment_name' => 'ABDOMINAL BENCH',
                'image' => 'ABDOMINAL BENCH.png',
            ],
            [
                'equipment_name' => 'ADJUSTABLE BENCH',
                'image' => 'ADJUSTABLE BENCH.jpg',
            ],
            [
                'equipment_name' => 'BARBELL',
                'image' => 'BARBELL.jpg',
            ],
            [
                'equipment_name' => 'CHEST FLY MACHINE',
                'image' => 'CHEST FLY MACHINE.jpg',
            ],
            [
                'equipment_name' => 'CHEST PRESS MACHINE',
                'image' => 'CHEST PRESS MACHINE.jpg',
            ],
            [
                'equipment_name' => 'INCLINE BENCH PRESS',
                'image' => 'INCLINE BENCH PRESS.jpg',
            ],
            [
                'equipment_name' => 'KETTLEBELLS',
                'image' => 'kettlebells.jpg',
            ],
            [
                'equipment_name' => 'LAT PULLDOWN MACHINE',
                'image' => 'LAT PULLDOWN MACHINE.jpg',
            ],
            [
                'equipment_name' => 'LEG ABDUCTION MACHINE',
                'image' => 'LEG ABDUCTION MACHINE.jpg',
            ],
            [
                'equipment_name' => 'LEG EXTENSION MACHINE',
                'image' => 'LEG EXTENSION MACHINE.jpg',
            ],
            [
                'equipment_name' => 'LEG PRESS MACHINE',
                'image' => 'LEG PRESS MACHINE.jpg',
            ],
            [
                'equipment_name' => 'LEG RAISE MACHINE',
                'image' => 'LEG RAISE MACHINE.jpg',
            ],
            [
                'equipment_name' => 'OVERHEAD CABLE MACHINE',
                'image' => 'OVERHEAD CABLE MACHINE.jpg',
            ],
            [
                'equipment_name' => 'PRECHER CURL BENCH',
                'image' => 'PRECHER CURL BENCH.png',
            ],
            [
                'equipment_name' => 'PULL UP BAR',
                'image' => 'PULL UP BAR.jpg',
            ],
            [
                'equipment_name' => 'ROWING MACHINE',
                'image' => 'ROWING MACHINE.jpg',
            ],
            [
                'equipment_name' => 'SHOULDER PRESS MACHINE',
                'image' => 'SHOULDER PRESS MACHINE.jpg',
            ],
            [
                'equipment_name' => 'SMITH MACHINE',
                'image' => 'SMITH MACHINE.jpg',
            ],
            [
                'equipment_name' => 'STANDING CALF MACHINE',
                'image' => 'STANDING CALF MACHINE.png',
            ],
            [
                'equipment_name' => 'TRICEPS PRESS MACHINE',
                'image' => 'TRICEPS PRESS MACHINE.jpg',
            ],


        ];

        foreach ($equipment as $equip) {
            EquipmentInventory::create($equip);
        }
    }
}
