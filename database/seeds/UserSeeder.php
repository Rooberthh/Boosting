<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        create('App\Account', [], 10);

        create('App\BoostingOrder', [], 10);

        $developer = create('App\User', [
            'name' => 'Booster',
            'email' => 'booster@booster.com',
            'password' => bcrypt('password'),
        ]);

        $developer->assignRole('developer');
        $developer->assignRole('booster');
    }
}
