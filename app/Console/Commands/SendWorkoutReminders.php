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
    protected $description = 'Sends workout reminders to clients who haven\'t attended the gym at 6 AM and 6 PM.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        $reminderTimes = [
            Carbon::today()->setHour(6)->setMinute(0)->setSecond(0),   // 6:00 AM today
            Carbon::today()->setHour(18)->setMinute(0)->setSecond(0),  // 6:00 PM today
        ];

        // Check if the current time matches one of the reminder times
        foreach ($reminderTimes as $reminderTime) {
            if ($now->isSameMinute($reminderTime)) {
                $this->sendReminders();
                break; // Only send reminders once per scheduled time
            }
        }

        $this->info('Workout reminder process checked at ' . $now->toTimeString() . '.');
        return Command::SUCCESS;
    }

    protected function sendReminders()
    {
        $now = Carbon::now();

        // Get all active gym clients
        $clients = MembershipDetail::get(); // Adjust the condition as needed

        foreach ($clients as $client) {
            // Check if the client has attended the gym today
            $attendedToday = Attendance::where('client_rfid_id', $client->rfid_number)
                ->whereDate('time_in', $now->toDateString())
                ->exists();

            \Log::info('Checking attendance for client: ' . $client->client_id);
            \Log::info('Attendance status: ' . ($attendedToday ? 'Attended' : 'Not Attended'));

            // Send reminder if not attended
            if (!$attendedToday) {
                try {
                    $user = User::find($client->user->id);
                    \Log::info('Sending workout reminder email to user: ' . $user->email);
                    if ($user) {
                        Mail::send('emails.workout_reminder', ['user' => $user], function ($message) use ($user) {
                            $message->to($user->email)->subject('It\'s Time to Workout!');
                        });
                    }
                    $this->info("Reminder sent to {$user->name} ({$user->email})");


                    // Send a web push notification
                    \Log::info('Sending workout reminder notification to user: ' . $user->email);
                    $user->notify(new GymWorkoutNotification());
                    $this->info("Web push notification sent to {$user->name} ({$user->email})");


                } catch (\Exception $e) {
                    $this->error("Failed to send reminder to {$user->name} ({$user->email}): {$e->getMessage()}");
                    // Optionally log the error in more detail
                    \Log::error("Workout reminder failed for user {$user->id}: {$e->getMessage()}");
                }
            }
        }

        $this->info('Workout reminder process completed at ' . Carbon::now()->toTimeString() . '.');
    }
}
