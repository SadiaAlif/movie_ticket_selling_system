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
                        <a href="{{route('movies')}}">
                            <img src="{{ asset('frontend/img/logos/home2.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
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
                        </nav>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Movie Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="/storage/{{ $movie->photo }}">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $movie->name }}</h3>
                            </div>
                            <p>{{ $movie->description }}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                        <li><span>Category:</span> {{ $movie->category_name }}</li>
                                            <li><span>Booking Status:</span> 
                                                @if ($movie->booking_status >0 )
                                                    <strong class="text-success" > {{ $movie->booking_status}} Available</strong>
                                                @else
                                                    <strong class="text-warning">Unavailable</strong>
                                                @endif
                                            </li>
                                            <li><span>Show Time:</span> {{ $movie->show_time }} </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Duration:</span>{{ $movie->duration }}</li>
                                            <li><span>Price:</span> {{ $movie->price }} TK</li>
                                            <li><span>Show Date:</span> {{ $movie->show_date }} </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                @if (isset(auth()->user()->id))
                                    @if(auth()->user()->role == '2' && $movie->booking_status > 0)
                                    <a class="btn watch-btn" data-toggle="modal" data-target="#exampleModalCenter">
                                        <span>Buy Now</span> <i class="fa fa-angle-right"></i>
                                    </a>
                                    @elseif(auth()->user()->role == '1')
                                    <strong class="p-3 bg-warning text-dark">Login as User to buy a ticket.</strong>
                                    @endif
                                    @if($movie->booking_status <= 0)
                                    <strong class="p-3 bg-danger text-dark">Movie ticket unavailable.</strong>
                                    @endif
                                    
                                @else
                                <strong class="p-3 bg-warning text-dark">To buy a ticket please login first.</strong>
                                @endif
                            </div>

                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Movie Section End -->
</div>
</div><!-- Button trigger modal -->


<!-- Modal -->

<form action="{{ route('buy_ticket') }}" method="POST">
    @csrf
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"> BOOK TICKETS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6 mb-2">
                
                <select class="form-control" name="method">
                    <option>Payment Method</option>
                    <option value="bKash">bKash</option>
                    <option value="Nagad">Nagad</option>
                </select>
            </div>
            <small>(Bkash-01902404958 , Nagad-01693663899)</small>
            <div class="col-md-6 mb-2">
                <input class="form-control" type="text" name="tnx_id" placeholder="Transaction ID">
            </div>
            <div class="col-md-6">
                <select class="form-control" name="show_time">
                    <option>Show Time</option>
                    <option value="9:00 AM">9:00 AM</option>
                    <option value="12:00 PM">01:00 PM</option>
                    <option value="4:00 PM">05:00 PM</option>
                    <option value="7:00 PM">09:00 PM</option>
                </select>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="date" name="show_date" placeholder="Transaction ID">
            </div>
            <div class="col-md-6 mt-2">
                <select class="form-control" name="branch">
                    <option>Select Branch</option>
                    <option value="Uttara">Uttara</option>
                    <option value="Bashundhara">Dhanmondi</option>
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <input class="form-control" type="number" name="qty" id="qty" min="1" placeholder="Ticket quantity">
            </div>
            <div class="col-md-6 mt-2">
                <input class="form-control" id="price" type="text" readonly name="price"  placeholder="Total price"> 
                <button type="button" id="calculate" class="btn btn-primary btn-small">Calculate</button>
            </div>
            
            <input class="form-control" type="hidden" name="ticket_number" value="{{ uniqid() }}">
            @auth
            <input class="form-control" type="hidden" name="movie_id" value="{{ $movie->id }}">
            <input class="form-control" type="hidden" name="movie_name" value="{{ $movie->name }}">
            <input class="form-control" type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input class="form-control" type="hidden" name="user_name" value="{{ auth()->user()->name }}">
            @endauth
            
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">BOOK NOW</button>
      </div>
    </div>
  </div>
</div>

</form>


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
                    <a href="{{route('movies')}}"><img src="{{ asset('frontend/img/logos/home2.png')}}" alt=""></a>
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

<!-- Js Plugins -->
<script src="{{ asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/player.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('frontend/js/mixitup.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.slicknav.js')}}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/js/main.js')}}"></script>

<script>
    $("#calculate").click(function(){
        let movie_price = parseInt({{ $movie->price }});
        let qty = parseInt($("#qty").val());

        if(!isNaN(qty)){
            $("#price").val(movie_price*qty);
        }
    });
</script>
</body>

</html>