<div class="nav">
    <script type="application/javascript">
        $(document).click(function(event) {
            const target = $(event.target);
            if(!target.closest('#searchInput').length) {
                $('#searchRes').css('display', 'none');
            } else {
                $('#searchRes').css('display', 'block');
            }
        });
        $(document).ready(function () {
            $('#searchInput').on('keyup', function () {
                const search = $('#searchInput').val();
                const route = "<?= route('public.search'); ?>";
                $.ajax({
                    type: "GET",
                    url: route,
                    data: {search: search},
                    success: function (data) {
                        $("#searchRes").empty();
                        if (data['data'].length) {
                            for (const matData of data['data']) {
                                $(`<li><a class="dropdown-item" href='${matData['url']}'>${matData.model}</a></li>`)
                                    .appendTo("#searchRes");
                            }
                            $("#searchRes").css("display", "block");
                        } else {
                            $("#searchRes").css("display", "none");
                        }
                    }
                });
            });
        });
    </script>
    <div>
        <div class="d-flex">
            <input class="form-control"
                   placeholder="Search"
                   aria-label="Search"
                   id="searchInput">
            <button class="btn btn-default" type="button">
                <img src="/img/search-icon.svg" class="nav__search-icon" alt="search icon"/>
            </button>
        </div>
        <ul id="searchRes" class="dropdown-menu">
        </ul>
    </div>

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
