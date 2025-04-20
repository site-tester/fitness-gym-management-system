<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use App\Models\User;
use App\Notifications\GymUpcommingBookingNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendWorkoutScheduledReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gym:send-workout-scheduled-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends workout reminders to clients who have upcoming scheduled booking.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tomorrow = Carbon::tomorrow()->toDateString();

        // Get all reservations scheduled for tomorrow
        $reservationsForTomorrow = Reservation::whereDate('reservation_date', $tomorrow)->get();

        $this->info('Checking reservations for tomorrow (' . $tomorrow . '): ' . $reservationsForTomorrow->count() . ' found.');

        foreach ($reservationsForTomorrow as $reservation) {
            // Check if the user exists
            $user = User::find($reservation->user_id);
            if ($reservation) {
                try {
                    $user->notify(new GymUpcommingBookingNotification($reservation));
                    $this->info("Reminder sent to {$reservation->user->name} (for booking on {$reservation->reservation_date})");
                } catch (\Exception $e) {
                    $this->error("Failed to send reminder to {$reservation->user->name} (for booking on {$reservation->reservation_date}): {$e->getMessage()}");
                    \Log::error("Scheduled reminder failed for reservation {$reservation->id} (user {$reservation->user->id}): {$e->getMessage()}");
                }
            } else {
                $this->warn("User not found for reservation ID: {$reservation->id}");
            }
        }

        $this->info('Scheduled workout reminders process completed.');
        return Command::SUCCESS;
    }


}
