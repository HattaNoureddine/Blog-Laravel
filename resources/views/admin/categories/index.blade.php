<!doctype html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Phoenix</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('adminassets/css/phoenix.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('adminassets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    
    <style>
      body {
        opacity: 0;
      }
    </style>
  </head>

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">

@include('admin.include.slidebar')
@include('admin.include.navbar')


        <div class="content">
          <div class="pb-5">
             <h4>liste des categories</h4>
             <hr>
             <div class="mt-2">
              <form action="/admin/categorie/search" method="post">
                @csrf
                <div class="row">
                  <div class="col-5">
                    <input class="form-control" type="text" name="categorie_name" placeholder="taper un nom ...">
                  </div>
                  <div class="col-2">
                    <button class="btn btn-success" type="submit">Search</button>
                  </div>
                </div>
              </form>
            </div>
                <a class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</a>
                <div class="mt-8"> 
                    <div id="tableExample2" data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                        <div class="table-responsive scrollbar">
                          <table class="table table-bordered table-striped fs--1 mb-0">
                            <thead class="bg-200 text-900">
                              <tr>
                                <th class="sort" data-sort="email">name</th>
                                <th class="sort" data-sort="age">description</th>
                                <th class="sort" data-sort="age">image</th>
                                <th class="sort" data-sort="age">Actions</th>
                              </tr>
                            </thead>
                            <tbody class="list">
                          @foreach ($categories as $item)
                          <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td><img width="90px" src="{{ asset('upload') }}/{{ $item->image }}" alt=""></td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#editCategory{{ $item->id }}" class="btn btn-success">modifier</a>
                                <a href="/admin/categories/{{ $item->id }}/delete" class="btn btn-danger mt-2">supprimer</a>
                            </td>
                         </tr>
                          @endforeach
                            </tbody>
                          </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                          <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                        
                          <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                        </div>
                      </div>
                </div>
    
                </div>
        </div>
          </footer>
        </div>
      </div>
    </main>
 <!--modal ajouter-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter categorie</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
      </div>
      <form action="/admin/categories/store" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
            <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput1">Nom category </label>
                <input class="form-control" id="exampleFormControlInput1" name="name" type="text" placeholder="Nom category">
                @error('name')
                    <div class="btn btn-danger">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-0">
                <label class="form-label" for="exampleTextarea">Description Category </label>
                <textarea class="form-control" name="description"  rows="3"> </textarea>
                @error('description')
                <div class="btn btn-danger">
                    {{ $message }}
                </div>
            @enderror
              </div>

              <div class="mb-0">
                <label class="form-label" for="exampleTextarea">image Category </label>
                <input class="form-control" name="image" type="file"  rows="3"> 
                @error('image')
                <div class="btn btn-danger">
                    {{ $message }}
                </div>
            @enderror
              </div>
      </div>
      <div class="modal-footer"><button class="btn btn-primary" type="submit">Okay</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
    </div>
</form>
  </div>
</div>
<!--modal modifier-->

@foreach ($categories as $item)
<div class="modal fade" id="editCategory{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier categorie :<span class="text-primary">{{ $item->name }}</span></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
      </div>
      <form action="/admin/categories/update" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
            <div class="mb-3">
              <input type="hidden" value="{{ $item->id }}" name="id_categorie">
                <label class="form-label" for="exampleFormControlInput1">Nom category </label>
                <input class="form-control" id="exampleFormControlInput1" name="name" type="text" placeholder="Nom category" value="{{ $item->name }}">
                @error('name')
                    <div class="btn btn-danger">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-0">
                <label class="form-label" for="exampleTextarea">Description Category </label>
                <textarea class="form-control" name="description"  rows="3">{{ $item->description }} </textarea>
                @error('description')
                <div class="btn btn-danger">
                    {{ $message }}
                </div>
            @enderror
              </div>
              <div class="mb-0">
                <label class="form-label" for="exampleTextarea">image Category </label>
                <input class="form-control" name="image" type="file"  rows="3"> 
                @error('image')
                <div class="btn btn-danger">
                    {{ $message }}
                </div>
            @enderror
              </div>
      </div>
      <div class="modal-footer"><button class="btn btn-primary" type="submit">Okay</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
    </div>
</form>
  </div>
</div>
@endforeach 
    <script src="{{ asset('adminassets/js/phoenix.js') }}"></script>
    <script src="{{ asset('adminassets/js/ecommerce-dashboard.js') }}"></script>
  </body>

</html>