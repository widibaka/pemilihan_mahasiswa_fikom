<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.8">
  <title>Galeri Karya UDB | Registrasi</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- custom css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/widi/css/style.css">
  <!-- custom css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.css">
  <!-- SweetAlert2 -->
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">



  <style type="text/css">
    .card {
      margin-bottom: 50px;
    }
  </style>
</head>
<body class="hold-transition register-page" style="
background: url('<?php echo base_url() ?>assets/widi/spectrum-gradient.svg');
/*background: rgb(106,1,68);
background: linear-gradient(131deg, rgba(106,1,68,1) 0%, rgba(124,1,105,1) 38%, rgba(0,146,255,1) 100%);*/
background-size: cover;
background-position: left top;
background-attachment: fixed;
">

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <div class="lds-dual-ring"></div>
  <p class="text-muted mt-3">Mohon tunggu ...</p>
</div>
<div class="row" style="min-height: 100px;">
  
</div>
<div class="steps d-flex justify-content-center">
  <div class="row">
    <div class="circle step_active step1">
      <i class="fa fa-smile icon_inside_circle"></i>
    </div>
    <div class="dash ">
      <i class="fa fa-minus icon_inside_circle"></i>
    </div>
    <div class="circle step2">
      <i class="fa fa-user icon_inside_circle"></i>
    </div>
    <div class="dash ">
      <i class="fa fa-minus icon_inside_circle"></i>
    </div>
    <div class="circle step3">
      <i class="fa fa-lock icon_inside_circle"></i>
    </div>
    <div class="dash ">
      <i class="fa fa-minus icon_inside_circle"></i>
    </div>
    <div class="circle step4">
      <i class="fa fa-check icon_inside_circle"></i>
    </div>
  </div>
</div>


