@extends('guest.layout')
@section('content')
		

		<section class="home">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						<div class="headline">
							<div class="nav" id="headline-nav">
								<a class="left carousel-control" role="button" data-slide="prev">
									<span class="ion-ios-arrow-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" role="button" data-slide="next">
									<span class="ion-ios-arrow-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							<div class="owl-carousel owl-theme" id="headline">							
								<div class="item">
									<a href="#"><div class="badge">Tip!</div> Vestibulum ante ipsum primis in faucibus orci</a>
								</div>
								<div class="item">
									<a href="#">Ut rutrum sodales mauris ut suscipit</a>
								</div>
							</div>
						</div>


					
						<div class="banner">
							<a href="#">
								<img src="{{ asset('userassets/images/ads.png') }}" alt="Sample Article">
							</a>
						</div>
						<div class="line transparent little"></div>
						
						
							
						<div class="line top">
							<div>Just Another News</div>
						</div>
						<div class="row">
							
							@forelse ($posts as $item)
							<article class="col-md-12 article-list">
								<div class="inner">
									<figure>
										<a href="/posts/details/{{ $item->id }}">
											<img src="{{ asset('upload') }}/{{ $item->image }}" alt="Sample Article">
										</a>
									</figure>
									<div class="details">
										<div class="detail">
											<div class="category">
												<a href="/posts/details/{{ $item->id }}">Posts</a>
											</div>
											<div class="time">{{ $item->created_at }}</div>
										</div>
										<h1><a href="/posts/details/{{ $item->id }}">{{ $item->name }}</a></h1>
										<p>
											{{ $item->pt_description }}
										</p>
										<footer>
											<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>j'aime</div></a>
											<a class="btn btn-primary more" href="/posts/details/{{ $item->id }}">
												<div>More</div>
												<div><i class="ion-ios-arrow-thin-right"></i></div>
											</a>
										</footer>
									</div>
								</div>
							</article>
							@empty
								<h3>aucun poste à trouver</h3>
							@endforelse 
                           

						</div>
                        <div class="banner">
							<a href="#">
								<img src="{{ asset('userassets/images/ads.png') }}" alt="Sample Article">
							</a>
						</div>
						<div class="line transparent little"></div>
					</div>
                    
					<div class="col-xs-6 col-md-4 sidebar" id="sidebar">
						<div class="sidebar-title for-tablet">Sidebar</div>
						<aside id="sponsored">
							<h1 class="aside-title">Sponsored</h1>
							<div class="aside-body">
								<ul class="sponsored">
									<li>
										<a href="#">
											<img src="{{ asset('userassets/images/sponsored.png') }}" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="{{ asset('userassets/images/sponsored.png') }}" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="{{ asset('userassets/images/sponsored.png') }}" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="{{ asset('userassets/images/sponsored.png') }}" alt="Sponsored">
										</a>
									</li> 
								</ul>
							</div>
						</aside>
						<aside>
							<h1 class="aside-title">Popular <a href="#" class="all">See All <i class="ion-ios-arrow-right"></i></a></h1>
							<div class="aside-body">
								
								
								@foreach ($categories as $item)
                                <article class="article-mini">
									<div class="inner">
										<figure>
											<a href="/posts/{{ $item->id }}/liste">
												<img src="{{ asset('upload') }}/{{ $item->image }}" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="/posts/{{ $item->id }}/liste">{{ $item->name }}</a></h1>
										</div>
									</div>
								</article>
                                @endforeach
							
								
								
							</div>
						</aside>
						{{-- <aside>
							<div class="aside-body">
								<form class="newsletter" action="/user/email/store" method="POST">
									@csrf	
                                    @method('PUT')
									<div class="icon">
										<i class="ion-ios-email-outline"></i>
										<h1>Newsletter</h1>
									</div>
									<div class="input-group">
										<input type="email" name="email" class="form-control email" placeholder="Your mail">
										<div class="input-group-btn">
											<button type="submit" class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
										</div>
									</div>
									<p>By subscribing you will receive new articles in your email.</p>
								</form>
							</div>
						</aside> --}}
						
						
						<aside id="sponsored">
							<h1 class="aside-title">Sponsored</h1>
							<div class="aside-body">
								<ul class="sponsored">
									<li>
										<a href="#">
											<img src="{{ asset('userassets/images/sponsored.png') }}" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="{{ asset('userassets/images/sponsored.png') }}" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="{{ asset('userassets/images/sponsored.png') }}" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="{{ asset('userassets/images/sponsored.png') }}" alt="Sponsored">
										</a>
									</li> 
								</ul>
							</div>
						</aside>
					</div>
				</div>
			</div>
		</section>

		

		

@endsection