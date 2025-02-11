<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingPaymentDetailsWalkIn extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $paymentMethod;
    /**
     * Create a new message instance.
     */
    public function __construct($booking, $paymentMethod)
    {
        $this->booking = $booking;
        $this->paymentMethod = $paymentMethod;
    }

    public function build()
    {
        return $this->subject('Booking Payment Details')
            ->view('emails.bookingPaymentDetailsWalkIn')
            ->with([
                'booking' => $this->booking,
                'payment_method' => $this->paymentMethod,
            ]);
    }

}
