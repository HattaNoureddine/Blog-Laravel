@extends('guest.layout')
@section('content')
		
		<section class="single">
			<div class="container">
				<div class="row">
					<div class="col-md-4 sidebar" id="sidebar">
						<aside>
							<div class="aside-body">
								<figure class="ads">
									<img src="{{ asset('userassets/images/ad.png') }}">
									<figcaption>ads publicité</figcaption>
								</figure>
							</div>
						</aside>
						<aside>
							<h1 class="aside-title">Dernier article</h1>
							<div class="aside-body">
								@foreach ($posts as $item)
                                <article class="article-fw">
									<div class="inner">
										<figure>
											<a href="/posts/details/{{ $item->id }}">												
												<img src="{{ asset('upload') }}/{{ $item->image }}">
											</a>
										</figure>
										<div class="details">
											<h1><a href="/posts/details/{{ $item->id }}">{{ $item->name }}</a></h1>
											<p>
											{{ $item->pt_description }}
											</p>
											<div class="detail">
												<div class="time">{{ $item->created_at }}</div>
												<div class="category"><a href="/posts/details/{{ $item->id }}">{{ $item->name }}</a></div>
											</div>
										</div>
									</div>
								</article>
                                @endforeach
								<div class="line"></div>
								
							@foreach ($categories as $item)
                            <article class="article-mini">
                                <div class="inner">
                                    <figure>
                                        <a href="/posts/{{ $item->id }}/liste">
                                            <img src="{{ asset('upload') }}/{{ $item->image }}">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <h1><a href="/posts/{{ $item->id }}/liste">{{ $item->name }}.</a></h1>
                                        <div class="detail">
                                            <div class="category"><a href="/posts/{{ $item->id }}/liste">{{ $item->name }}</a></div>
                                            <div class="time">{{ $item->created_at }}</div>
                                        </div>
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
										<h1>s'abooner</h1>
									</div>
									<div class="input-group">
										<input type="email" name="email" class="form-control email" placeholder="votre email">
										<div class="input-group-btn">
											<button type="submit" class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
										</div>
									</div>
									<p>merci de votre temps.

										.</p>
								</form>
							</div>
						</aside>
					</div>
					<div class="col-md-8">
						<ol class="breadcrumb">
						  <li><a href="/">Home</a></li>
						</ol>
						<article class="article main-article">
							<header>
								<h1>{{ $post->name }}</h1>
								<ul class="details">
									<li>{{ $post->created_at }}</li>
									<li><a>{{ $post->name }}</a></li>
								</ul>
							</header>
							<div class="main">
								<p>{{ $post->pt_description }}.</p>
								<div class="featured">
									<figure>
										<img src="{{ asset('upload') }}/{{ $post->image }}">
										<figcaption>Image by pexels.com</figcaption>
									</figure>
								</div>

								<p>{{ $post->description }}</p>.

								
							</div>
							
						</article>
						<div class="sharing">
						<div class="title"><i class="ion-android-share-alt"></i> PARTAGER C'EST AIMER
						</div>
							<ul class="social">
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
						
						<div class="line thin"></div>
						<h2 class="title">{{ count($post->reviews) }} Commentaire <a href="#">Ecrire un commentaire !</a></h2>
						<div class="line thin"></div>

								@foreach ($post->reviews as $item)
								<div class="comments">
									<div class="comment-list">
										<div class="item">
											<div class="user">                                
												<figure>
													<img src="{{ asset('upload') }}/{{ $item->user->image }}">
												</figure>
												<div class="details">
													<h5 class="name">{{ $item->user->name }}</h5>
													<div class="time">{{ $item->created_at }}</div>
													<div class="description">
                                                           {{ $item->content }}
													</div>
												</div>
											</div>
										</div>
									</div>
								@endforeach
                                
							<form class="row" action="/user/review/store" method="POST">
								
								<div class="col-md-12">
									<h3 class="title">Ecrire un commentaire !</h3>
								</div>
								<div class="form-group col-md-4">
									@csrf
									<input type="hidden" value="{{ $post->id }}" name="post_id">
									<label for="name">Nome <span class="required"></span></label>
									<input type="text" id="name" name="name" class="form-control">
								</div>
								<div class="form-group col-md-12">
									<label for="message">Comment <span class="required"></span></label>
									<textarea class="form-control" name="content" placeholder="ecrire votre commanteire ..."></textarea>
								</div>
								<div class="form-group col-md-12">
									<button type="submit" class="btn btn-primary">Envoyer</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

@endsection