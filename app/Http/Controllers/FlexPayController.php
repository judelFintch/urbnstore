<?php

namespace App\Http\Controllers;

use App\Models\DetailsOrder;
use App\Models\Order;
use App\Models\Product;
use Devscast\Maxicash\Client as Maxicash;
use Devscast\Maxicash\Credential;
use Devscast\Maxicash\Environment;
use Devscast\Maxicash\PaymentEntry;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;

class FlexPayController extends Controller
{
    /**
     * Handle the payment request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handlePayment(CheckoutRequest $request)
    {
        // Validation des données d'entrée
        //$validatedData = $request->validated();
    
        
    }
}
