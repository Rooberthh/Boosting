<?php

namespace App\Http\Requests;

use App\Account;
use App\AccountOrder;
use Illuminate\Foundation\Http\FormRequest;

class AccountOrderForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !! $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'server' => 'required',
            'amountIp' => 'required',
            'stripeEmail' => 'required|email',
            'stripeToken' => 'required'
        ];
    }

    public function save()
    {
        $price = $this->get('amountIp') / 10;

        $account = Account::where([
            ['server', '=', $this->get('server')],
            ['sold', '=', false],
            ['amountIp', '=', $this->get('amountIp')]
        ])->get()->first();

        $order = new AccountOrder;
            $order->user_id = auth()->user()->id;
            $order->account_id = $account->id;
            $order->price = $price;

        $this->user()
            ->accountOrder()
            ->createOrder($order, $this->stripeToken);

    }
}
