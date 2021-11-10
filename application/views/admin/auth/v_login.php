
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.8">
  <title>Galeri Karya UDB | Log in</title>

  <!-- Google Font: Source Sans Pro -->
 <!--  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/widi/css/style.css">
  <!-- SweetAlert2 -->
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
</head>
<body class="hold-transition login-page" style="
background: url('<?php echo base_url() ?>assets/widi/spectrum-gradient.svg');
/*background: rgb(106,1,68);
background: linear-gradient(131deg, rgba(106,1,68,1) 0%, rgba(124,1,105,1) 38%, rgba(0,146,255,1) 100%);*/
background-size: cover;
background-position: top;
background-attachment: fixed;
">

<div class="preloader flex-column justify-content-center align-items-center">
  <div class="lds-dual-ring"></div>
  <p class="text-muted mt-3">Mohon tunggu ...</p>
</div>

<div class="login-box" style="background: transparent;">
  <div class="login-logo">
    <a href="<?php echo base_url() ?>" class="text-white"><b>Galeri Karya </b><br>Universitas Duta Bangsa</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg text-dark">Login untuk memulai sesi</p>

     <!-- <form action="" method="post"> -->
     <?php echo form_open('', ''); ?>
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email" required="">
          <div class="input-group-append">
            <div class="input-group-text text-dark">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password" required="">
          <div class="input-group-append">
            <div class="input-group-text text-dark">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Tetap masuk di perangkat ini
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-outline-danger btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <center class="text-dark">
        <p>atau</p>
      </center>
      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="<?php echo $auth_url ?>" class="btn btn-block btn-default do_transition">
          <img class="mr-1" src="<?php echo base_url() . 'assets/google_api/google.png' ?>" style="width: 22px; height: 22px;"> Login memakai Google
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <!-- <a href="forgot-password.html">Lupa Password</a> -->
      </p>
      <p class="mb-0">
        <a href="<?php echo base_url() ?>auth/register" class="text-center text-danger do_transition">Mendaftar akun baru</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- custom js -->
<script src="<?php echo base_url() ?>assets/widi/js/main.js"></script>

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
</script>
</body>
</html
