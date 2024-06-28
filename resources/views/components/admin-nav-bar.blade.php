<div class="nav">
    <a class="nav__lang button-text"
       href="{{ route('admin.article.index') }}"
       style="text-decoration: none; color: black">
        Articles
    </a>
    <a class="nav__lang button-text"
       href="{{ route('admin.settings.index') }}"
       style="text-decoration: none; color: black">
        Настройки
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
