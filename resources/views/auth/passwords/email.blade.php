{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="{{ asset('userassets/scripts/bootstrap/bootstrap.min.css') }}">
		<!-- IonIcons -->
		<link rel="stylesheet" href="{{ asset('userassets/scripts/ionicons/css/ionicons.min.css') }}">
		<!-- Toast -->
		<link rel="stylesheet" href="{{ asset('userassets/scripts/toast/jquery.toast.min.css') }}">
		<!-- OwlCarousel -->
		<link rel="stylesheet" href="{{ asset('userassets/scripts/owlcarousel/dist/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('userassets/scripts/owlcarousel/dist/assets/owl.theme.default.min.css') }}">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="{{ asset('userassets/scripts/magnific-popup/dist/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ asset('userassets/scripts/sweetalert/dist/sweetalert.css') }}">
		<!-- Custom style -->
		<link rel="stylesheet" href="{{ asset('userassets/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('userassets/css/skins/all.css') }}">
		<link rel="stylesheet" href="{{ asset('userassets/css/demo.css') }}">
	</head>
<body>
    <header class="primary">
        <div class="firstbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="brand">
                            <a href="/">
                                <img src="{{ asset('userassets/images/logo.png') }}" alt=" Logo">
                            </a>
                        </div>						
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <form class="search"  action="/user/search" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="keywords" class="form-control" placeholder="Type something here">									
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><i class="ion-search"></i></button>
                                    </div>
                                </div>
                            </div>
                         
                        </form>								
                    </div>
               
                </div>
            </div>
        </div>

        <!-- Start nav -->
        <nav class="menu">
            <div class="container">
                <div class="brand">
                    <a href="#">
                        <img src="{{ asset('userassets/images/logo.png') }}" alt=" Logo">
                    </a>
                </div>
                <div class="mobile-toggle">
                    <a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
                </div>
                <div class="mobile-toggle">
                    <a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
                </div>
               
            </div>
        </nav>
        <!-- End nav -->
    </header>







<section class="login first grey">
    <div class="container">
        <div class="box-wrapper">				
            <div class="box box-border">
                <div class="box-body">
                    <h4>Reset</h4>
                    <form>
                    
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                       
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                        </div>
                        <div class="form-group text-center">
                            <span class="text-muted">Back to login?</span> <a href="/login">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>






 <!-- Start footer -->
 <footer class="footer">
    <div class="container">
       
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    COPYRIGHT &copy; MAGZ 2017. ALL RIGHT RESERVED.
                    <div>
                        Made with <i class="ion-heart"></i> by <a href="http://kodinger.com">Kodinger</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<!-- JS -->
<script src="{{ asset('userassets/js/jquery.js') }}"></script>
<script src="{{ asset('userassets/js/jquery.migrate.js') }}"></script>
<script src="{{ asset('userassets/scripts/bootstrap/bootstrap.min.js') }}"></script>
<script>var $target_end=$(".best-of-the-week");</script>
<script src="{{ asset('userassets/scripts/jquery-number/jquery.number.min.js') }}"></script>
<script src="{{ asset('userassets/scripts/owlcarousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('userassets/scripts/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('userassets/scripts/easescroll/jquery.easeScroll.js') }}"></script>
<script src="{{ asset('userassets/scripts/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ asset('userassets/scripts/toast/jquery.toast.min.js') }}"></script>
<script src="{{ asset('userassets/js/demo.js') }}"></script>
<script src="{{ asset('userassets/js/e-magz.js') }}"></script>
</body>
</html>
