<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_methods = [
            [
                'name' => 'Walk-In',
                'account_name' => '',
                'account_number' => '',
                'category' => '',
                'qr_path' => '',
                'description' => 'Pay on Arrival',
            ],
            [
                'name' => 'GCash',
                'account_name' => 'John Doe',
                'account_number' => '09123456789',
                'category' => 'E-Wallet',
                'qr_path' => 'https://drive.google.com/file/d/18PL5gJqYERcLHaNvFzsl864LSyfa7Kt9/view?usp=sharing',
                'description' => 'Make your payment directly using GCash E-wallet. An email will be sent with payment details.',
            ],
        ];

        foreach ($payment_methods as $payment_method) {
            PaymentMethod::create([
                'name' => $payment_method['name'],
                'account_name' => $payment_method['account_name'],
                'account_number' => $payment_method['account_number'],
                'category' => $payment_method['category'],
                'qr_path' => $payment_method['qr_path'],
                'description' => $payment_method['description'],
            ]);
        }
    }
}
