<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Management IFN</title>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
  <link href="<?= base_url().'assets/plugins/bootstrap/dist/css/bootstrap.min.css' ?>" rel="stylesheet">
  <link href="<?= base_url().'assets/plugins/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet">
  <link href="<?= base_url().'assets/css/templatemo-style.css' ?>" rel="stylesheet">
  <link href="<?= base_url().'assets/css/style.css' ?>" rel="stylesheet">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

  </head>
  <body>
    <!-- Preloader -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Preloader -->
    <div class="tm-top-header" style="background-color: #495464;">
      <div class="container">
        <div class="row">
          <div class="tm-top-header-inner">
            <div class="tm-logo-container">
              <img src="<?= base_url().'assets/' ?>images/logo2.png" alt="Logo" class="gb-kecil">
              <h1 class="tm-site-name tm-handwriting-font" style="color: white;">Payroll</h1>
            </div>
            <div class="mobile-menu-icon">
              <i class="fa fa-bars"></i>
            </div>
            <nav class="tm-nav">
              <ul>
                <li><a href="<?= base_url() ?>" class="active">Home</a></li>
                <li><a href="today-special.html">Today Special</a></li>
                <li><a href="menu.html">Menu</a></li>
                <li><a href="<?= base_url().'login/logout' ?>">Logout</a></li>
              </ul>
            </nav>   
          </div>           
        </div>    
      </div>
    </div>
    <section class="tm-welcome-section" style="background-color: #bbbfca;">
      <div class="container tm-position-relative">
<!--         <div class="tm-lights-container">
          <img src="img/light.png" alt="Light" class="light light-1">
          <img src="img/light.png" alt="Light" class="light light-2">
          <img src="img/light.png" alt="Light" class="light light-3">  
        </div> -->        
        <div class="row tm-welcome-content">
          <h2 class="black-text tm-handwriting-font tm-welcome-header">Selamat Datang</h2>
          <h2 class="black-text tm-welcome-header-1">Payroll Management PT.Indoneptune Net</h2>   
        </div>
        <img src="<?= base_url().'assets/' ?>images/table-set.png" alt="Table Set" class="tm-table-set img-responsive">             
      </div>      
    </section>
    <div class="tm-main-section light-gray-bg">
      <div class="container" id="main">        
        <section class="tm-section tm-section-margin-bottom-0 row">
          <div class="col-lg-12 tm-section-header-container">
            <h2 class="tm-section-header gold-text tm-handwriting-font">Our Menu</h2>
            <div class="tm-hr-container"><hr class="tm-hr"></div>
          </div>
          <div class="col-lg-12 tm-popular-items-container">
            <div class="tm-popular-item">
              <img src="<?= base_url().'assets/' ?>images/popular-1.jpg" alt="Popular" class="tm-popular-item-img">
              <div class="tm-popular-item-description">
                <h3 class="tm-handwriting-font tm-popular-item-title"><span class="tm-handwriting-font bigger-first-letter">H</span>uman</h3><hr class="tm-popular-item-hr">
                <p>Data Bagian, <br> Data Personil, <br> Master Gaji, <br> Pengajuan Cuti</p>
                <div class="order-now-container">
                  <a href="#" class="order-now-link tm-handwriting-font">Masuk</a>
                </div>
              </div>              
            </div>
            <div class="tm-popular-item">
              <img src="<?= base_url().'assets/' ?>images/popular-2.jpg" alt="Popular" class="tm-popular-item-img">
              <div class="tm-popular-item-description">
                <h3 class="tm-handwriting-font tm-popular-item-title"><span class="tm-handwriting-font bigger-first-letter">p</span>ayroll</h3><hr class="tm-popular-item-hr">
                <p>Gaji personil</p>
                <div class="order-now-container">
                  <a href="#" class="order-now-link tm-handwriting-font">Masuk</a>
                </div>
              </div>              
            </div>
            <div class="tm-popular-item">
              <img src="<?= base_url().'assets/' ?>images/popular-3.jpg" alt="Popular" class="tm-popular-item-img">
              <div class="tm-popular-item-description">
                <h3 class="tm-handwriting-font tm-popular-item-title"><span class="tm-handwriting-font bigger-first-letter">r</span>eport</h3><hr class="tm-popular-item-hr">
                <p>Laporan data gaji untuk karyawan</p>
                <div class="order-now-container">
                  <a href="#" class="order-now-link tm-handwriting-font">Masuk</a>
                </div>
              </div>              
            </div>
          </div>          
        </section>
      </div>
    </div> 
   <!-- JS -->
  <!-- jQuery 3 -->
  <script src="<?= base_url().'assets/plugins/jquery/jquery-3.3.1.js' ?>"></script>  
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url().'assets/plugins/bootstrap/dist/js/bootstrap.min.js' ?>"></script>
  <script type="text/javascript" src="<?= base_url().'assets/js/templatemo-script.js' ?>"></script>

 </body>
 </html>