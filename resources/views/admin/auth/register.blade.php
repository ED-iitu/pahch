@extends('admin.layouts.auth')

@section('content')
                        <div class="form-container">
                            <div class="form-form">
                                <div class="form-form-wrap">
                                    <div class="form-container">
                                        <div class="form-content">
                                            <h1 class="">Создать аккаунт</h1>
                                            <p class="signup-link">У вас уже есть аккаунт? <a href="{{ route('admin.auth.signin') }}">Войти</a></p>
                                            <form class="text-left" method="POST" action="{{ route('admin.auth.signup') }}">
                                                @csrf
                                                <div class="form">
                                                    <div id="username-field" class="field-wrapper input">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                        <input id="username" name="name" type="text" class="form-control" placeholder="Имя">
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                    <div id="email-field" class="field-wrapper input">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                                        <input id="email" name="email" type="text" value="" placeholder="Email">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                    <div id="password-field" class="field-wrapper input mb-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                                        <input id="password" name="password" type="password" value="" placeholder="Пароль">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                    <div id="password-field" class="field-wrapper input mb-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                                        <input id="password" name="password_confirmation" type="password" value="" placeholder="Повторите пароль">
                                                    </div>
                                                    <div class="field-wrapper terms_condition">
                                                        <div class="n-chk new-checkbox checkbox-outline-primary">
                                                            <label class="new-control new-checkbox checkbox-outline-primary">
                                                                <input type="checkbox" class="new-control-input">
                                                                <span class="new-control-indicator"></span><span>Я принимаю <a href="javascript:void(0);">  условия и положения </a></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="d-sm-flex justify-content-between">
                                                        <div class="field-wrapper toggle-pass">
                                                            <p class="d-inline-block">Показать пароль</p>
                                                            <label class="switch s-primary">
                                                                <input type="checkbox" id="toggle-password" class="d-none">
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                        <div class="field-wrapper">
                                                            <button type="submit" class="btn btn-primary">Начать!</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            @if(settings('field_enabled_logo_buginsoft'))
                                            <p class="terms-conditions">© 2021 All Rights Reserved. <a href="https://buginsoft.kz/">digital-агентство BuginSoft</a></p>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-image">
                                <div class="l-image">
                                </div>
                            </div>
                        </div>
    @endsection
