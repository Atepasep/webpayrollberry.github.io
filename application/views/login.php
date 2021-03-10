<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Payroll Management, Silahkan Login</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,600" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/plugins/bootstrap/dist/css/bootstrap.min.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/plugins/font-awesome/css/font-awesome.min.css' ?>">
  <link href="<?= base_url().'assets/css/stylelogin.css'; ?>" rel="stylesheet">
  <link href="<?= base_url().'assets/css/style.css'; ?>" rel="stylesheet">
  <div class="container">
     <section id="formHolder">

        <div class="row">

           <!-- Brand Box -->
           <div class="col-sm-6 brand">
              <a href="#" class="logo"><img src="<?= base_url().'assets/images/logo2.png' ?>"></a>

              <div class="heading">
                 <h2>Payroll</h2>
                 <p>Manajemen PT. Indoneptune Net</p>
              </div>

              <div class="success-msg">
                 <p style="font-size: 18px;">Selamat, anda berhasil login !</p>
                 <a href="<?php if($this->session->userdata('valid')!=0){ echo base_url().'validasi/clear';}else{ echo base_url().'main'; } ?>" class="btn btn-sm font-tebal" style="background-color: #5D3F32; color: white; border-radius: 0px;">Lanjutkan</a>
                 <a href="<?= base_url().'login/logout' ?>" class="btn btn-sm font-tebal" style="background-color: #e0d7d7; color: black; border-radius: 0px;">Kembali</a>
              </div>
           </div>


           <!-- Form Box -->
           <div class="col-sm-6 form">
              <!-- Login Form -->
              <div class="login form-peice">
                 <form class="login-form" action="<?= $formAction ?>" method="post" id="formsignin" name="formsignin">
                    <div class="pesan">
                      <p><?php echo $this->session->flashdata('msg');?></p>
                    </div>
                    <div class="form-group">
                      <label for="loginemail">Username</label>
                      <input type="text" name="username" id="username">
                    </div>

                    <div class="form-group">
                       <label for="loginPassword">Password</label>
                       <input type="password" name="password" id="password" required>
                    </div>

                    <div class="CTA">
                      <!--<input type="submit" value="Login">-->
                      <button type="submit" class="btn btn-lg font-tebal" style="display: none;">Test</button>
                       <a href="#" class="btn btn-lg font-tebal" id="submitakun" style="background-color: #5D3F32;">Submit</a>
                       <a href="#" class="switch">Belum punya Akun</a>
                    </div>
                 </form>
              </div><!-- End Login Form -->


              <!-- Signup Form -->
              <div class="signup form-peice switched">
                 <form class="signup-form" action="<?= $formAction2 ?>" method="post" id="formsignup">

                    <div class="form-group">
                       <label for="name">Nama Lengkap</label>
                       <input type="text" name="name" id="name" class="name">
                       <span class="error"></span>
                    </div>

                    <div class="form-group">
                       <label for="phone">NIK</small></label>
                       <input type="text" name="noinduk" id="noinduk">
                    </div>

                    <div class="form-group">
                       <label for="email">Alamat Email</label>
                       <input type="email" name="email" id="email" class="email">
                       <span class="error"></span>
                    </div>

                    <div class="form-group">
                       <label for="name">Username</label>
                       <input type="text" name="username" id="username" class="name">
                       <span class="error"></span>
                    </div>

                    <div class="form-group">
                       <label for="password">Password</label>
                       <input type="password" name="password" id="password" class="pass">
                       <span class="error"></span>
                    </div>

                    <div class="CTA">
                       <!--<input type="submit" value="Signup Now" id="submit">-->
                       <a href="#" class="btn btn-lg font-tebal" id="submitakunbaru" style="background-color: #5D3F32;">Submit</a>
                       <a href="#" class="switch">Sudah punya Akun</a>
                    </div>
                 </form>
              </div><!-- End Signup Form -->
           </div>
        </div>

     </section>
  </div>
  <!-- jQuery 3 -->
  <script src="<?= base_url() ?>assets/plugins/jquery/jquery-3.3.1.js"></script>  
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= base_url().'assets/js/jslogin.js' ?>"></script>
  <?php
    if($this->session->flashdata('msgx')=='suksesbrad'){ ?>
      <script type="text/javascript">
        setTimeout(function () { $('.signup, .login').hide(); }, 700);
        setTimeout(function () { $('.brand').addClass('active'); }, 300);
        setTimeout(function () { $('.heading').addClass('active'); }, 600);
        setTimeout(function () { $('.success-msg p').addClass('active'); }, 900);
        setTimeout(function () { $('.success-msg a').addClass('active'); }, 1050);
        setTimeout(function () { $('.form').hide(); }, 700);
      </script>
   <?php }
  ?>
 </body>
 </html>