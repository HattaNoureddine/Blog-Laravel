@extends('guest.layout')
@section('content')
<section class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
      <ol class="breadcrumb">
          <li><a href="#">accueil</a></li>
        <li class="active">ajouter un article</li>
      </ol>
                <h1 class="page-title">Ajouter un article</h1>
                <p class="page-subtitle">AI-Africa</p>
                <div class="line thin"></div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif 
                <div class="page-description">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h3>les règlements</h3>
                            <p>
                                Aliquam in maximus massa. In magna dolor, efficitur vitae faucibus sagittis, elementum quis lacus. Aliquam pretium sem lectus, vitae gravida ex efficitur vitae.
                            </p>
                            <p>
                                Phone: <span class="bold">+123 45 678 9</span> <br>
                                Email: <span class="bold">hi@yourcompany.com</span>
                                <br>
                                <br>
                                Syarifuddin Street<br>
                                Indonesia, Bogor Barat 16115
                            </p>
                        </div>
                        
                        <div class="col-md-6 col-sm-6">
                            <form action="/user/article/store" method="POST" enctype="multipart/form-data" class="row contact" id="contact-form">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Titre <span class="required"></span></label>
                                        <input type="text" class="form-control" name="name" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Categorie <span class="required"></span></label>
                                        <select class="form-select" name="categorie" >
                                        @foreach ($categories as $item)
                                            <option selected>Categories</option>
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description <span class="required"></span></label>
                                        <textarea class="form-control" name="description" required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection