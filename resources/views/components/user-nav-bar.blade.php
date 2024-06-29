<div class="nav">
    <button class="nav__search">
        <img src="/img/search-icon.svg" class="nav__search-icon" alt="search icon"/>
    </button>
{{--    <div class="nav__lang button-text">Ру</div>--}}
    @if(auth()->guest())
        <a href="{{ route('auth.login') }}"
           class="nav__lang button-text"
           style="text-decoration: none; color: black">
            Log in
        </a>
        <a href="{{ route('auth.register') }}"
           class="nav__lang button-text"
           style="text-decoration: none; color: black">
            Sign up
        </a>
    @else
        <a href="{{ route('auth.logout') }}"
           class="nav__lang button-text"
           style="text-decoration: none; color: black">
            Logout
        </a>
    @endif
</div>
