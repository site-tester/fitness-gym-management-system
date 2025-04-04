<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;

class GymWorkoutNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [WebPushChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification for web push.
     *
     * @return array<string, mixed>
     */
    public function toWebPush($notifiable, $notification)
    {
        // return (new WebPushMessage)
        //     ->title('AJ Dia Reminder')
        //     ->body('Time for your scheduled workout!')
        //     ->action('Visit Website', 'https://ajdiafitnessgym.com')
        //     ->icon('{{ asset("public/img/Logo.jpg") }}');

        $userName = $notifiable->name ?? 'Fitness Champion'; // Fallback if name is not available

        return (new WebPushMessage)
            ->title("Hey {$userName}, Let's Get Moving!")
            ->body("You haven't crushed your workout today! Don't let your progress slip. 💪")
            ->action('Start Workout Now!', 'https://ajdiafitnessgym.com') // Direct to workouts page
            ->icon(asset('{{ asset("public/img/Logo.jpg") }}')) // Assuming your logo is in public/img/Logo.jpg
            ->badge(asset('{{ asset("public/img/Logo.jpg") }}')); // Optional: Add a badge for visual appeal

    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
