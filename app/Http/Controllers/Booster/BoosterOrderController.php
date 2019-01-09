<?php

namespace App\Http\Controllers\Booster;

use App\BoostingOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function MongoDB\BSON\toJSON;

class BoosterOrderController extends Controller
{
    public function index()
    {
        $orders = BoostingOrder::active()->get();

        return view('booster.index', compact('orders'));
    }

    public function update($id)
    {
        if(auth()->user()->boosterHasActiveOrder()){
            return response()->json('You already have an active order', 422);
        }

        $order = BoostingOrder::findOrFail($id);

        $user = auth()->user();

        $order->update([
            'booster_id' => $user->id
        ]);

        return response('You have accepted the order', 200);
    }
}
