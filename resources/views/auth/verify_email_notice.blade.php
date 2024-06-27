@extends('layouts.public-layout')

@section('content')
    <section class="section-register">
        <div class="container">
            <div class="section-register-container">
                <div class="section-register-container-left">
                    <div class="section-register-container-left-text">
                        <h2>Верификация почты</h2>
                        <p>Для того, чтобы продолжить, пожалуйста проверьте вашу почту (возможно наше письмо находится в папке спам) и перейдите по ссылке для подтверждения вашей почты. Если письмо не пришло, нажмите кнопку - отправить заново.</p>
                    </div>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="section-register-container-left-input">
                            <button type="submit">Отправить заново</button>
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
