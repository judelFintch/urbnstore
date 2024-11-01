<?php

namespace App\Livewire\Homepages;
use Livewire\Attributes\Layout;
use App\Livewire\ConfigCinet;

use Livewire\Component;

class Index extends Component
{
    public const APIKEY = '131622986671368790ee253.72229286';
    public const SITE_ID = '5881824';
    public const SECRET_KEY = '2262259346715eff8207483.20479601';
    
    public const invoice_data = array(
        "Data 1" => "",
        "Data 2" => "",
        "Data 3" => ""
    );

    public $tests = true;
    #[Layout('layouts.guest')]
    public function render()
    {
       
    return view('livewire.homepages.index');
    }

    public function checkout()
    {
        //Fournir les informations pour notre API
        $price =3000;
        $priceInCents = intval($price * 5);
    
                $formData = array(
                    "transaction_id"=> \Illuminate\Support\Str::random(10),
                    "amount"=> $priceInCents,
                    "currency"=> 'CDF',
                    "customer_surname"=> 'TEST Customer',
                    "customer_name"=> 'TEST Customer',
                    "description"=> 12345,
                    "notify_url" => 'http://127.0.0.1:8000/dashboard',
                    "return_url" => 'http://127.0.0.1:8000/dashboard',
                    "channels" => 'ALL',
                    "invoice_data" =>self::invoice_data,
                    //pour afficher le paiement par carte de credit
                    "customer_email" => "", //l'email du client
                    "customer_phone_number" => "976938094", //Le numéro de téléphone du client
                    "customer_address" => "", //l'adresse du client
                    "customer_city" => "", // ville du client
                    "customer_country" => "",//Le pays du client, la valeur à envoyer est le code ISO du pays (code à deux chiffre) ex : CI, BF, US, CA, FR
                    "customer_state" => "", //L’état dans de la quel se trouve le client. Cette valeur est obligatoire si le client se trouve au États Unis d’Amérique (US) ou au Canada (CA)
                   "customer_zip_code" => "" //Le code postal du client 
            ); 
                
            //    //Stocker dans la table
            //    $insert = new situation();
            //    $insert->etudiant = $request->customer_name;
            //    $insert->frais = $nameprice;
            //    $insert->save();

            $cinetpay = new ConfigCinet(self::SITE_ID, self::APIKEY);
            $result = $cinetpay->generatePaymentLink($formData);

            //dd($result);
            
            $url = $result['data']['payment_url']; 

            return redirect()->to($url);
        }
    }


 