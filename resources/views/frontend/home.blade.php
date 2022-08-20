<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Ticket Selling System</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/plyr.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/dash.css')}}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="{{route('home')}}">
                            <img src="{{ asset('frontend/img/logos/home2.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <div class="row">
                                <div class="col-10">
                                    <ul>
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li><a href="{{route('movies')}}">All movie</a></li>
                                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                                        @if (isset(auth()->user()->id))
                                            @if(auth()->user()->role == '1')
                                            <li><a href="{{route('admin.dashboard')}}" class="btn btn-primary btn-sm  m-3">Dashboard</a></li>
                                            @else
                                            <li><a href="{{route('user.dashboard')}}" class="btn btn-primary btn-sm  m-3">Dashboard</a></li>
                                            @endif
                                            <li><a href="{{route('logout')}}" class="btn btn-warning btn-sm  m-3 text-dark">Logout</a></li>
                                        @else
                                        <li><a href="{{route('login')}}" class="btn btn-primary btn-sm  m-3">Login</a></li>
                                        <li><a href="{{route('register')}}" class="btn btn-primary btn-sm">Register</a></li>
                                        @endif
                                        
                                    </ul>
                                </div>
                                <div class="col-2">
                                    <div class="header__right">
                                        <div class="">
                                        <form class="search-model-form">
                                            <input type="text" id="search-input" placeholder="Search here...">
                                        </form>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                <div class="hero__items set-bg" data-setbg="{{ asset('frontend/img/hero/spider.jpg')}}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">Action/Adventure</div>
                                <h2>Spider-Man: No Way Home</h2>
                                <p>Peter Parker seeks Doctor Strange's help to make people forget about Spiderman's identity</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__items set-bg" data-setbg="{{ asset('frontend/img/hero/moana.jpg')}}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">Family/Adventure </div>
                                <h2 class="text-dark">Moana Sing-Along</h2>
                                <p class="text-dark">Moana, daughter of chief Tui, embarks on a journey to return the heart...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__items set-bg" data-setbg="{{ asset('frontend/img/hero/fan4.jpg')}}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">Action/Fantasy</div>
                                <h2>Fantastic Four</h2>
                                <p>Four astronauts gain extraordinary powers like invisibility and stretchability after being hit by cosmic radiation. ...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Trending Now</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="{{ route('movies') }}" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            @foreach ($movies as $item)

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="/storage/{{ $item->photo }}">
                                        
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>{{ $item->category_name }}</li>
                                        </ul>
                                        <h5><a href="{{ route('details', $item->id) }}">{{ $item->name }}</a></h5>
                                    </div>
                                </div>
                            </div>
                                
                            @endforeach

                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
<!-- Product Section End -->

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="{{route('home')}}"><img src="{{ asset('frontend/img/logos/home2.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="{{route('home')}}">Homepage</a></li>
                        <li><a href="{{route('movies')}}">All movie</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

              </div>
          </div>
      </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Search model Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="{{ asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/player.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('frontend/js/mixitup.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.slicknav.js')}}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/js/main.js')}}"></script>


</body>

</html>