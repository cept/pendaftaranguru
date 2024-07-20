<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISPEGU</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('/lte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/lte/dist/css/adminlte.min.css')}}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
  </head>
  <body>
    <nav class="navbar sticky-top border-body navbar-expand-lg" data-bs-theme="dark" style="background-color: rgb(37, 150, 190);">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="{{asset('/lte/dist/img/logosirnamiskin.png')}}" class="brand-image img-circle elevation-3" alt="logo jangar" width="40px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse px-5" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-light active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-light" href="#contact">Contact</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-light" href="/login">Login</a>
              </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- jumbotron -->

    <div class="text-light pt-5" style="background-color: rgb(37, 150, 190);">
        <div class="container-fluid row">
            <div class="description col-lg-6 mx-auto text-center">
                <h1>SELAMAT DATANG DI SISPEGU</h1>
                <h5 class="m-0">Aplikasi Sistem Seleksi Penerimaan Guru MTs Sirnamiskin</h5>
                <p class="text-sm font-weight-lighter">Jl. Raya Kopo No.429-433, Kota Bandung, Jawa Barat 40235</p>
                <a href="/login" class="btn btn-success"><i class="nav-icon fas fa-arrow-right"></i> Login</a>
            </div>

            {{-- <div id="carouselExampleSlidesOnly" class="carousel slide col mx-3" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('/lte/dist/img/sirmis5.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="{{asset('/lte/dist/img/sirmis6.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="{{asset('/lte/dist/img/sirmis7.jpg')}}" class="d-block w-100" alt="...">
                </div>
              </div>
            </div> --}}
   
        </div>
        
    </div>
    
    <!-- categories -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#2596be" fill-opacity="1" d="M0,96L40,128C80,160,160,224,240,218.7C320,213,400,139,480,112C560,85,640,107,720,112C800,117,880,107,960,122.7C1040,139,1120,181,1200,176C1280,171,1360,117,1400,90.7L1440,64L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg>
    <div class="container-fluid" id="categories">
        <h2 class="text-center">Visi & Misi</h2><br>
        <div class="row justify-content-center">
            <div class="col-lg-4" style="width: 14rem;">
               <p><strong>"TASBEH"</strong></p>
               <P>Terciptanya siswa yang berilmu amaliyah, beramal ilmiah, bertaqwa ilahiyah dan berakhlakul karimah</P>
            </div>
            <div class="col-lg-4" style="width: 14rem;">
               <ol>
                <li>Menciptakan suasana pembelajaran yang kondusif dan berkwalitas bagi siswa</li>
                <li>Menciptakan siswa yang cerdas, terampil sehat jasmani dan rohani</li>
                <li>Menciptakan madrasah unggulan dan menyiapkan para lulusan untuk memasuki jenjang pendidikan tinggi dan siap memasuki dunia kerja</li>
               </ol>
            </div>
        </div>
    </div>

    <!-- contact -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#2596be" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <div class="text-light px-3 text-center" style="background-color: rgb(37, 150, 190); margin-top: -1px;" id="contact">
        {{-- <h2>Buruan kontak admin sekarang juga</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, officiis.</p> --}}
        <a href="https://wa.me/628818388614/?text=Hallo%20kak,%20saya%20tertarik%20dengan%20produknya" target="_blank" class="btn btn-success"><img src="{{asset('/lte/dist/img/icons8-whatsapp.svg')}}" alt="logo wa">Whatsapp Admin</a>
        <div class="d-flex justify-content-center mt-3 mb-3">
            <a href=""><img src="{{asset('/lte/dist/img/icons8-tiktok.svg')}}" alt="logo tiktok"></a>    
            <a href=""><img src="{{asset('/lte/dist/img/icons8-instagram.svg')}}" alt="logo instagram"></a>    
            <a href=""><img src="{{asset('/lte/dist/img/icons8-facebook.svg')}}" alt="logo facebook"></a>    
        </div>
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126744.77674590632!2d107.56127940728116!3d-6.9175681045569934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8c7f42e3f19%3A0xef36624171a94af4!2sYPI%20Pondok%20Pesantren!5e0!3m2!1sid!2sid!4v1720767938545!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <p><p>&copy; 2024 Mts Sirnamiskin.</p></p>
    </div>
    <div style="margin-top: -20px">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#2595be" fill-opacity="1" d="M0,160L48,170.7C96,181,192,203,288,181.3C384,160,480,96,576,74.7C672,53,768,75,864,106.7C960,139,1056,181,1152,181.3C1248,181,1344,139,1392,117.3L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>

    </div>

    <!-- footer -->

    <!-- jQuery -->
    <script src="{{asset('/lte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
  </body>
</html>