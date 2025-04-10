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
                'experience_level' => 'Beginner',
                'video_url' => 'https://www.youtube.com/watch?v=7pbZA7ncuq8',
                'copyright' => 'Muscle & Strength LLC',
                // 'description' => '<h2 style="box-sizing: inherit; margin-right: 0px; margin-bottom: 0.5rem; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(51, 51, 51); text-rendering: optimizelegibility; font-size: 2.22222rem; line-height: 1.4; background-color: rgb(254, 254, 254);">Hip Abduction Machine Overview</h2><div class="field field-name-field-exercise-overview field-type-text-long field-label-hidden" style="box-sizing: inherit; margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Poppins, sans-serif; font-size: 18px; background-color: rgb(254, 254, 254);"><div class="field-items" style="box-sizing: inherit; margin: 0px; padding: 0px;"><div class="field-item even" style="box-sizing: inherit; margin: 0px; padding: 0px;"><p style="box-sizing: inherit; margin-right: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">The hip abduction machine exercise is an exercise used to strengthen the abductors.</p><p style="box-sizing: inherit; margin-right: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">The abductors play a critical role in core stability and having strong abductors can result in better personal records on the&nbsp;<a href="https://www.muscleandstrength.com/exercises/squat.html" style="box-sizing: inherit; line-height: inherit; color: rgb(0, 85, 153); text-decoration: none; cursor: pointer;">squat</a>&nbsp;and&nbsp;<a href="https://www.muscleandstrength.com/exercises/deadlifts.html" style="box-sizing: inherit; line-height: inherit; color: rgb(0, 85, 153); text-decoration: none; cursor: pointer;">deadlift</a>.</p><p style="box-sizing: inherit; margin-right: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">From an aesthetic perspective, performing hip abduction isolation exercises assists in the development of a full pair of glutes and hips.</p></div></div></div><h2 style="box-sizing: inherit; margin-right: 0px; margin-bottom: 0.5rem; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(51, 51, 51); text-rendering: optimizelegibility; font-size: 2.22222rem; line-height: 1.4; background-color: rgb(254, 254, 254);">Hip Abduction Machine Instructions</h2><div class="field field-name-body field-type-text-with-summary field-label-hidden" style="box-sizing: inherit; margin: 0px; padding: 0px;"><div class="field-items" style="box-sizing: inherit; margin: 0px; padding: 0px;"><div class="field-item even" style="box-sizing: inherit; margin: 0px; padding: 0px;"><ol style="box-sizing: inherit;"><li style="box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;">Setup in an upright position with your back against the pad and your spine neutral.</li><li style="box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;">Exhale and push the legs apart as you open the pads.</li><li style="box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;">Once your hips are fully externally rotated, slowly return to the starting position.</li><li style="box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;">Repeat for the desired number of repetitions.</li></ol></div></div></div><h2 style="box-sizing: inherit; margin-right: 0px; margin-bottom: 0.5rem; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(51, 51, 51); text-rendering: optimizelegibility; font-size: 2.22222rem; line-height: 1.4; background-color: rgb(254, 254, 254);">Hip Abduction Machine Tips</h2><p><span style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: Poppins, sans-serif; font-size: 18px; background-color: rgb(254, 254, 254);"><span style="box-sizing: inherit;"></span></span><span style="color: rgb(51, 51, 51); font-family: Poppins, sans-serif; font-size: 18px; background-color: rgb(254, 254, 254);"></span></p><div class="field field-name-field-exercise-tips field-type-text-long field-label-above" style="box-sizing: inherit; margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Poppins, sans-serif; font-size: 18px; background-color: rgb(254, 254, 254);"><div class="field-items" style="box-sizing: inherit; margin: 0px; padding: 0px;"><div class="field-item even" style="box-sizing: inherit; margin: 0px; padding: 0px;"><ol style="box-sizing: inherit;"><li style="box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;">Experiment with foot and pelvis position. Depending upon the shape of your hip, you may need a slightly more internal or external starting position&nbsp;to fully maximize the contraction.<ul style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1rem; margin-left: 40px; padding: 0px; list-style-position: outside; line-height: 1.6; list-style-type: disc;"><li style="box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;">Similarly, be mindful of your pelvic position - don’t allow the back to arch as this will tip the hips forward and place the adductors under excessive stretch before the contraction which can affect force output.</li><li style="box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;">If you can’t seem to figure out how to change the position of your pelvis while seated, experiment with changing the position of the torso (i.e. lean forward or push your back into the pad).</li></ul></li></ol></div></div></div>',
                'description' => '<h2>Hip Abduction Machine Overview</h2>
                <div>
                    <p>The hip abduction machine exercise is an exercise used to strengthen the abductors. The abductors play a critical role in core stability and having strong abductors can result in better personal records on the squat and deadlift. From an aesthetic perspective, performing hip abduction isolation exercises assists in the development of a full pair of glutes and hips.</p>
                </div>

                <h2>Hip Abduction Machine Instructions</h2>
                <div>
                    <ol>
                        <li>
                            <span>Setup in an upright position with your back against the pad and your spine neutral.</span>
                        </li>
                        <li>
                            <span>Exhale and push the legs apart as you open the pads.</span>
                        </li>
                        <li>
                            <span>Once your hips are fully externally rotated, slowly return to the starting position.</span>
                        </li>
                        <li>
                            <span>Repeat for the desired number of repetitions.</span>
                        </li>
                    </ol>
                </div>

                <h2>Hip Abduction Machine Tips</h2>
                <div>
                    <ol>
                        <li>
                            <span>Experiment with foot and pelvis position. Depending upon the shape of your hip, you may need a slightly more internal or external starting position to fully maximize the contraction.</span>
                        </li>

                        <li>
                            <span>Similarly, be mindful of your pelvic position - don’t allow the back to arch as this will tip the hips forward and place the adductors under excessive stretch before the contraction which can affect force output.</span>
                        </li>
                        <li>
                            <span>If you can’t seem to figure out how to change the position of your pelvis while seated, experiment with changing the position of the torso (i.e. lean forward or push your back into the pad).</span>
                        </li>
                    </ol>
                </div>
                ',
            ],
            // ABS
            [
                'name' => 'Lying Floor Leg Raise',
                'target_muscle_group' => 'Abs',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Bodyweight',
                'mechanics' => 'Isolation',
                'force_type' => 'Pull (Bilateral)',
                'experience_level' => 'Advanced',
                'video_url' => 'https://www.youtube.com/watch?v=r24ntO4IvKc',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Lying Floor Leg Raise Overview</h2>
<p>The lying floor leg raise is a variation of the abdominal crunch and an exercise used to isolate the muscles of the abdomen. The lying floor leg raise is a flexion based exercise which keeps the lower abdominal muscles under constant tension during the entire range of motion.</p>
<h2>Lying Floor Leg Raise Instructions</h2>
<ol>
<li>Lay supine in a relaxed position with your legs straight and your hands underneath your low back for support.</li>
<li>Keep your legs straight and raise them towards your forehead while contracting your abdominals and exhaling.</li>
<li>Once your abs are fully contracted and your legs are slightly above parallel, slowly lower your legs back to the starting position.</li>
<li>Complete for the assigned number of repetitions.</li>
</ol>
<h2>Lying Floor Leg Raise Tips</h2>
<ol>
<li>Exhale hard like you’re blowing out candles on a cake and hold the contraction for a second in order to improve mind muscle connection.</li>
<li>If your lower back bothers you during this exercise, choose more anti extension and anti rotation based movements.</li>
<li>Avoid putting the hands behind the head as this can lead to excess strain upon the neck.</li>
</ol>',
            ],
            [
                'name' => 'Weighted Crunch',
                'target_muscle_group' => 'Abs',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Other',
                'mechanics' => 'Isolation',
                'force_type' => 'Pull',
                'experience_level' => 'Intermediate',
                'video_url' => 'https://www.youtube.com/watch?v=6kHg3JAFNFo',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Weighted Crunch Overview</h2> <p>The weighted crunch is a variation of the crunch and an exercise used to build the abdominal muscles. Adding weight is a common form of progression used to make bodyweight exercises, such as the crunch, more challenging. Doing so allows for the lifter to progress, adapt, and build more muscle.</p> <h2>Weighted Crunch Instructions</h2> <ol><li>Lay supine in a relaxed position with your knees bent.</li><li>Hold a weight plate directly over your chest and press it to extension.</li><li>Raise your knees to 90 degrees, at which point they will be perpendicular to the floor.</li><li>Exhale as you reach towards your toes with the weight plate.</li><li>Once your abs are fully contracted and your upper back is off the floor, slowly lower yourself back to the starting position.</li><li>Complete 1 for the assigned number of repetitions.</li></ol> <h2>Weighted Crunch Tips</h2> <ol><li>Exhale hard like you’re blowing out candles on a cake and hold the contraction for a second to improve mind muscle connection.</li><li>If your lower back bothers you during this exercise, choose more anti extension and anti rotation based movements.</li><li>Avoid putting the hands behind the head as this can lead to excess strain upon the neck.</li></ol>
',
            ],
            [
                'name' => 'Sit Up',
                'target_muscle_group' => 'Abs',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Bodyweight',
                'mechanics' => 'Isolation',
                'force_type' => 'Pull (Bilateral)',
                'experience_level' => 'Beginner',
                'video_url' => 'https://www.youtube.com/watch?v=MQDopvLZOS8',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Sit Up Overview</h2>
<p>The sit up is a classic abdominal exercise. It’s rarely performed anymore, however, it’s still a very effective flexion based exercise for those looking to utilize it to target their core. There are some risks involved in performing the sit up as opposed to crunches (or stability ball crunches). The primary one being the common complaint of lower back pain. One can perform sit ups as part of their ab workout or full body workout.</p>
<h2>Sit Up Instructions</h2>
<ol>
  <li>Lay supine in a relaxed position with your knees up and hands across your chest.</li>
  <li>Exhale and squeeze your abs as you curl your upper body off the floor.</li>
  <li>Once your torso is perpendicular to the floor, slowly lower yourself back to the starting position.</li>
  <li>Complete for the assigned number of repetitions.</li>
</ol>
<h2>Sit Up Tips</h2>
<ol>
  <li>Exhale hard like you’re blowing out candles on a cake and hold the contraction for a second in order to improve mind muscle connection.</li>
  <li>If your lower back bothers you during this exercise, choose more anti extension and anti rotation based movements.</li>
  <li>Avoid putting the hands behind the head as this can lead to excess strain upon the neck.</li>
</ol>',
            ],
            // Adductors
            [
                'name' => 'Hip Adduction Machine',
                'target_muscle_group' => 'Adductors',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Machine',
                'mechanics' => 'Isolation',
                'force_type' => 'Push (Bilateral)',
                'experience_level' => 'Intermediate',
                'video_url' => 'https://www.youtube.com/watch?v=Oj7IN952fSg',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Hip Adduction Machine Overview</h2>
<p>The hip adduction machine exercise is an exercise used to strengthen the muscles of the adductors. Having strong adductor plays a critical role in using maximal weights on lower body exercises such as squats and lunges. From an aesthetic standpoint, using the hip adduction machine can help in building shapely inner thighs.</p>
<h2>Hip Adduction Machine Instructions</h2>
<ol>
  <li>Setup in an upright position with your back against the pad and your spine neutral.</li>
  <li>Exhale and pull the legs together as you squeeze the pads inward.</li>
  <li>Once the pads touch, slowly return to the starting position.</li>
  <li>Repeat for the desired number of repetitions.</li>
</ol>
<h2>Hip Adduction Machine Tips</h2>
<ol>
  <li>Experiment with foot and pelvis position. Depending upon the shape of your hip, you may need a slightly more internal or external starting position to fully maximize the contraction.
    <ul>
      <li>Similarly, be mindful of your pelvic position - don’t allow the back to arch as this will tip the hips forward and place the adductors under excessive stretch before the contraction which can affect force output.</li>
      <li>If you can’t seem to figure out how to change the position of your pelvis while seated, experiment with changing the position of the torso (i.e. lean forward or push your back into the pad).</li>
    </ul>
  </li>
</ol>',
            ],
            [
                'name' => 'Alternating Lateral Lunge with Overhead Reach',
                'target_muscle_group' => 'Adductors',
                'excercise_type' => 'Warmup',
                'equipment_required' => 'Bodyweight',
                'mechanics' => 'Compound',
                'force_type' => 'Dynamic Stretching',
                'experience_level' => 'Beginner',
                'video_url' => 'https://www.youtube.com/watch?v=cGQ3H4sZbSM',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Alternating Lateral Lunge with Overhead Reach Overview</h2>
<p>The alternating lateral lunge with overhead reach is a warm-up exercise used to dynamically stretch the lower body, shoulders, and upper back. The stretch primarily increases mobility in the groin, but will also be felt in the shoulders. Warming up adequately is an important part of any workout routine, and maintaining mobility can increase the overall effectiveness of certain exercises.</p>
<h2>Alternating Lateral Lunge with Overhead Reach Instructions</h2>
<ol>
  <li>Stand in an upright position with your feet together and arms at your sides.</li>
  <li>Step laterally and sit back into your hip while you extend your opposite leg.</li>
  <li>Once at the bottom of the lateral lunge, keep your arms straight and raise them into shoulder flexion.</li>
  <li>After you reach overhead, lower the arms and push back to your starting position.</li>
  <li>Repeat for the desired number of repetitions on both sides.</li>
</ol>
<h2>Alternating Lateral Lunge with Overhead Reach Tips</h2>
<ol>
  <li>As your raise the arms overhead, make sure the movements comes entirely from the shoulders and not the spine.</li>
  <li>Exhale as you reach and focus on activating the musculature of your upper back and posterior shoulder.</li>
  <li>During the lateral lunge, if you’re able to descend deep into the movement, experiment with allowing the sole of the shoe to come off the floor and point your toes towards the ceiling. Depending upon each individual’s bony hip anatomy, this may feel better.</li>
</ol>',
            ],
            [
                'name' => 'Deep Squat Prying',
                'target_muscle_group' => 'Adductors',
                'excercise_type' => 'Warmup',
                'equipment_required' => 'Kettle Bells',
                'mechanics' => 'Compound',
                'force_type' => 'Dynamic Stretching',
                'experience_level' => 'Beginner',
                'video_url' => 'https://www.youtube.com/watch?v=GWhI41W8xnk',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Deep Squat Prying Overview</h2>
<div>
  <p>The deep squat prying drill is both an activation exercise and a drill that promotes increased mobility.The deep squat portion of the drill is beneficial in activating the muscles of the lower body including the adductors, quads, glutes, and hamstrings.The prying part of the drill helps open up the hips to promote more fluid range of motions during your working sets later in the workout.One would typically perform the deep squat prying drill at the beginning of their workouts as a dynamic stretch in their specific warm up routine.</p>
</div>
<h2>Deep Squat Prying Instructions</h2>
<div>
  <ol>
    <li>In a standing position with a shoulder width stance, hold a kettlebell at chest height using both hands.</li>
    <li>Squat down by breaking at the hips and knees simultaneously. Sit as deep as comfortably possible.</li>
    <li>Rock from side to side while flexing the ankles and pushing the knees out with the elbows to open up the hips.</li>
    <li>Repeat for the desired number of repetitions or time.</li>
  </ol>
</div>
<h2>Deep Squat Prying Tips</h2>
<div>
  <ol>
    <li>Focus on keeping your spine tall in the bottom position and don’t allow the weight to pull your forward.</li>
    <li>Ideally you should be able to sit comfortably in the bottom position and open up the hips and ankles as you rock side to side.</li>
    <li>To get into a deep squat, you should try to focus on sitting down rather than back to keep your torso upright.</li>
  </ol>
</div>',
            ],
            //  Biceps

            [
                'name' => 'Incline Dumbbell Curl',
                'target_muscle_group' => 'Biceps',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Dumbbell',
                'mechanics' => 'Isolation',
                'force_type' => 'Pull (Bilateral)',
                'experience_level' => 'Beginner',
                'video_url' => 'https://www.youtube.com/watch?v=UeleXjsE-98',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Incline Dumbbell Curl Overview</h2>
<p>The incline dumbbell curl is a variation of the dumbbell curl, and an exercise used to build bigger biceps. The biceps is a tricky (and fun) muscle to target and putting yourself in various degrees of incline can help manipulate the range of motion for either a tighter contraction or deeper stretch. The incline dumbbell curl elongates the negative portion of the dumbbell curl, creating a deeper stretch on the biceps muscle tissue. Dumbbell curl variations are primarily popular among lifters looking to improve their aesthetics as direct arm work will have limited carry over into maximum strength.</p>
<h2>Incline Dumbbell Curl Instructions</h2>
<ol>
  <li>Position an incline bench at roughly 55-65 degrees, select the desired weight from the rack, and sit upright with your back flat against the pad.</li>
  <li>Using a supinated (palms up) grip, take a deep breath and curl both dumbbells towards your shoulders.</li>
  <li>Once the biceps are fully shortened, slowly lower the weights back to the starting position.</li>
  <li>Repeat for the desired number of repetitions.</li>
</ol>
<h2>Incline Dumbbell Curl Tips</h2>
<ol>
  <li>Don’t allow the elbows to shift behind the body. Similarly, make sure the shoulder doesn’t shift forward in the socket as you lower the weight.</li>
  <li>Maintain a slight bend in the elbow at the bottom of the movement in order to keep tension through the biceps.</li>
  <li>Using a slow eccentric (lowering portion) of the exercise can help to improve tension and mind muscle connection</li>
</ol>',
            ],
            [
                'name' => 'Dumbbell Hammer Preacher Curl',
                'target_muscle_group' => 'Biceps',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Dumbbell',
                'mechanics' => 'Isolation',
                'force_type' => 'Pull',
                'experience_level' => 'Advanced',
                'video_url' => 'https://www.youtube.com/watch?v=ZdcFOgFi1Dg',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Dumbbell Hammer Preacher Curl Overview</h2>
<p>The preacher dumbbell hammer curl is a variation of the hammer curl and an exercise used to build bigger biceps. Utilizing the preacher set up while performing preacher dumbbell hammer curls promotes a fixed range of motion for the hammer curl, allowing for a more focused contraction on the biceps. When trying to build your biceps, using a wide range of exercises which focus on different ranges of motion is the best approach.</p>
<h2>Dumbbell Hammer Preacher Curl Instructions</h2>
<ol>
  <li>Select the desired weight from the rack and sit in an upright position with your chest flat against the preacher bench.</li>
  <li>Keep your upper arm pressed into the pad and use a neutral (palms facing up) grip.</li>
  <li>Take a deep breath and slowly lower the dumbbell away from your shoulder.</li>
  <li>Once the bicep is fully lengthened, curl the weight back to the starting position.</li>
  <li>Repeat for the desired number of repetitions on both sides.</li>
</ol>
<h2>Dumbbell Hammer Preacher Curl Tips</h2>
<ol>
  <li>Maintain a slight bend in the elbow at the bottom of the movement in order to keep tension through the biceps.</li>
  <li>Using a slow eccentric (lowering portion) of the exercise can help to improve tension and mind muscle connection</li>
</ol>',
            ],
            // Calves
            [
                'name' => 'Seated Calf Raise',
                'target_muscle_group' => 'Calves',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Machine',
                'mechanics' => 'Isolation',
                'force_type' => 'Push (Bilateral)',
                'experience_level' => 'Beginner',
                'video_url' => 'https://www.youtube.com/watch?v=Yh5TXz99xwY',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Seated Calf Raise Overview</h2>
<p>The seated calf raise is a variation of the machine calf raise, and an exercise used to isolate the muscles of the calves. The calves can be a stubborn muscle group for a lot of people, so it’s important to experiment with several different angles when performing calf raises. You may also want to consider training the calves with a high training frequency. The seated calf raise can be incorporated into your leg workouts and full body workouts.</p>
<h2>Seated Calf Raise Instructions</h2>
<ol>
  <li>Take a seat on the machine and place the balls of your feet on the platform with your toes pointed forward - your heels will naturally hang off. Position the base of quads under the knee pad and allow your hands to rest on top.</li>
  <li>Extend your ankles and release the safety bar.</li>
  <li>Lower the heels by dorsiflexing the ankles until the calves are fully stretched.</li>
  <li>Extend the ankles and exhale as you flex the calves.</li>
  <li>Repeat for the assigned number of repetitions.</li>
</ol>
<h2>Seated Calf Raise Tips</h2>
<ol>
  <li>Keep the repetitions slow and controlled. Limit momentum and pause at the top to emphasize the contraction.</li>
  <li>Limit depth of the heels if you feel any sort of stretch through the bottom of the foot during the exercise.</li>
  <li>Try to move through the ball of the foot rather than the base of the toes</li>
</ol>',
            ],
            [
                'name' => '45 Degree Leg Press Calf Raise',
                'target_muscle_group' => 'Calves',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Machine',
                'mechanics' => 'Isolation',
                'force_type' => 'Push (Bilateral)',
                'experience_level' => 'Intermediate',
                'video_url' => 'https://www.youtube.com/watch?v=RcKQbiL-ZOc',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>45 Degree Leg Press Calf Raise Overview</h2>
<p>The leg press calf raise is a variation of the machine calf raise, and an exercise used to build the muscles of the calves. The calves can be a very stubborn muscle group, so it’s important to target them with plenty of different angles and a with a high training frequency. This exercise can be incorporated into your leg days or full body days.</p>
<h2>45 Degree Leg Press Calf Raise Instructions</h2>
<ol>
  <li>Load the machine with the desired weight and take a seat.</li>
  <li>Sit down and position your feet on the sled with a shoulder width stance.</li>
  <li>Take a deep breath, extend your legs, but keep the safeties locked (if possible).</li>
  <li>Position your feet at the base of the platform and allow the heels to hang off.</li>
  <li>Lower the heels by dorsiflexing the ankles until the calves are fully stretched.</li>
  <li>Drive the weight back to the starting position by extending the ankles and flexing the calves.</li>
  <li>Repeat for the desired number of repetitions.</li>
</ol>
<h2>45 Degree Leg Press Calf Raise Tips</h2>
<ol>
  <li>SAFETY NOTE: Be extremely careful when re-positioning the feet at the base of the platform. If the safeties are not in place and you lose control of the platform, this could result in very serious injury.</li>
  <li>Keep the repetitions slow and controlled. Limit momentum and pause at the top to emphasize the contraction.</li>
  <li>If you experience any sort of pain or pressure in the back of the knee joint, keep a slight bend in the knee and avoid complete lockout.</li>
  <li>If the knee isn’t entirely locked out then ensure the position doesn’t change during the duration of the repetition.</li>
  <li>Limit depth of the heels if you feel any sort of stretch through the bottom of the foot during the exercise.</li>
  <li>Try to move through the ball of the foot rather than the base of the toes</li>
</ol>',
            ],
            // Chest
            [
                'name' => 'Dumbbell Bench Press',
                'target_muscle_group' => 'Chest',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Dumbbell',
                'mechanics' => 'Compound',
                'force_type' => 'Push (Bilateral)',
                'experience_level' => 'Advanced',
                'video_url' => 'https://www.youtube.com/watch?v=dGqI0Z5ul4k',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Dumbbell Bench Press Overview</h2>
<p>
The dumbbell bench press is a variation of the barbell bench press and an exercise used to build the muscles of the chest. Often times, the dumbbell bench press is recommended after reaching a certain point of strength on the barbell bench press to avoid pec and shoulder injuries. Additionally, the dumbbell bench press provides an ego check in the amount of weight used due to the need to maintain shoulder stability throughout the exercise. The exercise itself can be featured as a main lift in your workouts or an accessory lift to the bench press depending on your goals.
</p>

<h2>Dumbbell Bench Press Instructions</h2>
<ol>
  <li>Pick up the dumbbells off the floor using a neutral grip (palms facing in). Position the ends of the dumbbells in your hip crease, and sit down on the bench.</li>
  <li>To get into position, lay back and keep the weights close to your chest. Once you are in position, take a deep breath, and press the dumbbells to lockout at the top.</li>
  <li>Slowly lower the dumbbells under control as far as comfortably possible (the handles should be about level with your chest).</li>
  <li>Contract the chest and push the dumbbells back up to the starting position.</li>
  <li>Repeat for the desired number of repetitions.</li>
</ol>
<p>
**Dropping the dumbbells to the side is discouraged unless you are experienced with the technique or using excessively heavy weights. Ideally, you should twist the dumbbells back to neutral (palms facing each other), bring your knees up so the ends of the dumbbells are touching your thighs, then use the weight of the dumbbells to rock back to an upright, seated position.
</p>

<h2>Dumbbell Bench Press Tips</h2>
<ol>
  <li>Maintain more tension through the pecs by not locking out the elbows entirely.</li>
  <li>Keep the weights slightly tilted at a 45-degree angle in order to keep the elbows in a neutral position.</li>
  <li>Don’t allow the dumbbells to collide at the top of each rep – bouncing them together may cause you to lose stability within the shoulder and injure yourself.</li>
  <li>Squeeze the dumbbells as tight as possible to improve a phenomenon known as “irradiation” which promotes greater shoulder stability.</li>
  <li>Keep your shoulder blades pinched together to ensure the shoulders remain in a safe position.</li>
  <li>Imagine you’re trying to push yourself away from the weights rather than pushing the weights away from yourself.</li>
  <li>If you’re feeling pain within the shoulder joint itself (specifically at the front), ensure your shoulder blades are slightly retracted and try to keep the shoulder girdle “packed”.</li>
  <li>Ensure you maintain some tension in your abs and don’t allow your lower back to arch excessively.</li>
  <li>Keep your feet flat on the floor and don’t allow the lower body to move during the set.</li>
</ol>
',
            ],
            [
                'name' => 'Incline Bench Press',
                'target_muscle_group' => 'Chest',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Barbell',
                'mechanics' => 'Compound',
                'force_type' => 'Push (Bilateral)',
                'experience_level' => 'Beginner',
                'video_url' => 'https://www.youtube.com/watch?v=uIzbJX5EVIY',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Incline Bench Press Overview</h2>
<p>The incline bench press is a variation of the bench press and an exercise used to build the muscles of the chest. The shoulders and triceps will be indirectly involved as well. Utilizing an incline will allow you to better target the upper portion of the chest, a lagging part for a lot of lifters. You can include incline bench press in your chest workouts, upper body workouts, push workouts, and full body workouts.</p>

<h2>Incline Bench Press Instructions</h2>
<ol>
  <li>Lie flat on an incline bench and set your hands just outside of shoulder width.</li>
  <li>Set your shoulder blades by pinching them together and driving them into the bench.</li>
  <li>Take a deep breath and allow your spotter to help you with the lift off in order to maintain tightness through your upper back.</li>
  <li>Let the weight settle and ensure your upper back remains tight after lift off.</li>
  <li>Inhale and allow the bar to descend slowly by unlocking the elbows.</li>
  <li>Lower the bar in a straight line to the base of the sternum (breastbone) and touch the chest.</li>
  <li>Push the bar back up in a straight line by pressing yourself into the bench, driving your feet into the floor for leg drive, and extending the elbows.</li>
  <li>Repeat for the desired number of repetitions.</li>
</ol>

<h2>Incline Bench Press Tips</h2>
<ol>
  <li>Technique first, weight second - no one cares how much you bench if you get injured.</li>
  <li>Keep the bar in line with your wrist and elbows and ensure it travels in a straight line. Try to position the bar as low in the palm as possible while still being able to wrap the thumb.</li>
  <li>If you want to keep more tension through the triceps and chest, stop each repetition just short of lockout at the top.</li>
  <li>Don’t worry about tucking the elbows excessively. A slight tuck on the way down may be advisable, but many lifters can use the cue: “Flare and push”.</li>
  <li>Arching may be advisable depending on your goals but ensure most of the arch comes from the mid to upper back, not your lower back.</li>
  <li>The bar should touch your chest with every single repetition. If you want to overload specific ranges of motion, try board presses or using chains/bands.</li>
  <li>As the bar descends, aim for your sternum or slightly below depending on your upper arm length.</li>
  <li>Most lifters should learn to bench with the thumb wrapped around the bar, even if more advanced lifters may use a thumbless grip.</li>
  <li>Don’t let your wrists roll back; think about rolling your knuckles toward the ceiling.</li>
  <li>Experiment with grip width. If you feel pressure in the front of the shoulder, you may need to widen your grip or improve scapular retraction.</li>
  <li>Squeeze the bar as tightly as possible to enhance shoulder stability.</li>
  <li>Ensure the shoulder blades remain retracted throughout the press.</li>
  <li>Lower the bar under control and touch your chest without bouncing or using excess momentum.</li>
</ol>',
            ],
            // Forearms
            [
                'name' => 'Seated Barbell Wrist Curl',
                'target_muscle_group' => 'Forearms',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Barbell',
                'mechanics' => 'Isolation',
                'force_type' => 'Pull (Bilateral)',
                'experience_level' => 'Beginner',
                'video_url' => 'https://www.youtube.com/watch?v=cOBaYeX3bYo',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Seated Barbell Wrist Curl Overview</h2>
  <p>The seated barbell wrist curl is a wrist curl variation and an exercise used to target the muscles of the forearms. Having strong forearms, and training the forearms in multiple ways, will allow you to lift heavier weight in many exercises simply by strengthening your grip. Forearms can be a resistant muscle to grow and may require a higher training frequency to experience a noticeable difference in forearm strength and size.</p>

  <h2>Seated Barbell Wrist Curl Instructions</h2>
  <ol>
    <li>Select the desired weight, load it onto the bar, and assume a seated position with the forearms resting comfortably on your thighs.</li>
    <li>Utilize a supinated (palms up) grip and curl the bar towards your body using just the wrists.</li>
    <li>Once the forearm flexors are fully shortened, slowly lower the weight back to the starting position.</li>
    <li>Repeat for the desired number of repetitions.</li>
  </ol>

  <h2>Seated Barbell Wrist Curl Tips</h2>
  <ol>
    <li>Using a slow eccentric (lowering portion) of the exercise can help to improve tension and mind-muscle connection.</li>
    <li>Try not to open the fingers at the bottom of the movement, just move through the wrist.</li>
  </ol>',
            ],
            // Glutes
            [
                'name' => 'Hyperextension',
                'target_muscle_group' => 'Glutes',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Bodyweight',
                'mechanics' => 'Isolation',
                'force_type' => 'Hinge (Bilateral)',
                'experience_level' => 'Beginner',
                'video_url' => 'https://www.youtube.com/watch?v=BZMnTSobIAQ',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Hyperextension Overview</h2>
<p>The hyperextension is a variation of the hip hinge movement pattern and an exercise used to target the glutes. Some may choose to utilize this exercise to target their lower back. However, for optimal health and maximum benefits, it is best to think of this exercise as a glute exercise. Hyperextensions can be included in your leg workouts and full body workouts.</p>

<h2>Hyperextension Instructions</h2>
<ol>
  <li>Setup in a hyperextension machine with your feet anchored and torso roughly perpendicular to your legs at a 45 degree angle.</li>
  <li>Begin in a hinged position with your arms crossed and initiate the movement by flexing your glutes.</li>
  <li>Extend the hips and finish with your body in a straight line.</li>
  <li>Repeat for the desired number of repetitions.</li>
</ol>

<h2>Hyperextension Tips</h2>
<ol>
  <li>Keep in mind that there are two ways to do hyperextensions. For the vast majority of folks (outside of a sport specific application - ex. Gymnastics or Olympic weight lifting), they stick with the first rather than the second option.
    <ul>
      <li><em>Glutecentric:</em> Slightly flex your upper back and extend your hips until your body is in a straight line and focus entirely on gluteal activation.</li>
      <li><em>Erector-centric:</em> Arch globally through the spine and focus entirely on erector activation.</li>
    </ul>
  </li>
  <li>If you can’t seem to feel your glutes activating, palpate the musculature with your hands and focus on pausing the movement at the peak of contraction.</li>
  <li>If you find one glute has less contractility than another, perform twice as much volume on that side relative to the other with unilateral variations until you have established an efficient mind/muscle connection.</li>
</ol>
',
            ],
            // Hamstrings
            [
                'name' => 'Stiff Leg Deadlift',
                'target_muscle_group' => 'Hamstrings',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Barbell',
                'mechanics' => 'Compound',
                'force_type' => 'Hinge (Bilateral)',
                'experience_level' => 'Intermediate',
                'video_url' => 'https://www.youtube.com/watch?v=CkrqLaDGvOA',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Stiff Leg Deadlift Overview</h2>
<p>
The stiff leg deadlift is a variation of the deadlift and an exercise used primarily to target the muscles of the hamstrings. The stiff leg deadlift has long been thought of as the “leg” deadlift variation, despite all hip hinge movements primarily targeting the hamstrings. A smart option, to increase training frequency and work on the movement pattern, would be to perform stiff legs on your leg day and another deadlift variation on your back or pull days. The hip hinge is a crucial movement pattern, so it is important to find a variation that is comfortable for you to perform (if able), and work on it. The stiff leg deadlift is best utilized during your leg workouts and/or full body workouts.
</p>

<h2>Stiff Leg Deadlift Instructions</h2>
<ol>
  <li>Position the bar over the top of your shoelaces and assume a hip width stance.</li>
  <li>Push your hips back and hinge forward until your torso is nearly parallel with the floor.</li>
  <li>Reach down and grasp the bar using a shoulder width, double overhand grip.</li>
  <li>Ensure your spine is neutral, shin is vertical, and your hips are roughly the same height as your shoulders.</li>
  <li>Drive through the whole foot and focus on pushing the floor away.</li>
  <li>Ensure the bar tracks in a straight line as you extend the knees and hips.</li>
  <li>Once you have locked out the hips, reverse the movement by pushing the hips back and hinging forward.</li>
  <li>Return the bar to the floor, reset, and repeat for the desired number of repetitions.</li>
</ol>

<h2>Stiff Leg Deadlift Tips</h2>
<ol>
  <li>This style of deadlift will look very similar to a conventional deadlift only the lifter will start with higher hips and a vertical shin angle. The hips and shoulders will likely be at just about the same height.</li>
  <li>Do not allow the bar to drift away from your body during the lift.</li>
  <li>You can start these out a rack (similar to an RDL or the American deadlift) or you can start these off the floor.</li>
  <li>Keep soft knees and ensure the movement occurs primarily at your hips. There shouldn’t be any movement within your spine - don’t focus on arching your back.</li>
  <li>
    Neck position is highly individual - some prefer a neutral neck position (i.e. keeping the chin tucked throughout the lift) while others do well with looking slightly up. Here’s some factors to consider:
    <ul>
      <li>If you’re someone who is more globally extended (i.e. athletic background), then you will likely be able to keep a neutral position more effectively by packing the chin.</li>
      <li>On the opposite end of the spectrum, if you tend to be more flexion dominant (especially in your thoracic spine - upper back) then it would behoove you to look up slightly as this will drive more extension.</li>
      <li>Experiment with each and see which one works best for your individual anatomy and biomechanics.</li>
    </ul>
  </li>
  <li>Do not worry about retracting your shoulder blades, this is unnecessary and doesn’t carry over to your deadlift.</li>
  <li>Make sure you wrap your thumbs around the bar and don’t utilize a false grip. Squeeze the bar as tight as possible like you’re trying to leave an imprint of your fingerprints on the bar.</li>
  <li>When you hip hinge, you should naturally notice a weight shift to your heels. However, don’t shift your weight so aggressively that your heels come up.</li>
</ol>
',
            ],
            // Hip Flexors
            [
                'name' => 'Kneeling Posterior Hip Capsule Mobilization',
                'target_muscle_group' => 'Hip Flexors',
                'excercise_type' => 'Warmup',
                'equipment_required' => 'Bodyweight',
                'mechanics' => 'Compound',
                'force_type' => 'Dynamic Stretching',
                'experience_level' => 'Advanced',
                'video_url' => 'https://www.youtube.com/watch?v=3VbcdlWbfGA',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Kneeling Posterior Hip Capsule Mobilization Overview</h2>
<p>The kneeling posterior hip capsule mobilization drill is a form of active stretching and an exercise used to warm up the muscles of the hip flexors. Hip flexors are often tight, especially among those who work desk jobs, so it is important to warm them up prior to performing heavy lower body movements that require mobility of the hips.</p>

<h2>Kneeling Posterior Hip Capsule Mobilization Instructions</h2>
<ol>
  <li>In a quadruped position, straighten one leg and shift your weight to the other knee in flexion.</li>
  <li>Externally rotate the hip by turning your shin inward.</li>
  <li>Oscillate in small circles to determine areas of restriction and continue to breathe normally.</li>
  <li>Repeat for the assigned time or number of repetitions on both sides.</li>
</ol>

<h2>Kneeling Posterior Hip Capsule Mobilization Tips</h2>
<ol>
  <li>Depending upon the bony anatomy of your hips, you may need to keep your shin pointing directly down.</li>
  <li>You should feel a large stretch at the top of your glute. If you can’t seem to “find” the stretch in your glutes, experiment with altering foot position and weight shift into the hip.</li>
</ol>
',
            ],
            // IT Band
            [
                'name' => 'IT Band Foam Rolling',
                'target_muscle_group' => 'IT Band',
                'excercise_type' => 'SMR',
                'equipment_required' => 'Foam Roll',
                'mechanics' => 'Isolation',
                'force_type' => 'Compression',
                'experience_level' => 'Beginner',
                'video_url' => 'https://www.youtube.com/watch?v=MmeTBH7AScQ',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>IT Band Foam Rolling Overview</h2>
<p>Foam rolling your IT band is a great way to warm up and cool down for your workout, especially if you plan to perform lower body exercises that require the IT band to be more mobile. When you foam roll the IT band, or any muscle group for that matter, you alleviate some of the tension that is built up during the day and your workouts.</p>

<h2>IT Band Foam Rolling Instructions</h2>
<ol>
  <li>In a side lying position, place the foam roller directly underneath your thigh between your knee and hip.</li>
  <li>Support your upper body using your forearm and free hand. Cross your top leg in front of the down leg and adjust pressure into the roller with your free hand and foot.</li>
  <li>Slowly roll up and down the length of the thigh for 20-30 seconds.</li>
  <li>Repeat on the other side.</li>
</ol>

<h2>IT Band Foam Rolling Tips</h2>
<ol>
  <li>The most important thing you can remember with any soft tissue work: KEEP BREATHING. Don’t hold your breath, you want to release tension, not generate it.</li>
  <li>If you find a tender spot, pause for 5-6 seconds and focus on slow, deep breaths and try to relax.</li>
  <li>Foam rolling may be uncomfortable but that’s not an excuse to avoid it. It hurts because there may be physiological or neurological influences generating a pain response. The more you roll the better it’ll feel provided there’s no serious underlying mechanism.</li>
  <li>Don’t slump into the shoulder capsule, maintain an active upper body.</li>
  <li>If you notice any burning, numbness, or tingling, keep moving past that area. It’s likely a nerve and pausing on it for any length of time would not be a good idea.</li>
  <li>In order to shift more pressure into the bottom leg, stack the legs and utilize the weight of your body.</li>
</ol>
',
            ],
            [
                'name' => 'Gittleson Shrug',
                'target_muscle_group' => 'Traps',
                'excercise_type' => 'Strength',
                'equipment_required' => 'Dumbbell',
                'mechanics' => 'Isolation',
                'force_type' => 'Pull (Unilateral)',
                'experience_level' => 'Advanced',
                'video_url' => 'https://www.youtube.com/watch?v=VoOoTtK5190',
                'copyright' => 'Muscle & Strength LLC',
                'description' => '<h2>Gittleson Shrug Overview</h2>
<p>The Gittleson shrug is an advanced variation of the dumbbell shrug used to build bigger trapezius muscles. The Gittleson shrug emphasizes the contraction of the upper trapezius muscle by isolating the muscle and working them unilaterally. You also get a slightly greater range of motion by performing the Gittleson shrug since you do bring your ear to both shoulders as you perform the exercise.</p>

<h2>Gittleson Shrug Instructions</h2>
<ol>
  <li>Assume a seated position on a flat bench with the a dumbbell at your sides.</li>
  <li>Hinge forward, inhale, and grab the dumbbell with a neutral grip.</li>
  <li>Sit up tall and ensure your spine remains neutral.</li>
  <li>Place your free hand behind on base of the bench and tilt your head towards the supporting arm.</li>
  <li>Contract the trap to elevate the shoulder of the arm holding the dumbbell. As you squeeze the trap, tilt the head to the same side to enhance the contraction.</li>
  <li>Repeat for the desired number of repetitions.</li>
</ol>

<h2>Gittleson Shrug Tips</h2>
<ol>
  <li>The traps tend to respond well to high reps and explosive movements (e.g. snatch grip high pulls) so program your accessory work accordingly.</li>
  <li>Limit momentum and excessive jerking or bouncing of the weight. No one cares about how much you shrug.</li>
  <li>Don’t allow the head to jut forward excessively as you squeeze the traps, this can put the neck in a compromised position and result in an injury.</li>
  <li>Adding a pause at the top of the movement can help to enhance the mind muscle connection.</li>
</ol>
',
            ],
        ];

        foreach ($workouts as $workout) {
            Workout::create($workout);
        }
    }
}
