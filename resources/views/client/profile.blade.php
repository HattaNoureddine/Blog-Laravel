@extends('guest.layout')
@section('content')


<section class="login first grey">
    <div class="container">
        <div class="box-wrapper">				
            <div class="box box-border">
                <div class="box-body">
                    <h4>Modifier Profile </h4>
                    <form action="/user/profile/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" value="{{ auth()->user()->name }}" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" value="{{ auth()->user()->email }}" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="fw">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="nouveau mot de passe">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                        
                        <div class="title-line">
                            or
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection