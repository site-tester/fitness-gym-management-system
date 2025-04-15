<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use Illuminate\Support\Facades\Auth;

class PaypalController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); // Set to true for sandbox mode
    }

    public function pay(Request $request)
    {
        \Log::info($request->all());
        try {

            $reservation = new Reservation();

            $reservation->user_id = Auth::id();
            $reservation->service_duration = $request->input('service_duration');
            $reservation->service_name = $request->input('service_name');
            $reservation->reservation_date = \Carbon\Carbon::parse($request->input('selected_date'))->format('Y-m-d');
            // $reservation->reservation_time = $request->input('formTime');
            $reservation->payment_method = $request->input('payment_method');

            // You can also add hidden fields if needed
            if ($request->filled('name')) {
                $reservation->name = $request->input('name');
            } else {
                $reservation->name = $request->input('hidden_name');
            }

            if ($request->filled('email')) {
                $reservation->email = $request->input('email');
            } else {
                $reservation->email = $request->input('hidden_email');
            }

            if ($request->filled('phone')) {
                $reservation->phone = $request->input('phone');
            } else {
                $reservation->phone = $request->input('hidden_phone');
            }

            $reservation->total_amount = $request->input('service_price');; // Example, adjust based on logic

            // Save the reservation FIRST to get an ID
            $reservation->save();

            $response = $this->gateway->purchase(array(
                'amount' => $request->service_price,
                'currency' => env('PAYPAL_CURRENCY', 'PHP'),
                'returnUrl' => route('paypal.success', ['reservation_id' => $reservation->id]),  // Pass the ID here
                'cancelUrl' => route('paypal.error'),
                // 'sandbox' => true, // Set to true for sandbox mode
            ))->send();

            if ($response->isRedirect()) {

                return response()->json([
                    'redirect_url' => $response->getRedirectUrl(),
                    'reservation_id' => $reservation->id // Pass the booking ID
                ]);
            } else {
                return response()->json([
                    'error' => $response->getMessage()
                ], 400);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function success(Request $request)
    {
        \Log::info($request->all());
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            \Log::info($transaction->getData());

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                \Log::info($arr);

                $payment = new Payment();
                $payment->transaction_id = $arr['id'];
                $payment->user_id = Auth::id();
                $payment->paypal_user_id = $arr['payer']['payer_info']['payer_id'];
                //  IMPORTANT:  Get reservation_id from the request
                $payment->reservation_id = $request->input('reservation_id');
                $payment->payment_method = 2;
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->payment_date =  Carbon::parse($arr['create_time'])->toDateTimeString();

                $payment->save();

                return redirect()->route('booked.now');

            } else {
                return $response->getMessage();
            }
        } else {
            return 'Payment declined!!';
        }
    }

    public function error()
    {
        session()->flash('error', 'Payment declined!!');
        return redirect()->route('book.now');
    }
}
