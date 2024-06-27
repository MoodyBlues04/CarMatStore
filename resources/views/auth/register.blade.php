@extends('layouts.public-layout')

@section('styles')
    <style>
        footer{
            margin-top: 80px;
        }
        body{
            background: #F5F7FA;
        }
    </style>
@endsection

@section('header') {{-- Reset header section --}}
@endsection

@section('content')
<section class="section-register">
    <div class="container">
        <div class="section-register-container">
            <div class="section-register-container-left">
                <a href="" class="register-logo">
                    Logo
                </a>
                <div class="section-register-container-left-text">
                    <h2>Зарегистрируйтесь</h2>
                    <p>
                        Мы вынуждены отталкиваться от того, что перспективное планирование требует анализа экспериментов.
                    </p>
                </div>
                <form action="{{ route('auth.register') }}" method="POST">
                    @csrf
                    <div class="section-register-container-left-input">
                        <input name="name" type="text" placeholder="Введите ваше имя">
                        <input name="email" type="email" placeholder="Введите вашу почту">
                        <input name="phone" type="tel" placeholder="Введите ваш телефон">
                        <input name="password" type="password" placeholder="Придумайте пароль">
                        <input name="password_confirmation" type="password" placeholder="Повторите пароль">
                        <button type="submit">Регистрация</button>
                        <a href="{{ route('auth.login') }}">У меня есть аккаунт</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="section-register-container-right">
        <img src="{{ asset('img/register-img.png') }}" alt="">
    </div>
</section>
@endsection
