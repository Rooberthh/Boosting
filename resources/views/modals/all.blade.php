@includeWhen(auth()->user(),'modals.order-created')
@includeWhen(auth()->user(),'modals.profile-updated')
@include('modals.support')
@include('modals.ticket-created')
@include('modals.login')
@include('modals.register')
