<?php

namespace App\Livewire\Guest\Home;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Livewire\ConfigCinet;

class Index extends Component
{
    #[Layout('layouts.guest')]
    public function checkout()
    {

        $siteId = config('services.cinetpay.site_id');
        $apiKey = config('services.cinetpay.api_key');
        $secretKey = config('services.cinetpay.secret_key');

        $price = 2000;
        $priceInCents = intval($price * 5);

        $formData = [
            "transaction_id" => \Illuminate\Support\Str::random(10),
            "amount" => $priceInCents,
            "currency" => 'CDF',
            "customer_surname" => 'TEST Customer',
            "customer_name" => 'TEST Customer',
            "description" => 12345,
            "notify_url" => 'http://127.0.0.1:8000/dashboard',
            "return_url" => 'http://127.0.0.1:8000/dashboard',
            "channels" => 'ALL',
            "invoice_data" => [],
            "customer_email" => "",
            "customer_phone_number" => "976938094",
            "customer_address" => "",
            "customer_city" => "",
            "customer_country" => "",
            "customer_state" => "",
            "customer_zip_code" => ""
        ];

        $cinetpay = new ConfigCinet($siteId, $apiKey);
        $result = $cinetpay->generatePaymentLink($formData);

        $url = $result['data']['payment_url'];
        return redirect()->to($url);
    }
    public function render()
    {
        return view('livewire.guest.home.index');
    }
}
