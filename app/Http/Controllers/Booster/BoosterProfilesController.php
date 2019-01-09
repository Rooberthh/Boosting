<?php

namespace App\Http\Controllers\Booster;

use App\BoostingOrder;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoosterProfilesController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);

        $orders = BoostingOrder::where(
            ['booster_id' => $user->id]
        )->orderBy('completed', 'asc')->get();

        return view('booster.profile.index', compact('orders'));
    }

}
