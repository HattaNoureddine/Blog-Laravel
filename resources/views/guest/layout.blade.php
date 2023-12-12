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
                                <img src="{{ asset('userassets/images/ai.png') }}" alt="Magz Logo">
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
                            <div class="help-block">
                                <div>Popular:</div>
                                <ul>
									@foreach ($popular as $item)
									<li><a href="/">{{ $item->name }}</a></li>
									@endforeach
                                    
                                </ul>
                            </div>
                        </form>								
                    </div>
                    <div class="col-md-3 col-sm-12 text-right">
                        <ul class="nav-icons">
                            @if (Auth::check())
                            <li><a href="/user/profile"><i class="ion-person"></i><div>Profile</div></a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" >
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <i class="ion-log"></i><div>Logout</div></a></li>
                            @else
                            <li><a href="/register"><i class="ion-person-add"></i><div>Register</div></a></li>
                            <li><a href="/login"><i class="ion-person"></i><div>Login</div></a></li>

                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start nav -->
        <nav class="menu">
            <div class="container">
                <div class="brand">
                    <a href="/">
                        <img src="{{ asset('userassets/images/logo.png') }}" alt="Logo">
                    </a>
                </div>
                <div class="mobile-toggle">
                    <a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
                </div>
                <div class="mobile-toggle">
                    <a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
                </div>
                <div id="menu-list">
                    <ul class="nav-list">
                        <li class="dropdown magz-dropdown magz-dropdown-megamenu">
                            <a href="/user/reglements">Reglements 
                            </a>
                        </li>
                        <li class="dropdown magz-dropdown magz-dropdown-megamenu">
                            <a href="/user/contact">Contact 
                            </a>
                        </li>
                        <li class="dropdown magz-dropdown"><a href="#">Categories <i class="ion-ios-arrow-right"></i></a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $item)
                                <li><a href="/posts/{{ $item->id }}/liste">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown magz-dropdown magz-dropdown-megamenu">
                            <a href="#">Posts
                            <i class="ion-ios-arrow-right"></i> 
                            <div class="badge">Hot</div>
                            </a>
                           
                            <div class="dropdown-menu megamenu">
                                <div class="megamenu-inner">
                                    <div class="row">
                                        
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h2 class="megamenu-title"> Posts</h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                          @foreach ($posts as $item)
                                          <article class="article col-md-4 mini">
                                            <div class="inner">
                                                <figure>
                                                    <a href="/posts/details/{{ $item->id }}">
                                                        <img src="{{ asset('upload') }}/{{ $item->image }}" alt="Sample Article">
                                                    </a>
                                                </figure>
                                                <div class="padding">
                                                    <div class="detail">
                                                        <div class="time">{{ $item->created_at }}</div>
                                                        <div class="category"><a href="/posts/details/{{ $item->id }}">{{ $item->categorie->name }}</a></div>
                                                    </div>
                                                    <h2><a href="/posts/details/{{ $item->id }}">{{ $item->name }}</a></h2>
                                                </div>
                                            </div>
                                        </article>
                                          @endforeach
                                            </div>
                                        </div>
                                    </div>								
                                </div>
                            </div>
                        </li>
                        
                        <li class="dropdown magz-dropdown magz-dropdown-megamenu">
                            <a href="/user/article">Article
                                <i class="ion-ios-arrow-right"></i> 
                            <div class="badge">ajouter </div></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End nav -->
    </header>
    
    @yield('content')
    
    <!-- Start footer -->
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">AI - AFRICA</h1>
							<div class="block-body">
								<figure class="foot-logo">
									<img src="{{ asset('userassets/images/logo.png') }}" class="img-responsive" alt="Logo">
								</figure>
								<p class="brand-description">
									Le site web de blog AI Africa est une plateforme en ligne dédiée à l'exploration et à la promotion de l'intelligence artificielle en Afrique.
								</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">s'abonner</h1>
							<div class="block-body">
								<p>En vous abonnant, vous recevrez de nouveaux articles dans votre e-mail.
								</p>
								<form class="newsletter" action="/user/email/store" method="POST">
									@csrf
									<div class="input-group">
										<div class="input-group-addon">
											<i class="ion-ios-email-outline"></i>
										</div>
										<input type="email" name="email" class="form-control email" placeholder="votre e-mail">
									</div>
									<button type="submit" class="btn btn-primary btn-block white">s'abonner</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Posts</h1>
							<div class="block-body">
								
								
                            <article class="article-mini">
                                <div class="inner">
                                    <figure>
                                        <a href="/">
                                            <img src="{{ asset('userassets/images/news/img16.jpg') }}" alt="Sample Article">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <h1><a href="/">Home page</a></h1>
                                    </div>
                                </div>
                            </article>


								<a href="/" class="btn btn-magz white btn-block">Voir tout <i class="ion-ios-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-xs-12 col-sm-6">
						<div class="block">
							<h1 class="block-title">Suivez-nous
							</h1>
							<div class="block-body">
								<p>Suivez-nous et restez en contact pour recevoir les dernières nouvelles
								</p>
								<ul class="social trp">
									@foreach ($socials as $social)
									  <li>
										@if ($social->facebook)
										  <a href="{{ $social->facebook }}" class="facebook">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-facebook"></i>
										  </a>
										@endif
									  </li>
									  <li>
										@if ($social->twitter)
										  <a href="{{ $social->twitter }}" class="twitter">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-twitter-outline"></i>
										  </a>
										@endif
									  </li>
									  <li>
										@if ($social->youtube)
										  <a href="{{ $social->youtube }}" class="youtube">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-youtube-outline"></i>
										  </a>
										@endif
									  </li>
									  <li>
										@if ($social->instagram)
										  <a href="{{ $social->instagram }}" class="instagram">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-instagram-outline"></i>
										  </a>
										@endif
									  </li>
									  <li>
										@if ($social->skype)
										  <a href="{{ $social->skype }}" class="skype">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-skype"></i>
										  </a>
										@endif
									  </li>
									@endforeach
								  </ul>
							</div>
						</div>
						<div class="line"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="copyright">
							COPYRIGHT &copy; {{ date('Y-m-d H:i:s') }}. ALL RIGHT RESERVED.
							<div>
								Made with <i class="ion-heart"></i> by <a href="https://www.linkedin.com/in/noureddine-hatta-465968249/">noureddine hatta</a>
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
    <script src="{{ asset('userassets/js/e-magz.js') }}"></script>
</body>
</html>