<?php

namespace App\Console\Commands;

use App\Models\Attendance;
use App\Models\MembershipDetail;
use App\Models\User;
use App\Notifications\GymWorkoutNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendWorkoutReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gym:send-workout-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends workout reminders to clients who haven\'t attended the gym today.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $now = Carbon::now();
        $gymStartTime = Carbon::today()->setHour(10)->setMinute(0)->setSecond(0); // 10:00 AM today

        // Get all active gym clients
        $clients = MembershipDetail::get(); // Adjust the condition as needed

        foreach ($clients as $client) {
            // Check if the client has attended the gym today
            $attendedToday = Attendance::where('client_rfid_id', $client->rfid_number)
                ->whereDate('time_in', $now->toDateString())
                ->exists();

            // Send reminder if not attended and it's past the gym start time
            if (!$attendedToday && $now->greaterThanOrEqualTo($gymStartTime)) {
                try {
                    $user = User::find($clients->client_id);
                    \Log::info('Sending workout reminder email to user: ' . $user->email);
                    if ($user) {
                        Mail::send('emails.workout_reminder', ['user' => $user], function ($message) use ($user) {
                            $message->to($user->email)->subject('It\'s Time to Workout!');
                        });
                    }
                    $this->info("Reminder sent to {$client->name} ({$client->email})");


                    // Send a web push notification
                    \Log::info('Sending workout reminder notification to user: ' . $user->email);
                    $user->notify(new GymWorkoutNotification());
                    $this->info("Web push notification sent to {$client->name} ({$client->email})");

                    
                } catch (\Exception $e) {
                    $this->error("Failed to send reminder to {$client->name} ({$client->email}): {$e->getMessage()}");
                    // Optionally log the error in more detail
                    \Log::error("Workout reminder failed for user {$client->id}: {$e->getMessage()}");
                }
            }
        }

        $this->info('Workout reminder process completed.');
        return Command::SUCCESS;
    }
}
