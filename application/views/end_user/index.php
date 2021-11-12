<!DOCTYPE html>
<!-- saved from url=(0053) -->
<html lang="en"><link type="text/css" rel="stylesheet" id="dark-mode-general-link"><link type="text/css" rel="stylesheet" id="dark-mode-custom-link"><style type="text/css" id="dark-mode-custom-style"></style><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=0.8, shrink-to-fit=no">
    <meta name="description" content="<?php echo $organisasi['caption'] ?>">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url("assets/pemilu/Offcanvas_files/icon.png?ver1.1") ?>">
    <title><?php echo $page_title ?></title>

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
      .card:hover {
        margin-top: 10px!important;
        margin-bottom: 30px!important;
      }
    </style>

    <!-- animasi particle network -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/particle_animation/style.css">
    
  </head>

  <body style="background: #ffffff; /*background-image: url('<?php echo base_url() . 'assets/pemilu/bg.jpg' ?>');*/">

    <!-- animasi particle networks -->
    <canvas id="canvas"></canvas>

    <div class="loading">Loading…</div>

    <!-- <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 border-bottom box-shadow bg-dark border-dark text-light">
      <h5 class="my-0 mr-md-auto font-weight-normal">HMP Teknik Informatika</h5>
    </div> -->

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4"><?php echo $organisasi['nama_organisasi'] ?></h1>
      <img class="my-1" src="<?php echo base_url() ?>assets/logo/<?php echo $organisasi['logo'] ?>" alt="Logo Ormawa" style="height: 120px;">
      <p class="lead"><?php echo $organisasi['caption'] ?></p>
      <p class="lead">
        Pemilih: 
            <?php echo (!empty($organisasi['si'])) ? '(SI) ' : '' ?>
            <?php echo (!empty($organisasi['mi'])) ? '(MI) ' : '' ?>
            <?php echo (!empty($organisasi['ti'])) ? '(TI) ' : '' ?>
            <?php echo (!empty($organisasi['tk'])) ? '(TK) ' : '' ?>
            <?php echo (!empty($organisasi['email_khusus'])) ? '(Tertentu) ' : '' ?>
      </p>
    </div>


    <div class="container">

      <?php if ( $this->session->flashdata('alert') ) {
        echo $this->session->flashdata('alert');
      } ?>

      <div class="row mb-3 text-center d-flex justify-content-center">
      
        <?php foreach ($kandidat as $key => $val): ?>
          <div class="card box-shadow m-2" style="width: 390px; cursor: pointer; border: 0px solid black;" data-toggle="modal" data-target="#exampleModalCenter" onclick="show_modal('<?php echo $val['id_kandidat'] ?>')">
            <div class="foto_<?php echo $val['id_kandidat'] ?> p-3 rounded">
              <div class="foto rounded" style="background-image: url('<?php echo base_url() . 'assets/pemilu/' . $val['image'] ?>'); border: 0px solid black;">
              
              </div>
            </div>
            <div class="card-body <?php echo $val['id_kandidat'] ?>">
              <h3 class="card-title pricing-card-title nama_panjang text-center"><?php echo $val['nama_kandidat'] ?></h3>
              <div class="visi_misi d-none">
                <p>
                  <h6 class="text-center">Visi</h6>
                  <?php echo $val['visi'] ?>
                </p>
                <p>
                  <h6 class="text-center">Misi</h6>
                  <?php echo $val['misi'] ?>
                </p>
              </div>
              <!-- <button type="button" class="btn btn-lg btn-block btn-danger">Pilih</button> -->
            </div>
          </div>
          <!-- Satu item -->
        <?php endforeach ?>

      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header" style="border-bottom: 0px;">
              <h5 class="modal-title" id="exampleModalLongTitle"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container w-100 text-center">
                <img width="100%" src="" class="modal_foto" alt="">
              </div>
              <h2 class="card-title pricing-card-title modal_nama_panjang my-1 text-center"></h2>
              <div class="modal_visi_misi container">
              </div>
              <hr>
              <?php echo form_open( base_url() . 'ormawa/going_to_google' ) ?>
                <!-- <button type="submit" class="btn btn-lg btn-block mb-4 text-dark myGlower"> <img style="width: 30px;" src="https://developers.google.com/identity/images/g-logo.png"> Sign in with Google</button> -->
                <input type="hidden" class="" required name="id_organisasi" value="<?php echo $organisasi['id_organisasi'] ?>">
                <input type="hidden" class="" required id="id_kandidat" name="id_kandidat" value="">
                <input type="text" class="form-control form-control-lg mb-3 w-100" name="nim_mahasiswa" required placeholder="NIM Mahasiswa ..." maxlength="9">
                <button type="submit" href="" class="btn btn-lg btn-primary mb-4 text-white bg-primary btn-block myGlower">Lanjut</button>
              </form>
              
              <p class=" container">
                <i>Dukung kandidat pilihan kamu dengan memasukkan NIM mahasiswa.</i>
              </p>
              
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="ModalCredits" tabindex="-1" role="dialog" aria-labelledby="ModalCreditsTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Credits</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
              <p class="mb-1"><strong>Back-end Programmer:</strong></p>
              <h5><a href="https://www.github.com/widibaka">Widi Dwi Nurcahyo</a></h5>
              <br>
              <p class="mb-1"><strong>Front-end Programmer:</strong></p>
              <h5><a href="https://www.instagram.com/widi_baka/">Widi Dwi Nurcahyo</a></h5>
              <h5><a href="https://www.github.com/widibaka">Yulidar Maulana Ivan Saputra</a></h5>
              <h5><a href="https://www.github.com/widibaka">Dika Adi Pratama</a></h5>
            </div>
          </div>
        </div>
      </div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <small class="d-block mb-3">PROVIDED BY HMPTI UDB 2021 - <a class="text-primary" href="javascript:void(0)" data-toggle="modal" data-target="#ModalCredits">Credits</a></small>
          </div>
          <!-- <div class="col-6 col-md">
            <h5>Features</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="https://getbootstrap.com/docs/4.0/examples/pricing/#">Cool stuff</a></li>
            </ul>
          </div> -->
        </div>
      </footer>
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
      function show_modal(index) {
        var nama_panjang = $('.'+index+' .nama_panjang').html();
        var foto = $('.foto_'+index).find('.foto').css('background-image');
        foto = foto.replace('url("', '');
        foto = foto.replace('")', '');
        // console.log(foto);
        
        var kohousha_no_namae = $('.'+index+' .kohousha_no_namae').html();
        var visi_misi = $('.'+index+' .visi_misi').html();


        $('.modal_nama_panjang').html(nama_panjang);
        $('.modal_foto').attr('src', foto);

        $('#id_kandidat').val(index);
        
        $('.modal_visi_misi').html(visi_misi);
      }

      // Saat loaded, maka sembunyikan loader
      $(document).ready(function() {
        $('.loading').fadeOut('slow');
      })
    </script>
  
