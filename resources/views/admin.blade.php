<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Railway reservation</title>

    <!-- Bootstrap Style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Main Style -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
</head>

<body>
    <section class="header">
        <div class="nav-section1 d-flex justify-content-around align-items-center opacity-25">
            <div class="logo ">
                <img src="{{ asset('assets/images/train-icon.png') }}" alt="" />
                <span>book your train</span>
            </div>
            <div>
                <ul class="d-flex">
                    @guest
                    @if(Route::has('login'))
                    <li><a class="pl-4 text-capitalize" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @endif
                    @if (Route::has('register'))
                    <li><a class="pl-4 text-capitalize" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
        <div class="nav-section2 py-2 opacity-25">
            <ul class="container d-flex">
                <li><a class="pl-4 text-capitalize fs-4" href="{{route('train.index')}}">trains</a></li>
                <li><a class="pl-4 text-capitalize fs-4" href="{{route('destination.index')}}">destinations</a></li>
                <li><a class="pl-4 text-capitalize fs-4" href="{{route('seat-type.index')}}">Seat charges</a></li>
                <li><a class="pl-4 text-capitalize fs-4" href="{{route('container-size.index')}}">Container charges</a></li>
                <li><a class="pl-4 text-capitalize fs-4" href="{{route('passenger-age.index')}}">Per age charges</a></li>
                <li><a class="pl-4 text-capitalize fs-4" href="{{route('ticket.index')}}">Manage tickets</a></li>
            </ul>
        </div>
    </section>
    <!-- Section content -->
    @yield('content')
    <!-- End section -->
    <section class="footer">
        <div class="footer-section1 py-4 d-flex justify-content-around ">

            <div class="links">
                <h5 class="h5">Links</h5>
                <div class="links-list">
                    <ul>
                        <li><a href="{{route('train.index')}}">trains</a></li>
                        <li><a href="{{route('destination.index')}}">destinations</a></li>
                        <li><a href="{{route('seat-type.index')}}">Seat charges</a></li>
                        <li><a href="{{route('container-size.index')}}">Container charges</a></li>
                        <li><a href="{{route('passenger-age.index')}}">Per age charges</a></li>
                        <li><a href="{{route('ticket.index')}}">Manage tickets</a></li>
                        <li><a href="#about">priacy policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="contact-info">
                <h5 class="h5">Contact Us</h5>
                <div>
                    <p><i class="bi bi-telephone-fill"></i> <span>+254 721 562 127<span></p>
                    <p><i class="bi bi-envelope-fill"></i> <span>mail@bookyourtrain.com</span></p>
                </div>
            </div>
            <div class="Newsletter">
                <h5 class="h5">Newsletter Subscription</h5>
                <div class="newsletter-content">
                    <input type="text" placeholder="Your Email" />
                    <button class="p-2 text-uppercase">subscribe</button>
                </div>
                <div class="social-media-links pt-2">
                    <h5 class="h5">Follow us</h5>
                    <ul class="d-flex">
                        <li><a><i class="bi bi-facebook pr-4"></i></a></li>
                        <li><a><i class="bi bi-twitter pr-4"></i></a></li>
                        <li><a><i class="bi bi-instagram pr-4"></i></a></li>
                        <li><a><i class="bi bi-linkedin pr-4"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-section2">
            <div class="copyright py-2">
                <p class="text-center">All rights reserved.&copy;2021 RM</p>
            </div>
        </div>
    </section>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('assets/js/show-hide-add-remove-form.js') }}"></script>
</body>

</html>