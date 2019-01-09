@extends('layouts.app')

@section('content')
    <h1 class="title is-1">Dashboard</h1>
    @include('breadcrumbs')
    <div class="columns">
        <div class="column">
            <tile url="api/users">
                <h5 class="flex-grow-1" slot="body"> Total Users </h5>
                <i slot="icon" class="icon-is-medium fas fa-users is-light-grey"></i>
            </tile>
        </div>
        <div class="column">
            <tile url="api/purchases">
                <h5 class="flex-grow-1" slot="body"> Total Purchases </h5>
                <i slot="icon" class="icon-is-medium fas fa-users is-light-grey"></i>
            </tile>
        </div>
        <div class="column">
            <tile url="api/boosters">
                <h5 class="flex-grow-1" slot="body"> Total Boosters </h5>
                <i slot="icon" class="icon-is-medium fas fa-user is-light-grey"></i>
            </tile>
        </div>
        <div class="column">
            <tile url="api/purchable/accounts">
                <h5 class="flex-grow-1" slot="body"> Accounts for Sale </h5>
                <i slot="icon" class="icon-is-medium fas fa-shopping-cart is-light-grey"></i>
            </tile>
        </div>
    </div>

    <div class="columns mt-4">
        <div class="column is-6">
            <h4>Your Purchased Boosts</h4>
            <dashboard-boosting-orders-table></dashboard-boosting-orders-table>
        </div>

        <div class="column is-6">
            <h4>Your Account Orders</h4>
            <account-orders-table orders="{{ auth()->user() }}"></account-orders-table>
        </div>
    </div>
@endsection

