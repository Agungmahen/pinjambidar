<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Font Awesome 6 Free -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  <body>
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-light"> --}}
      <nav class="navbar navbar-expand-lg navbar-dark bg-light shadow">

        <div class="container-fluid">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQZ--DVJrjEIlDffr0wFkn_itwUUPYrggwVw&s" width="3%" alt="">
          {{-- <img src="{{asset('image/logo.jpg')}}" width="3%" alt=""> --}}
          <a class="navbar-brand" style="color: black;margin-left: 10px;font-weight: bold" href="#">Bina Darma Pinjam Barang</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <button class="btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Menu</button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                    <center>
                        <img width="30%" class="mb-3 rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNFExICXEItiU4Oj7lUYd3k8VkjEaz-08R_g&s"  alt="">
                    </center>
                    <hr>
                    <div class="mb-2">
                        <a href="{{url('/')}}" class="btn btn-outline-primary w-100 rounded-pill">Beranda</a>
                    </div>
                    @if(Auth::user())
                    <div class="mb-2">
                        <a href="{{url('barangmasuk')}}" class="btn btn-outline-primary w-100 rounded-pill">Barang Masuk</a>
                    </div>
                    <div class="mb-2">
                        <a href="{{url('barangkeluar')}}" class="btn btn-outline-primary w-100 rounded-pill">Barang Keluar</a>
                    </div>
                    <div class="mb-2">
                      <a href="{{url('logout')}}" class="btn btn-outline-primary w-100 rounded-pill">Logout</a>
                    </div>
                    @else
                    <div class="mb-2">
                        <a href="{{url('login')}}" class="btn btn-outline-primary w-100 rounded-pill">Login</a>
                    </div>
                    @endif
                  </div>
                </div>
             
             
            </ul>
           
          </div>
        </div>
      </nav>

      <div>
        {{-- memanggil section --}}
        @yield('content')
      </div>
      
      
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>