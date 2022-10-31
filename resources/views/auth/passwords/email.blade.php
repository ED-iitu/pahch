@extends('layouts.app')

@section('content')
<div class="container">
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    <form method="POST" action="{{ route('password.email') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Send Password Reset Link') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <section class="page-section" id="page-section">
        <div class="container">
            <div class="page-auth">
                <div class="auth-card">
                    <div class="auth-card-header">
                        <h1 class="auth-card-title type2">
                            <a href="{{route('login')}}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 12C8 11.7901 8.08554 11.5889 8.23753 11.4413L14.6375 5.22697C14.9517 4.9219 15.4582 4.92472 15.7689 5.23327C16.0795 5.54182 16.0767 6.03926 15.7625 6.34433L9.93784 12L15.7625 17.6557C16.0767 17.9607 16.0795 18.4582 15.7689 18.7667C15.4582 19.0753 14.9517 19.0781 14.6375 18.773L8.23753 12.5587C8.08554 12.4111 8 12.2099 8 12Z" fill="#111621"/>
                                </svg>
                            </a>
                            Восстановить пароль
                        </h1>
                        <p class="auth-card-subtitle">Введите ваш E-mail чтобы восстановить ваш пароль</p>
                    </div>
                    <div class="auth-card-body">
                        <form method="POST" action="{{ route('password.email') }}" class="auth-card-form">
                            <div class="auth-card-form-inputs">
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="auth-card-btn" type="submit">Восстановить</div>
                        </form>
                    </div>
                    <div class="auth-card-footer">
                        <a href="{{route('login')}}">Я вспомнил пароль</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
