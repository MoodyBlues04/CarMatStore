<?php
/** @var \App\Models\Article[] $articles */
?>

@extends('layout')

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
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="107" height="45">
                        <use href="/img/sprite.svg#1"></use>
                    </svg>
                    <p class="brand-logo_text">aiways</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="113" height="40">
                        <use href="/img/sprite.svg#audi"></use>
                    </svg>
                    <p class="brand-logo_text">audi</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="93" height="72">
                        <use href="/img/sprite.svg#baic"></use>
                    </svg>
                    <p class="brand-logo_text">baic</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="83" height="83">
                        <use href="/img/sprite.svg#bmw"></use>
                    </svg>
                    <p class="brand-logo_text">bmw</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="81" height="81">
                        <use href="/img/sprite.svg#buick"></use>
                    </svg>
                    <p class="brand-logo_text">buick</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="126" height="26">
                        <use href="/img/sprite.svg#byd"></use>
                    </svg>
                    <p class="brand-logo_text">byd</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="117" height="46">
                        <use href="/img/sprite.svg#cadillac"></use>
                    </svg>
                    <p class="brand-logo_text">cadillac</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="78" height="70">
                        <use href="/img/sprite.svg#changan"></use>
                    </svg>
                    <p class="brand-logo_text">changan</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="108" height="36">
                        <use href="/img/sprite.svg#chery"></use>
                    </svg>
                    <p class="brand-logo_text">chery</p>
                </div>
                <div class="brand-logo" id="brandLogo">
                    <svg class="brand-logo_image" width="114" height="30">
                        <use href="/img/sprite.svg#chevrolet"></use>
                    </svg>
                    <p class="brand-logo_text">chevrolet</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="88" height="48">
                        <use href="/img/sprite.svg#daewoo"></use>
                    </svg>
                    <p class="brand-logo_text">daewoo</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="103" height="60">
                        <use href="/img/sprite.svg#daihatsu"></use>
                    </svg>
                    <p class="brand-logo_text">daihatsu</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="133" height="18">
                        <use href="/img/sprite.svg#dayun"></use>
                    </svg>
                    <p class="brand-logo_text">dayun</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="80" height="76">
                        <use href="/img/sprite.svg#denza"></use>
                    </svg>
                    <p class="brand-logo_text">denza</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="82" height="88">
                        <use href="/img/sprite.svg#dodge"></use>
                    </svg>
                    <p class="brand-logo_text">dodge</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="84" height="83">
                        <use href="/img/sprite.svg#dongfeng"></use>
                    </svg>
                    <p class="brand-logo_text">dongfeng</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="118" height="11">
                        <use href="/img/sprite.svg#enovate"></use>
                    </svg>
                    <p class="brand-logo_text">enovate</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="95" height="61">
                        <use href="/img/sprite.svg#faw"></use>
                    </svg>
                    <p class="brand-logo_text">faw</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="90" height="89">
                        <use href="/img/sprite.svg#fiat"></use>
                    </svg>
                    <p class="brand-logo_text">fiat</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="118" height="43">
                        <use href="/img/sprite.svg#ford"></use>
                    </svg>
                    <p class="brand-logo_text">ford</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="81" height="80">
                        <use href="/img/sprite.svg#foton"></use>
                    </svg>
                    <p class="brand-logo_text">foton</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="100" height="62">
                        <use href="/img/sprite.svg#gac"></use>
                    </svg>
                    <p class="brand-logo_text">gac</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="108" height="33">
                        <use href="/img/sprite.svg#geely"></use>
                    </svg>
                    <p class="brand-logo_text">geely</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="95" height="95">
                        <use href="/img/sprite.svg#hanteng"></use>
                    </svg>
                    <p class="brand-logo_text">hanteng</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="123" height="15">
                        <use href="/img/sprite.svg#haval"></use>
                    </svg>
                    <p class="brand-logo_text">haval</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="84" height="68">
                        <use href="/img/sprite.svg#honda"></use>
                    </svg>
                    <p class="brand-logo_text">honda</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="84" height="68">
                        <use href="/img/sprite.svg#hozon"></use>
                    </svg>
                    <p class="brand-logo_text">hozon</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="94" height="70">
                        <use href="/img/sprite.svg#huawei"></use>
                    </svg>
                    <p class="brand-logo_text">huawei</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="99" height="51">
                        <use href="/img/sprite.svg#hyundai"></use>
                    </svg>
                    <p class="brand-logo_text">hyundai</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="92" height="45">
                        <use href="/img/sprite.svg#infinity"></use>
                    </svg>
                    <p class="brand-logo_text">infinity</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="131" height="23">
                        <use href="/img/sprite.svg#isuzu"></use>
                    </svg>
                    <p class="brand-logo_text">isuzu</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="107" height="82">
                        <use href="/img/sprite.svg#jac"></use>
                    </svg>
                    <p class="brand-logo_text">jac</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="121" height="62">
                        <use href="/img/sprite.svg#jaguar"></use>
                    </svg>
                    <p class="brand-logo_text">jaguar</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="111" height="44">
                        <use href="/img/sprite.svg#jeep"></use>
                    </svg>
                    <p class="brand-logo_text">jeep</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="123" height="12">
                        <use href="/img/sprite.svg#jetour"></use>
                    </svg>
                    <p class="brand-logo_text">jetour</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="70" height="108">
                        <use href="/img/sprite.svg#jmc"></use>
                    </svg>
                    <p class="brand-logo_text">jmc</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="110" height="46">
                        <use href="/img/sprite.svg#kai"></use>
                    </svg>
                    <p class="brand-logo_text">kai</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="120" height="53">
                        <use href="/img/sprite.svg#karry"></use>
                    </svg>
                    <p class="brand-logo_text">karry</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="113" height="27">
                        <use href="/img/sprite.svg#kia"></use>
                    </svg>
                    <p class="brand-logo_text">kia</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="106" height="43">
                        <use href="/img/sprite.svg#lada"></use>
                    </svg>
                    <p class="brand-logo_text">lada</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="63" height="84">
                        <use href="/img/sprite.svg#leap"></use>
                    </svg>
                    <p class="brand-logo_text">leap</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="85" height="62">
                        <use href="/img/sprite.svg#lexus"></use>
                    </svg>
                    <p class="brand-logo_text">lexus</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="85" height="84">
                        <use href="/img/sprite.svg#mg"></use>
                    </svg>
                    <p class="brand-logo_text">mg</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="91" height="74">
                        <use href="/img/sprite.svg#mazda"></use>
                    </svg>
                    <p class="brand-logo_text">mazda</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="82" height="84">
                        <use href="/img/sprite.svg#mercedes-benz"></use>
                    </svg>
                    <p class="brand-logo_text">mercedes-benz</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="131" height="55">
                        <use href="/img/sprite.svg#mini"></use>
                    </svg>
                    <p class="brand-logo_text">mini</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="82" height="70">
                        <use href="/img/sprite.svg#mitsubishi"></use>
                    </svg>
                    <p class="brand-logo_text">mitsubishi</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="89" height="94">
                        <use href="/img/sprite.svg#neta"></use>
                    </svg>
                    <p class="brand-logo_text">neta</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="78" height="73">
                        <use href="/img/sprite.svg#nio"></use>
                    </svg>
                    <p class="brand-logo_text">nio</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="109" height="91">
                        <use href="/img/sprite.svg#nissan"></use>
                    </svg>
                    <p class="brand-logo_text">nissan</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="116" height="73">
                        <use href="/img/sprite.svg#opel"></use>
                    </svg>
                    <p class="brand-logo_text">opel</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="87" height="95">
                        <use href="/img/sprite.svg#pegeot"></use>
                    </svg>
                    <p class="brand-logo_text">pegeot</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="71" height="90">
                        <use href="/img/sprite.svg#porsche"></use>
                    </svg>
                    <p class="brand-logo_text">porsche</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="112" height="57">
                        <use href="/img/sprite.svg#land_rover"></use>
                    </svg>
                    <p class="brand-logo_text">land rover</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="69" height="89">
                        <use href="/img/sprite.svg#renault"></use>
                    </svg>
                    <p class="brand-logo_text">renault</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="85" height="84">
                        <use href="/img/sprite.svg#shineray"></use>
                    </svg>
                    <p class="brand-logo_text">shineray</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="83" height="84">
                        <use href="/img/sprite.svg#skoda"></use>
                    </svg>
                    <p class="brand-logo_text">skoda</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="64" height="87">
                        <use href="/img/sprite.svg#skywell"></use>
                    </svg>
                    <p class="brand-logo_text">skywell</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="82" height="87">
                        <use href="/img/sprite.svg#suzuki"></use>
                    </svg>
                    <p class="brand-logo_text">Suzuki</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="78" height="78">
                        <use href="/img/sprite.svg#tesla"></use>
                    </svg>
                    <p class="brand-logo_text">tesla</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="95" height="62">
                        <use href="/img/sprite.svg#toyota"></use>
                    </svg>
                    <p class="brand-logo_text">toyota</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="126" height="50">
                        <use href="/img/sprite.svg#uaz"></use>
                    </svg>
                    <p class="brand-logo_text">uaz</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="85" height="85">
                        <use href="/img/sprite.svg#volkswagen"></use>
                    </svg>
                    <p class="brand-logo_text">volkswagen</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="84" height="84">
                        <use href="/img/sprite.svg#volvo"></use>
                    </svg>
                    <p class="brand-logo_text">volvo</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="84" height="84">
                        <use href="/img/sprite.svg#weltmeister"></use>
                    </svg>
                    <p class="brand-logo_text">weltmeister</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="108" height="55">
                        <use href="/img/sprite.svg#xpeng"></use>
                    </svg>
                    <p class="brand-logo_text">xpeng</p>
                </div>
                <div class="brand-logo">
                    <svg class="brand-logo_image" width="99" height="61">
                        <use href="/img/sprite.svg#zaz"></use>
                    </svg>
                    <p class="brand-logo_text">zaz</p>
                </div>
            </div>
        </div>
        <div id="overlay" onclick="closePopup()"></div>
        <div id="pop-up" class="pop-up">
            <div class="pop-up__wr">
                <div class="pop-up_top">
                    <svg class="pop-up_logo" width="128" height="30">
                        <use href="/img/sprite.svg#chevrolet"></use>
                    </svg>
                    <p class="pop-up_text">chevrolet</p>
                    <button id="closePopupButton">
                        <img src="/img/close-pop-up.svg" alt="close">
                    </button>
                </div>
                <div class="pop-up_main">
                    <a href="product.html" class="model">
                        <div class="model_main">
                            <img class="model_image" src="/img/spark.png" loading="lazy" alt="spark"/>
                        </div>
                        <div class="model_bottom">
                            <div class="model_info">
                                <p class="model_name">Spark</p>
                                <p class="model_price">520.000<span>сум</span></p>
                            </div>
                            <div class="model_button button">Купить</div>
                        </div>
                    </a>
                    <a href="product.html" class="model">
                        <div class="model_main">
                            <img class="model_image" src="/img/spark.png" loading="lazy" alt="spark"/>
                        </div>
                        <div class="model_bottom">
                            <div class="model_info">
                                <p class="model_name">Spark</p>
                                <p class="model_price">520.000<span>сум</span></p>
                            </div>
                            <div class="model_button button">Купить</div>
                        </div>
                    </a>
                    <a href="product.html" class="model">
                        <div class="model_main">
                            <img class="model_image" src="/img/spark.png" loading="lazy" alt="spark"/>
                        </div>
                        <div class="model_bottom">
                            <div class="model_info">
                                <p class="model_name">Spark</p>
                                <p class="model_price">520.000<span>сум</span></p>
                            </div>
                            <div class="model_button button">Купить</div>
                        </div>
                    </a>
                    <a href="product.html" class="model">
                        <div class="model_main">
                            <img class="model_image" src="/img/spark.png" loading="lazy" alt="spark"/>
                        </div>
                        <div class="model_bottom">
                            <div class="model_info">
                                <p class="model_name">Spark</p>
                                <p class="model_price">520.000<span>сум</span></p>
                            </div>
                            <div class="model_button button">Купить</div>
                        </div>
                    </a>
                    <a href="product.html" class="model">
                        <div class="model_main">
                            <img class="model_image" src="/img/spark.png" loading="lazy" alt="spark"/>
                        </div>
                        <div class="model_bottom">
                            <div class="model_info">
                                <p class="model_name">Spark</p>
                                <p class="model_price">520.000<span>сум</span></p>
                            </div>
                            <div class="model_button button">Купить</div>
                        </div>
                    </a>
                    <a href="product.html" class="model">
                        <div class="model_main">
                            <img class="model_image" src="/img/spark.png" loading="lazy" alt="spark"/>
                        </div>
                        <div class="model_bottom">
                            <div class="model_info">
                                <p class="model_name">Spark</p>
                                <p class="model_price">520.000<span>сум</span></p>
                            </div>
                            <div class="model_button button">Купить</div>
                        </div>
                    </a>
                    <a href="product.html" class="model">
                        <div class="model_main">
                            <img class="model_image" src="/img/spark.png" loading="lazy" alt="spark"/>
                        </div>
                        <div class="model_bottom">
                            <div class="model_info">
                                <p class="model_name">Spark</p>
                                <p class="model_price">520.000<span>сум</span></p>
                            </div>
                            <div class="model_button button">Купить</div>
                        </div>
                    </a>
                    <a href="product.html" class="model">
                        <div class="model_main">
                            <img class="model_image" src="/img/spark.png" loading="lazy" alt="spark"/>
                        </div>
                        <div class="model_bottom">
                            <div class="model_info">
                                <p class="model_name">Spark</p>
                                <p class="model_price">520.000<span>сум</span></p>
                            </div>
                            <div class="model_button button">Купить</div>
                        </div>
                    </a>
                    <a href="product.html" class="model">
                        <div class="model_main">
                            <img class="model_image" src="/img/spark.png" loading="lazy" alt="spark"/>
                        </div>
                        <div class="model_bottom">
                            <div class="model_info">
                                <p class="model_name">Spark</p>
                                <p class="model_price">520.000<span>сум</span></p>
                            </div>
                            <div class="model_button button">Купить</div>
                        </div>
                    </a>
                    <a href="product.html" class="model">
                        <div class="model_main">
                            <img class="model_image" src="/img/spark.png" loading="lazy" alt="spark"/>
                        </div>
                        <div class="model_bottom">
                            <div class="model_info">
                                <p class="model_name">Spark</p>
                                <p class="model_price">520.000<span>сум</span></p>
                            </div>
                            <div class="model_button button">Купить</div>
                        </div>
                    </a>
                    <a href="product.html" class="model">
                        <div class="model_main">
                            <img class="model_image" src="/img/spark.png" loading="lazy" alt="spark"/>
                        </div>
                        <div class="model_bottom">
                            <div class="model_info">
                                <p class="model_name">Spark</p>
                                <p class="model_price">520.000<span>сум</span></p>
                            </div>
                            <div class="model_button button">Купить</div>
                        </div>
                    </a>
                    <div href="product.html" class="model">
                        <div class="model_main">
                            <img class="model_image" src="/img/spark.png" loading="lazy" alt="spark"/>
                        </div>
                        <div class="model_bottom">
                            <div class="model_info">
                                <p class="model_name">Spark</p>
                                <p class="model_price">520.000<span>сум</span></p>
                            </div>
                            <div class="model_button button">Купить</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                            <div class="gallery__image-row">
                                <div class="gallery__images-group">
                                    <div class="gallery__image-wrap">
                                        <a href="/img/gallery-image-1-thumb.webp" data-pswp-width="2700"
                                           data-pswp-height="2952" target="_blank">
                                            <img class="gallery__image" src="/img/gallery-image-1-thumb.webp"
                                                 width="300"
                                                 height="328"
                                                 loading="lazy" alt=""/>
                                        </a>
                                    </div>
                                </div>
                            </div>
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
                <form class="contact__form" name="feedback" method="POST" action="/feedback.php">
                    <input type="text" name="name" required="required" placeholder="Имя"/>

                    <input type="phone" name="phone" required="required" placeholder="+998 99 000 33 00"/>

                    <input class="contact__btn" type="submit" name="submit_btn" value="Отправить"/>
                </form>
                <p class="notify">
                    Нажимая кнопку «Отправить», вы соглашаетесь с условиями политики
                    конфиденциальности
                </p>
            </div>
        </div>
    </section>
@endsection
