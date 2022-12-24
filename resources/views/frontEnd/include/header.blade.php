<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="{{route('home')}}"><img width="250" src="{{ asset('frontEndAsset') }}/images/logo.png" alt="#" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages</span> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="about.html">About</a></li>
                                <li><a href="testimonial.html">Contact</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('all.product') }}">Products</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Category</span> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="">Mobile</a></li>
                                <li><a href="">Headphone</a></li>
                                <li><a href="">Laptop</a></li>
                                <li><a href="">Smart Watch</a></li>
                                <li><a href="">TV</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">My Products</span> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('show.cart') }}">CART</a></li>
                                <li><a href="{{ route('show.order') }}">Order</a></li>
                                @if (Route::has('login'))
                                    <li><a href="{{ route('chatify') }}">Chat</a></li>
                                @else
                                    <h1>Please Login</h1>
                                @endif

                            </ul>
                        </li>

                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <x-app-layout>

                                    </x-app-layout>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link text-primary" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-success"  href="{{ route('register') }}">Register</a>
                                </li>
                            @endauth
                        @endif

                        <form class="form-inline">
                            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->


