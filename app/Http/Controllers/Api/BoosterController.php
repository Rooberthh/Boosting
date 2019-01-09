<?php

namespace App\Http\Controllers\api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoosterController extends Controller
{
    public function index()
    {
        return User::role('booster')->count();
    }

}
