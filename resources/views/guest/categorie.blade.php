@extends('guest.layout')
@section('content')
		

		<section class="category">
		  <div class="container">
		    <div class="row">
		      <div class="col-md-8 text-left">
		        <div class="row">
		          <div class="col-md-12">        
		            <ol class="breadcrumb">
		              <li><a href="/">Home</a></li>
		            </ol>
		            <h1 class="page-title">categorie: {{ $categorie->name }}</h1>
		            <p class="page-subtitle">Affichage de tous les articles avec catégorie
						<i>{{ $categorie->name }}</i></p>
		          </div>
		        </div>
		        <div class="line"></div>
		        <div class="row">
		         
		          
		         @foreach ($posts as $item)
                     
		          <article class="col-md-12 article-list">
		            <div class="inner">
		              <figure>
			              <a href="/posts/details/{{ $item->id }}">
			                <img src="{{ asset('upload') }}/{{ $item->image }}">
		                </a>
		              </figure>
		              <div class="details">
		                <div class="detail">
		                  <div class="category">
		                   <a href="/posts/details/{{ $item->id }}">{{ $item->categorie->name }}</a>
		                  </div>
		                  <div class="time">{{ $item->created_at }}</div>
		                </div>
		                <h1><a href="/posts/details/{{ $item->id }}">{{ $item->name }}</a></h1>
		                <p>
		               {{ $item->pt_description	 }}
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
		          <div class="col-md-12 text-center">
		            <ul class="pagination">
		              <li class="prev"><a href="#"><i class="ion-ios-arrow-left"></i></a></li>
		              <li class="active"><a href="#">1</a></li>
		              
		              <li class="next"><a href="#"><i class="ion-ios-arrow-right"></i></a></li>
		            </ul>
		          
		          </div>
		        </div>
		      </div>
		      <div class="col-md-4 sidebar">
		        <aside>
		          <div class="aside-body">
		            <figure class="ads">
			            <a href="single.html">
			              <img src="{{ asset('userassets/images/ad.png') }}">
			            </a>
		              <figcaption>publicité</figcaption>
		            </figure>
		          </div>
		        </aside>
		        <aside>
		          <h1 class="aside-title">Categories</h1>
		          <div class="aside-body">
		            <div class="line"></div>
		       @foreach ($categories as $item)
		          
		            <article class="article-mini">
                        <div class="inner">
                          <figure>
                              <a href="single.html">
                                <img src="{{ asset('upload') }}/{{ $item->image }}">
                            </a>
                          </figure>
                          <div class="padding">
                            <h1><a href="/posts/{{ $item->id }}/liste">{{ $item->name }}</a></h1>
                            <div class="detail">
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
		                <h1>s'abonner
						</h1>
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
		      </div>
		    </div>
		  </div>
		</section>


@endsection