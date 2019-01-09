<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BoostingOrderTest extends TestCase
{
    use RefreshDatabase;

    protected $boostingOrder;

    protected function setUp()
    {
        parent::setUp();

        $this->boostingOrder = create('App\BoostingOrder');
    }


    /** @test */
    function it_belongs_to_a_user()
    {
        $user = create('App\User');

        $order = create('App\BoostingOrder', [
            'user_id' => $user->id
        ]);

        $this->assertEquals($order->id, $user->id);
    }

}
