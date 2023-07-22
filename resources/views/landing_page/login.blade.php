<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIGNAL-NU</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/img/LOGO MMII.png" rel="icon">
  <link href="/img/LOGO MMII.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/') }}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('/') }}assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('/') }}assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="{{ asset('/') }}asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="{{ asset('/') }}asset/css/ruang-admin.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/') }}assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact - v1.1.1
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<section class="login">
    <div class="container">

        <div style="text-align:center">
          <h2><b> LOGIN SIGNAL-NU </b></h2>
          <P>Sistem Digitalisasi Administrasi Organisasi Pelajar Nahdlatul Ulama</P><br>
        </div>

        <div class="row gx-lg-0 gy-0">
          <div class="col-lg-4">
            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <img src="img/loginippnu.png" alt="" width="250" >
            </div>
          </div>

          <div class="col-lg-8">
            <form action={{url("login/proses")}} method="POST">
              @csrf
              <div class="php-email-form">
              <div class="row">
                <div class="form-group mt-2">
                <p>Username</p>
                  <input type="text" class="form-control" name="email" placeholder="Masukan Username" autofocus required>
                </div>
                </div>
                <div class="form-group mt-2">
                <p>Password</p>
                <input type="password" class="form-control" name="password" placeholder="Masukan Password" required> <br>
              </div>
              
              <div class="text-center">
                <button type="submit">Login</button>
            </div>
          </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section>
    

      <!-- Vendor JS Files -->
  <script src="{{ asset('/') }}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/') }}assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('/') }}assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('/') }}assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('/') }}assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('/') }}assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('/') }}assets/vendor/php-email-form/validate.js"></script>

  <script src="{{ asset('/') }}asset/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('/') }}asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/') }}asset/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="{{ asset('/') }}asset/js/ruang-admin.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/') }}assets/js/main.js"></script>

</body>

</html>