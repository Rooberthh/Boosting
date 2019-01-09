@extends('layouts.app')

@section('content')
    <h1>All Orders</h1>
    @if($orders->count())
        <boosting-orders :orders="{{ $orders }}"></boosting-orders>
    @else
        <p>There are no active orders at this time.</p>
    @endif
@endsection
