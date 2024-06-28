@extends('layout')

@section('content')
    <section class="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="margin-top: 30px; margin-bottom: 30px">
                    <div class="card">
                        <div class="card-header">{{ __('Верификация почты') }}</div>

                        <p>Для того, чтобы продолжить, пожалуйста проверьте вашу почту (возможно наше письмо находится в
                            папке спам) и перейдите по ссылке для подтверждения вашей почты. Если письмо не пришло,
                            нажмите кнопку - отправить заново.</p>

                        <div class="card-body">
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <div class="section-register-container-left-input">
                                    <x-submit-button name="Отправить заново"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
