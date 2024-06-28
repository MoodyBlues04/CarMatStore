@extends('layout')

@section('content')
    <section class="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="margin-top: 30px; margin-bottom: 30px">
                    <div class="card">
                        <div class="card-header">{{ __('Settings') }}</div>

                        <div class="card-body">
                            <form action="{{ route('auth.login') }}" method="POST">
                                @csrf
                                <div class="section-register-container-left-input">
                                    <x-input-email field="email" placeholder="Введите вашу почту"/>
                                    <x-input-password field="password" placeholder="Введите пароль"/>
                                    <x-submit-button name="Войти" />
                                    <div class="row mt-4 mb-3 justify-content-center">
                                        <div class="col-md-6">
                                            <a href="{{ route('auth.register_page') }}"
                                               style="margin-right: 30px">У меня нет аккаунта</a>
                                            <a href="{{ route('password.request') }}">Забыл пароль</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
