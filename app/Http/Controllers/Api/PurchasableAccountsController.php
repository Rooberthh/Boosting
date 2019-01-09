<?php

namespace App\Http\Controllers\api;

use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchasableAccountsController extends Controller
{
    public function index()
    {
        return Account::where([
            'sold' => false
        ])->count();
    }

}
