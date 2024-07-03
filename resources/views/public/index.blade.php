<?php
/**
 * @var \App\Models\Brand[] $brands
 * @var \App\Models\Article[] $articles
 * @var string[][] $imageUrlsChunks
 */
?>

@extends('layout')

@section('scripts')
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
        function handleClose(event, brandId) {
            closePopup(brandId);
            event.stopPropagation();
        }

        function togglePopup(event, brandId) {
            const popup = document.getElementById(`pop-up-${brandId}`);
            if (popup.style.display === "block") {
                closePopup(brandId);
            } else {
                openPopup(brandId);
            }
            event.stopPropagation();
        }

        function openPopup(brandId) {
            const popup = document.getElementById(`pop-up-${brandId}`);
            const overlay = document.getElementById(`overlay-${brandId}`);

            popup.style.display = "block";
            overlay.style.display = "block";

            setTimeout(function () {
                popup.style.opacity = 1;
            }, 0);

            document.body.classList.add("no-scroll");
            document.addEventListener("click", outsideClose(brandId));
        }

        function closePopup(brandId) {
            const popup = document.getElementById(`pop-up-${brandId}`);
            const overlay = document.getElementById(`overlay-${brandId}`);

            popup.style.opacity = 0;
            overlay.style.display = "none";

            setTimeout(function () {
                popup.style.display = "none";
            }, 1);

            document.body.classList.remove("no-scroll");
            document.removeEventListener("click", outsideClose(brandId));
        }

        function outsideClose(brandId) {
            return (event) => closePopupOutside(event, brandId);
        }

        function closePopupOutside(event, brandId) {
            const popup = document.getElementById(`pop-up-${brandId}`);
            const overlay = document.getElementById(`overlay-${brandId}`);
            const brandLogo = document.getElementById(`brandLogo-${brandId}`);

            if (!popup.contains(event.target) && !overlay.contains(event.target) && event.target !== brandLogo) {
                closePopup(brandId);
            }
        }
    </script>
@endsection

@section('content')
    <div class="hero-section">
        <div class="container">
            <div class="hero-section__wrap">
                <h1 class="title">Автомобильные<br/>Eva-коврики</h1>
                <p class="subtitle">Большой выбор цвета и окантовки</p>
            </div>
        </div>
    </div>
    <section class="features">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($articles as $article)
                    <div class="features__card col-md-4 mx-1 my-1">
                        <div class="features__title">{{$article->title}}</div>
                        <div class="features__subtitle">{{$article->content}}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="brands">
        <div class="container">
            <div class="brands-wrap">
                @foreach($brands as $brand)
                    <div class="brand-logo" onclick="togglePopup(event, {{$brand->id}})">
                        <svg class="brand-logo_image" width="100" height="100">
                            <use href="{{ $brand->image->path }}"></use>
                        </svg>
                        <p class="brand-logo_text">{{ $brand->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @foreach($brands as $brand)
            <div id="overlay-{{ $brand->id }}" onclick="closePopup({{ $brand->id }})"></div>
            <div id="pop-up-{{ $brand->id }}" class="pop-up">
                <div class="pop-up__wr">
                    <div class="pop-up_top">
                        <svg class="pop-up_logo" width="128" height="30">
                            <use href="{{ $brand->image->path }}"></use>
                        </svg>
                        <p class="pop-up_text">{{ $brand->name }}</p>
                        <button id="closePopupButton" onclick="handleClose(event, {{$brand->id}})">
                            <img src="/img/close-pop-up.svg" alt="close">
                        </button>
                    </div>
                    <div class="pop-up_main">
                        <?php /** @var \App\Models\Mat $mat */ ?>
                        @foreach($brand->mats as $mat)
                            <a href="{{ route('public.mat.show', $mat) }}" class="model">
                                <div class="model_main">
                                    <img class="model_image" src="{{ $mat->carImage->getPublicUrl() }}" loading="lazy" alt="spark"/>
                                </div>
                                <div class="model_bottom">
                                    <div class="model_info">
                                        <p class="model_name">{{ $mat->model }}</p>
                                        <p class="model_price">{{ $mat->getPrice() }}<span>сум</span></p>
                                    </div>
                                    <div class="model_button button">
                                        Купить
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <section class="gallery">
        <div class="container">
            <div class="gallery__main-wrap">
                <div class="gallery__main">
                    <img class="gallery__main-img" src="/img/gallery_thumb.webp" loading="lazy" alt="gallery"/>
                    <img class="gallery__main-img-mob" src="/img/gallery_thumb-mob.webp" loading="lazy" alt="gallery"/>
                    <div class="gallery__info">
                        <h2 class="gallery__title">Галерея</h2>
                        <p class="gallery__text">
                            Нажмите на фотографию <br/>
                            чтобы открыть галерею
                        </p>
                    </div>
                </div>
                <div class="gallery__overlay" id="galleryOverlay"></div>
                <div class="gallery__modal" id="galleryModal">
                    <div class="pswp-gallery" id="my-gallery">
                        <button class="modal-close"><img src="/img/gallery-close.svg" alt="close"></button>
                        <div class="modal-content" id="modalContent">
                            @foreach($imageUrlsChunks as $urlChunk)
                                <div class="gallery__image-row">
                                    <div class="gallery__images-group">
                                        @foreach($urlChunk as $imageUrl)
                                            <div class="gallery__image-wrap">
                                                <a href="{{ $imageUrl }}" data-pswp-width="2700"
                                                   data-pswp-height="2952" target="_blank">
                                                    <img class="gallery__image" src="{{ $imageUrl }}"
                                                         width="300"
                                                         height="328"
                                                         loading="lazy" alt=""/>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact">
        <div class="container">
            <div class="contact__wrap">
                <h2 class="contact__title title-35">
                    Оставьте заявку на консультацию и мы свяжемся с вами
                </h2>
                <form class="contact__form" method="POST" action="{{ route('public.consultation') }}">
                    @csrf
                    <input type="text" name="name" required="required" placeholder="Имя"/>
                    <input type="tel" name="phone" required="required" placeholder="+998 99 000 33 00"/>
                    <button class="contact__btn" type="submit" name="submit_btn">
                        Отправить
                    </button>
                </form>
                <p class="notify">
                    Нажимая кнопку «Отправить», вы соглашаетесь с условиями политики
                    конфиденциальности
                </p>
            </div>
        </div>
    </section>
@endsection
