<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WEB INDOKU</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets')}}/img/favicon.png" rel="icon">
  <link href="{{asset('assets')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
    <link href="{{asset('assets')}}/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>


  <!-- Template Main CSS File -->
  <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Day - v4.10.0
  * Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
@include('landing_page.layouts.navbar')
@yield('template')
@include('landing_page.layouts.footer')

     <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets')}}/vendor/aos/aos.js"></script>
  <script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('assets')}}/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('assets')}}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('assets')}}/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('assets')}}/vendor/php-email-form/validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
   <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"
      charset="utf-8"
    ></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('assets')}}/vendor/purecounter/purecounter_vanilla.js"></script>




  <!-- Template Main JS File -->
  <script src="{{asset('assets')}}/js/main.js"></script>
  <script src="{{asset('assets')}}show.js" charset="utf-8"></script>


  <script>
    var typingEffect=new Typed(".multiText",{
      strings :["Aceh Darussalam","Jakarta","Bali","NTT","NTB","Papua","Yogyakarta","Kalimantan","Sumatra","Sulawesi"],
      loop : true,
      typeSpeed:50,
      backSpeed:40,
      backDelay: 1500

    })
</script>

</body>

</html>