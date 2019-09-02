<nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('overview') }}">
                <span class="icon"><i class="fad fa-meteor"></i></span>
                &nbsp;&nbsp;{{ config('app.name') }}
            </a>
        </div>
        <div class="navbar-end">
            @auth
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="navbar-dropdown">
                        <div class="navbar-divider"></div>
                        <a href="{{ route('logout') }}" class="navbar-item">
                            <span class="icon"><i class="fad fa-power-off"></i></span>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>