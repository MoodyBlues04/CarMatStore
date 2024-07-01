<?php
/**
 * @var \App\Models\MatTariff[] $tariffs
 * @var \App\Models\Mat $mat
 * @var \App\Models\Accessory[] $accessories
 * @var \App\Models\Emblem[] $emblems
 */
?>

@extends('layout')

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            const matPlaceSvgs = document.querySelectorAll('.mat-place-svg');
            const matPlaceSvgsUse = document.querySelectorAll('.mat-place-svg use');
            for (let i = 0; i < matPlaceSvgs.length; i++) {
                let bbox = matPlaceSvgsUse[i].getBBox();
                matPlaceSvgs[i].style.width = bbox.width;
                matPlaceSvgs[i].style.height = bbox.height;
            }
        });

        function toggleTariffOptions(tariffId) {
            const tariffOptions = document.getElementsByClassName('tariff-options');
            for (const tariffOptionBlock of tariffOptions) {
                tariffOptionBlock.classList.remove('d-block');
                tariffOptionBlock.classList.add('d-none');
            }

            const id = `tariff-options-${tariffId}`;
            const targetBlock = document.getElementById(id);
            targetBlock.classList.remove('d-none');
            targetBlock.classList.add('d-block');

            const inpBlocks = document.getElementsByClassName('tariff-input');
            for (const tariffOptionBlock of inpBlocks) {
                tariffOptionBlock.style.removeProperty('background-color');
                tariffOptionBlock.style.removeProperty('color');
            }

            const inpId = `tariff-input-${tariffId}`;
            const inpBlock = document.getElementById(inpId);
            inpBlock.style.backgroundColor = '#ff3600';
            inpBlock.style.color = 'white';
        }
    </script>
@endsection

