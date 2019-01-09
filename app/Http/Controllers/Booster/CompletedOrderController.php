<?php

namespace App\Http\Controllers\booster;

use App\BoostingOrder;
use App\Mail\BoostingOrderComplete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CompletedOrderController extends Controller
{
    public function update($id)
    {
        $order = BoostingOrder::findorFail($id);

        $order->update([
            'completed' => true
        ]);

        flash('Order have been Marked as Complete');

        Mail::to('asdd@hotmail.com')->send(new BoostingOrderComplete($order));

        return back();
    }
}
