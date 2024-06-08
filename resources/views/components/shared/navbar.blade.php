<nav class="navbar bg-body-tertiary navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand text-primary fw-bold" href="{{ route('pages.home') }}">Marketplace - Katering</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Marketplace - Katering</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 gap-2">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary rounded-pill fw-semibold text-white fs-6 px-3"
                                href="{{ Auth::user()->role == 0 ? route('pages.merchant.dashboard') : route('pages.user.dashboard') }}">Dashboard</a>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link btn text-primary fw-semibold fs-6 px-3"
                                href="{{ route('pages.auth.login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary rounded-pill fw-semibold text-white fs-6 px-3"
                                href="{{ route('pages.auth.register') }}">Register</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
