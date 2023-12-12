

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
            <div class="row g-5">
              <div class="col-12 col-xxl-6">
              <div class="mb-8">
                <h2 class="mb-2">Admin Dashboard</h2>
                <h5 class="text-700 fw-semi-bold">Here’s what’s going on at your business right now</h5>
              </div>
              <div class="row align-items-center g-4">
                <div class="col-12 col-md-auto">
                  <div class="d-flex align-items-center"><img src="{{ asset('adminassets/img/icons/illustrations/4.png') }}" alt="" height="46" width="46">
                    <div class="ms-3">
                      <h4 class="mb-0">{{ count($categories) }} categories</h4>
                      <p class="text-800 fs--1 mb-0">All categories</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-auto">
                  <div class="d-flex align-items-center"><img src="{{ asset('adminassets/img/icons/illustrations/2.png') }}" alt="" height="46" width="46">
                    <div class="ms-3">
                      <h4 class="mb-0">{{ count($posts) }} Posts</h4>
                      <p class="text-800 fs--1 mb-0">All Posts</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-auto">
                  <div class="d-flex align-items-center"><img src="{{ asset('adminassets/img/icons/illustrations/3.png') }}" alt="" height="46" width="46">
                    <div class="ms-3">
                      <h4 class="mb-0">{{ count($reviews) }} Reviews</h4>
                      <p class="text-800 fs--1 mb-0">all reviews</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-auto">
                  <div class="d-flex align-items-center"><img src="{{ asset('adminassets/img/icons/illustrations/3.png') }}" alt="" height="46" width="46">
                    <div class="ms-3">
                      <h4 class="mb-0">{{ count($users) }} Users</h4>
                      <p class="text-800 fs--1 mb-0">All Users</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-auto">
                  <div class="d-flex align-items-center"><img src="{{ asset('adminassets/img/icons/illustrations/3.png') }}" alt="" height="46" width="46">
                    <div class="ms-3">
                      <h4 class="mb-0">{{ count($admins) }} admins</h4>
                      <p class="text-800 fs--1 mb-0">all Admins</p>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
        </div>
      </div>
    <script src="{{ asset('adminassets/js/phoenix.js') }}"></script>
    <script src="{{ asset('adminassets/js/ecommerce-dashboard.js') }}"></script>
  </body>

</html>