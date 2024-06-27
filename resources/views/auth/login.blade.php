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
                        <h2>Войдите в аккаунт</h2>
                        <p>
                            Мы вынуждены отталкиваться от того, что перспективное планирование требует анализа экспериментов.
                        </p>
                    </div>
                    <form action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        <div class="section-register-container-left-input">
                            <input name="email" type="email" placeholder="Введите вашу почту">
                            <input name="password" type="password" placeholder="Введите пароль">
                            <button type="submit">Войти</button>
                            <div class="section-register-container-left-input-bottom">
                                <a href="{{ route('auth.register_page') }}">У меня нет аккаунта</a>
                                <a href="{{ route('password.request') }}">Забыл пароль</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="section-register-container-right">
            <img src="{{asset('img/sign-in.png')}}" alt="">
        </div>
    </section>
@endsection
