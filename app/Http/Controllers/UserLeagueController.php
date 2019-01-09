<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserLeagueController extends Controller
{
    public function update()
    {
        $user = auth()->user();

        request()->validate([
            'league_name' => [Rule::unique('users')->ignore($user->id), 'required'],
            'league_password' => ['nullable', 'min:6', Rule::unique('users')->ignore($user->id)]
        ]);

        if(request()->get('league_password') == ''){
            $user->update(request()->except('league_password'));
        }
        else
        {
            $user->update([
                'league_name' => request('league_name'),
                'league_password' => request('league_password')
            ]);
        }

        return response([], 201);
    }
}
