@if(auth()->check())
    <modal height="auto" name="updated-user" width="400">
        <div class="container">
            <div class="text-center mt-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="100" viewBox="0 0 32 32">
                    <path id="checkmark" d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/>
                </svg>
            </div>

            <div class="text-center mb-3">
                <h2 class="display-5">Nailed it!</h2>
                <p class="text-secondary">Your profile have been updated</p>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <button class="btn btn-danger mx-2 px-4" @click="$modal.hide('updated-user')">Close</button>
                <button class="btn btn-primary mx-2 px-4" @click="$modal.hide('updated-user')">Ok</button>
            </div>
        </div>
    </modal>
@endif
