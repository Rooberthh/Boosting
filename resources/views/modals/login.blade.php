<login inline-template>
    <modal name="login" height="auto">
        <form class="p-5" @submit.prevent="login">
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" autocomplete="email" placeholder="example@example.com" value="{{ old('email') }}" required v-model="form.email">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" required v-model="form.password">
            </div>

            <div class="form-group">
                <button type="submit" class="button is-danger w-100" :class="loading ? 'is-loading' : ''">
                    Login
                </button>
            </div>

            <div class="mt-6" v-if="feedback">
                <span class="text-sm text-danger" v-text="feedback"></span>
            </div>
        </form>
    </modal>
</login>
