@component('mail::message')
    # Boosting Order

    {{ $order->booster->name }} have completed order {{ $order->id }}

    From: {{ $order->getDivision($order->from)  }}
    To: {{ $order->getDivision($order->to) }}

    User: {{ $order->owner->league_name }}
@component('mail::button', ['url' => "http://" .$order->server . ".op.gg/summoner/userName=" . $order->owner->league_name])
    Op.gg
@endcomponent
    Price: {{ $order->price }}$
@endcomponent
