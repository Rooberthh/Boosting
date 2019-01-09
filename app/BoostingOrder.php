<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoostingOrder extends Model
{
    protected $fillable = [
        'user_id',
        'from',
        'to',
        'server',
        'account',
        'completed',
        'booster_id'
    ];

    protected $with = [
        'owner'
    ];


    protected $casts = ['completed' => 'boolean'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function booster()
    {
        return $this->belongsTo(User::class, 'booster_id');
    }

    public function getDivision($number)
    {
        $divisions = [
            'Bronze 5','Bronze 4','Bronze 3','Bronze 2','Bronze 1',
            'Silver 5','Silver 4','Silver 3','Silver 2','Silver 1',
            'Gold 5', 'Gold 4', 'Gold 3', 'Gold 2', 'Gold 1',
            'Platinum 5', 'Platinum 4', 'Platinum 3', 'Platinum 2', 'Platinum 1',
            'Diamond 4', 'Diamond 5', 'Diamond 3', 'Diamond 2', 'Diamond 1',
        ];

        return $divisions[$number];
    }

    public function scopeActive($query)
    {
        return $query->where([
            ['completed', 0],
            ['booster_id', null]
            ]);
    }

}
