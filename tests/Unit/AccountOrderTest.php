<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountOrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_belongs_to_a_user()
    {
        $user = create('App\User');

        $order = create('App\AccountOrder', [
            'user_id' => $user->id
        ]);

        $this->assertEquals($order->id, $user->id);
    }

}
