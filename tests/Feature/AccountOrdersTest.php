<?php

namespace Tests\Unit;

use App\AccountOrder;
use InteractsWithStripe;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountOrdersTest extends TestCase
{
    use RefreshDatabase, InteractsWithStripe;

    /** @test */
    function authenticated_users_can_purchase_accounts()
    {
        $this->signIn();

        $account = create('App\Account', [
            'server' => 'eune',
            'amountIp' => 20000
        ]);

        $token = $this->getStripeToken();

        //Account order instance
        $order = new AccountOrder();

        $accountOrder = new AccountOrder;
            $accountOrder->user_id = auth()->user()->id;
            $accountOrder->account_id = $account->id;
            $accountOrder->price = 3000;

        $order->createOrder($accountOrder, $token);

        $this->assertDatabaseHas('account_orders', ['account_id' => $account->id]);
    }
}
