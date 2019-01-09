<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'league_name', 'league_password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function boostingOrders()
    {
        return  $this->hasMany(BoostingOrder::class);
    }

    public function boosterOrders(){
        return  $this->hasMany(BoostingOrder::class, 'booster_id');
    }

    public function accountOrders()
    {
        return $this->hasMany(AccountOrder::class);
    }

    public function hasActiveBoostingOrder()
    {
        return auth()->user()->boostingOrders->where('completed', false)->count() == 1;
    }

    public function boosterHasActiveOrder()
    {
        $user = auth()->user();
        return $user->boosterOrders->where('completed', false)->count() >= 1;
    }

    public function accountOrder()
    {
        return new AccountOrder($this);
    }


}
