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
                'equipment_name' => 'STABILITY Ball',
                'image' => 'STABILITY BALL.jpg',
                'steps' => json_encode([
                    "Sit on the stability ball with feet flat on the floor.",
                    "Engage your core to maintain balance.",
                    "Perform exercises like ball crunches, back extensions, or wall squats.",
                    "Focus on controlled movements and proper form.",
                    "Disembark carefully, maintaining balance."
                ]),
            ],
            // [
            //     'equipment_name' => 'Barbells and Olympic Barbells',
            //     'image' => 'BARBELLS AND OLYMPIC BARBELL.jpg',
            //     'steps' => json_encode([
            //         "Select the appropriate weight and secure plates with collars.",
            //         "Position yourself with feet shoulder-width apart.",
            //         "Grip the barbell with hands slightly wider than shoulder-width.",
            //         "Perform exercises like squats, bench press, or deadlifts with proper form.",
            //         "Return the barbell to the rack safely."
            //     ]),
            // ],
            [
                'equipment_name' => 'bench',
                'image' => 'BENCH.jpg',
                'steps' => json_encode([
                    "Position yourself on the bench according to the exercise.",
                    "Use the bench for exercises like bench press, dumbbell rows, or step-ups.",
                    "Maintain proper body alignment and control.",
                    "Use proper form to prevent injury.",
                    "Safely exit the bench when finished."
                ]),
            ],
            [
                'equipment_name' => 'STATIONARY BIKE',
                'image' => 'STATIONARY BIKE.jpg',
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
                'steps' => json_encode([
                    "Adjust the seat and handles for proper alignment.",
                    "Grip the handles with hands shoulder-width apart.",
                    "Push the handles away from your chest, extending your arms.",
                    "Slowly return the handles to the starting position.",
                    "Adjust the weight as needed."
                ]),
            ],
            [
                'equipment_name' => 'Dumbell',
                'image' => 'dumbell.jpg',
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
            ],
            // [
            //     'equipment_name' => 'Roller',
            //     'image' => 'AB ROLLER.jpg',
            //     'steps' => json_encode([
            //         "Position the roller on the floor.",
            //         "Kneel or lie down, placing your hands or feet on the roller.",
            //         "Roll the roller back and forth, engaging your core.",
            //         "Maintain proper body alignment and control.",
            //         "Discontinue use if you feel pain."
            //     ]),
            // ],
            [
                'equipment_name' => 'Ellipticals',
                'image' => 'ELLIPTICALS.jpg',
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
                'equipment_name' => 'AB ROLLER',
                'image' => 'AB ROLLER.jpg',
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
                'equipment_name' => 'ABDOMINAL BENCH',
                'image' => 'ABDOMINAL BENCH.jpg',
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
                'equipment_name' => 'ADJUSTABLE BENCH',
                'image' => 'ADJUSTABLE BENCH.jpg',
                'steps' => json_encode([
                    "Adjust the bench to the desired angle.",
                    "Use the bench for exercises like incline press, decline press, or seated dumbbell curls.",
                    "Maintain proper body alignment and control.",
                    "Use proper form to prevent injury.",
                    "Safely exit the bench when finished."
                ]),
            ],
            [
                'equipment_name' => 'BARBELL',
                'image' => 'barbell.jpg',
                'steps' => json_encode([
                    "Select the appropriate weight and secure plates with collars.",
                    "Position yourself with feet shoulder-width apart.",
                    "Grip the barbell with hands slightly wider than shoulder-width.",
                    "Perform exercises like squats, bench press, or deadlifts with proper form.",
                    "Return the barbell to the rack safely."
                ]),
            ],
            [
                'equipment_name' => 'CHEST FLY MACHINE',
                'image' => 'CHEST FLY MACHINE.jpg',
                'steps' => json_encode([
                    "Adjust the seat and handles for proper alignment.",
                    "Grip the handles with hands slightly bent.",
                    "Bring the handles together in front of your chest.",
                    "Slowly return the handles to the starting position.",
                    "Adjust the weight as needed."
                ]),
            ],
            // [
            //     'equipment_name' => 'CHEST PRESS MACHINE',
            //     'image' => 'CHEST PRESS MACHINE.jpg',
            // ],
            [
                'equipment_name' => 'INCLINE BENCH PRESS',
                'image' => 'INCLINE BENCH PRESS.jpg',
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
                'equipment_name' => 'KETTLEBELLS',
                'image' => 'kettlebell.jpg',
                'steps' => json_encode([
                    "Select an appropriate weight kettlebell.",
                    "Use kettlebells for exercises like swings, goblet squats, or Turkish get-ups.",
                    "Maintain proper form and control throughout the exercise.",
                    "Engage your core and avoid swinging with your arms.",
                    "Return the kettlebell to the floor safely."
                ]),
            ],
            [
                'equipment_name' => 'LAT PULLDOWN MACHINE',
                'image' => 'LAT PULLDOWN  MACHINE.jpg',
                'steps' => json_encode([
                    "Adjust the seat and thigh pad for proper alignment.",
                    "Grip the bar with hands wider than shoulder-width.",
                    "Pull the bar down towards your upper chest.",
                    "Slowly return the bar to the starting position.",
                    "Maintain proper posture and control."
                ]),
            ],
            [
                'equipment_name' => 'LEG ABDUCTION MACHINE',
                'image' => 'LEG ABDUCTION MACHINE.jpg',
                'steps' => json_encode([
                    "Adjust the pads to fit your outer thighs.",
                    "Sit with your back against the pad.",
                    "Push your legs outward, away from each other.",
                    "Slowly return your legs to the starting position.",
                    "Adjust the weight as needed."
                ]),
            ],
            [
                'equipment_name' => 'LEG EXTENSION MACHINE',
                'image' => 'LEG EXTENSION MACHINE AND LEG CURL.jpg',
                'steps' => json_encode([
                    "Adjust the seat and leg pad for proper alignment.",
                    "Sit with your back against the pad.",
                    "Extend your legs forward, straightening your knees.",
                    "Slowly return your legs to the starting position.",
                    "Adjust the weight as needed."
                ]),
            ],
            [
                'equipment_name' => 'LEG PRESS MACHINE',
                'image' => 'LEG PRESS MACHINE.jpg',
                'steps' => json_encode([
                    "Adjust the seat and foot platform for proper alignment.",
                    "Position your feet shoulder-width apart on the platform.",
                    "Release the safety handles and push the platform away.",
                    "Lower the platform towards your chest.",
                    "Push the platform back up to the starting position.",
                    "Engage the safety handles when finished."
                ]),
            ],
            // [
            //     'equipment_name' => 'LEG RAISE TOWER',
            //     'image' => 'LEG RAISE TOWER.jpg',
            //     'steps' => json_encode([
            //         "Grip the handles and position your back against the pad.",
            //         "Lift your legs towards your chest, engaging your core.",
            //         "Slowly lower your legs to the starting position.",
            //         "Maintain control and avoid swinging.",
            //         "Discontinue if you feel pain."
            //     ]),
            // ],
            // [
            //     'equipment_name' => 'OVERHEAD CABLE MACHINE',
            //     'image' => 'OVERHEAD CABLE MACHINES.jpg',
            //     'steps' => json_encode([
            //         "Select the desired attachment and weight.",
            //         "Grip the attachment with hands shoulder-width apart.",
            //         "Pull the attachment down towards your chest or face.",
            //         "Slowly return the attachment to the starting position.",
            //         "Maintain proper posture and control."
            //     ]),
            // ],
            // [
            //     'equipment_name' => 'PRECHER CURL BENCH',
            //     'image' => 'PRECHER CURL BENCH.png',
            //     'steps' => json_encode([
            //         "Adjust the seat and arm pad for proper alignment.",
            //         "Position your upper arms on the pad and grip the bar or dumbbells.",
            //         "Curl the weight towards your shoulders.",
            //         "Slowly lower the weight to the starting position.",
            //         "Maintain proper form and control."
            //     ]),
            // ],
            // [
            //     'equipment_name' => 'PULL UP BAR',
            //     'image' => 'PULL UP BAR.png',
            //     'steps' => json_encode([
            //         "Grip the bar with hands shoulder-width apart or wider.",
            //         "Hang with your arms fully extended.",
            //         "Pull yourself up until your chin is above the bar.",
            //         "Slowly lower yourself to the starting position.",
            //         "Use assisted pull-up machines or bands if needed."
            //     ]),
            // ],
            [
                'equipment_name' => 'ROWING MACHINE',
                'image' => 'ROWING MACHINE.jpg',
                'steps' => json_encode([
                    "Adjust the foot straps and seat for proper alignment.",
                    "Grip the handle and push with your legs.",
                    "Pull the handle towards your chest, engaging your back and arms.",
                    "Return to the starting position in a controlled manner.",
                    "Maintain proper posture and control."
                ]),
            ],
            [
                'equipment_name' => 'SHOULDER PRESS MACHINE',
                'image' => 'SHOULDER PRESS MACHINE.jpg',
                'steps' => json_encode([
                    "Adjust the seat and handles for proper alignment.",
                    "Grip the handles with hands shoulder-width apart.",
                    "Push the handles upward, extending your arms.",
                    "Slowly return the handles to the starting position.",
                    "Adjust the weight as needed."
                ]),
            ],
            [
                'equipment_name' => 'SMITH MACHINE',
                'image' => 'SMITH MACHINE.jpg',
                'steps' => json_encode([
                    "Adjust the bar to the desired height.",
                    "Position yourself under the bar with feet shoulder-width apart.",
                    "Grip the bar and release the safety catches.",
                    "Perform exercises like squats, bench press, or shoulder press.",
                    "Engage the safety catches when finished."
                ]),
            ],
            // [
            //     'equipment_name' => 'STANDING CALF MACHINE',
            //     'image' => 'STANDING CALF MACHINE.png',
            //     'steps' => json_encode([
            //         "Adjust the shoulder pads for proper alignment.",
            //         "Position your feet on the platform with heels hanging off.",
            //         "Raise your heels, engaging your calf muscles.",
            //         "Slowly lower your heels to the starting position.",
            //         "Adjust the weight as needed."
            //     ]),
            // ],
            [
                'equipment_name' => 'TRICEPS PRESS MACHINE',
                'image' => 'TRICEP PRESS MACHINE.jpg',
                'steps' => json_encode([
                    "Adjust the seat and handles for proper alignment.",
                    "Grip the handles with hands shoulder-width apart.",
                    "Push the handles downward, extending your arms.",
                    "Slowly return the handles to the starting position.",
                    "Adjust the weight as needed."
                ]),
            ],


        ];

        foreach ($equipment as $equip) {
            EquipmentInventory::create($equip);
        }
    }
}
