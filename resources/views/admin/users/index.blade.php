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
             <h4>liste users</h4>
             <hr>
             <div class="mt-2">
              <form action="/admin/user/search" method="post">
                @csrf
                <div class="row">
                  <div class="col-5">
                    <input class="form-control" type="text" name="user_name" placeholder="taper un nom ...">
                  </div>
                  <div class="col-2">
                    <button class="btn btn-success" type="submit">Search</button>
                  </div>
                </div>
              </form>
            </div>
                <div class="mt-8"> 
                    <div id="tableExample2" data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                        <div class="table-responsive scrollbar">
                          <table class="table table-bordered table-striped fs--1 mb-0">
                            <thead class="bg-200 text-900">
                              <tr>
                                <th class="sort" data-sort="email">Name</th>
                                <th class="sort" data-sort="age">Email</th>
                                <th class="sort" data-sort="age">Etat</th>
                                <th class="sort" data-sort="age">Actions</th>
                              </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($users as $index => $item)
                                <tr>
                                  <td>{{ $item->name }}</td>
                                  <td>{{ $item->email }}</td>
                                  <td>
                                  @if ($item->is_active)
                                      <span class="badge bg-success">Utilisateur Active</span>
                                  @else
                                      <span class="badge bg-danger">Utilisateur Bloquee</span>
                                  @endif
                                  </td>
                                  <td>
                                  @if ($item->is_active)
                                  <a href="/admin/users/{{ $item->id }}/bloquer" class="btn btn-danger">Bloquer</a>
                                  @else
                                  <a href="/admin/users/{{ $item->id }}/activer" class="btn btn-success">Activer</a>
                                  @endif
                                  </td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                          <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                          <ul class="pagination mb-0"></ul>
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



    <script src="{{ asset('adminassets/js/phoenix.js') }}"></script>
    <script src="{{ asset('adminassets/js/ecommerce-dashboard.js') }}"></script>
  </body>

</html>