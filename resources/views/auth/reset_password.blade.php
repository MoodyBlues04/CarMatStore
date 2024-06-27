<?php
/** @var string $token */
?>
@extends('layouts.public-layout')

@section('content')
    <section class="section-register">
        <div class="container">
            <div class="section-register-container">
                <div class="section-register-container-left">
                    <div class="section-register-container-left-text">
                        <h2>Новый пароль</h2>
                    </div>
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <div class="section-register-container-left-input">
                            <input type="email" name="email" placeholder="Введите вашу почту">
                            <input type="password" name="password" placeholder="Придумайте пароль">
                            <input type="password" name="password_confirmation" placeholder="Повторите пароль">
                            <input type="hidden" name="token" value="{{$token}}" required>
                            <button type="submit">Восстановить</button>
                            <div class="section-register-container-left-input-bottom">
                                <a href="">Войти в аккаунт</a>
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
