<?php

namespace Database\Seeders;

use App\Models\Workout;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workouts = [
            // Abduction
            [
                'name' => 'Hip Abduction Machine',
                'target_muscle_group' => 'abductors',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Machine',
                'mechanics' => 'Push (Bilateral)',
                'force_type' => 'Push',
                'experience_level' => 'beginner',
                'video_url' => 'v=7pbZA7ncuq8',
                'description' => '<h2 style="box-sizing: inherit; margin-right: 0px; margin-bottom: 0.5rem; margin-left: 0px; padding: 0px; font-family: opensans-bold, sans-serif; color: rgb(51, 51, 51); text-rendering: optimizelegibility; font-size: 2.22222rem; line-height: 1.4; background-color: rgb(254, 254, 254);">Lying Floor Leg Raise Overview</h2><div class="field field-name-field-exercise-overview field-type-text-long field-label-hidden" style="box-sizing: inherit; margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: roboto-regular, sans-serif; font-size: 18px; background-color: rgb(254, 254, 254);"><div class="field-items" style="box-sizing: inherit; margin: 0px; padding: 0px;"><div class="field-item even" style="box-sizing: inherit; margin: 0px; padding: 0px;"><p style="box-sizing: inherit; margin-right: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">The lying floor leg raise is a variation of the&nbsp;<a href="https://www.muscleandstrength.com/exercises/ab-crunch" style="box-sizing: inherit; line-height: inherit; color: rgb(0, 85, 153); text-decoration: none; cursor: pointer;">abdominal crunch</a>&nbsp;and an exercise used to isolate the muscles of the abdomen.</p><p style="box-sizing: inherit; margin-right: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">The lying floor leg raise is a flexion based exercise which keeps the lower abdominal muscles under constant tension during the entire range of motion.</p></div></div></div><h2 style="box-sizing: inherit; margin-right: 0px; margin-bottom: 0.5rem; margin-left: 0px; padding: 0px; font-family: opensans-bold, sans-serif; color: rgb(51, 51, 51); text-rendering: optimizelegibility; font-size: 2.22222rem; line-height: 1.4; background-color: rgb(254, 254, 254);">Lying Floor Leg Raise Instructions</h2><div class="field field-name-body field-type-text-with-summary field-label-hidden" style="box-sizing: inherit; margin: 0px; padding: 0px;"><div class="field-items" style="box-sizing: inherit; margin: 0px; padding: 0px;"><div class="field-item even" style="box-sizing: inherit; margin: 0px; padding: 0px;"><ol style="box-sizing: inherit;"><li style="box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;">Lay supine in a relaxed position with your legs straight and your hands underneath your low back for support.</li><li style="box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;">Keep your legs straight and raise them towards your forehead while contracting your abdominals and exhaling.</li><li style="box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;">Once your abs are fully contracted and your legs are slightly above parallel, slowly lower your legs back to the starting position.</li><li style="box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;">Complete for the assigned number of repetitions.</li></ol></div></div></div><h2 style="box-sizing: inherit; margin-right: 0px; margin-bottom: 0.5rem; margin-left: 0px; padding: 0px; font-family: opensans-bold, sans-serif; color: rgb(51, 51, 51); text-rendering: optimizelegibility; font-size: 2.22222rem; line-height: 1.4; background-color: rgb(254, 254, 254);">Lying Floor Leg Raise Tips</h2><p><span style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: roboto-regular, sans-serif; font-size: 18px; background-color: rgb(254, 254, 254);"><span style="box-sizing: inherit;"></span></span><span style="color: rgb(51, 51, 51); font-family: roboto-regular, sans-serif; font-size: 18px; background-color: rgb(254, 254, 254);"></span></p><div class="field field-name-field-exercise-tips field-type-text-long field-label-above" style="box-sizing: inherit; margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: roboto-regular, sans-serif; font-size: 18px; background-color: rgb(254, 254, 254);"><div class="field-items" style="box-sizing: inherit; margin: 0px; padding: 0px;"><div class="field-item even" style="box-sizing: inherit; margin: 0px; padding: 0px;"><ol style="box-sizing: inherit;"><li style="box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;">Exhale hard like you’re blowing out candles on a cake and hold the contraction for a second in order to improve mind muscle connection.</li><li style="box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;">If your lower back bothers you during this exercise, choose more anti extension and anti rotation based movements.</li><li style="box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;">Avoid putting the hands behind the head as this can lead to excess strain upon the neck.</li></ol></div></div></div>',
            ],
            // [
            //     'name' => '',
            //     'target_muscle_group' => '',
            //     'excercise_type' => '',
            //     'equipment_required' => '',
            //     'mechanics' => '',
            //     'force_type' => '',
            //     'experience_level' => '',
            //     'video_url' => '',
            //     'description' => '',
            // ],
            // ABS


        ];

        foreach ($workouts as $workout) {
            Workout::create($workout);
        }
    }
}
