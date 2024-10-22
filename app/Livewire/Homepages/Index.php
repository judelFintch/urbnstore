<?php

namespace App\Livewire\Homepages;
use Livewire\Attributes\Layout;
use App\Livewire\ConfigCinet;

use Livewire\Component;

class Index extends Component
{
    public const APIKEY = '131622986671368790ee253.72229286';
    const SITE_ID = '5881824';
    const SECRET_KEY = '2262259346715eff8207483.20479601';

    public $tests = true;
    #[Layout('layouts.guest')]
    public function render()
    {
       
    return view('livewire.homepages.index');
    }

    public function checkout()
    {
        //Fournir les informations pour notre API
                $formData = array(
                    "transaction_id"=> 123456789,
                    "amount"=> 122,
                    "currency"=> 'CDF',
                    "customer_surname"=> 'Auth::user()->name',
                    "customer_name"=> 'Auth::user()->name',
                    "description"=> 1234,
                    "notify_url" => 'http://127.0.0.1:8000/dashboard',
                    "return_url" => 'http://127.0.0.1:8000/dashboard',
                    "channels" => 'ALL',
                    "invoice_data" => [],
                    //pour afficher le paiement par carte de credit
                    "customer_email" => "", //l'email du client
                    "customer_phone_number" => "", //Le numéro de téléphone du client
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
            
            $url = $result['data']['payment_url']; 

            return redirect()->to($url);
        }
    }


 