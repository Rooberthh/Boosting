@extends('layouts.app')

@section('content')
    <h1>Booster Profile</h1>
    @if($orders->count())
        <table class="table">
            <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>From</th>
                <th>To</th>
                <th>Server</th>
                <th>Completed</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->owner->league_name }}</td>
                    <td>{{ $order->owner->league_password }}</td>
                    <td>{{ $order->getDivision($order->from) }}</td>
                    <td>{{ $order->getDivision($order->to) }}</td>
                    <td>{{ $order->server }}</td>

                    <td>{{ intval($order->completed) }}</td>

                    <td>
                        @if($order->completed == false)
                            <form method="POST" action="{{ route('booster.completedOrder.update', $order->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <button class="button is-primary" type="submit">Mark as Completed</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    @else
        <p>You have no active or completed orders</p>
    @endif

@endsection
