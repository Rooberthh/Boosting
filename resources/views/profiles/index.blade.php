@extends('layouts.app')

@section('content')
    <div class="columns justify-content-center">
        <div class="column is-8">
        <h1>Profile</h1>
         @include('breadcrumbs')

        <h4>Profile Settings</h4>

        <update-user-form :user="{{ $user }}" inline-template>
            <form method="POST" @submit.prevent="onSubmit" v-cloak>
                <div class="form-group">
                    <label class="label" for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="name" v-model="form.name">
                    <div v-if="errors.name" v-text="errors.name[0]" class="text-sm text-danger"></div>
                </div>
                <div class="form-group">
                    <label class="label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" v-model="form.email">
                    <div v-if="errors.email" v-text="errors.email[0]" class="text-sm text-danger"></div>
                </div>
                <div class="form-group">
                    <label class="label" for="password">New Password</label>
                    <input type="password" class="form-control" id="password" name="password"  v-model="form.password">
                    <div v-if="errors.password" v-text="errors.password[0]" class="text-sm text-danger"></div>
                </div>
                <div class="form-group">
                    <label class="label" for="password_confirmation">Password Confirmation</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" v-model="form.password_confirmation">
                </div>
                <button class="button is-primary" type="submit">Update Profile</button>
            </form>
        </update-user-form>

        <h4 class="mt-4">League Information</h4>
        <league-user-form :user="{{ $user }}" inline-template>
            <form method="POST" @submit.prevent="onSubmit" v-cloak>
                <div class="form-group">
                    <label for="league_name" class="label">Username</label>
                    <input type="text" id="league_name" class="form-control" v-model="form.league_name">
                </div>

                <div class="form-group">
                    <label for="league_password" class="label">Password</label>
                    <input type="password" id="league_password" class="form-control">
                </div>

                <button class="button is-primary" type="submit">Update Account</button>
            </form>
        </league-user-form>
        </div>
    </div>

@endsection
