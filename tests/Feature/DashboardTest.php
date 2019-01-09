<?php

    namespace Tests\Unit;

    use Tests\TestCase;
    use Illuminate\Foundation\Testing\RefreshDatabase;

    class DashboardTest extends TestCase
    {
        use RefreshDatabase;

        /** @test */
        function authenticated_users_can_access_the_dashboard()
        {
            $this->signIn();

            $this->get(route('dashboard.index'))
                ->assertStatus(200)
                ->assertSee('Dashboard');
        }

        /** @test */
        function unauthenticated_users_cant_access_the_dashboard ()
        {
            $this->get(route('dashboard.index'))
                ->assertRedirect('/login');
        }

    }
