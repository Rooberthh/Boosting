@component('mail::message')
    # Support Ticket


    {{ $data['body'] }}

    Thanks,
    {{ $data['name'] }}
    {{ $data['from'] }}
@endcomponent
