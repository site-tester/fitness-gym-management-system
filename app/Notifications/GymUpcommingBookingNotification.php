<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;

class GymUpcommingBookingNotification extends Notification
{
    use Queueable;

    public $booking;

    /**
     * Create a new notification instance.
     */
    public function __construct($booking)
    {
        //
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [WebPushChannel::class,'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your Upcoming Workout Schedule Reminder!')
            ->view('emails.workout_schedule_reminder', ['booking' => $this->booking]);
    }

    /**
     * Get the array representation of the notification for web push.
     *
     * @return array<string, mixed>
     */
    public function toWebPush($notifiable, $notification)
    {
        $userName = $notifiable->name ?? 'Fitness Enthusiast';
        $scheduledDate = Carbon::parse($this->booking->scheduled_date)->format('F j, Y');

        $messageBody = "Your booking is scheduled for {$scheduledDate}.";
        $reminderBody = "Reminder: Your booking is tomorrow, {$scheduledDate}.";

        return (new WebPushMessage)
            ->title("Booking Reminder, {$userName}!")
            ->body($reminderBody)
            ->action('View Booking', url('/bookings'))
            ->icon(asset('{{ asset("public/img/Logo.jpg") }}'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'booking_id' => $this->booking->id ?? null,
            'scheduled_date' => $this->booking->reservation_date ?? null,
            'message' => 'Your upcoming booking is tomorrow.',
        ];
    }
}
