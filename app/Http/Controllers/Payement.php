<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\Order;
use App\Models\DetailsOrder;
use Devscast\Maxicash\Client as Maxicash;
use Devscast\Maxicash\Credential;
use Devscast\Maxicash\Environment;
use Devscast\Maxicash\PaymentEntry;

class Payement extends Controller
{
    //

    public function handlePayment(Request $request)
    {
      dd($request);
    }
}