</head>
<div class="register-box" style="background: transparent; min-height: 200px;">
  <div class="register-logo">
    <a class="text-white" href="<?php echo base_url() ?>"><b>Galeri Karya </b><br>Universitas Duta Bangsa</a>
  </div>

  <div class="card" id="welcome">
    <div class="card-body register-card-body">
      <p class="login-box-msg text-dark">Halo mahasiswa UDB! Sudah siapkah Anda menunjukkan pada dunia karya-karya menakjubkan Anda? </p>
      <p class="login-box-msg text-dark">Jika iya, klik tombol di bawah ini untuk registrasi.</p>
      <center>
        <div class="col-sm-12 col-md-4">
          <button class="btn btn-outline-danger btn-block" onclick="step1_2()">
            <strong>Let's Go!</strong>
          </button>
        </div>
      </center>
      
      <hr>
      <a href="login" id="show_login" class="text-center text-danger do_transition">Saya ingin login saja</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->


  <div class="card" id="profile" style="display: none;">
    <div class="card-body register-card-body">
      <p class="login-box-msg text-dark">Profile</p>
      <p class="login-box-msg text-dark">Siapkan nama akun Anda. Jika mau, Anda juga bisa menambahkan gambar profil <strong class="text-danger">(Maks. 2MB, format jpg, png, atau gif)</strong>. <br><br>Pastikan gunakan email dan nomor ponsel yang aktif.</p> 
      <!-- Memulai form -->
      <!-- <form action="" method="post" id="form_registrasi"> -->
      <?php echo form_open('', ' id="form_registrasi" enctype="multipart/form-data"'); ?>
      <input type="hidden" name="id_user" value="<?php echo strval( time() . rand(1,100) ) ?>">
      <div class="text-center pb-3">
        <center class="container2">
          <div class="col-12">
            <div role="button" class="img-circle elevation-2 profile-register" alt="User Image" style="
              height: 142px;
              width: 142px;
              background-size: cover;
              background-position: center;
              background-image: url('<?php echo base_url() ?>assets/uploads/foto_profil/user_no_image.jpg');
            " data-toggle="modal" data-target="#modal-default" id="preview_gambar">
              <div class="overlay2">
                <span class="fa fa-edit"></span>
              </div>
            </div>

            <textarea style="display: none;" id="b64" name="image"></textarea>
            
          </div>
        </center>
      </div> <!-- /.user-panel -->

        <small class="badge badge-danger invalid-warning" id="username_empty" style="display: none;">Mohon isi nama akun</small>
        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control" placeholder="Nama" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user text-dark"></span>
            </div>
          </div>
        </div>

        <small class="badge badge-danger invalid-warning" id="email_empty" style="display: none;">Mohon isi email</small>
        <small class="badge badge-danger invalid-warning" id="email_invalid" style="display: none;">Alamat email ini tidak valid</small>
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope text-dark"></span>
            </div>
          </div>
        </div>

        <small class="badge badge-danger invalid-warning" id="hp_empty" style="display: none;">Mohon isi nomor HP</small> 
        <div class="input-group mb-3">
          <span class="text-dark mr-1 badge badge-success" style="font-size: 13pt">+62</span> <input name="hp" type="text" class="form-control" placeholder="812XXXXXXXXX" required="">
          <div class="input-group-append">
            <div class="input-group-text text-dark">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>

      <div class="row">
        <div class="col-3">
          <a role="button" class="btn btn-hover_glass w-100" onclick="step2_1()">
            <span class="fa fa-arrow-left text-dark"></span>
          </a>
        </div>
        <div class="col-6">
        </div>
        <div class="col-3">
          <a role="button" class="btn btn-hover_glass w-100" onclick="step2_3()">
            <span class="fa fa-arrow-right text-dark"></span>
          </a>
        </div>
      </div>
      <hr>
      <a href="login" id="show_login" class="text-center text-danger do_transition">Saya ingin login saja</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->


  <div class="card" id="privasi" style="display: none;">
    <div class="card-body register-card-body">
      <p class="login-box-msg text-dark">Privasi itu Penting</p>
      <p class="login-box-msg text-dark">Anda bisa menerapkan password. Kami tidak akan mengintip, janji!</p>
        <small class="badge badge-danger invalid-warning" id="password_empty" style="display: none;">Mohon isi password</small>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock text-dark"></span>
            </div>
          </div>
        </div>
        <small class="badge badge-danger invalid-warning" id="password2_empty" style="display: none;">Mohon isi password kedua</small>
        <small class="badge badge-danger invalid-warning" id="password2_invalid" style="display: none;">Password ini tidak saling cocok</small>
        <div class="input-group mb-3">
          <input name="password2" type="password" class="form-control" placeholder="Ketik lagi password" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock text-dark"></span>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-3">
          <a role="button" class="btn btn-hover_glass w-100" onclick="step3_2()">
            <span class="fa fa-arrow-left text-dark"></span>
          </a>
        </div>
        <div class="col-6">
        </div>
        <div class="col-3">
          <a role="button" class="btn btn-hover_glass w-100" onclick="step3_4()">
            <span class="fa fa-arrow-right text-dark"></span>
          </a>
        </div>
      </div>
      <hr>
      <a href="login" id="show_login" class="text-center text-danger do_transition">Saya ingin login saja</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->


  <div class="card" id="finish" style="display: none;">
    <div class="card-body register-card-body">
      <p class="login-box-msg text-dark">Upload bukti mahasiswa (Kartu Tanda Mahasiswa, atau bukti lain).</p>

      <small class="badge badge-danger invalid-warning" id="BuktiMahasiswa_empty" style="display: none;">Mohon upload bukti mahasiswa UDB</small>
      <div class="form-group">
        <!-- <label for="customFile">Custom File</label> -->
        <img src="" id="preview_BuktiMahasiswa" style="width:100%;">
        <div class="custom-file">
          <input accept="image/*" type='file' id="InputBuktiMahasiswa" class="custom-file-input btn-lg" required="">
          <label class="custom-file-label" for="InputBuktiMahasiswa">Pilih bukti mahasiswa</label>
        </div>
      </div>

      <textarea style="display: none;" id="b64_bukti_mahasiswa" name="image_bukti_mahasiswa"></textarea>

      <p class="login-box-msg text-dark">Pastikan seluruh data telah terisi dengan betul. Jika Anda sudah yakin, silakan klik tombol buat akun di bawah ini.</p>

      

      </form>
        
        
      <div class="row">
        <div class="col-3">
          <a role="button" class="btn btn-hover_glass w-100" onclick="step4_3()">
            <span class="fa fa-arrow-left text-dark"></span>
          </a>
        </div>
        <div class="col-4">
        </div>
        <div class="col-5">
          <!-- redirecting('<?php echo base_url() ?>assets/index.html') -->
          <button class="btn w-100 text-dark" onclick="buat_akun()" style="background: rgba(255, 255, 255, .5)">
            <span class="fa fa-check text-success"></span> Buat akun
          </button>
        </div>
      </div>
      <hr>
      <a href="login" id="show_login" class="text-center text-danger do_transition">Saya ingin login saja</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
  <br>
