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
        // $equipment = [
        //     [
        //         'equipment_name' => 'Treadmill',
        //         'image' => 'threadmill.jpg',
        //         'quantity' => 3,
        //         'steps' => json_encode([
        //             "Step onto the treadmill and clip the safety key to your clothing.",
        //             "Start by pressing the 'Start' button.",
        //             "Adjust the speed and incline to your desired level using the console buttons.",
        //             "Begin walking or running, maintaining a steady pace.",
        //             "Monitor your heart rate and time using the console display.",
        //             "When finished, gradually reduce the speed and incline.",
        //             "Press the 'Stop' button and wait for the treadmill to come to a complete halt.",
        //             "Step off the treadmill and remove the safety key."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'STABILITY Ball',
        //         'image' => 'STABILITY BALL.jpg',
        //         'quantity' => 2,
        //         'steps' => json_encode([
        //             "Sit on the stability ball with feet flat on the floor.",
        //             "Engage your core to maintain balance.",
        //             "Perform exercises like ball crunches, back extensions, or wall squats.",
        //             "Focus on controlled movements and proper form.",
        //             "Disembark carefully, maintaining balance."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'bench',
        //         'image' => 'bench.jpg',
        //         'quantity' => 2,
        //         'steps' => json_encode([
        //             "Position yourself on the bench according to the exercise.",
        //             "Use the bench for exercises like bench press, dumbbell rows, or step-ups.",
        //             "Maintain proper body alignment and control.",
        //             "Use proper form to prevent injury.",
        //             "Safely exit the bench when finished."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'STATIONARY BIKE',
        //         'image' => 'STATIONARY BIKE.jpg',
        //         'quantity' => 2,
        //         'steps' => json_encode([
        //             "Adjust the seat height for comfortable leg extension.",
        //             "Adjust resistance to your desired level.",
        //             "Begin pedaling at a comfortable pace.",
        //             "Monitor your heart rate and time using the console.",
        //             "Gradually reduce resistance and speed before stopping."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'Chest Press Machine',
        //         'image' => 'CHEST PRESS MACHINE.jpg',
        //         'quantity' => 3,
        //         'steps' => json_encode([
        //             "Adjust the seat and handles for proper alignment.",
        //             "Grip the handles with hands shoulder-width apart.",
        //             "Push the handles away from your chest, extending your arms.",
        //             "Slowly return the handles to the starting position.",
        //             "Adjust the weight as needed."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'Dumbell',
        //         'image' => 'dumbell.jpg',
        //         'quantity' => '1 Set (5-50 lbs, 5-100 lbs)',
        //         'steps' => json_encode([
        //             "Select appropriate weight dumbbells.",
        //             "Use dumbbells for exercises like curls, presses, or rows.",
        //             "Maintain proper form and control throughout the exercise.",
        //             "Avoid swinging or using momentum.",
        //             "Return the dumbbells to the rack safely."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'Plate',
        //         'image' => 'plates.jpg',
        //         'steps' => json_encode([
        //             "Select the desired weight plates.",
        //             "Load the plates onto barbells or machines securely.",
        //             "Use plates for exercises like plate raises or weighted crunches.",
        //             "Maintain proper grip and control.",
        //             "Remove plates and return them to the rack after use."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'Ellipticals',
        //         'image' => 'ELLIPTICALS.jpg',
        //         'quantity' => 1,
        //         'steps' => json_encode([
        //             "Step onto the elliptical and grip the handles.",
        //             "Adjust the resistance and incline to your desired level.",
        //             "Begin moving your legs in a smooth, elliptical motion.",
        //             "Maintain a steady pace and monitor your heart rate.",
        //             "Gradually reduce resistance and pace before stopping.",
        //             "Step off the elliptical carefully."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'AB ROLLER',
        //         'image' => 'AB ROLLER.jpg',
        //         'quantity' => 2,
        //         'steps' => json_encode([
        //             "Kneel on the floor and grip the handles of the ab roller.",
        //             "Slowly roll the roller forward, extending your body.",
        //             "Engage your core to maintain control.",
        //             "Roll back to the starting position.",
        //             "Start with short rolls and gradually increase the range of motion.",
        //             "Discontinue use if you feel pain."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'ABDOMINAL BENCH',
        //         'image' => 'ABDOMINAL BENCH.jpg',
        //         'quantity' => 1,
        //         'steps' => json_encode([
        //             "Adjust the bench to your desired incline.",
        //             "Lie on the bench with your feet secured.",
        //             "Perform exercises like crunches or sit-ups.",
        //             "Maintain proper form and control.",
        //             "Avoid using momentum.",
        //             "Safely dismount the bench."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'ADJUSTABLE BENCH',
        //         'image' => 'ADJUSTABLE BENCH.jpg',
        //         'quantity' => 1,
        //         'steps' => json_encode([
        //             "Adjust the bench to the desired angle.",
        //             "Use the bench for exercises like incline press, decline press, or seated dumbbell curls.",
        //             "Maintain proper body alignment and control.",
        //             "Use proper form to prevent injury.",
        //             "Safely exit the bench when finished."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'BARBELL',
        //         'image' => 'barbell.jpg',
        //         'quantity' => '1 Set',
        //         'steps' => json_encode([
        //             "Select the appropriate weight and secure plates with collars.",
        //             "Position yourself with feet shoulder-width apart.",
        //             "Grip the barbell with hands slightly wider than shoulder-width.",
        //             "Perform exercises like squats, bench press, or deadlifts with proper form.",
        //             "Return the barbell to the rack safely."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'CHEST FLY MACHINE',
        //         'image' => 'CHEST FLY MACHINE.jpg',
        //         'quantity' => 1,
        //         'steps' => json_encode([
        //             "Adjust the seat and handles for proper alignment.",
        //             "Grip the handles with hands slightly bent.",
        //             "Bring the handles together in front of your chest.",
        //             "Slowly return the handles to the starting position.",
        //             "Adjust the weight as needed."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'INCLINE BENCH PRESS',
        //         'image' => 'INCLINE BENCH PRESS.jpg',
        //         'quantity' => 1,
        //         'steps' => json_encode([
        //             "Adjust the bench to the incline position.",
        //             "Lie on the bench with your feet flat on the floor.",
        //             "Grip the barbell slightly wider than shoulder-width.",
        //             "Lower the barbell to your upper chest.",
        //             "Push the barbell back up to the starting position.",
        //             "Use a spotter if lifting heavy weights."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'KETTLEBELLS',
        //         'image' => 'kettlebell.jpg',
        //         'steps' => json_encode([
        //             "Select an appropriate weight kettlebell.",
        //             "Use kettlebells for exercises like swings, goblet squats, or Turkish get-ups.",
        //             "Maintain proper form and control throughout the exercise.",
        //             "Engage your core and avoid swinging with your arms.",
        //             "Return the kettlebell to the floor safely."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'LAT PULLDOWN MACHINE',
        //         'image' => 'LAT PULLDOWN MACHINE.jpg',
        //         'quantity' => 2,
        //         'steps' => json_encode([
        //             "Adjust the seat and thigh pad for proper alignment.",
        //             "Grip the bar with hands wider than shoulder-width.",
        //             "Pull the bar down towards your upper chest.",
        //             "Slowly return the bar to the starting position.",
        //             "Maintain proper posture and control."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'LEG ABDUCTION MACHINE',
        //         'image' => 'LEG ABDUCTION MACHINE.jpg',
        //         'steps' => json_encode([
        //             "Adjust the pads to fit your outer thighs.",
        //             "Sit with your back against the pad.",
        //             "Push your legs outward, away from each other.",
        //             "Slowly return your legs to the starting position.",
        //             "Adjust the weight as needed."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'LEG EXTENSION MACHINE',
        //         'image' => 'LEG EXTENSION MACHINE AND LEG CURL.jpg',
        //         'steps' => json_encode([
        //             "Adjust the seat and leg pad for proper alignment.",
        //             "Sit with your back against the pad.",
        //             "Extend your legs forward, straightening your knees.",
        //             "Slowly return your legs to the starting position.",
        //             "Adjust the weight as needed."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'LEG PRESS MACHINE',
        //         'image' => 'LEG PRESS MACHINE.jpg',
        //         'steps' => json_encode([
        //             "Adjust the seat and foot platform for proper alignment.",
        //             "Position your feet shoulder-width apart on the platform.",
        //             "Release the safety handles and push the platform away.",
        //             "Lower the platform towards your chest.",
        //             "Push the platform back up to the starting position.",
        //             "Engage the safety handles when finished."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'ROWING MACHINE',
        //         'image' => 'ROWING MACHINE.jpg',
        //         'steps' => json_encode([
        //             "Adjust the foot straps and seat for proper alignment.",
        //             "Grip the handle and push with your legs.",
        //             "Pull the handle towards your chest, engaging your back and arms.",
        //             "Return to the starting position in a controlled manner.",
        //             "Maintain proper posture and control."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'SHOULDER PRESS MACHINE',
        //         'image' => 'SHOULDER PRESS MACHINE.jpg',
        //         'steps' => json_encode([
        //             "Adjust the seat and handles for proper alignment.",
        //             "Grip the handles with hands shoulder-width apart.",
        //             "Push the handles upward, extending your arms.",
        //             "Slowly return the handles to the starting position.",
        //             "Adjust the weight as needed."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'SMITH MACHINE',
        //         'image' => 'SMITH MACHINE.jpg',
        //         'steps' => json_encode([
        //             "Adjust the bar to the desired height.",
        //             "Position yourself under the bar with feet shoulder-width apart.",
        //             "Grip the bar and release the safety catches.",
        //             "Perform exercises like squats, bench press, or shoulder press.",
        //             "Engage the safety catches when finished."
        //         ]),
        //     ],
        //     [
        //         'equipment_name' => 'TRICEPS PRESS MACHINE',
        //         'image' => 'TRICEPS PRESS MACHINE.jpg',
        //         'steps' => json_encode([
        //             "Adjust the seat and handles for proper alignment.",
        //             "Grip the handles with hands shoulder-width apart.",
        //             "Push the handles downward, extending your arms.",
        //             "Slowly return the handles to the starting position.",
        //             "Adjust the weight as needed."
        //         ]),
        //     ],
        // ];

        $equipment = [
            [
                'equipment_name' => 'Treadmill',
                'image' => 'threadmill.jpg',
                'quantity' => 3,
                'description' => 'A treadmill is a versatile cardio machine that allows you to walk, jog, or run indoors. It features adjustable speed and incline settings to customize your workout intensity. Regular use improves cardiovascular health, burns calories, and strengthens leg muscles.',
                'steps' => json_encode([
                    "Step onto the treadmill and clip the safety key to your clothing.",
                    "Start by pressing the 'Start' button.",
                    "Adjust the speed and incline to your desired level using the console buttons.",
                    "Begin walking or running, maintaining a steady pace.",
                    "Monitor your heart rate and time using the console display.",
                    "When finished, gradually reduce the speed and incline.",
                    "Press the 'Stop' button and wait for the treadmill to come to a complete halt.",
                    "Step off the treadmill and remove the safety key."
                ]),
            ],
            [
                'equipment_name' => 'Stability Ball',
                'image' => 'STABILITY BALL.jpg',
                'quantity' => 2,
                'description' => 'A stability ball (also known as an exercise ball or Swiss ball) is an inflatable ball used for a variety of exercises. It helps improve balance, core strength, and flexibility by requiring you to engage stabilizing muscles during movements. It can be used for exercises targeting the abs, back, legs, and more.',
                'steps' => json_encode([
                    "Sit on the stability ball with feet flat on the floor.",
                    "Engage your core to maintain balance.",
                    "Perform exercises like ball crunches, back extensions, or wall squats.",
                    "Focus on controlled movements and proper form.",
                    "Disembark carefully, maintaining balance."
                ]),
            ],
            [
                'equipment_name' => 'Bench',
                'image' => 'bench.jpg',
                'quantity' => 2,
                'description' => 'A weightlifting bench is a fundamental piece of equipment for various strength training exercises. It provides a stable platform for exercises like bench presses (flat, incline, decline), dumbbell rows, step-ups, and more. Different types of benches cater to different exercises and angles.',
                'steps' => json_encode([
                    "Position yourself on the bench according to the exercise.",
                    "Use the bench for exercises like bench press, dumbbell rows, or step-ups.",
                    "Maintain proper body alignment and control.",
                    "Use proper form to prevent injury.",
                    "Safely exit the bench when finished."
                ]),
            ],
            [
                'equipment_name' => 'Stationary Bike',
                'image' => 'STATIONARY BIKE.jpg',
                'quantity' => 2,
                'description' => 'A stationary bike is a low-impact cardio machine that simulates outdoor cycling. It offers adjustable resistance levels to vary workout intensity. Regular use improves cardiovascular fitness, strengthens leg muscles, and burns calories without putting excessive stress on joints.',
                'steps' => json_encode([
                    "Adjust the seat height for comfortable leg extension.",
                    "Adjust resistance to your desired level.",
                    "Begin pedaling at a comfortable pace.",
                    "Monitor your heart rate and time using the console.",
                    "Gradually reduce resistance and speed before stopping."
                ]),
            ],
            [
                'equipment_name' => 'Chest Press Machine',
                'image' => 'CHEST PRESS MACHINE.jpg',
                'quantity' => 3,
                'description' => 'The chest press machine is designed to target the chest muscles (pectorals), as well as the shoulders (anterior deltoids) and triceps. It provides a controlled and guided movement, making it suitable for beginners and experienced lifters alike. Adjusting the weight allows for progressive overload to build strength.',
                'steps' => json_encode([
                    "Adjust the seat and handles for proper alignment.",
                    "Grip the handles with hands shoulder-width apart.",
                    "Push the handles away from your chest, extending your arms.",
                    "Slowly return the handles to the starting position.",
                    "Adjust the weight as needed."
                ]),
            ],
            [
                'equipment_name' => 'Dumbbell',
                'image' => 'dumbell.jpg',
                'quantity' => '1 Set (5-50 lbs, 5-100 lbs)',
                'description' => 'Dumbbells are versatile free weights used for a wide range of strength training exercises. They allow for unilateral (one-sided) training, which can help improve balance and coordination. Our set includes various weights to accommodate different exercises and fitness levels, targeting all major muscle groups.',
                'steps' => json_encode([
                    "Select appropriate weight dumbbells.",
                    "Use dumbbells for exercises like curls, presses, or rows.",
                    "Maintain proper form and control throughout the exercise.",
                    "Avoid swinging or using momentum.",
                    "Return the dumbbells to the rack safely."
                ]),
            ],
            [
                'equipment_name' => 'Plate',
                'image' => 'plates.jpg',
                'steps' => json_encode([
                    "Select the desired weight plates.",
                    "Load the plates onto barbells or machines securely.",
                    "Use plates for exercises like plate raises or weighted crunches.",
                    "Maintain proper grip and control.",
                    "Remove plates and return them to the rack after use."
                ]),
                'quantity' => 'Various Weights Available',
                'description' => 'Weight plates are flat, circular weights used to load barbells, dumbbells, and weight machines. They come in various weights, allowing you to incrementally increase the resistance for progressive strength training. Proper loading and securing of plates are crucial for safety.',
            ],
            [
                'equipment_name' => 'Elliptical',
                'image' => 'ELLIPTICALS.jpg',
                'quantity' => 1,
                'description' => 'An elliptical trainer is a low-impact cardio machine that provides a full-body workout by engaging both the upper and lower body. It simulates running without the impact on joints, making it a great option for individuals with joint issues. Adjustable resistance and incline levels allow for varied workout intensity.',
                'steps' => json_encode([
                    "Step onto the elliptical and grip the handles.",
                    "Adjust the resistance and incline to your desired level.",
                    "Begin moving your legs in a smooth, elliptical motion.",
                    "Maintain a steady pace and monitor your heart rate.",
                    "Gradually reduce resistance and pace before stopping.",
                    "Step off the elliptical carefully."
                ]),
            ],
            [
                'equipment_name' => 'Ab Roller',
                'image' => 'AB ROLLER.jpg',
                'quantity' => 2,
                'description' => 'The ab roller is a compact and effective tool for strengthening the core muscles, particularly the abdominals. It engages multiple muscle groups, including the abs, obliques, and lower back. Proper form is essential to maximize effectiveness and prevent injury.',
                'steps' => json_encode([
                    "Kneel on the floor and grip the handles of the ab roller.",
                    "Slowly roll the roller forward, extending your body.",
                    "Engage your core to maintain control.",
                    "Roll back to the starting position.",
                    "Start with short rolls and gradually increase the range of motion.",
                    "Discontinue use if you feel pain."
                ]),
            ],
            [
                'equipment_name' => 'Abdominal Bench',
                'image' => 'ABDOMINAL BENCH.jpg',
                'quantity' => 1,
                'description' => 'An abdominal bench is designed to isolate and strengthen the abdominal muscles. The adjustable incline allows for varying levels of difficulty for exercises like crunches, sit-ups, and leg raises. Securing your feet properly is important for stability during workouts.',
                'steps' => json_encode([
                    "Adjust the bench to your desired incline.",
                    "Lie on the bench with your feet secured.",
                    "Perform exercises like crunches or sit-ups.",
                    "Maintain proper form and control.",
                    "Avoid using momentum.",
                    "Safely dismount the bench."
                ]),
            ],
            [
                'equipment_name' => 'Adjustable Bench',
                'image' => 'ADJUSTABLE BENCH.jpg',
                'quantity' => 1,
                'description' => 'An adjustable weightlifting bench offers versatility for a wide range of exercises targeting different muscle groups. It can be set to various incline and decline angles, allowing for exercises like incline and decline bench presses, shoulder presses, and dumbbell curls. Its adjustability makes it a valuable piece for a comprehensive strength training routine.',
                'steps' => json_encode([
                    "Adjust the bench to the desired angle.",
                    "Use the bench for exercises like incline press, decline press, or seated dumbbell curls.",
                    "Maintain proper body alignment and control.",
                    "Use proper form to prevent injury.",
                    "Safely exit the bench when finished."
                ]),
            ],
            [
                'equipment_name' => 'Barbell',
                'image' => 'barbell.jpg',
                'quantity' => '1 Set',
                'description' => 'A barbell is a long metal bar to which weight plates are attached on either end. It is a fundamental piece of equipment for compound exercises that work multiple muscle groups simultaneously, such as squats, bench presses, deadlifts, and overhead presses. Using a barbell allows for lifting heavier weights and building significant strength.',
                'steps' => json_encode([
                    "Select the appropriate weight and secure plates with collars.",
                    "Position yourself with feet shoulder-width apart.",
                    "Grip the barbell with hands slightly wider than shoulder-width.",
                    "Perform exercises like squats, bench press, or deadlifts with proper form.",
                    "Return the barbell to the rack safely."
                ]),
            ],
            [
                'equipment_name' => 'Chest Fly Machine',
                'image' => 'CHEST FLY MACHINE.jpg',
                'quantity' => 1,
                'description' => 'The chest fly machine isolates the pectoral muscles, helping to improve chest definition and strength. It provides a controlled range of motion, allowing you to focus on squeezing the chest muscles during the contraction phase. Adjusting the weight allows for progressive overload.',
                'steps' => json_encode([
                    "Adjust the seat and handles for proper alignment.",
                    "Grip the handles with hands slightly bent.",
                    "Bring the handles together in front of your chest.",
                    "Slowly return the handles to the starting position.",
                    "Adjust the weight as needed."
                ]),
            ],
            [
                'equipment_name' => 'Incline Bench Press',
                'image' => 'INCLINE BENCH PRESS.jpg',
                'quantity' => 1,
                'description' => 'The incline bench press targets the upper portion of the pectoral muscles, as well as the shoulders and triceps. The incline angle emphasizes the upper chest development. Proper form and control are crucial for effective and safe execution of this exercise. Using a spotter is recommended for heavier lifts.',
                'steps' => json_encode([
                    "Adjust the bench to the incline position.",
                    "Lie on the bench with your feet flat on the floor.",
                    "Grip the barbell slightly wider than shoulder-width.",
                    "Lower the barbell to your upper chest.",
                    "Push the barbell back up to the starting position.",
                    "Use a spotter if lifting heavy weights."
                ]),
            ],
            [
                'equipment_name' => 'Kettlebells',
                'image' => 'kettlebell.jpg',
                'steps' => json_encode([
                    "Select an appropriate weight kettlebell.",
                    "Use kettlebells for exercises like swings, goblet squats, or Turkish get-ups.",
                    "Maintain proper form and control throughout the exercise.",
                    "Engage your core and avoid swinging with your arms.",
                    "Return the kettlebell to the floor safely."
                ]),
                'description' => 'Kettlebells are cast iron weights with a handle, offering a unique way to train strength, endurance, and power. Their offset center of gravity engages stabilizing muscles more than traditional dumbbells. Exercises like swings, snatches, and get-ups provide a full-body workout.',
            ],
            [
                'equipment_name' => 'Lat Pulldown Machine',
                'image' => 'LAT PULLDOWN MACHINE.jpg',
                'quantity' => 2,
                'description' => 'The lat pulldown machine is designed to strengthen the latissimus dorsi (lats), the large muscles in your back. It also works the biceps and other back muscles. By pulling the bar down towards your chest, you simulate a pulling motion, which is essential for upper body strength and posture.',
                'steps' => json_encode([
                    "Adjust the seat and thigh pad for proper alignment.",
                    "Grip the bar with hands wider than shoulder-width.",
                    "Pull the bar down towards your upper chest.",
                    "Slowly return the bar to the starting position.",
                    "Maintain proper posture and control."
                ]),
            ],
            [
                'equipment_name' => 'Leg Abduction Machine',
                'image' => 'LEG ABDUCTION MACHINE.jpg',
                'steps' => json_encode([
                    "Adjust the pads to fit your outer thighs.",
                    "Sit with your back against the pad.",
                    "Push your legs outward, away from each other.",
                    "Slowly return your legs to the starting position.",
                    "Adjust the weight as needed."
                ]),
                'description' => 'The leg abduction machine targets the outer thigh muscles (abductors), which are important for hip stability and overall leg strength. It involves moving your legs away from the midline of your body against resistance. Adjusting the weight allows for progressive strengthening.',
            ],
            [
                'equipment_name' => 'Leg Extension Machine',
                'image' => 'LEG EXTENSION MACHINE AND LEG CURL.jpg',
                'steps' => json_encode([
                    "Adjust the seat and leg pad for proper alignment.",
                    "Sit with your back against the pad.",
                    "Extend your legs forward, straightening your knees.",
                    "Slowly return your legs to the starting position.",
                    "Adjust the weight as needed."
                ]),
                'description' => 'The leg extension machine isolates the quadriceps muscles, the muscles on the front of your thighs. It involves extending your lower legs against resistance. Proper adjustment of the machine is crucial to ensure the knee joint is properly aligned with the machine\'s pivot point.',
            ],
            [
                'equipment_name' => 'Leg Press Machine',
                'image' => 'LEG PRESS MACHINE.jpg',
                'steps' => json_encode([
                    "Adjust the seat and foot platform for proper alignment.",
                    "Position your feet shoulder-width apart on the platform.",
                    "Release the safety handles and push the platform away.",
                    "Lower the platform towards your chest.",
                    "Push the platform back up to the starting position.",
                    "Engage the safety handles when finished."
                ]),
                'description' => 'The leg press machine is a compound exercise that works the major muscles of the lower body, including the quadriceps, hamstrings, and glutes. It allows you to lift heavier weights in a controlled and supported manner. Proper foot placement on the platform can emphasize different muscle groups.',
            ],
            [
                'equipment_name' => 'Rowing Machine',
                'image' => 'ROWING MACHINE.jpg',
                'steps' => json_encode([
                    "Adjust the foot straps and seat for proper alignment.",
                    "Grip the handle and push with your legs.",
                    "Pull the handle towards your chest, engaging your back and arms.",
                    "Return to the starting position in a controlled manner.",
                    "Maintain proper posture and control."
                ]),
                'description' => 'The rowing machine provides a full-body, low-impact cardio workout. It engages the legs, core, back, and arms in a coordinated movement. Regular use improves cardiovascular health, builds endurance, and strengthens multiple muscle groups simultaneously. Proper technique is essential for maximizing its benefits and preventing injury.',
            ],
            [
                'equipment_name' => 'Shoulder Press Machine',
                'image' => 'SHOULDER PRESS MACHINE.jpg',
                'steps' => json_encode([
                    "Adjust the seat and handles for proper alignment.",
                    "Grip the handles with hands shoulder-width apart.",
                    "Push the handles upward, extending your arms.",
                    "Slowly return the handles to the starting position.",
                    "Adjust the weight as needed."
                ]),
                'description' => 'The shoulder press machine targets the deltoid muscles (shoulders), responsible for lifting and rotating the arms. It provides a controlled movement for building shoulder strength and definition. Adjusting the seat and handle position ensures proper form and targets the muscles effectively.',
            ],
            [
                'equipment_name' => 'Smith Machine',
                'image' => 'SMITH MACHINE.jpg',
                'steps' => json_encode([
                    "Adjust the bar to the desired height.",
                    "Position yourself under the bar with feet shoulder-width apart.",
                    "Grip the bar and release the safety catches.",
                    "Perform exercises like squats, bench press, or shoulder press.",
                    "Engage the safety catches when finished."
                ]),
                'description' => 'The Smith machine features a barbell that is fixed within vertical steel rails, providing a guided and stable movement. It can be used for various exercises like squats, bench presses, and shoulder presses, offering added safety as the bar can be locked at any point. It\'s often used by beginners or those recovering from injuries.',
            ],
            [
                'equipment_name' => 'Triceps Press Machine',
                'image' => 'TRICEPS PRESS MACHINE.jpg',
                'steps' => json_encode([
                    "Adjust the seat and handles for proper alignment.",
                    "Grip the handles with hands shoulder-width apart.",
                    "Push the handles downward, extending your arms.",
                    "Slowly return the handles to the starting position.",
                    "Adjust the weight as needed."
                ]),
                'description' => 'The triceps press machine isolates the triceps muscles, located on the back of your upper arms.  It allows you to perform triceps extensions in a controlled manner.  Proper alignment and controlled movements are key to effectively targeting the triceps and avoiding strain on your elbows.',
            ],
        ];

        foreach ($equipment as $equip) {
            EquipmentInventory::create($equip);
        }
    }
}
