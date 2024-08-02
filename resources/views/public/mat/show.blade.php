<?php
/**
 * @var \App\Models\MatTariff[] $tariffs
 * @var \App\Models\Mat $mat
 * @var \App\Models\Accessory[] $accessories
 * @var \App\Models\Emblem[] $emblems
 */
$accessoryNames = json_encode(array_map(fn($item) => $item->name, $accessories));
?>

@extends('layout')

@section('scripts')
    <script>
        const CALC_ROUTE = "<?= route('public.mat.calc', $mat) ?>";
        const BUY_ROUTE = "<?= route('public.mat.buy', $mat) ?>";
        const IMAGE_ROUTE = "<?= route('public.mat.image') ?>";

        const accessoriesNames = <?= $accessoryNames ?>;
        let accessory = {};
        for (const accessoryName of accessoriesNames) accessory[accessoryName] = 0;
        const defaultTariff = "<?= $tariffs[0]->name ?>";
        const defaultMaterial = "<?= $tariffs[0]->materials[0]->name ?>";
        let requestData = {
            'saloon': {
                'tariff': defaultTariff,
                'material': defaultMaterial,
                'accessory': {...accessory},
                'places': new Set(),
                'emblem': null,
                'color': null,
                'border_color': null,
            },
            'bag': {
                'tariff': defaultTariff,
                'material': defaultMaterial,
                'accessory': {...accessory},
                'places': new Set(),
                'emblem': null,
                'color': null,
                'border_color': null,
            },

            // for buy request
            'client_data': {},
            'delivery': {},
        };

        document.addEventListener("DOMContentLoaded", function (event) {
            resizeSvg();

            const inputs = document.querySelectorAll('.text-input');
            for (const inp of inputs) {
                inp.addEventListener('change', function (event) {
                    requestData['client_data'][event.target.name] = event.target.value;
                });
            }
        });
        document.addEventListener('click', function (event) {
            closePopupOutside(event);
            resizeSvg();
            updateMatImage();
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

        function updateMatImage() {
            for (const type of ['saloon', 'bag']) {
                const matImage = document.getElementById(`mat-img-${type}`);

                console.log('get image url', requestData);
                $.ajax({
                    type: "GET",
                    url: IMAGE_ROUTE,
                    data: requestData[type],
                    success: function (data) {
                        if (!data['status']) {
                            console.error(data);
                        }
                        matImage.src = data['data']['url'];
                    }
                });
            }
        }

        function toggleTariffOptions(tariffName, type = 'saloon') {
            if (requestData[type]['tariff'] === tariffName) {
                return;
            }
            requestData[type]['tariff'] = tariffName;
            requestData[type]['color'] = null;
            requestData[type]['border_color'] = null;
            requestData[type]['material'] = defaultMaterial;

            const tariffOptions = document.getElementsByClassName(`tariff-options-${type}`);
            for (const tariffOptionBlock of tariffOptions) {
                tariffOptionBlock.classList.remove('d-block');
                tariffOptionBlock.classList.add('d-none');
            }

            const id = `tariff-options-${tariffName}-${type}`;
            const targetBlock = document.getElementById(id);
            targetBlock.classList.remove('d-none');
            targetBlock.classList.add('d-block');

            const inpBlocks = document.getElementsByClassName(`tariff-input-${type}`);
            for (const tariffOptionBlock of inpBlocks) {
                tariffOptionBlock.classList.remove('button-text--orange');
                tariffOptionBlock.classList.add('button-text');
            }

            const inpId = `tariff-input-${tariffName}-${type}`;
            const inpBlock = document.getElementById(inpId);
            inpBlock.classList.remove('button-text');
            inpBlock.classList.add('button-text--orange');

            calcCost();
        }

        function toggleDelivery(isDelivery) {
            const delivery = document.getElementById('delivery'),
                selfDelivery = document.getElementById('self-delivery'),
                selfDeliveryList = document.getElementById('self-delivery-list');

            requestData['delivery']['type'] = isDelivery ? 'delivery' : 'self_delivery';
            if (isDelivery) {
                requestData['delivery']['where'] = null;
            }

            if (isDelivery) {
                delivery.classList.add('checkout_option--active');
                selfDelivery.classList.remove('checkout_option--active');
                selfDeliveryList.classList.add('d-none');
                removeSelectedSelfDelivery();
            } else {
                delivery.classList.remove('checkout_option--active');
                selfDelivery.classList.add('checkout_option--active');
                selfDeliveryList.classList.remove('d-none');
            }

            calcCost();
        }

        function choseSelfDeliveryFrom(target) {
            removeSelectedSelfDelivery();
            target.classList.add('checkout_option--active');
        }

        function removeSelectedSelfDelivery() {
            const blocks = document.querySelectorAll('.delivery_option');
            for (const block of blocks) {
                block.classList.remove('checkout_option--active');
            }
        }

        function togglePlaces(isComplect) {
            const complectInp = document.getElementById('places-complect'),
                byOneInp = document.getElementById('places-by-one'),
                placeInputs = document.querySelectorAll('.place-input-saloon');

            if (isComplect) {
                complectInp.classList.add('button-text--orange');
                byOneInp.classList.remove('button-text--orange');

                requestData['saloon']['places'].clear();
                for (const placeInp of placeInputs) {
                    placeInp.classList.add('button-text--orange');
                    requestData['saloon']['places'].add(placeInp.value);
                }
            } else {
                complectInp.classList.remove('button-text--orange');
                byOneInp.classList.add('button-text--orange');
                requestData['saloon']['places'].clear();
                for (const placeInp of placeInputs) placeInp.classList.remove('button-text--orange');
            }
            calcCost();
        }

        function togglePlace(placeName, type = 'saloon') {
            const btn = document.getElementById(`place-input-${placeName}-${type}`);
            requestData[type]['places'] = new Set(requestData[type]['places']);
            console.log(type, requestData[type]['places'])
            if (btn.classList.contains('button-text--orange')) {
                btn.classList.remove('button-text--orange');
                requestData[type]['places'].delete(placeName);
            } else {
                btn.classList.add('button-text--orange');
                requestData[type]['places'].add(placeName);
            }
            calcCost();
        }

        function toggleMaterial(materialName, type='saloon') {
            const target = document.getElementById(`material-inp-${requestData[type]['tariff']}-${materialName}-${type}`),
                materialInputs = document.querySelectorAll(`.material-inp-${type}`);

            for (const matInp of materialInputs) matInp.classList.remove('button-text--orange');
            target.classList.add('button-text--orange');

            requestData[type]['material'] = materialName;

            calcCost();
        }

        function toggleColor(colorName, type='saloon') {
            const colorId = `chosen_color-${requestData[type]['tariff']}-${type}`
            document.getElementById(colorId).value = colorName;
            requestData[type]['color'] = colorName;
            calcCost();
        }

        function toggleBorderColor(colorName, type='saloon') {
            const colorId = `chosen_border_color-${requestData[type]['tariff']}-${type}`
            document.getElementById(colorId).value = colorName;
            requestData[type]['border_color'] = colorName;
            calcCost();
        }

        function changeAccessory(accessoryName, toAdd, type='saloon') {
            const target = document.getElementById(`accessory_cnt_${accessoryName}_${type}`);
            const maxCnt = target.getAttribute('data-max-count');
            let toSet = requestData[type]['accessory'][accessoryName] + toAdd;
            if (0 > toSet || toSet > maxCnt) {
                return;
            }
            requestData[type]['accessory'][accessoryName] = toSet;
            target.textContent = toSet;
            calcCost();
        }

        function toggleEmblem(emblemName, type='saloon') {
            const target = document.getElementById(`emblem-inp-${emblemName}-${type}`),
                emblemInputs = document.querySelectorAll(`.emblem-inp-${type}`),
                emblemCounter = document.getElementById(`embl-cnt-${type}`);

            for (const emblemInp of emblemInputs) {
                emblemInp.style.backgroundColor = '';
                emblemInp.style.borderColor = '';
            }

            if (emblemName === requestData[type]['emblem']) {
                requestData[type]['emblem'] = null;
                emblemCounter.textContent = 0;
            } else {
                target.style.backgroundColor = '#ff3600';
                target.style.borderColor = '#ff3600';
                emblemCounter.textContent = +(requestData[type]['emblem'] === null);
                requestData[type]['emblem'] = emblemName;
            }
            calcCost();
        }

        function calcCost() {
            console.log('calc cost', requestData);
            $.ajax({
                type: "GET",
                url: CALC_ROUTE,
                data: makeCalcRequest(),
                success: function (data) {
                    if (!data['status']) {
                        console.error(data);
                    }
                    console.log('calc data', data);
                    updateBill(data['data']);
                }
            });
        }

        function buy() {
            $.ajax({
                type: "POST",
                url: BUY_ROUTE,
                data: makeCalcRequest(),
                success: function (data) {
                    if (!data['status']) {
                        console.error(data);
                    }
                },
                error: function (data) {
                    console.error(data);
                    alert('Incorrect input. Errors:\n' + data['responseJSON']['message']);
                }
            });
        }

        function updateBill(bill) {
            const target = document.getElementById('bill');
            target.innerHTML = '';
            let totalPrice = 0, i = 0;
            for (const billRow of bill) {
                i++;
                if (billRow['price']) {
                    totalPrice += billRow['price'];
                }
                target.appendChild(makeDomEl(
                    '<div class="item ' + (i % 2 === 1 ? 'item-white' : '') + '">' +
                    '<div class="item_mob-wr" style="font-weight: 600">' +
                    `<p class="item_title" style="margin-bottom: -2px">${billRow['name']}</p>` +
                    '</div>' +
                    '<div class="item_qty">' +
                    (billRow['count'] ? '<div class="item_qty-control">' +
                        '<img class="item_btn" src="/img/minus.svg" alt="minus"/>' +
                        `<div class="item_number">${billRow['count']}</div>` +
                        '<img class="item_btn" src="/img/plus.svg" alt="minus"/>' +
                        '</div>'
                        : '') +
                    (billRow['price'] ? `<div class="item_price">${billRow['price']} сум</div>` : '') +
                    '</div>' +
                    '</div>'
                ));
            }

            const billPriceEls = document.querySelectorAll('.bill-price');
            for (const priceEl of billPriceEls) {
                priceEl.innerHTML = '';
                priceEl.innerText = totalPrice + ' сум';
            }
        }

        function makeCalcRequest() {
            let req = {...requestData};
            req['saloon']['places'] = Array.from(req['saloon']['places']);
            req['bag']['places'] = Array.from(req['bag']['places']);
            return req;
        }

        function makeDomEl(htmlString) {
            let div = document.createElement('div');
            div.innerHTML = htmlString.trim();
            return div.firstChild;
        }


        //     pop-up

        function handleClose(event) {
            closePopup();
            event.stopPropagation();
        }

        function togglePopup(event) {
            const popup = document.getElementById('pop-up');
            if (popup.style.display === "block") {
                closePopup();
            } else {
                openPopup();
            }
            event.stopPropagation();
        }

        function openPopup() {
            const popup = document.getElementById('pop-up');
            const overlay = document.getElementById('overlay');

            popup.style.display = "block";
            overlay.style.display = "block";

            setTimeout(function () {
                popup.style.opacity = 1;
            }, 0);

            document.body.classList.add("no-scroll");
        }

        function closePopup() {
            const popup = document.getElementById('pop-up');
            const overlay = document.getElementById('overlay');

            popup.style.opacity = 0;
            overlay.style.display = "none";

            setTimeout(function () {
                popup.style.display = "none";
            }, 1);

            document.body.classList.remove("no-scroll");
        }

        function outsideClose() {
            return (event) => closePopupOutside(event);
        }

        function closePopupOutside(event) {
            const popup = document.getElementsByClassName('pop-up__wr')[0];
            const overlay = document.getElementById('overlay');
            const btn = document.getElementById('pop-up-open');

            if (!popup.contains(event.target) && event.target !== btn) {
                closePopup();
            }
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

                <a href="#" class="crumb" style="pointer-events: none">Покупка ковриков</a>
            </div>
            <div class="product_wrap">
                <div class="product_media">
                    <h1 class="product_title">{{$mat->brand->name}} {{$mat->model}}</h1>
                    <img id="mat-img-saloon" class="product_gallery" src="/img/gallery.png" alt="auto mat"
                         style="max-width: 600px"/>
                    <img class="product_gallery-mob" src="/img/prodict-image-mob.png" alt="auto mat"/>
                </div>
                <div class="product-info">
                    <div class="product-type">
                        @foreach($tariffs as $tariff)
                            <label>
                                <input class="tariff-input-saloon product-type_item
                                            button-text{{ $tariff->id === $tariffs[0]->id ? '--orange' : '' }}
                                            button" type="button"
                                       name="tariff"
                                       value="{{$tariff->name}}"
                                       id="tariff-input-{{$tariff->name}}-saloon"
                                       onclick="toggleTariffOptions('<?= $tariff->name ?>')"/>
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
                                <?php
                                function makeTemplateImagesBlock(array $templateInfos, string $type): string
                                {
                                    $res = '';
                                    foreach ($templateInfos as $row => $infos) {
                                        $res .= '<div class="d-flex align-items-end justify-content-center" style="width: 100%">';
                                        foreach ($infos as $info) {
                                            $res .= '<svg class="mat-place-svg d-flex"
                                                     onclick="togglePlace(' . "'$info->name', '$type'" . ')"
                                                     style="margin-right: 2px; margin-left: 2px">
                                                    <use href="' . $info->image->path . '"></use>
                                                </svg>';
                                        }
                                        $res .= '</div>';
                                    }
                                    return $res;
                                }
                                ?>
                                <?= makeTemplateImagesBlock($mat->template->templateInfo->getPlaceInfosByRow(), 'saloon') ?>
                                {{--                            <?= makeTemplateImagesBlock($mat->bagTemplate->templateInfo->getPlaceInfosByRow()) ?>--}}
                                {{--                            --}}
                            </div>

                            <div class="product-option_zone-name">
                                <?php
                                function makeTemplateLabelBlock(array $templateInfos, string $type): string
                                {
                                    $res = '';
                                    foreach ($templateInfos as $placeInfo) {
                                        $res .= '<input type="button" class="place-input-' . $type . ' button product-option_btn-text button-text"
                                           value="' . $placeInfo->name . '" id="place-input-' . "$placeInfo->name-$type" . '"
                                           onclick="togglePlace(' . "'$placeInfo->name', '$type'" . ')"/>';
                                    }
                                    return $res;
                                }
                                ?>
                                <?= makeTemplateLabelBlock($mat->template->templateInfo->getPlaceInfosSorted(), 'saloon'); ?>

                                <input
                                    type="button"
                                    class="button product-option_btn-text product-option_btn-bag button-text"
                                    id="pop-up-open"
                                    value="багажник"
                                    onclick="togglePopup()"
                                />

                            </div>
                        </div>

                        @foreach($tariffs as $tariff)
                                <?php
                                $innerColors = $tariff->colors->filter(fn($color) => $color->type === \App\Models\Color::INNER)->all();
                                $borderColors = $tariff->colors->filter(fn($color) => $color->type === \App\Models\Color::BORDER)->all();
                                ?>
                            <div
                                class="tariff-options-saloon {{ $tariff->id === $tariffs[0]->id ? 'd-block' : 'd-none'}}"
                                id="tariff-options-{{$tariff->name}}-saloon">
                                <p class="option-title">Материал коврика</p>
                                <div class="product-option_three product-option_item">
                                    @foreach($tariff->materials as $material)
                                        <input type="button"
                                               class="material-inp-saloon button product-option_btn-text button-text {{ $material->id === $tariff->materials[0]->id ? 'button-text--orange' : '' }}"
                                               id="material-inp-{{$tariff->name}}-{{$material->name}}-saloon"
                                               value="{{ $material->name }}"
                                               onclick="toggleMaterial('<?=$material->name?>')"/>
                                    @endforeach
                                </div>
                                <p class="option-title">цвет коврика</p>
                                <div class="product-option_four product-option_item d-flex">
                                    <div class="product-option_color-main d-flex">
                                        @foreach($innerColors as $color)
                                            <input type="button"
                                                   class="button product-option_btn-color button-text"
                                                   style="background-color: {{ $color->hex }}"
                                                   onclick="toggleColor('<?=$color->name?>')"/>
                                        @endforeach
                                        <input type="button" class="button product-option_carpet-color-btn button-text"
                                               id="chosen_color-{{$tariff->name}}-saloon" value="not chosen"/>
                                    </div>
                                </div>
                                <p class="option-title">цвет окантовки</p>
                                <div class="product-option_five product-option_item d-flex">
                                    <div class="product-option_border-color d-flex">
                                        @foreach($borderColors as $color)
                                            <input type="button"
                                                   class="button product-option_btn-color button-text"
                                                   style="background-color:  {{ $color->hex }}"
                                                   onclick="toggleBorderColor('<?=$color->name?>')"/>
                                        @endforeach
                                        <input type="button" class="button product-option_carpet-color-btn button-text"
                                               id="chosen_border_color-{{$tariff->name}}-saloon" value="not chosen"/>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <p class="option-title">аксессуары</p>
                        <div class="product-option_six">
                            <div class="product-option_accs">
                                @foreach($accessories as $accessory)
                                    <div class="product-option_accs-item button-text">
                                        <div class="product-option_accs-item-name">{{ $accessory->name }}</div>
                                        <div class="product-option_accs-item-wr">
                                            <img class="product-option_accs-item-btn" src="/img/minus.svg"
                                                 alt="minus" onclick="changeAccessory('<?=$accessory->name?>', -1)"
                                                 style="cursor:pointer;"/>
                                            <div id="accessory_cnt_{{$accessory->name}}_saloon"
                                                 class="product-option_accs-item-number"
                                                 data-max-count="{{$accessory->max_count}}">
                                                0
                                            </div>
                                            <img class="product-option_accs-item-btn" src="/img/plus.svg"
                                                 alt="minus" onclick="changeAccessory('<?=$accessory->name?>', 1)"
                                                 style="cursor:pointer;"/>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="product-option_seven">
                            <div class="product-option_logo">
                                <div class="product-option_logo-text">Эмблема</div>
                                <p class="option-title product-option_logo-title">Эмблема</p>
                                <div class="product-option_logo-qty">
                                    <img class="product-option_accs-item-btn" src="/img/minus.svg" alt="minus"/>
                                    <div class="product-option_logo-number" id="embl-cnt-saloon">0</div>
                                    <img class="product-option_accs-item-btn" src="/img/plus.svg" alt="minus"/>
                                </div>
                            </div>
                            <div class="product-option_logo-images">
                                @foreach($emblems as $emblem)
                                    <div id="emblem-inp-{{$emblem->name}}-saloon" class="emblem-inp-saloon product-option_logo-image"
                                         onclick="toggleEmblem('<?=$emblem->name?>')">
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
                <div class="items" id="bill">
                </div>
                <div class="price_total">
                    <p class="price_total-text title">Итог</p>
                    <div class="price_total-wrap">
                        <p class="price_total-hint">
                            Перейдите ниже для оформления заказа
                        </p>
                        <p class="price_total-number bill-price">0 сум</p>
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
                        <p class="delivery_option checkout_option"
                           onclick="choseSelfDeliveryFrom(this)"
                           style="cursor:pointer;">
                            ателье в юнусабадском районе
                        </p>
                        <p class="delivery_option checkout_option"
                           onclick="choseSelfDeliveryFrom(this)"
                           style="cursor:pointer;">
                            ателье в шойхантаурском районе
                        </p>
                        <p class="delivery_option checkout_option"
                           onclick="choseSelfDeliveryFrom(this)"
                           style="cursor:pointer;">
                            ателье в яккасарайском районе
                        </p>
                    </div>
                </div>
            </div>
            <div class="order-info checkout_box">
                <h3 class="checkout_title title">Контактные данные</h3>
                <div class="order-info_wr checkout_wr">
                    <input class="order-info_option checkout_option text-input"
                           type="text"
                           name="name"
                           required
                           placeholder="Имя"
                           aria-label=""/>
                    <input class="order-info_option checkout_option text-input"
                           type="text"
                           name="surname"
                           required
                           placeholder="Фамилия"
                           aria-label=""/>
                    <input class="order-info_option checkout_option text-input"
                           type="text"
                           name="phone"
                           required
                           placeholder="Номер телефона"
                           aria-label=""/>
                    <input class="order-info_option checkout_option text-input"
                           type="text"
                           name="email"
                           required
                           placeholder="Почта"
                           aria-label=""/>
                    <input class="order-info_option checkout_option text-input"
                           type="text"
                           name="address"
                           required
                           placeholder="Адрес"
                           aria-label=""/>
                    <input class="order-info_option checkout_option text-input"
                           type="text"
                           name="geo"
                           placeholder="Отправить геопозицию"
                           aria-label=""/>
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
                        <p class="payment_total-price bill-price">0 сум</p>
                        <button class="payment_button" onclick="buy()">подтвердить</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="overlay" onclick="closePopup()"></div>
    <div id="pop-up" class="pop-up bag">
        <div class="pop-up__wr bag-1">
            <div class="pop-up_top">
                <button id="closePopupButton" onclick="closePopup()">
                    <img src="/img/close-pop-up.svg" alt="close"/>
                </button>
            </div>
            <div class="product_wrap">
                <div class="product_media">
                    <h1 class="product_title">{{$mat->brand->name}} {{$mat->model}}</h1>
                    <img id="mat-img-bag" class="product_gallery" src="/img/gallery.png" alt="auto mat"
                         style="max-width: 600px"/>
                    <img class="product_gallery-mob" src="/img/prodict-image-mob.png" alt="auto mat"/>
                </div>
                <div class="product-info">
                    <div class="product-type">
                        @foreach($tariffs as $tariff)
                            <label>
                                <input class="tariff-input-bag product-type_item
                                            button-text{{ $tariff->id === $tariffs[0]->id ? '--orange' : '' }}
                                            button" type="button"
                                       name="tariff"
                                       value="{{$tariff->name}}"
                                       id="tariff-input-{{$tariff->name}}-bag"
                                       onclick="toggleTariffOptions('<?= $tariff->name ?>', 'bag')"/>
                            </label>
                        @endforeach
                    </div>

                    <p class="option-title">Комплектация ковриков</p>
                    <div class="product-option">
                        <div class="product-option_one product-option_item">
                            <label>
                                <input id="places-by-one-bag"
                                       class="product-info_option_single button-text button-text--orange button"
                                       type="button"
                                       name="option"
                                       readonly
                                       value="По отдельности"/>
                            </label>
                        </div>
                        <div class="product-option_two product-option_item">
                            <div class="product-option_zone-image" style="width: 130px">
                                <?= makeTemplateImagesBlock($mat->bagTemplate->templateInfo->getPlaceInfosByRow(), 'bag') ?>
                            </div>

                            <div class="product-option_zone-name">
                                <?= makeTemplateLabelBlock($mat->bagTemplate->templateInfo->getPlaceInfosSorted(), 'bag'); ?>
                            </div>
                        </div>

                        @foreach($tariffs as $tariff)
                                <?php
                                $innerColors = $tariff->colors->filter(fn($color) => $color->type === \App\Models\Color::INNER)->all();
                                $borderColors = $tariff->colors->filter(fn($color) => $color->type === \App\Models\Color::BORDER)->all();
                                ?>
                            <div class="tariff-options-bag {{ $tariff->id === $tariffs[0]->id ? 'd-block' : 'd-none'}}"
                                 id="tariff-options-{{$tariff->name}}-bag">
                                <p class="option-title">Материал коврика</p>
                                <div class="product-option_three product-option_item">
                                    @foreach($tariff->materials as $material)
                                        <input type="button"
                                               class="material-inp-bag button product-option_btn-text button-text {{ $material->id === $tariff->materials[0]->id ? 'button-text--orange' : '' }}"
                                               id="material-inp-{{$tariff->name}}-{{$material->name}}-bag"
                                               value="{{ $material->name }}"
                                               onclick="toggleMaterial('<?=$material->name?>', 'bag')"/>
                                    @endforeach
                                </div>
                                <p class="option-title">цвет коврика</p>
                                <div class="product-option_four product-option_item d-flex">
                                    <div class="product-option_color-main d-flex">
                                        @foreach($innerColors as $color)
                                            <input type="button"
                                                   class="button product-option_btn-color button-text"
                                                   style="background-color: {{ $color->hex }}"
                                                   onclick="toggleColor('<?=$color->name?>', 'bag')"/>
                                        @endforeach
                                        <input type="button" class="button product-option_carpet-color-btn button-text"
                                               id="chosen_color-{{$tariff->name}}-bag" value="not chosen"/>
                                    </div>
                                </div>
                                <p class="option-title">цвет окантовки</p>
                                <div class="product-option_five product-option_item d-flex">
                                    <div class="product-option_border-color d-flex">
                                        @foreach($borderColors as $color)
                                            <input type="button"
                                                   class="button product-option_btn-color button-text"
                                                   style="background-color:  {{ $color->hex }}"
                                                   onclick="toggleBorderColor('<?=$color->name?>', 'bag')"/>
                                        @endforeach
                                        <input type="button" class="button product-option_carpet-color-btn button-text"
                                               id="chosen_border_color-{{$tariff->name}}-bag" value="not chosen"/>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <p class="option-title">аксессуары</p>
                        <div class="product-option_six">
                            <div class="product-option_accs">
                                @foreach($accessories as $accessory)
                                    <div class="product-option_accs-item button-text">
                                        <div class="product-option_accs-item-name">{{ $accessory->name }}</div>
                                        <div class="product-option_accs-item-wr">
                                            <img class="product-option_accs-item-btn" src="/img/minus.svg"
                                                 alt="minus" onclick="changeAccessory('<?=$accessory->name?>', -1, 'bag')"
                                                 style="cursor:pointer;"/>
                                            <div id="accessory_cnt_{{$accessory->name}}_bag"
                                                 class="product-option_accs-item-number"
                                                 data-max-count="{{$accessory->max_count}}">
                                                0
                                            </div>
                                            <img class="product-option_accs-item-btn" src="/img/plus.svg"
                                                 alt="minus" onclick="changeAccessory('<?=$accessory->name?>', 1, 'bag')"
                                                 style="cursor:pointer;"/>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="product-option_seven">
                            <div class="product-option_logo">
                                <div class="product-option_logo-text">Эмблема</div>
                                <p class="option-title product-option_logo-title">Эмблема</p>
                                <div class="product-option_logo-qty">
                                    <img class="product-option_accs-item-btn" src="/img/minus.svg" alt="minus"/>
                                    <div class="product-option_logo-number" id="embl-cnt-bag">0</div>
                                    <img class="product-option_accs-item-btn" src="/img/plus.svg" alt="minus"/>
                                </div>
                            </div>
                            <div class="product-option_logo-images">
                                @foreach($emblems as $emblem)
                                    <div id="emblem-inp-{{$emblem->name}}-bag" class="emblem-inp-bag product-option_logo-image"
                                         onclick="toggleEmblem('<?=$emblem->name?>', 'bag')">
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
            <div class="bag_footer">
                <button class="payment_button" onclick="closePopup()">подтвердить</button>
            </div>
        </div>
    </div>
@endsection
