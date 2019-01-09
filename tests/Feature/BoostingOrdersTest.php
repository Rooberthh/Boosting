<?php

namespace Tests\Unit;

use App\Mail\BoostingPurchaseConfirmation;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BoostingOrdersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_user_can_create_an_boosting_order()
    {
        $this->signIn();

        $order = make('App\BoostingOrder', [
            'user_id' => auth()->id()
        ]);

        $this->post(route('boosting.store'), $order->toArray())
            ->assertStatus(200);

        $this->assertDatabaseHas('boosting_orders', ['user_id' => $order->user_id]);
    }

    /** @test */
    function a_user_cant_have_2_active_orders_at_once()
    {
        $this->signIn();

        create('App\BoostingOrder', [
            'user_id' => auth()->id(),
            'completed' => false
        ]);

        $order2 = make('App\BoostingOrder', [
            'user_id' => auth()->id()
        ]);

        $this->post(route('boosting.store'), $order2->toArray())
            ->assertStatus(422);
    }

    /** @test */
    function confirmation_email_is_sent_upon_purchase()
    {
        $this->withExceptionHandling();

        Mail::fake();

        $this->signIn();

        $order = make('App\BoostingOrder');

        $this->post(route('boosting.store', $order));

        Mail::assertQueued(BoostingPurchaseConfirmation::class);

    }

}
