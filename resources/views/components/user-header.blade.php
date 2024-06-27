@section('scripts')
    <script>
        function logout() {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }
    </script>
@endsection

<header class="header-lk">
    <div class="container container-lk">
        <div class="header-container">
            <a href="{{ route('user.profile.index') }}" class="header-container-logo">
                Logo
            </a>
            <div class="header-container-right">
                <a href="{{ route('auth.logout') }}" type="button" class="btn-log-in" onclick="logout()">
                    Выход
                </a>
            </div>
            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display:none">
                @csrf
            </form>
        </div>
    </div>
</header>
