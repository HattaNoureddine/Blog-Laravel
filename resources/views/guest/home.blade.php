@extends('guest.layout')
@section('content')
		

		<section class="home">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
					


						

						<div class="banner">
							<a href="#">
								<img src="userassets/images/ads.png" alt="Sample Article">
							</a>
						</div>
						
						
							
						<div class="line top">
							<div>tous les articles
							</div>
						</div>
						<div class="row">
							
							@foreach ($posts as $item)
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
                            @endforeach

						</div>
                        <div class="banner">
							<a href="#">
								<img src="userassets/images/ads.png" alt="Sample Article">
							</a>
						</div>
						<div class="line transparent little"></div>
					</div>
                    
					<div class="col-xs-6 col-md-4 sidebar" id="sidebar">
						<div class="sidebar-title for-tablet">publicité</div>
						<aside id="sponsored">
							<h1 class="aside-title">publicité</h1>
							<div class="aside-body">
								<ul class="sponsored">
									<li>
										<a href="#">
											<img src="userassets/images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="userassets/images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="userassets/images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="userassets/images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
								</ul>
							</div>
						</aside>
						<aside>
							<h1 class="aside-title">Categories </h1>
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
						<aside>
							<div class="aside-body">
								<form class="newsletter" action="/user/email/store" method="POST">
									@csrf
									<div class="icon">
										<i class="ion-ios-email-outline"></i>
										<h1>s'abonner</h1>
									</div>
									<div class="input-group">
										<input type="email" name="email" class="form-control email" placeholder="votre email">
										<div class="input-group-btn">
											<button type="submit" class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
										</div>
									</div>
									<p>merci de votre temps.
									</p>
								</form>
							</div>
						</aside>
						
						
						<aside id="sponsored">
							<h1 class="aside-title">PUBLICITÉ</h1>
							<div class="aside-body">
								<ul class="sponsored">
									<li>
										<a href="#">
											<img src="userassets/images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="userassets/images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="userassets/images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="userassets/images/sponsored.png" alt="Sponsored">
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