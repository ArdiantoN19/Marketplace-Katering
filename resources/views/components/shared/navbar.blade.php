<nav class="navbar bg-body-tertiary navbar-expand-lg sticky-top">
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
                        @if(Session::get('user')['role_id'] == 1)
                            <li class="nav-item">
                                <a class="nav-link fs-6 fw-semibold {{Route::is('pages.home') ? 'text-primary' : 'text-body'}}"
                                    href="{{ route('pages.merchant.dashboard')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-6 fw-semibold {{Route::is('pages.customer.products') || Route::currentRouteName() == 'pages.customer.products.show' ? 'text-primary' : 'text-body'}}"
                                    href="{{ route('pages.customer.products')}}">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-6 fw-semibold {{Route::is('pages.customer.products') ? 'text-primary' : 'text-body'}}"
                                    href="{{ route('pages.customer.products')}}">History</a>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn text-primary fs-6" data-bs-toggle="modal" data-bs-target="#cartModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 256 256"><path d="M104,216a16,16,0,1,1-16-16A16,16,0,0,1,104,216Zm88-16a16,16,0,1,0,16,16A16,16,0,0,0,192,200ZM239.71,74.14l-25.64,92.28A24.06,24.06,0,0,1,191,184H92.16A24.06,24.06,0,0,1,69,166.42L33.92,40H16a8,8,0,0,1,0-16H40a8,8,0,0,1,7.71,5.86L57.19,64H232a8,8,0,0,1,7.71,10.14ZM221.47,80H61.64l22.81,82.14A8,8,0,0,0,92.16,168H191a8,8,0,0,0,7.71-5.86Z"></path></svg>
                                </button>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary rounded-pill fw-semibold text-white fs-6 px-3"
                                    href="{{ route('pages.merchant.dashboard') }}">Dashboard</a>
                            </li>
                        @endif
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
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalTitle" aria-hidden="true" style="display: none">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalTitle">Vertically Centered
                </h5>
                <button type="button" class="close bg-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Croissant jelly-o halvah chocolate sesame snaps. Brownie caramels candy
                    canes chocolate cake
                    marshmallow icing lollipop I love. Gummies macaroon donut caramels
                    biscuit topping danish.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                </button>
            </div>
        </div>
    </div>
</div>

