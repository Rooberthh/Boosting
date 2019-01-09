<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

    Route::get('/profile', 'ProfilesController@index')->name('profile.index');
    Route::patch('/profile', 'ProfilesController@update')->name('profile.update');
    Route::get('/profiles/{user}/notifications', 'UserNotificationsController@index');
    Route::delete('/profiles/{user}/notifications/{notification}', 'UserNotificationsController@destroy');

    Route::patch('/profile/league', 'UserLeagueController@update')->name('userLeague.update');

    Route::get('/purchase', 'BoostingOrderController@index')->name('boosting.index');
    Route::post('/purchase', 'BoostingOrderController@store')->name('boosting.store');

    Route::get('/account', 'AccountOrderController@index')->name('accountOrder.index');
    Route::post('/account', 'AccountOrderController@store')->name('accountOrder.store');
});

Route::post('/support', 'TicketController@create')->name('support.create');

Route::group([
    'prefix' => 'booster',
    'namespace' => 'Booster',
    'middleware' => 'role:booster|developer'
], function () {
    Route::get('/orders', 'BoosterOrderController@index')->name('booster.index');
    Route::patch('/orders/{id}', 'BoosterOrderController@update')->name('booster.update');

    Route::get('/{user}/orders', 'BoosterProfilesController@index')->name('booster.profile.index');

    Route::patch('/orders/{order}/complete', 'CompletedOrderController@update')->name('booster.completedOrder.update');
});

Route::group([
    'prefix' => 'api',
    'namespace' => 'Api'
], function () {
    Route::get('/accounts', 'AccountController@index')->name('api.account.index');
    Route::get('/boosters', 'BoosterController@index')->name('api.booster.index');
    Route::get('/purchases', 'PurchasesController@index')->name('api.purchases.index');
    Route::get('/users', 'UsersController@index')->name('api.users.index');
    Route::get('/purchable/accounts', 'PurchasableAccountsController@index');

    Route::get('/user/accountOrders', 'UsersAccountOrdersController@index');
    Route::get('/user/boostingOrders', 'UsersBoostingOrdersController@index');
});


