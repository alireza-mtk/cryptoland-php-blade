<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="/reset-password">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-3">
                    <x-jet-label value="{{ __('Email') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                                 :value="old('email', $request->email)" required autofocus />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Password') }}" />

                    <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                 name="password" required autocomplete="new-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Confirm Password') }}" />

                    <x-jet-input class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password"
                                 name="password_confirmation" required autocomplete="new-password" />
                    <x-jet-input-error for="password_confirmation"></x-jet-input-error>
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end">
                        <x-jet-button>
                            {{ __('Reset Password') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>










@extends('layout.app')


@push("style")

@endpush

@push("script")

@endpush


@section("main")

<div class="container row">

    <div class="col-sm-10 col-md-6 mx-auto float-none m-y-3">
        <h2>Forget password</h2>
        {!! Form::open(["route" => "reset-password" , "method" => "POST"]) !!}
    


            <p class="before-login-text">Get your password recovered!</p>
    
            <p class="form-row form-row-wide">
                <label for="email">Email<span class="required">*</span></label>
                <input type="text" class="input-text" name="email" id="email" value="" />
            </p>

            

    
            <p class="form-row">
                <input class="btn btn-warning btn-block" type="submit" value="Login" name="login">
                <label for="rememberme" class="inline m-y-2"><input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember me</label>
            </p>
    
            <p class="lost_password"><a href="{{ route("password.request") }}">Lost your password?</a></p>
    
        {!! Form::close() !!}
        </div>

</div>

@endsection