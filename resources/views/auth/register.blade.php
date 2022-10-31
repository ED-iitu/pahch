@extends('layouts.app')

@section('content')
<div class="container">
    <section class="page-section" id="page-section">
        <div class="container">
            <div class="page-auth">
                <div class="auth-card">
                    <div class="auth-card-header">
                        <h1 class="auth-card-title type1">Создать аккаунт</h1>
                        <p class="auth-card-subtitle"><a href="{{route('login')}}">У меня есть аккаунт</a></p>
                    </div>
                    <div class="auth-card-body">
                        <form method="POST" action="{{ route('register') }}" class="auth-card-form" id="auth-card-form">
                            @csrf
                            <div class="auth-card-form-inputs">
                                <input type="text" name="name" placeholder="Ваше имя" required>
                                <input type="tel" name="phone" placeholder="Номер телефона" id="input-phone" required>
                                <input type="email" name="email" placeholder="Email" required>
                                <input type="password" name="password" placeholder="Пароль" required>
                            </div>
                            <button class="auth-card-btn" type="submit">Создать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
