<?php

namespace App\Http\Controllers\Api;

use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {
        return Account::where([
            ['server', '=', request('server')],
            ['sold', '=', false],
            ['amountIp', '=', request('ip')]
        ])->get()->count();
    }

}
