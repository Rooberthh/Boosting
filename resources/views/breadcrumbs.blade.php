<nav class="text-xs ">
    <ol class="list-reset d-flex text-is-dark-grey">
        <li>
            <a href="/dashboard">Home</a>
        </li>
        @if (Route::is('dashboard.index') && empty(Request::query()))
            <span class="mx-1">&#8226;</span>
            <li>
                Dashboard
            </li>
        @endif

        @if (Route::is('boosting.index'))
            <span class="mx-1">&#8226;</span>
            <li>
                Purchase Boosting
            </li>
        @endif

        @if (Route::is('accountOrder.index'))
            <span class="mx-1">&#8226;</span>
            <li>
                Purchase Account
            </li>
        @endif

        @if (Route::is('profile.index'))
            <span class="mx-1">&#8226;</span>
            <li>
                Profile
            </li>
        @endif
    </ol>
</nav>
