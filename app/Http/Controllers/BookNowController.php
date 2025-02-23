<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookNowController extends Controller
{
    //
    public function getServicesByCategory($categoryId)
    {
        $services = Service::where('category_id', $categoryId)->get();
        return response()->json($services);
    }

    public function getServiceDetails($serviceId)
    {
        $service = Service::with('amenities')->find($serviceId);

        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        $trainer = User::find($service->trainer_id);

        return response()->json([
            'name' => $service->name,
            'price' => $service->price,
            'trainer' => $trainer ? $trainer->name : 'No trainer assigned',
            'amenities' => $service->amenities,
        ]);
    }

    public function showReceipt($id)
    {
        $payment = Payment::where('user_id', Auth::id())
            ->where('reservation_id', $id)
            ->first();
        $reservation = Reservation::find($id);
        if (!$payment) {
            return response()->json(['error' => 'Payment record not found'], 404);
        }

        return response()->json([
            // Payment Details
            'invoice_id' => $payment->id,
            'booking_id' => $id,
            'payment_method' => $payment->paymentMethod->name,
            'amount' => $payment->amount,
            'status' => $payment->payment_status,
            'transaction_id' => $payment->transaction_id ?? '-',
            'payment_date' => $payment->payment_date ?? '-',
            'created_at' => $payment->created_at->format('M/d/Y'),

            // Reservation Details
            'name' => $reservation->name,
            'email' => $reservation->email,
            'phone' => $reservation->phone,
            'service_name' => $reservation->service_name,
            'service_duration' => $reservation->service_duration,
            'service_price' => $reservation->total_amount,

        ]);
    }
}
