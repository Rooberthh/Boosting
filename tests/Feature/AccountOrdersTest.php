<?php

namespace Tests\Unit;

use App\Mail\AccountPurchaseConfirmation;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountOrdersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function authenticated_users_can_purchase_accounts()
    {
        $this->signIn();

        $account = create('App\Account', [
            'server' => 'eune',
            'amountIp' => 20000
        ]);

        $this->json('post', route('accountOrder.store'), [
            'server' => 'eune',
            'amountIp' => 20000
        ]);

        $this->assertDatabaseHas('account_orders', ['account_id' => $account->id]);
    }

    /** @test */
    function confirmation_email_is_sent_upon_purchase()
    {
        $this->withExceptionHandling();

        Mail::fake();
        $this->signIn();

        $account = create('App\Account');

        $token = \Stripe\Token::create([
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => 1,
                'exp_year' => 2025,
                'cvc' => 123
            ]
        ])->id;

        $this->post(route('accountOrder.store'), [
            'server' => $account->server,
            'amountIp' => $account->amountIp
        ])->assertStatus(200);

        Mail::assertQueued(AccountPurchaseConfirmation::class);
    }

}
