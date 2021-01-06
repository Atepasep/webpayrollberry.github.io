<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Management IFN</title>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
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
            <?php
              $a='';$b='';$c='';
              switch ($header) {
                case 1:
                  $a='active';$b='';$c='';
                  break;
               case 2:
                  $a='';$b='active';$c='';
                  break; 
                default :
                  $a='';$b='';$c='active';
                  break;
              }
            ?>
            <nav class="tm-nav">
              <ul>
                <li><a href="<?= base_url() ?>" class="<?= $a; ?>">Home</a></li>
                <li><a href="<?= base_url().'human' ?>" class="<?= $b ?>">Person</a></li>
                <li><a href="menu.html">Payroll</a></li>
                <li><a href="menu.html">Report</a></li>
                <li><a href="<?= base_url().'login/logout' ?>">Logout</a></li>
              </ul>
            </nav>   
          </div>           
        </div>    
      </div>
    </div>