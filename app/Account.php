<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['sold'];

    public function accountOrder()
    {
        return $this->hasOne(AccountOrder::class);
    }

    public function sold()
    {
        $this->update(['sold' => true]);
    }
}