@section('content')
    <section class="product">
        <div class="container">
            <div class="crumbs">
                <a href="/" class="crumb">Главная</a>
                <svg width="5" height="10">
                    <use href="/img/sprite.svg#arrow"></use>
                </svg>

                <a href="#" class="crumb" style="pointer-events: none">Покупка ковриков</a href="#">
            </div>
            <div class="product_wrap">
                <div class="product_media">
                    <h1 class="product_title">{{$mat->model}}</h1>
                    <img class="product_gallery" src="/img/gallery.png" alt="auto mat"/>
                    <img class="product_gallery-mob" src="/img/prodict-image-mob.png" alt="auto mat"/>
                </div>
                <div class="product-info">
                    <div class="product-type">
                        @foreach($tariffs as $tariff)
                            <label>
                                <input class="tariff-input product-type_item button-text button" type="button"
                                       name="position"
                                       value="{{$tariff->name}}"
                                       @if ($tariff->id === $tariffs[0]->id)
                                           style="background-color: #ff3600; color: white"
                                       @endif
                                       id="tariff-input-{{$tariff->id}}"
                                       onclick="toggleTariffOptions(<?= $tariff->id ?>)"/>
                            </label>
                        @endforeach
                    </div>

                    <p class="option-title">Комплектация ковриков</p>
                    <div class="product-option">

                        <div class="product-option_one product-option_item">
                            <label>
                                <input class="product-option_all button-text button" type="button" name="option"
                                       value="комплект" id="All"/>
                            </label>
                            <label>
                                <input class="product-info_option_single button-text button" type="button"
                                       name="option"
                                       id="single" value="По отдельности"/>
                            </label>
                        </div>
                        <div class="product-option_two product-option_item">
                            <div class="product-option_zone-image" style="width: 130px">
                                @foreach($mat->template->templateInfo->getPlaceInfosByRow() as $row => $infos)
                                    <div class="d-flex align-items-end justify-content-center" style="width: 100%">
                                        @foreach($infos as $info)
                                            <svg class="mat-place-svg d-flex"
                                                 style="margin-right: 2px; margin-left: 2px">
                                                <use href="{{ $info->image->path }}"></use>
                                            </svg>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            <div class="product-option_zone-name">
                                @foreach($mat->template->templateInfo->getPlaceInfosSorted() as $placeInfo)
                                    <input type="button" class="button product-option_btn-text button-text"
                                           value="{{$placeInfo->name}}"/>
                                @endforeach
                                {{--                                        TODO bag_template --}}
                                <div class="product-option_btn-info-text">
                                    <input type="button"
                                           class="button product-option_btn-text product-option_btn-bag button-text"
                                           value="багажник"/>
                                </div>
                            </div>
                        </div>

                        <p class="option-title">Материал коврика</p>
                        @foreach($tariffs as $tariff)
                            <?php
                                $innerColors = $tariff->colors->filter(fn($color) => $color->type === \App\Models\Color::INNER)->all();
                                $borderColors = $tariff->colors->filter(fn($color) => $color->type === \App\Models\Color::BORDER)->all();
                            ?>
                            <div class="tariff-options {{ $tariff->id === $tariffs[0]->id ? 'd-block' : 'd-none'}}"
                                 id="tariff-options-{{$tariff->id}}">
                                <div class="product-option_three product-option_item">
                                    @foreach($tariff->materials as $material)
                                        <input type="button" class="button product-option_btn-text button-text"
                                               value="{{ $material->name }}"/>
                                    @endforeach
                                </div>
                                <p class="option-title">цвет коврика</p>
                                <div class="product-option_four product-option_item d-flex">
                                    <div class="product-option_color-main d-flex">
                                        @foreach($innerColors as $color)
                                            <input type="button"
                                                   class="button product-option_btn-color button-text"
                                                   style="background-color: {{ $color->hex }}"
                                                   value=""/>
                                        @endforeach
                                        {{--                                <input type="button" class="button product-option_carpet-color-btn button-text"--}}
                                        {{--                                       id="zone77" value="Синий"/>--}}
                                    </div>
                                </div>
                                <p class="option-title">цвет окантовки</p>
                                <div class="product-option_five product-option_item d-flex">
                                    <div class="product-option_border-color d-flex">
                                        @foreach($borderColors as $color)
                                            <input type="button"
                                                   class="button product-option_btn-color button-text"
                                                   style="background-color:  {{ $color->hex }}"
                                                   value=""/>
                                        @endforeach
                                        {{--                                <input type="button" class="button product-option_carpet-border-color-btn button-text"--}}
                                        {{--                                       id="zone77" value="Синий"/>--}}
                                    </div>
                                </div>

                                <p class="option-title">аксессуары</p>
                                <div class="product-option_six">
                                    <div class="product-option_accs">
                                        @foreach($accessories as $accessory)
                                            @if ($accessory->max_count > 1)
                                                <div class="product-option_accs-item button-text">
                                                    <div class="product-option_accs-item-name">{{ $accessory->name }}</div>
                                                    <div class="product-option_accs-item-wr">
                                                        <img class="product-option_accs-item-btn" src="/img/minus.svg"
                                                             alt="minus"/>
                                                        <div class="product-option_accs-item-number">0</div>
                                                        <img class="product-option_accs-item-btn" src="/img/plus.svg"
                                                             alt="minus"/>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="product-option_accs-item button-text">
                                                    <div class="product-option_accs-item-name">{{ $accessory->name }}</div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="product-option_seven">
                                    <div class="product-option_logo">
                                        <div class="product-option_logo-text">Эмблема</div>
                                        <p class="option-title product-option_logo-title">Эмблема</p>
                                        <div class="product-option_logo-qty">
                                            <img class="product-option_accs-item-btn" src="/img/minus.svg" alt="minus"/>
                                            <div class="product-option_logo-number">0</div>
                                            <img class="product-option_accs-item-btn" src="/img/plus.svg" alt="minus"/>
                                        </div>
                                    </div>
                                    <div class="product-option_logo-images">
                                        @foreach($emblems as $emblem)
                                            <div class="product-option_logo-image">
                                                <svg width="24" height="9">
                                                    <use href="{{$emblem->image->path}}"></use>
                                                </svg>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="product-option_logo-qty-mob">
                                        <img class="product-option_accs-item-btn" src="/img/minus.svg" alt="minus"/>
                                        <div class="product-option_logo-number">12</div>
                                        <img class="product-option_accs-item-btn" src="/img/plus.svg" alt="minus"/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="price">
                <p class="price_title title">чек</p>
                <div class="items">
                    <div class="item item-white">
                        <div class="item_mob-wr">
                            <p class="item_title">Комплектация ковриков</p>
                            <div class="item_price-mob">100.000 сум</div>
                        </div>
                        <div class="item_qty">
                            <div class="item_qty-control">
                                <img class="item_btn" src="/img/minus.svg" alt="minus"/>
                                <div class="item_number">7</div>
                                <img class="item_btn" src="/img/plus.svg" alt="minus"/>
                            </div>
                            <div class="item_price">100.000 сум</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item_mob-wr">
                            <p class="item_title">материал коврика</p>
                            <div class="item_price-mob">70.000 сум</div>
                        </div>
                        <div class="item_qty">
                            <div class="item_qty-control">
                                <img class="item_btn" src="/img/minus.svg" alt="minus"/>
                                <div class="item_number">7</div>
                                <img class="item_btn" src="/img/plus.svg" alt="minus"/>
                            </div>
                            <div class="item_price">100.000 сум</div>
                        </div>
                    </div>
                    <div class="item item-white">
                        <div class="item_mob-wr">
                            <p class="item_title">Аксессуары</p>
                            <div class="item_price-mob">70.000 сум</div>
                        </div>
                        <div class="item_qty">
                            <div class="item_qty-control">
                                <img class="item_btn" src="/img/minus.svg" alt="minus"/>
                                <div class="item_number">7</div>
                                <img class="item_btn" src="/img/plus.svg" alt="minus"/>
                            </div>
                            <div class="item_price">10.000 сум</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item_mob-wr">
                            <p class="item_title">Клипсы</p>
                            <div class="item_price-mob">70.000 сум</div>
                        </div>
                        <div class="item_qty">
                            <div class="item_qty-control">
                                <img class="item_btn" src="/img/minus.svg" alt="minus"/>
                                <div class="item_number">7</div>
                                <img class="item_btn" src="/img/plus.svg" alt="minus"/>
                            </div>
                            <div class="item_price">10.000 сум</div>
                        </div>
                    </div>
                    <div class="item item-white">
                        <div class="item_mob-wr">
                            <p class="item_title">Эмблема</p>
                            <div class="item_price-mob">70.000 сум</div>
                        </div>
                        <div class="item_qty">
                            <div class="item_qty-control">
                                <img class="item_btn" src="/img/minus.svg" alt="minus"/>
                                <div class="item_number">7</div>
                                <img class="item_btn" src="/img/plus.svg" alt="minus"/>
                            </div>
                            <div class="item_price">10.000 сум</div>
                        </div>
                    </div>
                </div>
                <div class="price_total">
                    <p class="price_total-text title">Итог</p>
                    <div class="price_total-wrap">
                        <p class="price_total-hint">
                            Перейдите ниже для оформления заказа
                        </p>
                        <p class="price_total-number"><span>785</span>000 сум</p>
                    </div>
                </div>
                <span class="price_total-hint-mob">
          Перейдите ниже для оформления заказа
        </span>
            </div>
        </div>
    </section>
    <section class="checkout">
        <div class="container">
            <h2>Оформление заказа</h2>
            <div class="delivery checkout_box">
                <h3 class="checkout_title title">Доставка</h3>
                <div class="delivery_wr checkout_wr">
                    <div class="delivery_option-wr">
                        <div class="delivery_option-shipping">Доставка по городу</div>
                    </div>
                    <p class="delivery_option checkout_option checkout_option--active">
                        Самовывоз
                    </p>
                </div>
                <h3 class="checkout_title title">Самовывоз</h3>
                <div class="delivery_wr">
                    <p class="delivery_option checkout_option">
                        ателье в юнусабадском районе
                    </p>
                    <p class="delivery_option checkout_option">
                        ателье в шойхантаурском районе
                    </p>
                    <p class="delivery_option checkout_option">
                        ателье в яккасарайском районе
                    </p>
                    <p class="delivery_map">Показать на карте</p>
                </div>
            </div>
            <div class="order-info checkout_box">
                <h3 class="checkout_title title">Контактные данные</h3>
                <div class="order-info_wr checkout_wr">
                    <input class="order-info_option checkout_option" type="text" placeholder="Имя"/>
                    <input class="order-info_option checkout_option" type="text" placeholder="Фамилия"/>
                    <input class="order-info_option checkout_option" type="text" placeholder="Номер телефона"/>
                    <input class="order-info_option checkout_option" type="text" placeholder="Почта"/>
                    <input class="order-info_option checkout_option" type="text" placeholder="Адрес"/>
                    <input class="order-info_option checkout_option" type="text" placeholder="Отправить геопозицию"/>
                </div>
                <h3 class="checkout_title title">Комментарий к заказу</h3>
                <div class="order-info_wr">
                    <textarea class="checkout_option" placeholder="Текст"></textarea>
                </div>
            </div>
            <div class="payment checkout_box">
                <div class="payment_total">
                    <h3 class="payment_total-title title">Итоговая цена заказа</h3>
                    <div class="payment_total-wr">
                        <p class="payment_total-price"><span>785</span>000 сум</p>
                        <button class="payment_button">подтвердить</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
