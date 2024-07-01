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
        const defaultTariff = "<?= $tariffs[0]->name ?>";
        const defaultMaterial = "<?= $tariffs[0]->materials[0]->name ?>";
        const route = "<?= route('public.mat.calc', $mat) ?>";
        let requestData = {
            'material': defaultMaterial,
            'tariff': defaultTariff,
            'places': new Set()
        };

        document.addEventListener("DOMContentLoaded", function (event) {
            resizeSvg();

            const inputs = document.querySelectorAll('.text-input');
            const buttonInputs = document.querySelectorAll('.button-input');

            for (const inp of inputs) {
                inp.addEventListener('change', function (event) {
                    requestData[event.target.name] = event.target.value;
                    console.log('input', event.target.name, event.target.value, requestData);
                    //     todo recalc on any requestData change (middleware)
                });
            }
        });

        document.addEventListener('click', function (event) {
            resizeSvg();
        });

        function resizeSvg() {
            const matPlaceSvgs = document.querySelectorAll('.mat-place-svg');
            const matPlaceSvgsUse = document.querySelectorAll('.mat-place-svg use');
            for (let i = 0; i < matPlaceSvgs.length; i++) {
                let bbox = matPlaceSvgsUse[i].getBBox();
                matPlaceSvgs[i].style.width = bbox.width;
                matPlaceSvgs[i].style.height = bbox.height;
            }
        }

        // todo reset all ab materials and colors on tariff change
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
                tariffOptionBlock.classList.remove('button-text--orange');
                tariffOptionBlock.classList.add('button-text');
            }

            const inpId = `tariff-input-${tariffId}`;
            const inpBlock = document.getElementById(inpId);
            inpBlock.classList.remove('button-text');
            inpBlock.classList.add('button-text--orange');
        }

        function toggleDelivery(isDelivery) {
            const delivery = document.getElementById('delivery'),
                selfDelivery = document.getElementById('self-delivery'),
                selfDeliveryList = document.getElementById('self-delivery-list');

            if (isDelivery) {
                delivery.classList.add('checkout_option--active');
                selfDelivery.classList.remove('checkout_option--active');
                selfDeliveryList.classList.add('d-none');
            } else {
                delivery.classList.remove('checkout_option--active');
                selfDelivery.classList.add('checkout_option--active');
                selfDeliveryList.classList.remove('d-none');
            }
        }

        function togglePlaces(isComplect) {
            const complectInp = document.getElementById('places-complect'),
                byOneInp = document.getElementById('places-by-one'),
                placeInputs = document.querySelectorAll('.place-input');

            if (isComplect) {
                complectInp.classList.add('button-text--orange');
                byOneInp.classList.remove('button-text--orange');

                requestData['places'].clear();
                for (const placeInp of placeInputs) {
                    placeInp.classList.add('button-text--orange');
                    requestData['places'].add(placeInp.value);
                }
            } else {
                complectInp.classList.remove('button-text--orange');
                byOneInp.classList.add('button-text--orange');
                requestData['places'].clear();
                for (const placeInp of placeInputs) placeInp.classList.remove('button-text--orange');
            }
            console.log('toggle places', requestData);
        }

        function togglePlace(placeName) {
            const btn = document.getElementById(`place-input-${placeName}`);
            if (btn.classList.contains('button-text--orange')) {
                btn.classList.remove('button-text--orange');
                requestData['places'].delete(placeName);
            } else {
                btn.classList.add('button-text--orange');
                requestData['places'].add(placeName);
            }
            console.log('toggle place', requestData);
        }

        function toggleMaterial(materialName) {
            const target = document.getElementById(`material-inp-${requestData['tariff']}-${materialName}`),
                materialInputs = document.querySelectorAll('.material-inp');

            for (const matInp of materialInputs) matInp.classList.remove('button-text--orange');
            target.classList.add('button-text--orange');

            requestData['material'] = materialName;

            console.log('material', requestData);
        }

        function calcCost() {
            $.ajax({
                type: "GET",
                url: route,
                data: requestData,
                success: function (data) {
                    console.log(data);
                }
            });
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
                                <input class="tariff-input product-type_item
                                            button-text{{ $tariff->id === $tariffs[0]->id ? '--orange' : '' }}
                                            button button-input" type="button"
                                       name="tariff"
                                       value="{{$tariff->name}}"
                                       id="tariff-input-{{$tariff->id}}"
                                       onclick="toggleTariffOptions(<?= $tariff->id ?>)"/>
                            </label>
                        @endforeach
                    </div>

                    <p class="option-title">Комплектация ковриков</p>
                    <div class="product-option">
                        <div class="product-option_one product-option_item">
                            <label>
                                <input id="places-complect" onclick="togglePlaces(true)"
                                       class="product-option_all button-text button" type="button" name="option"
                                       value="комплект"/>
                            </label>
                            <label>
                                <input id="places-by-one" onclick="togglePlaces(false)"
                                       class="product-info_option_single button-text button-text--orange button"
                                       type="button"
                                       name="option"
                                       value="По отдельности"/>
                            </label>
                        </div>
                        <div class="product-option_two product-option_item">
                            <div class="product-option_zone-image" style="width: 130px">
                                @foreach($mat->template->templateInfo->getPlaceInfosByRow() as $row => $infos)
                                    <div class="d-flex align-items-end justify-content-center" style="width: 100%">
                                        @foreach($infos as $info)
                                            <svg class="mat-place-svg d-flex"
                                                 onclick="togglePlace('<?=$info->name?>')"
                                                 style="margin-right: 2px; margin-left: 2px">
                                                <use href="{{ $info->image->path }}"></use>
                                            </svg>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            <div class="product-option_zone-name">
                                @foreach($mat->template->templateInfo->getPlaceInfosSorted() as $placeInfo)
                                    <input type="button" class="place-input button product-option_btn-text button-text"
                                           value="{{$placeInfo->name}}" id="place-input-{{$placeInfo->name}}"
                                           onclick="togglePlace('<?=$placeInfo->name?>')"/>
                                @endforeach
                                {{--                                        TODO bag_template --}}
                                <div class="product-option_btn-info-text">
                                    <input type="button"
                                           class="button product-option_btn-text product-option_btn-bag button-text"
                                           value="багажник"/>
                                </div>
                            </div>
                        </div>


                        @foreach($tariffs as $tariff)
                                <?php
                                $innerColors = $tariff->colors->filter(fn($color) => $color->type === \App\Models\Color::INNER)->all();
                                $borderColors = $tariff->colors->filter(fn($color) => $color->type === \App\Models\Color::BORDER)->all();
                                ?>
                            <div class="tariff-options {{ $tariff->id === $tariffs[0]->id ? 'd-block' : 'd-none'}}"
                                 id="tariff-options-{{$tariff->id}}">
                                <p class="option-title">Материал коврика</p>
                                <div class="product-option_three product-option_item">
                                    @foreach($tariff->materials as $material)
                                        <input type="button"
                                               class="material-inp button product-option_btn-text button-text {{ $material->id === $tariff->materials[0]->id ? 'button-text--orange' : '' }}"
                                               id="material-inp-{{$tariff->name}}-{{$material->name}}"
                                               value="{{ $material->name }}" onclick="toggleMaterial('<?=$material->name?>')"/>
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
                            </div>
                        @endforeach

                        <p class="option-title">аксессуары</p>
                        <div class="product-option_six">
                            <div class="product-option_accs">
                                @foreach($accessories as $accessory)
                                    @if ($accessory->max_count > 1)
                                        <div class="product-option_accs-item button-text">
                                            <div
                                                class="product-option_accs-item-name">{{ $accessory->name }}</div>
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
                                            <div
                                                class="product-option_accs-item-name">{{ $accessory->name }}</div>
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
                    <div id="delivery" class="delivery_option-wr checkout_option--active" type="button"
                         onclick="toggleDelivery(true)">
                        <div class="delivery_option-shipping">Доставка по городу</div>
                    </div>
                    <div id="self-delivery" class="delivery_option-wr" type="button"
                         onclick="toggleDelivery(false)">
                        <div class="delivery_option-shipping ">Самовывоз</div>
                    </div>
                </div>
                <div id="self-delivery-list" class="d-none">
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
                    </div>
                </div>
            </div>
            <div class="order-info checkout_box">
                <h3 class="checkout_title title">Контактные данные</h3>
                <div class="order-info_wr checkout_wr">
                    <input class="order-info_option checkout_option text-input" type="text" name="name" required
                           placeholder="Имя" aria-label=""/>
                    <input class="order-info_option checkout_option text-input" type="text" name="surname" required
                           placeholder="Фамилия" aria-label=""/>
                    <input class="order-info_option checkout_option text-input" type="text" name="phone" required
                           placeholder="Номер телефона" aria-label=""/>
                    <input class="order-info_option checkout_option text-input" type="text" name="email" required
                           placeholder="Почта" aria-label=""/>
                    <input class="order-info_option checkout_option text-input" type="text" name="address" required
                           placeholder="Адрес" aria-label=""/>
                    <input class="order-info_option checkout_option text-input" type="text" name="geo" required
                           placeholder="Отправить геопозицию" aria-label=""/>
                </div>
                <h3 class="checkout_title title">Комментарий к заказу</h3>
                <div class="order-info_wr">
                    <textarea class="checkout_option text-input" placeholder="Текст" aria-label=""
                              name="comment"></textarea>
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
