<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Stripe\Charge;
use Stripe\Customer;

class AccountOrder extends Model
{
    protected $guarded = [];

    protected $casts = [
        'sold' => 'boolean'
    ];

    public function __construct()
    {
    }


    public function owner()
    {
        return $this->belongsTo(User::class);
    }


    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function createOrder($order, $token)
    {
        $customer = Customer::create([
            'email' => auth()->user()->email,
            'source' => $token
        ]);

        Charge::create([
            'customer' => $customer->id,
            'amount' => $order->price,
            'currency' => 'usd'
        ]);

       $order->save();
    }
}
