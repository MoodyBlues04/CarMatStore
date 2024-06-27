@extends('layouts.public-layout')

@section('styles')
    <style>
        footer{
            margin-top: 210px;
        }
        body{
            background: #F5F7FA;
        }
        @media(max-width: 970px){
            footer{
                margin-top: 80px;
            }
        }
    </style>
@endsection

@section('header')
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
                        <h2>Восстановление</h2>
                        <p>
                            Мы вынуждены отталкиваться от того, что перспективное планирование требует анализа экспериментов.
                        </p>
                    </div>
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="section-register-container-left-input">
                            <input name="email" type="email" placeholder="Введите вашу почту">
                            <button type="submit">Восстановить</button>
                            <div class="section-register-container-left-input-bottom">
                                <a href="{{ route('auth.login') }}">Войти в аккаунт</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="section-register-container-right">
            <img src="{{ asset('img/rcovery.png') }}" alt="">
        </div>
    </section>
@endsection
