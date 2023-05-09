<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <!--============================= Developer: zahidul1994@github.com =============================-->
     <!--============================= Email: mjahid1990@gmail.com =============================-->
     {!! SEO::generate() !!}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="{{asset('frontend/css/simple-line-icons.css')}}">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="{{asset('frontend/css/set1.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    @stack('css')
    <style>
.jackclass{
    background: #0000 !important;
}

    </style>
</head>

<body>
    <!--============================= HEADER =============================-->
    <div class="nav-menu">
        <div class="bg transition">
            <div class="container-fluid fixed background-blue">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="{{url('/ ')}}">{{@Helper::setting()->name}}</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-menu"></span>
              </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{url('/')}}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('blog')}}">Blog</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('rehab-center')}}">Rehab</a>
                                    </li>
                                    
                                    {{-- <li class="nav-item dropdown">
                                        <a class="nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Rehab
                                    <span class="icon-arrow-down"></span>
                                    </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="{{url('rehab')}}">Rehab</a>
                                            <a class="dropdown-item" href="{{url('rehab')}}">Add Rehab</a>
                                           
                                        </div>
                                    </li> --}}
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{url('about')}}">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('contact')}}">Contact</a>
                                    </li>
                                   
                                    <li><a href="{{url('writer/rehab-lists')}}" class="btn btn-outline-light top-btn"><span class="ti-plus"></span> Add Listing</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <footer class="main-block dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-1">
                    <div class="copyright">
                        @include('partial.laravelmessage')
                        <p>Copyright &copy; {{date('Y')}} Listing. All rights reserved |  {{@Helper::setting()->title}} is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="{{('/')}}" target="_blank">StarIT</a></p>
                        <ul>
                            <li><a href="{{@Helper::setting()->facebook}}"><span class="ti-facebook"></span></a></li>
                            <li><a href="{{@Helper::setting()->twitter}}"><span class="ti-twitter-alt"></span></a></li>
                            <li><a href="{{@Helper::setting()->instagram}}"><span class="ti-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-1 mt-2" style=" margin: 0 auto;width:65%">
                    @if ($errors->has('email')) <span class="text-danger alert">{{ $errors->first('email') }}</span> @endif
                    {!! Form::open(['route' => 'subscribetStore', 'method' => 'POST', 'class' => 'd-flex']) !!}
                   
                        {!! Form::email('email',null,array('class' =>'class="form-control','placeholder'=>'Enter Your Email Address','required','max'=>198,'style'=>'width:250px;height:50px' ))!!}
                       

                        <button type="submit" title="Subscribe Now" class="btn btn-sm btn-info"><span
                                class="ti-email"></span> Now </button>
                    
                    </form>
                </div>

            </div>
        </div>
    </footer>
    <!--//END FOOTER -->

    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>

    <script>
    
        $(window).scroll(function() {
            // 100 = The point you would like to fade the nav in.

            if ($(window).scrollTop() > 100) {

                $('.fixed').addClass('is-sticky');

            } else {

                $('.fixed').removeClass('is-sticky');

            };
        });
    </script>
        @stack('js')
</body>

</html>
