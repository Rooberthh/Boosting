<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    $name = $faker->name;

    return [
        'name' => $name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'league_name' => $name,
        'league_password' => 'secret'
    ];
});

$factory->define(App\Account::class, function (Faker $faker) {
    static $password;
    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = 'secret',
        'answer' => $faker->word,
        'server' => $faker->randomElement(['euw', 'eune', 'na', 'tr', 'oce', 'lan', 'las' ]),
        'amountIp' =>  $faker->randomElement([ 20000, 30000]),
        'sold' => false
    ];
});

$factory->define(App\BoostingOrder::class, function (Faker $faker) {

    $user = factory('App\User')->create();

    return [
        'user_id' => $user->id,
        'from' => 1,
        'to' => 7,
        'league_name' => $user->league_name,
        'league_password' => $user->league_password,
        'server' => 'EUW',
        'price' => $faker->randomElement(['20', '30', '40', '50', '60'])
    ];
});

$factory->define(App\AccountOrder::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'account_id' => function(){
            return factory('App\Account')->create()->id;
        },
        'price' => $faker->randomElement(['20', '30', '40', '50', '60'])
    ];
});


