<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\AccountOrderForm;

class AccountOrderController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function store(AccountOrderForm $form)
    {

        $price = $form->get('amountIp') / 10;

        try
        {
            $form->save();
        }
        catch (\Exception $e)
        {
            return response(['status' => $e->getMessage()], 422);
        }
        $user = auth()->user();

        $account = Account::where([
            ['server', '=', $form->get('server')],
            ['sold', '=', false],
            ['amountIp', '=', $form->get('amountIp')]
        ])->get()->first();

        $account->accountOrder->update([
            'completed' => true
        ]);

        $account->sold();

        return response(['Order created'], 201);
    }

}
