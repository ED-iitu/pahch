@extends('layouts.app')

@section('content')
<div class="container">
    <section class="page-section" id="page-section">
        <div class="container">
            <div class="page-auth">
                <div class="auth-card">
                    <div class="auth-card-header">
                        <h1 class="auth-card-title type1">Войдите</h1>
                        <p class="auth-card-subtitle">либо <a href="{{route('register')}}">Создайте аккаунт</a></p>
                    </div>
                    <div class="auth-card-body">
                        <form method="POST" action="{{ route('login') }}" class="auth-card-form">
                            @csrf
                            <div class="auth-card-form-inputs">
                                <input type="email" name="email" placeholder="Email" required>
                                <input type="password" name="password" placeholder="Пароль" required>
                            </div>
                            <button class="auth-card-btn" type="submit">Войти</button>
                        </form>
                    </div>
                    <div class="auth-card-footer">
                        <a href="{{ route('password.request')}}">Забыли пароль?</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
