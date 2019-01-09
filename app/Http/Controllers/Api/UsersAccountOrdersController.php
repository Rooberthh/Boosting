<?php

namespace App\Http\Controllers\api;

use App\AccountOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersAccountOrdersController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $orders = AccountOrder::where([
            'user_id' => $user->id
        ])->with('account')->get();

        return $orders;
    }

}
