<?php
// app/Services/FlexPayService.php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class FlexPayService
{
    protected $client;
    protected $baseUrl;
    protected $token;
    protected $merchant;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = config('flexpay.base_url');
        $this->token = config('flexpay.token');
        $this->merchant = config('flexpay.merchant');
    }

    public function createPayment($reference, $amount, $currency, $description)
    {
        $response = $this->client->post("{$this->baseUrl}/api/rest/v1/paymentService", [
            'json' => [
                'authorization' => $this->token,
                'merchant' => $this->merchant,
                'reference' => $reference,
                'amount' => $amount,
                'currency' => $currency,
                'description' => $description,
                'callback_url' => config('flexpay.callback_url'),
                'approve_url' => config('flexpay.approve_url'),
                'cancel_url' => config('flexpay.cancel_url'),
                'decline_url' => config('flexpay.decline_url'),
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    public function checkTransaction($orderNumber)
    {
        $response = $this->client->get("{$this->baseUrl}/api/rest/v1/check/{$orderNumber}", [
            'headers' => [
                'Authorization' => $this->token,
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}