</div>
<!-- /.register-box -->



<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <p>Pilih gambar profil</p>
      </div>
      <div class="container">
        <div class="form-group">
          <!-- <label for="customFile">Custom File</label> -->
          <div class="custom-file">
            <input accept="image/*" type='file' id="imgInp" class="custom-file-input btn-lg" id="customFile">
            <label class="custom-file-label" for="customFile">Pilih berkas gambar</label>
          </div>
          <div class="mt-2">
            <button class="btn btn-outline-primary w-100" id="hapusGambarProfil">
              Kembalikan gambar default
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


        <!--<div class="row">
          <div class="col-8">
            <div class="icheck-primary">-->
              <!--<input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               Saya setuju <a href="#">syarat & ketentuan</a>
              </label>-->
            <!--</div>
          </div>-->
          <!-- /.col -->
          <!--<div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>-->
          <!-- /.col -->
        <!--</div>

      <a href="<?php echo base_url() ?>auth/login" class="text-center">Saya sudah punya akun</a>
    </div>-->
    <!-- /.form-box -->
  <!--</div>--><!-- /.card -->
<!--</div>-->
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- jquery ui-->
<script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url() ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- custom js -->
<script src="<?php echo base_url() ?>assets/widi/js/main.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">

  $(function () {
    bsCustomFileInput.init();
  });


  // preview gambar
  function readFile() {
    
    if (this.files && this.files[0]) {
      
      var FR= new FileReader();
      
      FR.addEventListener("load", function(e) {
        document.getElementById("b64").innerHTML = e.target.result;
        preview_gambar.style.backgroundImage = "url('"+ e.target.result +"')"
        $('#modal-default').modal('hide')
      }); 
      
      FR.readAsDataURL( this.files[0] );
    }
    
  }
  function readFile2() {
    
    if (this.files && this.files[0]) {
      
      var FR= new FileReader();
      
      FR.addEventListener("load", function(e) {
        document.getElementById("b64_bukti_mahasiswa").innerHTML = e.target.result;
        preview_BuktiMahasiswa.src = e.target.result;
      }); 
      
      FR.readAsDataURL( this.files[0] );
    }
    
  }

  document.getElementById("imgInp").addEventListener("change", readFile);
  document.getElementById("InputBuktiMahasiswa").addEventListener("change", readFile2);

  $('#hapusGambarProfil').click(function () {
    preview_gambar.style.backgroundImage = "url('<?php echo base_url() ?>assets/widi/img/user_no_image.jpg')"
    b64.value = ""
    $('#imgInp').next('label').html('Pilih berkas gambar');
    $('#modal-default').modal('hide')
  });


  // Changing step and validation

  function step1_2() {
    $('.step2').addClass("step_active", 100)
    $('#welcome').hide(400)
    $('#profile').show(300)
    setTimeout(function () {
      $('.step2').effect( "bounce" );
    }, 400)
  }
  function step2_1() {
    $('.step2').removeClass("step_active", 100)
    $('#profile').hide(400)
    $('#welcome').show(300)
    setTimeout(function () {
      $('.step1').effect( "bounce" );
    }, 400)
  }

  function step2_3() {
    var valid = 1;
    if ( $('[name="username"]').val().length < 1 ) {
      valid = 0;
      $('[name="username"]').addClass( 'is-invalid' )
      $("#username_empty").show(400)
    }
    if ( $('[name="hp"]').val().length < 1 ) {
      valid = 0;
      $('[name="hp"]').addClass( 'is-invalid' )
      $("#hp_empty").show(400)
    }
    if ( $('[name="email"]').val().length < 1 ) {
      valid = 0;
      $('[name="email"]').addClass( 'is-invalid' )
      $("#email_empty").show(400)
    } else if ( $('[name="email"]').val().indexOf("@") < 1 ) { // jika ada @, maka email valid
      valid = 0;
      $('[name="email"]').addClass( 'is-invalid' )
      $("#email_invalid").show(400)
    }
    if ( valid == 1 ) {
      $('.step3').addClass("step_active", 100)
      $('#profile').hide(400)
      $('#privasi').show(300)
      setTimeout(function () {
        $('.step3').effect( "bounce" );
      }, 400)
    }
  }
  function step3_2() {
    $('.step3').removeClass("step_active", 100)
    $('#privasi').hide(400)
    $('#profile').show(300)
    setTimeout(function () {
      $('.step2').effect( "bounce" );
    }, 400)
  }

  function step3_4() {
    var valid = 1;
    if ( $('[name="password"]').val().length < 1 ) {
      valid = 0;
      $('[name="password"]').addClass( 'is-invalid' )
      $("#password_empty").show(400)
    }
    if ( $('[name="password2"]').val().length < 1 ) {
      valid = 0;
      $('[name="password2"]').addClass( 'is-invalid' )
      $("#password2_empty").show(400)
    } else if ( $('[name="password"]').val() != $('[name="password2"]').val() ){
      valid = 0;
      $('[name="password2"]').addClass( 'is-invalid' )
      $("#password2_invalid").show(400)
    }

    if ( valid == 1 ) {
      $('.step4').addClass("step_active", 100)
      $('#privasi').hide(400)
      $('#finish').show(300)
      setTimeout(function () {
        $('.step4').effect( "bounce" );
      }, 400)
    }
    
  }
  function step4_3() {
    $('.step4').removeClass("step_active", 100)
    $('#finish').hide(400)
    $('#privasi').show(300)
    setTimeout(function () {
      $('.step3').effect( "bounce" );
    }, 400)
  }

  // Hapus alert warning ketika sedang mencoba memperbaiki
  function reset_validation() {
    $('input').removeClass('is-invalid')
    $('.invalid-warning').hide(400)
  }

  $('input').on( "input", function() {
    reset_validation()
  } )

  // Buat akun
  function buat_akun() {
    var valid = 1;
    // kalau belum browse file bukti mahasiswa, maka:
    if( document.getElementById("InputBuktiMahasiswa").files.length == 0 ){
      $('#InputBuktiMahasiswa').addClass( 'is-invalid' )
      $("#BuktiMahasiswa_empty").show(400)
      valid = 0;
    }

    if ( valid == 1 ) {
      turunkan_preloader()
      setTimeout(function () {
        $('#form_registrasi').submit()
      }, 800)
    }
  }

</script>

<script type="text/javascript">
  <?php if ( $this->session->flashdata('msg') ): ?>
    <?php 
      $split = explode('#', $this->session->flashdata('msg'));
      $code = $split[0];
      $msg_itself = $split[1];
    ?>
    setTimeout(function function_name(argument) {
      Swal.fire({
        icon: '<?php echo $code ?>',
        title: '<?php echo $msg_itself ?>',
      })
    }, 100)
  <?php endif ?>

  $('[name="hp"]').change(function () {
    var str = $(this).val();
    if (str[0]=='0') {
      $(this).val( str.substring(1,str.length) )
    }
  })
</script>
</body>
</html>
