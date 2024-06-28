@extends('layouts.public-layout')

@section('content')
    <section class="product">
        <div class="container">
            <div class="crumbs">
                <a href="/" class="crumb">Главная</a>
                <svg width="5" height="10">
                    <use href="img/sprite.svg#arrow"></use>
                </svg>

                <a href="#" class="crumb">Покупка ковриков</a>
            </div>
            <div class="product_wrap">
                <div class="product_media">
                    <h1 class="product_title">Chevrolet spark</h1>
                    <img class="product_gallery" src="img/gallery.png" alt="auto mat"/>
                    <img class="product_gallery-mob" src="img/prodict-image-mob.png" alt="auto mat"/>
                </div>
                <div class="product-info">
                    <div class="product-type">
                        <label>
                            <input class="product-type_item button-text button" type="button" name="position"
                                   value="лайт"/>
                        </label>
                        <label>
                            <input class="product-type_item button-text button" type="button" name="position"
                                   value="классик"/>
                        </label>
                        <label>
                            <input class="product-type_item button-text button" type="button" name="position"
                                   value="премиум"/>
                        </label>
                    </div>
                    <p class="option-title">Комплектация ковриков</p>
                    <div class="product-option">
                        <div class="product-option_one product-option_item">
                            <label>
                                <input class="product-option_all button-text button" type="button" name="option"
                                       value="комплект" id="All" onclick="toggleAllOrange()"/>
                            </label>
                            <label>
                                <input class="product-info_option_single button-text button" type="button" name="option"
                                       id="single" value="По отдельности" onclick="changeColor('single', null, true)"/>
                            </label>
                        </div>
                        <div class="product-option_two product-option_item">
                            <div class="product-option_zone-image">
                                <input type="button" class="button product-option_btn-img" id="zone1" value=""
                                       onclick="changeColor('zone1', 'zone5')"/>
                                <input type="button" class="button product-option_btn-img" id="zone2" value=""
                                       onclick="changeColor('zone2', 'zone6')"/>
                                <input type="button" class="button product-option_btn-img" id="zone3" value=""
                                       onclick="changeColor('zone3', 'zone7')"/>
                                <input type="button" class="button product-option_btn-img" id="zone4" value=""
                                       onclick="changeColor('zone4', 'zone8')"/>
                                <input type="button" class="button product-option_btn-img" id="zone55" value=""
                                       onclick="changeColor('zone55', 'zone9')"/>
                            </div>
                            <div class="product-option_zone-name">
                                <input type="button" class="button product-option_btn-text button-text" id="zone5"
                                       value="Водительский" onclick="changeColor('zone1', 'zone5')"/>
                                <input type="button" class="button product-option_btn-text button-text" id="zone6"
                                       value="Пассажирский" onclick="changeColor('zone2', 'zone6')"/>
                                <input type="button" class="button product-option_btn-text button-text" id="zone7"
                                       value="Задний левый" onclick="changeColor('zone3', 'zone7')"/>
                                <input type="button" class="button product-option_btn-text button-text" id="zone8"
                                       value="Задний правый" onclick="changeColor('zone4', 'zone8')"/>
                                <div class="product-option_btn-info-text">
                                    <input type="button"
                                           class="button product-option_btn-text product-option_btn-bag button-text"
                                           id="zone9" value="багажник" onclick="changeColor('zone55', 'zone9')"/>
                                </div>
                            </div>
                        </div>
                        <p class="option-title">Материал коврика</p>
                        <div class="product-option_three product-option_item">
                            <input type="button" class="button product-option_btn-text button-text" id="zone77"
                                   value="Eva ромб" onclick="changeColor('zone77')"/>
                            <input type="button" class="button product-option_btn-text button-text" id="zone3-1"
                                   value="eva соты" onclick="changeColor('zone3-1')"/>
                        </div>
                        <p class="option-title">цвет коврика</p>
                        <div class="product-option_four product-option_item">
                            <div class="product-option_color-main">
                                <input type="button" class="button product-option_btn-color button-text" id="zone77"
                                       value="" onclick="changeColor('zone77')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                            </div>
                            <div class="product-option_carpet-color">
                                <input type="button" class="button product-option_carpet-color-btn button-text"
                                       id="zone77" value="Синий" onclick="changeColor('zone77')"/>
                            </div>
                        </div>
                        <p class="option-title">цвет окантовки</p>
                        <div class="product-option_five product-option_item">
                            <div class="product-option_border-color">
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                                <input type="button" class="button product-option_btn-color button-text" id="zone3-1"
                                       value="" onclick="changeColor('zone3-1')"/>
                            </div>
                            <div class="product-option_carpet-border-color">
                                <input type="button" class="button product-option_carpet-border-color-btn button-text"
                                       id="zone77" value="Синий" onclick="changeColor('zone77')"/>
                            </div>
                        </div>
                        <p class="option-title">аксессуары</p>
                        <div class="product-option_six">
                            <div class="product-option_accs">
                                <div class="product-option_accs-item button-text">
                                    <div class="product-option_accs-item-name">клипсы</div>
                                    <div class="product-option_accs-item-wr">
                                        <img class="product-option_accs-item-btn" src="img/minus.svg" alt="minus"/>
                                        <div class="product-option_accs-item-number">0</div>
                                        <img class="product-option_accs-item-btn" src="img/plus.svg" alt="minus"/>
                                    </div>
                                </div>
                                <div class="product-option_accs-item button-text">
                                    <div class="product-option_accs-item-name">
                                        клипсы универсаьные
                                    </div>
                                    <div class="product-option_accs-item-wr">
                                        <img class="product-option_accs-item-btn" src="img/minus.svg" alt="minus"/>
                                        <div class="product-option_accs-item-number">0</div>
                                        <img class="product-option_accs-item-btn" src="img/plus.svg" alt="minus"/>
                                    </div>
                                </div>
                                <div class="product-option_accs-item button-text">
                                    <div class="product-option_accs-item-name">Подпятник</div>
                                </div>
                            </div>
                        </div>
                        <div class="product-option_seven">
                            <div class="product-option_logo">
                                <div class="product-option_logo-text">Эмблема</div>
                                <p class="option-title product-option_logo-title">Эмблема</p>
                                <div class="product-option_logo-qty">
                                    <img class="product-option_accs-item-btn" src="img/minus.svg" alt="minus"/>
                                    <div class="product-option_logo-number">0</div>
                                    <img class="product-option_accs-item-btn" src="img/plus.svg" alt="minus"/>
                                </div>
                            </div>
                            <div class="product-option_logo-images">
                                <div class="product-option_logo-image">
                                    <svg width="24" height="9">
                                        <use href="img/emblems.svg#audi"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="18" height="18">
                                        <use href="img/emblems.svg#bmw2"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="24" height="7">
                                        <use href="img/emblems.svg#chevrolet"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="24" height="7">
                                        <use href="img/emblems.svg#haval"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="18" height="15">
                                        <use href="img/emblems.svg#honda"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="22" height="11">
                                        <use href="img/emblems.svg#Hyundai"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="24" height="7">
                                        <use href="img/emblems.svg#kia"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="22" height="10">
                                        <use href="img/emblems.svg#lada"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="22" height="16">
                                        <use href="img/emblems.svg#mazda"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="18" height="14">
                                        <use href="img/emblems.svg#lexus"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="18" height="19">
                                        <use href="img/emblems.svg#mercedes"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="18" height="15">
                                        <use href="img/emblems.svg#mitsubishi"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="24" height="20">
                                        <use href="img/emblems.svg#nissan"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="24" height="13">
                                        <use href="img/emblems.svg#landRover"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="18" height="18">
                                        <use href="img/emblems.svg#skoda"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="18" height="17">
                                        <use href="img/emblems.svg#tesla"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="21" height="13">
                                        <use href="img/emblems.svg#Toyota"></use>
                                    </svg>
                                </div>
                                <div class="product-option_logo-image">
                                    <svg width="18" height="19">
                                        <use href="img/emblems.svg#volkswagen"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="product-option_logo-qty-mob">
                                <img class="product-option_accs-item-btn" src="img/minus.svg" alt="minus"/>
                                <div class="product-option_logo-number">12</div>
                                <img class="product-option_accs-item-btn" src="img/plus.svg" alt="minus"/>
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
                                <img class="item_btn" src="img/minus.svg" alt="minus"/>
                                <div class="item_number">7</div>
                                <img class="item_btn" src="img/plus.svg" alt="minus"/>
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
                                <img class="item_btn" src="img/minus.svg" alt="minus"/>
                                <div class="item_number">7</div>
                                <img class="item_btn" src="img/plus.svg" alt="minus"/>
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
                                <img class="item_btn" src="img/minus.svg" alt="minus"/>
                                <div class="item_number">7</div>
                                <img class="item_btn" src="img/plus.svg" alt="minus"/>
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
                                <img class="item_btn" src="img/minus.svg" alt="minus"/>
                                <div class="item_number">7</div>
                                <img class="item_btn" src="img/plus.svg" alt="minus"/>
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
                                <img class="item_btn" src="img/minus.svg" alt="minus"/>
                                <div class="item_number">7</div>
                                <img class="item_btn" src="img/plus.svg" alt="minus"/>
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
                        <div class="delivery_option-shipping">Доставка экспресс</div>
                        <div class="delivery_option-shipping">В течении 2 часов</div>
                        <div class="delivery_option-shipping">+50 000 сум</div>
                    </div>
                    <div class="delivery_option-wr">
                        <div class="delivery_option-shipping">Доставка по г.ташкент</div>
                        <div class="delivery_option-shipping">В течении 1 дня, бесплатно</div>
                        <div class="delivery_option-shipping">+50 000 сум</div>
                    </div>
                    <div class="delivery_option-wr">
                        <div class="delivery_option-shipping">Доставка в другие города</div>
                        <div class="delivery_option-shipping">В течении 5 дней</div>
                        <div class="delivery_option-shipping">+50 000 сум</div>
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
                <h3 class="checkout_title title">Оплата картой</h3>
                <div class="payment_wr checkout_wr">
                    <div class="payment_option checkout_option">
                        <svg width="66" height="19" viewBox="0 0 66 19" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="payment_option-image">
                            <path
                                d="M10.6733 1.91743C10.4449 1.54831 10.1478 1.22696 9.79695 0.970745C9.44347 0.728427 9.05524 0.540826 8.64616 0.412285C8.20148 0.267242 7.7429 0.169967 7.27737 0.123067C6.73368 0.0692187 6.18738 0.0440315 5.64021 0.0466371H0.905024C0.451655 0.0040795 0.0495295 0.336723 0.00697188 0.789223C0.00697188 0.79704 0.00523483 0.805725 0.00523483 0.813542V8.54599C0.661838 9.95474 1.75183 11.116 3.11628 11.8603V10.3169C3.07286 9.81664 3.44285 9.37543 3.94311 9.33201H3.94485H5.36575C7.3043 9.33201 8.78339 8.92641 9.80303 8.11521C10.8227 7.30401 11.3403 6.1011 11.356 4.50737C11.3577 4.04792 11.3038 3.59021 11.1953 3.14379C11.0867 2.71039 10.9113 2.29611 10.6742 1.91743H10.6733ZM7.89836 5.87095C7.73335 6.15495 7.48755 6.38424 7.19312 6.52929C6.87351 6.68215 6.5287 6.77334 6.17522 6.7994C5.78699 6.84803 5.39702 6.87148 5.00532 6.87062H3.64174C3.31517 6.87062 3.11107 6.60572 3.11107 6.21749V3.04478C3.0937 2.78422 3.29085 2.5584 3.55141 2.54016C3.58181 2.53843 3.61134 2.5393 3.64087 2.54277H5.00445C5.44653 2.54277 5.86342 2.5558 6.25425 2.58098C6.6034 2.59749 6.9456 2.68173 7.26261 2.82764C7.55443 2.95792 7.79848 3.17592 7.95829 3.45298C8.13981 3.82384 8.22232 4.23465 8.19974 4.64633C8.2093 5.07364 8.1042 5.49488 7.89663 5.86834V5.87268L7.89836 5.87095ZM3.12062 12.3249C1.95333 11.9037 0.890259 11.2349 0.00523483 10.3647V14.082C-0.0355857 14.372 0.16678 14.6404 0.456866 14.6804C0.463815 14.6812 0.471631 14.6821 0.478579 14.683H2.61862C3.18663 14.683 3.12062 14.0767 3.12062 14.0767V12.3249ZM32.5357 4.09569H30.6893C30.3253 4.07224 29.997 4.31369 29.9128 4.66891L27.7675 10.5783C27.7675 10.5783 25.8733 5.19437 25.7317 4.77748C25.6492 4.38143 25.3027 4.09569 24.8979 4.09048H23.1983C22.592 4.09048 22.592 4.56382 22.6728 4.74882C22.7536 4.93381 25.0786 11.307 25.9871 13.7458C26.1304 14.0463 26.2303 14.3651 26.285 14.6925C26.2259 15.0165 26.1035 15.3257 25.9254 15.6019C25.8559 15.7191 25.7769 15.8303 25.6883 15.9336C27.4401 15.4125 29.4768 13.5139 30.499 11.4634C31.5317 8.62243 32.8901 4.83393 32.9518 4.64025C33.0178 4.34235 33.0178 4.09569 32.5349 4.09569H32.5357ZM24.3056 16.5112C24.1475 16.5069 23.9895 16.4947 23.8323 16.473C23.6377 16.4443 23.2686 16.473 23.2686 16.8048V18.2257C23.2686 18.7702 23.5335 18.8085 23.6707 18.8458C24.1093 18.9422 24.5575 18.99 25.0056 18.9882C25.5363 19.0021 26.0626 18.8936 26.5447 18.6712C26.985 18.4489 27.3767 18.1397 27.6955 17.7619C28.0568 17.3485 28.3625 16.8908 28.6048 16.3983C28.8671 15.8746 29.1164 15.2953 29.3526 14.6604L29.6271 13.9074C29.0781 14.4519 26.6532 16.7388 24.3047 16.5121L24.3056 16.5112ZM21.5116 5.79538C21.4108 5.55654 21.2736 5.3342 21.1042 5.13704C20.9331 4.95466 20.7386 4.79572 20.5267 4.6637C20.2974 4.50737 20.0533 4.37448 19.7971 4.26592C19.5366 4.16517 19.2691 4.0844 18.9972 4.02447C18.6854 3.95585 18.3684 3.90982 18.0505 3.88724C17.7092 3.8525 17.3279 3.83513 16.9049 3.83513C14.0831 3.83513 12.4763 4.72537 12.0846 6.50584C12.0212 6.75944 12.175 7.01653 12.4286 7.0808C12.4529 7.08688 12.4772 7.09122 12.5015 7.09296H14.2394C14.7128 7.09296 14.7128 6.94618 14.8926 6.53884C14.9716 6.31737 15.1132 6.12282 15.2999 5.98038C15.7437 5.69377 16.2692 5.55915 16.7964 5.59649C17.288 5.54612 17.7821 5.66858 18.193 5.94216C18.5065 6.23486 18.6924 6.64046 18.7089 7.06951C18.7089 7.65663 18.5291 8.04486 17.7995 8.04486C16.0712 7.98319 14.2151 8.17774 13.1686 8.77876C12.1202 9.41886 11.4949 10.5714 11.5305 11.7995C11.5184 12.2693 11.6139 12.7357 11.8102 13.1631C11.9943 13.5348 12.2618 13.8587 12.5919 14.1097C12.9375 14.392 13.3371 14.6013 13.7661 14.7255C14.2507 14.8567 14.751 14.9201 15.253 14.9149C15.9287 14.9253 16.601 14.8298 17.2463 14.6309C17.8169 14.3972 18.3562 14.0932 18.8513 13.7267V14.0585C18.8513 14.3851 18.9503 14.6786 19.3246 14.6786H21.337C21.7443 14.6786 21.839 14.3894 21.839 14.0298V7.8312C21.8416 7.44471 21.8147 7.05822 21.7582 6.67607C21.7139 6.37295 21.6306 6.07765 21.5116 5.79538ZM18.7601 11.8846C18.7601 11.8846 18.239 12.9737 16.3925 12.9737C15.9496 12.9937 15.5118 12.873 15.1427 12.628C14.8127 12.3718 14.6338 11.9654 14.6694 11.5485C14.6277 10.9848 14.9386 10.4533 15.451 10.2136C16.198 9.92694 16.9953 9.79319 17.7952 9.82012C18.2633 9.74977 18.7002 10.072 18.7705 10.5401C18.7775 10.5844 18.7801 10.6287 18.7801 10.673L18.761 11.8855L18.7601 11.8846Z"
                                fill="#2E3548"/>
                            <path
                                d="M64.7822 7.89809C65.2581 8.66325 65.2581 9.63252 64.7822 10.3986C64.3088 11.1186 61.7276 13.8744 60.8756 14.7594C60.1365 15.5263 59.1377 16.3028 58.1484 16.3028H37.6496C34.8746 16.3028 34.7087 15.3561 34.7087 13.2438V4.63071C34.7087 2.46635 35.348 1.83667 37.2466 1.83667H58.1953C59.1759 1.83667 60.0513 2.33868 61.0363 3.35224C61.8978 4.21903 64.4409 7.38653 64.7822 7.89809Z"
                                fill="#2E3548"/>
                            <path
                                d="M39.364 5.16547V5.11336C39.364 4.83369 39.364 4.56445 38.8906 4.56445H37.1718C36.7697 4.56445 36.7506 4.78245 36.7506 5.12291V7.39584C37.4289 6.45175 38.3252 5.68658 39.364 5.16547Z"
                                fill="white"/>
                            <path
                                d="M50.8754 13.3854V13.2621V7.77913C50.8754 5.48449 49.8619 4.3363 47.8356 4.3363C47.2719 4.34325 46.7204 4.5074 46.2445 4.80965C45.7199 5.13708 45.2518 5.54615 44.8575 6.0221C44.6785 5.50794 44.332 5.06934 43.8726 4.77664C43.3506 4.48916 42.7591 4.34933 42.1633 4.37452C41.287 4.37799 40.4358 4.67068 39.7436 5.2083C39.5925 5.35942 36.7463 7.57589 36.7463 9.88703V13.3959C36.7463 13.5044 36.6899 13.9309 37.1676 13.9309H38.9524C39.5065 13.9309 39.4544 13.5661 39.4544 13.415V7.73309C39.7523 7.33097 40.3637 6.36951 41.3721 6.36951C41.7004 6.33998 42.0191 6.49024 42.2059 6.76295C42.4082 7.16682 42.4968 7.61932 42.4612 8.07008V12.4978V13.4071C42.4612 13.5157 42.4047 13.9422 42.8824 13.9422H44.649C45.2031 13.9422 45.151 13.5774 45.151 13.4263V13.3029V7.71572C45.4732 7.3136 46.0977 6.35214 47.0687 6.35214C47.4005 6.32522 47.7227 6.4746 47.9164 6.74558C48.1222 7.14858 48.2126 7.60108 48.1769 8.05271V12.4804V13.3898C48.1769 13.4983 48.1205 13.9248 48.5982 13.9248H50.383C50.9414 13.8961 50.8754 13.5366 50.8754 13.3898V13.3854Z"
                                fill="white"/>
                            <path
                                d="M60.7193 11.1559C60.0966 12.8295 58.4594 13.9056 56.6755 13.8127C53.9483 13.8127 52.1296 11.9567 52.1296 9.17219C52.1296 6.38771 54.0239 4.43701 56.5808 4.43701C59.1377 4.43701 60.8427 6.20793 60.9512 9.06363C60.9512 9.42841 60.8609 9.75063 60.4023 9.75063H54.6162C54.6544 11.2801 55.3883 12.1182 56.6946 12.1182C57.4033 12.1356 58.0573 11.7404 58.3708 11.1047C58.4933 10.9257 58.6983 10.8206 58.9154 10.825H60.4067C60.5708 10.8172 60.7106 10.944 60.7185 11.109C60.7193 11.1316 60.7185 11.1533 60.7141 11.1759L60.7185 11.1568L60.7193 11.1559ZM56.5904 6.20272C55.5056 6.20272 54.7717 6.95573 54.611 8.19598H58.4942C58.3952 7.11119 57.8072 6.20272 56.5904 6.20272Z"
                                fill="white"/>
                        </svg>
                    </div>
                    <div class="payment_option checkout_option">
                        <svg width="56" height="23" viewBox="0 0 56 23" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="payment_option-image">
                            <path
                                d="M29.1084 16.1503C28.6142 16.1503 28.1587 16.0744 27.7403 15.9221C27.3226 15.7698 26.9801 15.5423 26.6761 15.2763C26.3722 14.9723 26.144 14.6305 25.9538 14.1742C25.8015 13.7179 25.6877 13.2244 25.6877 12.6158V12.3498C25.6877 11.7798 25.7636 11.3235 25.9538 10.8679C26.144 10.4503 26.3715 10.1077 26.6761 9.80376C26.9801 9.49981 27.3598 9.30958 27.7403 9.15795C28.158 9.00563 28.5763 8.92981 29.0326 8.92981C29.5268 8.92981 29.9445 9.00563 30.3249 9.12004C30.7054 9.23445 31.0087 9.42399 31.2747 9.65213C31.5407 9.88027 31.731 10.1463 31.8826 10.4503C32.0342 10.7542 32.1107 11.0961 32.1866 11.4379H30.4387C30.3249 11.134 30.1726 10.8679 29.9824 10.6777C29.7921 10.4875 29.4882 10.4117 29.0705 10.4117C28.8424 10.4117 28.6528 10.4496 28.4247 10.5254C28.2345 10.6012 28.0449 10.7156 27.8926 10.8673C27.7403 11.0189 27.6266 11.247 27.5508 11.4752C27.4749 11.7033 27.437 12.0073 27.437 12.3491V12.6152C27.437 12.9949 27.4749 13.2989 27.5508 13.5649C27.6266 13.831 27.741 14.0591 27.8926 14.2107C28.0449 14.3631 28.1966 14.5147 28.4247 14.5905C28.6149 14.6663 28.8424 14.7042 29.0705 14.7042C29.4124 14.7042 29.7163 14.6284 29.9445 14.4382C30.1726 14.248 30.3621 14.0205 30.4387 13.678H32.1866C32.1486 14.0577 32.0342 14.4003 31.8826 14.7042C31.731 15.0082 31.5028 15.2742 31.2368 15.5024C30.9707 15.7305 30.6668 15.8821 30.287 15.9966C29.9831 16.1103 29.5647 16.1489 29.1091 16.1489L29.1084 16.1503Z"
                                fill="#2E3548"/>
                            <path
                                d="M35.759 16.0745C35.3413 16.0745 34.9988 16.0366 34.7327 15.9607C34.4288 15.8849 34.2006 15.7705 34.0104 15.581C33.8202 15.3914 33.6685 15.1633 33.5927 14.8207C33.5169 14.5168 33.479 14.137 33.479 13.6428V6.87866H35.189V13.4526C35.189 13.6807 35.189 13.8703 35.2269 13.9847C35.2648 14.137 35.3027 14.2507 35.3792 14.3266C35.455 14.4024 35.5315 14.4789 35.6832 14.5168C35.7969 14.5547 35.9492 14.5926 36.1395 14.5926H36.4055C36.4813 14.5926 36.5578 14.5926 36.5957 14.5547V15.9986C36.5578 15.9986 36.482 15.9986 36.4055 16.0365C36.3297 16.0365 36.2532 16.0365 36.2153 16.0745H35.759Z"
                                fill="#2E3548"/>
                            <path
                                d="M37.8486 9.08231H39.5586V15.9981H37.8486V9.08231ZM38.7226 8.35999C38.4186 8.35999 38.1526 8.28417 37.9623 8.09394C37.7721 7.90371 37.6963 7.67626 37.6963 7.41022C37.6963 7.14417 37.7721 6.91603 37.9623 6.72649C38.1526 6.53695 38.4186 6.46045 38.7226 6.46045C39.0265 6.46045 39.2926 6.53626 39.4828 6.72649C39.673 6.91672 39.7488 7.14417 39.7488 7.41022C39.7488 7.67626 39.673 7.9044 39.4828 8.09394C39.2926 8.28348 39.0265 8.35999 38.7226 8.35999Z"
                                fill="#2E3548"/>
                            <path
                                d="M44.3091 16.1503C43.8149 16.1503 43.3593 16.0744 42.941 15.9221C42.5233 15.7698 42.1807 15.5423 41.8768 15.2763C41.5728 14.9723 41.3447 14.6305 41.1545 14.1742C41.0022 13.7179 40.8884 13.2244 40.8884 12.6158V12.3498C40.8884 11.7798 40.9642 11.3235 41.1545 10.8679C41.3447 10.4503 41.5722 10.1077 41.8768 9.80376C42.1807 9.49981 42.5605 9.30958 42.941 9.15795C43.3587 9.00563 43.777 8.92981 44.2333 8.92981C44.7275 8.92981 45.1452 9.00563 45.5256 9.12004C45.9061 9.23445 46.2093 9.42399 46.4754 9.65213C46.7414 9.88027 46.9317 10.1463 47.0833 10.4503C47.2349 10.7542 47.3114 11.0961 47.3872 11.4379H45.6393C45.5256 11.134 45.3733 10.8679 45.1831 10.6777C44.9928 10.4875 44.6889 10.4117 44.2712 10.4117C44.0431 10.4117 43.8535 10.4496 43.6254 10.5254C43.4352 10.6012 43.2456 10.7156 43.0933 10.8673C42.941 11.0189 42.8273 11.247 42.7514 11.4752C42.6756 11.7033 42.6377 12.0073 42.6377 12.3491V12.6152C42.6377 12.9949 42.6756 13.2989 42.7514 13.5649C42.8273 13.831 42.9417 14.0591 43.0933 14.2107C43.2456 14.3631 43.3973 14.5147 43.6254 14.5905C43.8156 14.6663 44.0431 14.7042 44.2712 14.7042C44.6131 14.7042 44.917 14.6284 45.1452 14.4382C45.3733 14.248 45.5628 14.0205 45.6393 13.678H47.3872C47.3493 14.0577 47.2349 14.4003 47.0833 14.7042C46.9317 15.0082 46.7035 15.2742 46.4375 15.5024C46.1714 15.7305 45.8675 15.8821 45.4877 15.9966C45.1837 16.1103 44.7654 16.1489 44.3098 16.1489L44.3091 16.1503Z"
                                fill="#2E3548"/>
                            <path
                                d="M48.603 15.9978V6.87781H50.3509V11.932L52.8591 9.08199H54.873L52.2891 12.0078L55.1391 15.9978H53.0872L51.1112 13.1857L50.3509 14.0217V15.9978H48.603Z"
                                fill="#2E3548"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.79976 3.79976C1.25372 6.30789 0 8.7023 0 11.096V11.1339C0 13.5276 1.25372 15.96 3.79976 18.4681C6.30789 20.9762 8.73952 22.2299 11.1339 22.2679H11.1718C13.5656 22.2679 15.9979 21.0141 18.506 18.4681C23.5223 13.4518 23.5602 8.85393 18.506 3.76185C15.96 1.25372 13.5283 0 11.1339 0C8.73952 0 6.30789 1.25372 3.79976 3.79976ZM7.10603 15.1239C4.33185 12.3497 4.36976 9.84161 7.10603 7.10603C9.8423 4.36976 12.3504 4.33185 15.1239 7.10603C17.8981 9.88021 17.8602 12.3883 15.1239 15.1239C13.7558 16.4921 12.4256 17.1758 11.1339 17.1758C9.8037 17.2137 8.51207 16.53 7.10603 15.1239Z"
                                  fill="#2E3548"/>
                        </svg>
                    </div>
                    <div class="payment_option checkout_option">
                        <svg width="72" height="21" viewBox="0 0 72 21" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="payment_option-image">
                            <path
                                d="M20.4355 10.2353C20.4409 12.2574 19.8457 14.2348 18.7261 15.919C17.6066 17.6023 16.012 18.9164 14.1458 19.6935C12.2797 20.4706 10.2243 20.6768 8.24074 20.2851C6.25713 19.8934 4.43397 18.9226 3.00252 17.4948C1.57106 16.0669 0.594941 14.2464 0.198758 12.2637C-0.198321 10.281 0.00245906 8.2248 0.775106 6.35682C1.54775 4.48795 2.85731 2.89067 4.53795 1.76755C6.21859 0.642642 8.19592 0.0429893 10.2172 0.0429893C11.5572 0.0403002 12.8856 0.302032 14.1243 0.813843C15.3631 1.32476 16.4898 2.075 17.439 3.02153C18.3882 3.96807 19.1412 5.09208 19.6548 6.32993C20.1693 7.56778 20.4337 8.89437 20.4346 10.2353H20.4355ZM11.3905 3.58264C11.0086 3.54679 10.6151 3.53245 10.2172 3.53245C9.8192 3.53245 9.43287 3.54679 9.04924 3.58264V9.01806H11.3923L11.3905 3.58264ZM16.7963 6.75032C15.9421 6.47066 15.07 6.25105 14.1853 6.09419V10.6548C14.1853 13.9399 12.7888 15.668 10.2208 15.668C7.65274 15.668 6.25624 13.9399 6.25624 10.6548V6.09419C5.37155 6.25195 4.49941 6.47066 3.64519 6.75032V10.6826C3.70166 12.3892 4.41963 14.0071 5.64673 15.1948C6.87382 16.3824 8.51502 17.0457 10.2226 17.0457C11.9301 17.0457 13.5713 16.3815 14.7984 15.1948C16.0255 14.0071 16.7434 12.3892 16.7999 10.6826L16.7963 6.75032Z"
                                fill="#2E3548"/>
                            <path
                                d="M53.4612 10.5776C53.4612 11.9024 52.7136 12.5146 51.5986 12.5146C50.4835 12.5146 49.7638 11.914 49.7638 10.5776V6.20435H47.3616V10.6619C47.3616 13.566 49.7916 14.7044 51.6174 14.7044C53.4433 14.7044 55.8759 13.566 55.8759 10.6619V6.20435H53.4737L53.4621 10.5776H53.4612Z"
                                fill="#2E3548"/>
                            <path
                                d="M45.3289 8.23456V6.20435H37.5199V8.23456H42.1424L37.3335 12.5209V14.5511H45.6202V12.5209H40.529L45.328 8.23456H45.3289Z"
                                fill="#2E3548"/>
                            <path
                                d="M67.9048 6.0459C66.3819 6.0459 65.2346 6.66437 64.6672 7.60733C64.0873 6.66437 62.8288 6.0459 61.5229 6.0459C58.9549 6.0459 57.6184 7.68262 57.6184 9.70387V14.5513H60.0215V10.0463C60.0215 9.07912 60.5288 8.22939 61.6941 8.22939C61.9316 8.21505 62.1691 8.2518 62.3914 8.33695C62.6137 8.4221 62.8154 8.55297 62.983 8.72148C63.1506 8.88999 63.2806 9.09256 63.3649 9.31575C63.4482 9.53894 63.4841 9.77647 63.4688 10.014V14.5549H65.8719V10.0104C65.8719 9.04058 66.4429 8.2267 67.5956 8.2267C68.7483 8.2267 69.3049 9.07643 69.3049 10.0436V14.5486H71.7071V9.71014C71.7071 7.68889 70.4666 6.05217 67.8842 6.05217L67.9048 6.0459Z"
                                fill="#2E3548"/>
                            <path
                                d="M33.3474 10.5776C33.3474 11.9024 32.5999 12.5146 31.4947 12.5146C30.3895 12.5146 29.6509 11.914 29.6509 10.5776V6.20435H27.2478V10.6619C27.2478 13.566 29.6688 14.7044 31.5036 14.7044C33.3384 14.7044 35.7532 13.566 35.7532 10.6619V6.20435H33.3501L33.3474 10.5776Z"
                                fill="#2E3548"/>
                        </svg>
                    </div>
                </div>

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
