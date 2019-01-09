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
            'name' => 'Roberth',
            'email' => 'Roberth.evaldsson@hotmail.com',
            'password' => bcrypt('9q7q5q3q1q'),
        ]);

        $developer->assignRole('developer');
        $developer->assignRole('booster');
    }
}
