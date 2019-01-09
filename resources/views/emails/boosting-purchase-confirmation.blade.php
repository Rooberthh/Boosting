@component('mail::message')
    # Boosting Order

    Hello {{ $user->name }} your boosting order have been added.

    From: {{ $order->getDivision($order->from)  }}
    To: {{ $order->getDivision($order->to) }}

    Thanks,

    {{ config('app.name') }}
@endcomponent
