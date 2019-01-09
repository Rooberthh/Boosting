<register inline-template>
    <modal name="register" height="auto">
        <form class="p-5" @submit.prevent="register">
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" autocomplete="name" placeholder="John" value="{{ old('name') }}" v-model="form.name">
                <div v-if="errors.name" v-text="errors.name[0]" class="text-sm text-danger"></div>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" autocomplete="email" placeholder="example@example.com" value="{{ old('email') }}" v-model="form.email">
                <div v-if="errors.email" v-text="errors.email[0]" class="text-sm text-danger"></div>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" v-model="form.password">
                <div v-if="errors.password" v-text="errors.password[0]" class="text-sm text-danger"></div>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="current-password" v-model="form.password_confirmation">
            </div>

            <div class="form-group">
                <button type="submit" class="button is-danger w-100" :class="loading ? 'is-loading' : ''">Register</button>
            </div>

            <div class="mt-6" v-if="feedback">
                <span class="text-sm text-danger" v-text="feedback"></span>
            </div>
        </form>
    </modal>
</register>
