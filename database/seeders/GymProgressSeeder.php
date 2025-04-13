<?php

namespace Database\Seeders;

use App\Models\GymProgress;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GymProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userId = 5;

        $startDate = Carbon::now()->subDays(30);
        $startWeight = 150; // Starting weight in kg
        // Create 30 gym progress entries
        for ($i = 1; $i <= 100; $i++) {
            // Generate a random date within a reasonable range (e.g., last few months)
            $startDate = Carbon::now()->subMonths(3);
            $progressDate = $startDate->copy()->addDays($i); // Adds between 0 and 90 days to start date

            // Generate random weight, reps and BMI values
            $weight = $startWeight - $i; // Weight between 50kg and 120kg
            $reps = rand(5, 20);     // Reps between 5 and 20
            $height = 175; // Height between 150cm and 200cm
            $bmi = round($weight / (($height / 100) * ($height / 100)), 1); // BMI calculation

            GymProgress::create([
                'user_id' => $userId,
                'workout_name' => 'Workout ' . $i, // Simple workout name
                'progress_date' => $progressDate,
                'height' => $height,
                'height_raw' => $height,
                'height_raw_unit' => 'cm',
                'weight' => $weight,
                'weight_raw' => $weight,
                'weight_raw_unit' => 'kg',
                'reps' => $reps,
                'bmi' => $bmi,
                'notes' => 'Progress note for workout ' . $i, // Simple note
            ]);
        }
    }
}
