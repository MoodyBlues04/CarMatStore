<header>
    <div class="container">
        <div class="header-container">
            <a href="{{ route('public.index') }}" class="header-container-logo">
                Logo
            </a>
            <ul class="header-container-menu">
                <li>
                    <a href="{{ route('public.index') }}">Главная</a>
                </li>
                <li>
                    <a href="{{ route('public.about_us') }}">О нас</a>
                </li>
                <li>
                    <a href="{{ route('public.clients') }}">Наши клиенты</a>
                </li>
                <li>
                    <a href="{{ route('public.feedback') }}">Отзывы</a>
                </li>
                <li>
                    <a href="{{ route('public.contacts') }}">Контакты</a>
                </li>
            </ul>
            <div class="header-container-right">
                <a href="{{ route('auth.login_page') }}" type="button" class="btn-sign-in">Войти</a>
                <a href="{{ route('auth.register_page') }}" type="button" class="btn-log-in">Регистрация</a>
            </div>
            <div class="hamburger-menu">
                <input id="menu__toggle" type="checkbox" />
                <label class="menu__btn" for="menu__toggle">
                    <span class="span-burger"></span>
                </label>
                <ul class="menu__box">
                    <li class="content-burger">
                        <ul class="list-header">
                            <li>
                                <a href="{{ route('public.index') }}">
                                    Главная
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('public.about_us') }}">
                                    БЛОГ
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('public.contacts') }}">
                                    КОНТАКТЫ
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
