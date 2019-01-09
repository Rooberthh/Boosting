<?php

namespace App\Http\Controllers\api;

use App\BoostingOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersBoostingOrdersController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $orders = BoostingOrder::where([
            'user_id' => $user->id
        ])->get();

        return $orders;
    }

}
