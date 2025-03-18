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
                'account_name' => "N/A",
                'account_number' => "N/A",
                'category' => 'walk_in',
                'qr_path' => 'N/A',
                'description' => 'Pay on Arrival',
            ],
            [
                'name' => 'Paypal',
                'category' => 'Paypal',
                'account_name' => "N/A",
                'account_number' => "N/A",
                // 'qr_path' => 'https://drive.google.com/file/d/18PL5gJqYERcLHaNvFzsl864LSyfa7Kt9/view?usp=sharing',
                // 'qr_path' => 'https://drive.google.com/file/d/1ruVZSOkqG3-lpg_So15fMas956p5yq_m/view?usp=sharing',
                'qr_path' => 'N/A',
                'description' => 'Make your payment directly using Paypal. You will be redirected to Paypal website to complete the payment.',
            ],
            [
                'name' => 'GCash',
                'account_name' => 'Bernadeth F.',
                'account_number' => '09272104929',
                'category' => 'E-Wallet',
                // 'qr_path' => 'https://drive.google.com/file/d/18PL5gJqYERcLHaNvFzsl864LSyfa7Kt9/view?usp=sharing',
                'qr_path' => 'https://drive.google.com/file/d/1ruVZSOkqG3-lpg_So15fMas956p5yq_m/view?usp=sharing',
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
