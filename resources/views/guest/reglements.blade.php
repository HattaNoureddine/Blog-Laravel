@extends('guest.layout')
@section('content')
<section class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
      <ol class="breadcrumb">
          <li><a href="/">Acceuil</a></li>
        <li class="active">Reglements</li>
      </ol>
                <h1 class="page-title">Reglements de site</h1>
                <p class="page-subtitle">AI Africa</p>
                <div class="line thin"></div>
                <div class="page-description">
                    
                    @foreach ($reglements as $item)
                    <h4>{{ $item->titre }}</h4>
                    <p>
                        {{ $item->description }}
                    </p>
                    @endforeach
                 
                    
                    <div class="question">
                        Have a question? <a href="/user/contact" class="btn btn-primary">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection