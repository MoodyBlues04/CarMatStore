<div class="nav">
    <a class="nav__lang button-text"
       href="{{ route('admin.brand.index') }}"
       style="text-decoration: none; color: black">
        Бренды
    </a>
    <a class="nav__lang button-text"
       href="{{ route('admin.article.index') }}"
       style="text-decoration: none; color: black">
        Текст
    </a>
    <a class="nav__lang button-text"
       href="{{ route('admin.gallery.index') }}"
       style="text-decoration: none; color: black">
        Галерея
    </a>
    <a class="nav__lang button-text"
       href="{{ route('admin.image.create') }}"
       style="text-decoration: none; color: black">
        Загрузка фото
    </a>
    <a class="nav__lang button-text"
       href="{{ route('admin.settings.index') }}"
       style="text-decoration: none; color: black">
        Настройки
    </a>
    <a class="nav__lang button-text"
       href="{{ route('admin.tariff.index') }}"
       style="text-decoration: none; color: black">
        Тарифы
    </a>
    <a class="nav__order button-text--orange"
       href="{{ route('admin.load_sheets_data') }}"
       style="text-decoration: none">
        Обновить данные
    </a>
    <a href="{{ route('auth.logout') }}"
       class="nav__lang button-text"
       style="text-decoration: none; color: black">
        Logout
    </a>
</div>
