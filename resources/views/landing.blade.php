<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
   <link rel="stylesheet" href="css/style.css">
     <!-- Option 1: Include in HTML -->
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
     <!-- Scripts -->
    <title>Landing Page</title>
    <style>
        .navbar{
           position: fixed;
            width:100%;
            z-index:10;
            max-width:100%;
        }
    </style>
</head>
<body>
          <section id="navbar">
            <nav class="navbar navbar-expand-lg bg-light shadow-sm">
              <div class="container">
                <a class="navbar-brand" href="#"><img src="https://i.postimg.cc/G2wBk4b2/minmi.png" alt="" width="150px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 ps-2">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="#about">About</a>
                    </li>
                  </ul>
                  <a href="{{ route ('login') }}" class="btn btn-outline-warning"><i class="fa fa-sign-in-alt"></i> Login </a>
                </div>
              </div>

            </nav>
            </section>
        <section id="carousels">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://i.postimg.cc/xT4KFyQp/Untitled-2.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Welcome to Mimi Petshop</h5>
                      <p>Cari keperluan untuk kucing anda disini</p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </section>

        <section id="products">
            <div class="container pt-5 pb-5">
                <h3 class="pb-2">Product Kami</h3>
                <div class="row">
                  @foreach ($products as $key => $product)
                    <div class="col-md-3">
                        <div class="card mb-4" style="width: 100%;">
                            <img class="card-img-top" src="{{ asset('storage/' . $product->gambar )}}" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title my-0">{{ $product->nama_product }}</h5>
                              <small class="fs-xmall fw-bold bg-warning pe-2 ps-2 pb-1 rounded">{{ $product->categories->category_name }}</small>
                              <p class="card-text my-0 text-warning text-bold">Rp. {{ $product->harga }}</p>
                              <small class="card-text">{{ $product->deskripsi }}</small>
                              <div class="mt-5">
                                
                                <a href="#" class="btn btn-outline-warning fw-bold" style="width:100%"><i class="fab fa-whatsapp"></i> Pesan Sekarang</a>
                              </div>

                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </section>
        <section id="about">
            <!-- Footer -->
            <footer class="text-center text-lg-start bg-light text-muted">
                <div class="container text-center text-md-start mt-3">
                    <div class="row pt-5">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 ">
                        <h6 class="text-uppercase fw-bold mb-4">
                        <img src="https://i.postimg.cc/G2wBk4b2/minmi.png" alt="" width="60%">
                        </h6>
                        <p>Mimi Petshop adalah toko yang menjual berbagai macam kebutuhan hewan terutama kucing</p>
                    </div>
   
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                        Product
                        </h6>
                        <p>
                        <a class="text-reset text-decoration-none">Makanan</a>
                        </p>
                        <p>
                        <a class="text-reset text-decoration-none">Obat</a>
                        </p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                        </h6>
                        <p><a href="profile#home" class="text-reset text-decoration-none">Home</a></p>
                        <p><a href="profile#about" class="text-reset text-decoration-none">About</a></p>
                        <p><a href="profile#products" class="text-reset text-decoration-none">Products</a></p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fa fa-map"></i> Banyuwangi</p>
                        <p><i class="fa fa-envelope"></i> mimisarimi@gmail.com</p>
                        <p><i class="fa fa-phone"></i> 08199651534</p>
                    </div>
                    </div>
                </div>
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2023 Copyright:
                <a class="text-reset fw-bold" href="">Ananda Cahya Ramadan</a>
                </div>
            </footer>
            <!-- Footer -->
        </section>
</body>
</html>