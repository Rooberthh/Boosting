<?php

namespace App\Http\Controllers\api;

use App\AccountOrder;
use App\BoostingOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchasesController extends Controller
{
    public function index()
    {
        $boostingOrders = BoostingOrder::all()->count();
        $accountOrders = AccountOrder::all()->count();

        $count = $boostingOrders + $accountOrders;

        return $count;
    }

}
