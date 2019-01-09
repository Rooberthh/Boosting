<?php

namespace App\Http\Controllers;

use App\BoostingOrder;
use App\Mail\BoostingPurchaseConfirmation;
use App\Notifications\NewBoostingOrder;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Charge;
use Stripe\Customer;

class BoostingOrderController extends Controller
{
    public function index()
    {
        if(! auth()->user()->league_name && !auth()->user()->league_password)
        {
            flash('You need to configure your League account before purchasing a boost', 'danger');

            return back();
        }
        return view('boostingOrder.index');
    }

    public function store()
    {
        if(auth()->user()->hasActiveBoostingOrder()){
            return response()->json([ 'status' => 'You already have an active Order!'], 422);
        }

        request()->validate([
            'from' => 'required',
            'to' => 'required|gt:from',
            'server' => 'required'
        ]);

        $from = request('from');
        $to = request('to');

        $price = $this->calc($from, $to);

        $customer = Customer::create([
            'email' => request('stripeEmail'),
            'source' => request('stripeToken')
        ]);

        try {
            Charge::create([
                'customer' => $customer->id,
                'amount' => $price,
                'currency' => 'usd'
            ]);
        }
        catch (\Exception $e)
        {
            return response(['status' => $e->getMessage()], 422);
        }

        $order = BoostingOrder::create([
            'user_id' => auth()->id(),
            'from' => request('from'),
            'to' => request('to'),
            'league_name' => auth()->user()->league_name,
            'server' => request('server'),
            'price' => $price
        ]);

        $boosters = User::role('booster')->get();
        $boosters->each
            ->notify(new NewBoostingOrder($order));

        $user = auth()->user();

        Mail::to($user)->send(new BoostingPurchaseConfirmation($user, $order));

        return response(['Order created'], 201);

    }


    protected function calc($from, $to)
    {
        $totalPrice = 0;
        for($i = $from; $i < $to; $i++ ){
            if( $i <= 5)
            {
                $totalPrice = $totalPrice + 1200;
            }
            else if( $i >= 5 && $i <= 10)
            {
                $totalPrice = $totalPrice + 1400;
                        }
            else if( $i >= 10 && $i <= 15)
            {
                $totalPrice = $totalPrice + 2300;
                        }
            else if( $i >= 15 && $i <= 20)
            {
                $totalPrice = $totalPrice + 3700;
                        }
            else if( $i >= 20 && $i <= 25)
            {
                $totalPrice = $totalPrice + 11300;
            }
        }

        return $totalPrice;
    }



}
