<!DOCTYPE html>
<!-- saved from url=(0053) -->
<html lang="en"><link type="text/css" rel="stylesheet" id="dark-mode-general-link"><link type="text/css" rel="stylesheet" id="dark-mode-custom-link"><style type="text/css" id="dark-mode-custom-style"></style><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=0.8, shrink-to-fit=no">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url("assets/pemilu/Offcanvas_files/icon.png?ver1.1") ?>">
    <title>Sahkan Pilihanmu</title>

    <link rel="canonical" href="">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/pemilu') ?>/Offcanvas_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/pemilu') ?>/Offcanvas_files/pricing.css" rel="stylesheet">
    <style type="text/css">
      @-webkit-keyframes glow {
          to {
          box-shadow: 0 0 12px #eb3434;
          }
      }

      .modal_foto {
        max-width: 381px;
      }

      .myGlower {
        background-color: #fff;
          z-index: -1;
          animation: glow 500ms infinite alternate;  
          -webkit-animation: glow 500ms infinite alternate;  
           -webkit-transition: border 1.0s linear, box-shadow 1.0s linear;
             -moz-transition: border 1.0s linear, box-shadow 1.0s linear;
                  transition: border 1.0s linear, box-shadow 1.0s linear;
      }
      .myGlower:active{
        background-color: #eee;
      }
      .foto{
        height: 300px;
        background-size: cover;
        background-position: center;
      }
      .glow{
        box-shadow: 0 0 0px #ccc;
        transition: box-shadow 200ms ease;
      }
      .glow:hover{
        box-shadow: 0 0 12px #666666;
      }
      body{
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom right;
        background-attachment: fixed;
      }
    </style>

    
    <!-- Loader -->
    <style>
      /* Absolute Center Spinner */
      .loading {
        position: fixed;
        z-index: 999;
        height: 2em;
        width: 2em;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
      }

      /* Transparent Overlay */
      .loading:before {
        content: '';
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
          background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

        background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
      }

      /* :not(:required) hides these rules from IE9 and below */
      .loading:not(:required) {
        /* hide "loading..." text */
        font: 0/0 a;
        color: transparent;
        text-shadow: none;
        background-color: transparent;
        border: 0;
      }

      .loading:not(:required):after {
        content: '';
        display: block;
        font-size: 10px;
        width: 1em;
        height: 1em;
        margin-top: -0.5em;
        -webkit-animation: spinner 150ms infinite linear;
        -moz-animation: spinner 150ms infinite linear;
        -ms-animation: spinner 150ms infinite linear;
        -o-animation: spinner 150ms infinite linear;
        animation: spinner 150ms infinite linear;
        border-radius: 0.5em;
        -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
      box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
      }

      /* Animation */

      @-webkit-keyframes spinner {
        0% {
          -webkit-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -ms-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }
        100% {
          -webkit-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -ms-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @-moz-keyframes spinner {
        0% {
          -webkit-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -ms-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }
        100% {
          -webkit-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -ms-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @-o-keyframes spinner {
        0% {
          -webkit-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -ms-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }
        100% {
          -webkit-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -ms-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @keyframes spinner {
        0% {
          -webkit-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -ms-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }
        100% {
          -webkit-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -ms-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      .card {
        transition: all 300ms ease-out;
        margin-top: 20px!important;
        margin-bottom: 20px!important;
        background-color: #e7e7e8;
        border: none;
        border-radius: 5%;
      }
    </style>

    <!-- animasi particle network -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/particle_animation/style.css">
    
  </head>

  <body style="background: #ffffff; /*background-image: url('<?php echo base_url() . 'assets/pemilu/bg.jpg' ?>');*/">

    <!-- animasi particle networks -->
    <canvas id="canvas"></canvas>

    <div class="loading">Loading???</div>

    

    <!-- <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 border-bottom box-shadow bg-dark border-dark text-light">
      <h5 class="my-0 mr-md-auto font-weight-normal">HMP Teknik Informatika</h5>
    </div> -->

    <div class="container" style="height:100vh;">

      <div class="col-12 text-center d-flex justify-content-center" style="margin-top:30%;">
        <?php if ( $this->session->flashdata('alert') ) {
          echo $this->session->flashdata('alert');
        } ?>

        
      </div>

      <div class="row mb-3 text-center d-flex justify-content-center">
      
          <div class="card box-shadow m-2" style="width: 390px; cursor: pointer; border: 0px solid black;">
            <div class="card-body">
              <h3 class="card-title pricing-card-title nama_panjang text-center">Validasi Google</h3>
              <p class=" container">
                <i>Kirimkan dukungan kamu dengan sign in memakai akun google <strong>@fikom.udb.ac.id</strong> atau <strong>@mhs.udb.ac.id</strong> khusus mahasiswa Universitas Duta Bangsa.</i>
              </p>
              <hr>
              <?php echo form_open( base_url() . 'ormawa/pass/' ) ?>
                <a href="<?php echo $auth_url ?>" class="btn btn-lg btn-block mb-4 text-dark myGlower"> <img style="width: 30px;" src="https://developers.google.com/identity/images/g-logo.png"> Sign in with Google</a>
              </form>

              <a href="<?php echo base_url() ?>">Kembali</a> 
              

            </div>
          </div>
          <!-- Satu item -->

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <script src="<?= base_url('assets/pemilu') ?>/Offcanvas_files/holder.min.js.download"></script>
    <script src="<?= base_url('assets/pemilu') ?>/Offcanvas_files/offcanvas.js.download"></script> -->

    

    <!-- animasi particle network -->
    <script src='https://rawgit.com/JulianLaval/canvas-particle-network/master/particle-network.min.js'></script>
    <script  src="<?= base_url() ?>assets/particle_animation/script.js"></script>

    <script type="text/javascript">

      // Saat loaded, maka sembunyikan loader
      $(document).ready(function() {
        $('.loading').fadeOut('slow');
      })
    </script>
  
