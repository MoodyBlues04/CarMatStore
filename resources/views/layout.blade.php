<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" href="/css/photoswipe.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/img/site.webmanifest">
    <link rel="mask-icon" href="/img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Evacor</title>

{{--    bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @yield('styles')
    @yield('scripts')
</head>

<body>
<header class="header">
    <div class="container">
        <div class="header-top">
            <a href="/">
                <img src="/img/logo.png" loading="lazy" alt="Logo" class="logo"/>
            </a>
            @if(!auth()->guest() && auth()->user()->is_admin)
                <x-admin-nav-bar/>
            @else
                <x-user-nav-bar/>
            @endif
        </div>
    </div>
</header>
<main>
    <x-session-messages-alert/>
    @yield('content')
</main>
<footer class="footer">
    <div class="container">
        <div class="footer__top footer__top-main">
            <div class="footer__contacts">
                <div class="footer__title title-25">Контакты</div>
                <a class="footer__phone" href="tel:998901262266">998 90 126-22-66</a>
                <div class="social">
                    <a href="#" class="social__group">
                        <img src="/img/instagram.svg" loading="lazy" alt="Instagram" class="social__icon"/>
                        <span class="social__name">Instagram</span>
                    </a>
                    <a href="#" class="social__group">
                        <img src="/img/facebook.svg" loading="lazy" alt="Facebook" class="social__icon"/>
                        <span class="social__name">Facebook</span>
                    </a>
                    <a href="#" class="social__group">
                        <img src="/img/telegram.svg" loading="lazy" alt="Telegram" class="social__icon"/>
                        <span class="social__name">Telegram</span>
                    </a>
                </div>
            </div>
            <nav class="footer__menu">
                <div class="footer__title title-25">Меню</div>
                <ul class="footer__list">
                    <li>
                        <a href="{{ route('public.about') }}">О компании</a>
                    </li>
                    <li>
{{--                        TODO ??? --}}
                        <a href="/">Оформление заказа</a>
                    </li>
                    <li>
                        <a href="{{ route('public.contacts') }}">Контакты</a>
                    </li>
                </ul>
            </nav>
            <a href="/">
                <img src="/img/footer_logo.png" loading="lazy" alt="evacor" class="footer__logo"/>
            </a>
        </div>
        <div class="footer__seporator"></div>
        <div class="footer__bottom">
            <p class="footer__copyright">© Evakor, 2011 - 2023 г.</p>
            <a class="footer__policy" href="{{ route('public.privacy_policy') }}">
                Политика конфиденциальности
            </a>
            <div class="footer__author">Разработка сайта</div>
        </div>
        <div class="footer__bottom-mob">
            <div class="footer__bottom-left">
                <p class="footer__copyright">© Evakor, 2011 - 2023 г.</p>
                <a class="footer__policy" href="#">Политика конфиденциальности</a>
                <div class="footer__author">Разработка сайта</div>
            </div>
            <img src="/img/footer_logo-mob.png" alt="footer logo mobile" class="footer__logo-mob"/>
        </div>
    </div>
</footer>

<script type="module">
    import PhotoSwipeLightbox from "/js/photoswipe-lightbox.esm.js";

    const lightbox = new PhotoSwipeLightbox({
        gallery: "#my-gallery",
        children: "a",
        pswpModule: () => import("/js/photoswipe.esm.js"),
    });
    lightbox.init();
</script>
<script>
    var popup = document.getElementById("pop-up");
    var overlay = document.getElementById("overlay");
    var closePopupButton = document.getElementById("closePopupButton");

    function togglePopup(event) {
        if (popup.style.display === "block") {
            closePopup();
        } else {
            openPopup();
        }
        event.stopPropagation(); // Предотвращаем всплытие события
    }

    function openPopup() {
        popup.style.display = "block";
        overlay.style.display = "block";

        setTimeout(function () {
            popup.style.opacity = 1;
        }, 0);

        document.body.classList.add("no-scroll"); // Запрещаем прокрутку для body
        document.addEventListener("click", closePopupOutside);
    }

    function closePopup() {
        popup.style.opacity = 0;
        overlay.style.display = "none";

        setTimeout(function () {
            popup.style.display = "none";

        }, 500);

        document.body.classList.remove("no-scroll"); // Разрешаем прокрутку для body
        document.removeEventListener("click", closePopupOutside);
    }

    function closePopupOutside(event) {
        var brandLogo = document.getElementById("brandLogo");

        if (
            !popup.contains(event.target) &&
            !overlay.contains(event.target) &&
            event.target !== brandLogo
        ) {
            closePopup();
        }
    }

    document.getElementById("brandLogo").addEventListener("click", togglePopup);

    closePopupButton.addEventListener("click", function (event) {
        closePopup();
        event.stopPropagation(); // Предотвращаем всплытие события
    });
</script>
<script src="/js/main.js"></script>
</body>
</html>
