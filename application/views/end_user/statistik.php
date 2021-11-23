<!DOCTYPE html>
<!-- saved from url=(0053) -->
<html lang="en"><link type="text/css" rel="stylesheet" id="dark-mode-general-link"><link type="text/css" rel="stylesheet" id="dark-mode-custom-link"><style type="text/css" id="dark-mode-custom-style"></style><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=0.8, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url("assets/pemilu/Offcanvas_files/icon.png?ver1.1") ?>">

    <title><?php echo $page_title ?></title>

    <link rel="canonical" href="">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/pemilu') ?>/Offcanvas_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/pemilu') ?>/dashboard.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <span class="navbar-brand col-12" href="#">
        <a class="text-white ml-3" href="#"><?php echo $organisasi['nama_organisasi'] ?></a>
        <a class="text-white ml-3" href="<?php echo base_url() ?>">Halaman Pemilihan</a>
      </span>
      <ul class="navbar-nav px-3">
        <!-- <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li> -->
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">

        <main role="main" class="col-md-12 ml-sm-auto col-lg-12 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Hasil Pemilihan</h1>
            <!-- <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                This week
              </button>
            </div> -->
          </div>

          <div class="d-flex justify-content-center">
            <canvas id="chart-area" style="display: block; height: 110px; max-height: 500px; max-width: 1100px" height="110" class="chartjs-render-monitor"></canvas>
          </div>
          <div class="text-center">
            <?php foreach ($statistik['data_kandidat'] as $key => $kandidat): ?>
              <?php echo $kandidat['nama_kandidat'] ?> : 
              <?php echo ($kandidat['jumlah_suara'] / $statistik['seluruh']) * 100 ?> % 
              <br>
            <?php endforeach ?>
            
            Total suara masuk : <?php echo $statistik['seluruh'] ?>
          </div>
          <?php if ( !empty( $jumlah_data ) ): ?>
            <h2>Daftar Pemilih 
              <?php 
              echo (!empty($organisasi['si'])) ? '(SI) ' : '' ;
              echo (!empty($organisasi['mi'])) ? '(MI) ' : '' ;
              echo (!empty($organisasi['ti'])) ? '(TI) ' : '' ;
              echo (!empty($organisasi['tk'])) ? '(TK) ' : '' ;
              echo (!empty($organisasi['email_khusus'])) ? '(Tertentu)' : '' ?>
            </h2>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Inisial</th>
                    <th>Pilihan</th>
                    <th>Prodi</th>
                    <th>Angkatan</th>
                    <th>Waktu</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; ?>
                  <?php foreach ($yuukensha as $key => $pemilih): ?>
                    <?php $i++ ?>
                    
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo substr($pemilih['nama_pemilih'], 0, 3) ?>*********</td>
                        <td><?php echo $pemilih['nama_kandidat'] ?></td>
                        <td><?php echo $pemilih['prodi'] ?></td>
                        <td><?php echo $pemilih['angkatan'] ?></td>
                        <td><?php echo date("d/m/Y H:i:s", strtotime($pemilih['waktu'])) ?></td>
                      </tr>

                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          <?php endif ?>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/pemilu') ?>/Offcanvas_files/holder.min.js.download"></script>
    <script src="<?= base_url('assets/pemilu') ?>/Offcanvas_files/offcanvas.js.download"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js" integrity="sha512-QEiC894KVkN9Tsoi6+mKf8HaCLJvyA6QIRzY5KrfINXYuP9NxdIkRQhGq3BZi0J4I7V5SidGM3XUQ5wFiMDuWg==" crossorigin="anonymous"></script>

    <!-- Icons -->
    <script src="<?= base_url('assets/pemilu') ?>/feather.min.js.download"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="<?= base_url('assets/pemilu') ?>/Chart.min.js.download"></script>
    <script>
        var config = {
          type: 'pie',
          data: {
            datasets: [{
              data: [
              <?php foreach ($statistik['data_kandidat'] as $key => $kandidat): ?>
                '<?php echo $kandidat['jumlah_suara'] ?>',
              <?php endforeach ?>
              ],
              backgroundColor: [
                <?php 
                  $warnas = ["#f54242",
                  "#42f557",
                  "#4287f5",
                  "#cfcfcf",];
                ?>
                <?php for ($i=0; $i < count($statistik['data_kandidat']); $i++): ?>
                  '<?php echo $warnas[$i] ?>',
                <?php endfor ?>
              ],
              label: 'Dataset 1'
            }],
            labels: [
              <?php foreach ($statistik['data_kandidat'] as $key => $kandidat): ?>
                '<?php echo $kandidat['nama_kandidat'] ?>',
              <?php endforeach ?>
            ]
          },
          options: {
            responsive: true
          }
        };

        window.onload = function() {
          var ctx = document.getElementById('chart-area').getContext('2d');
          window.myPie = new Chart(ctx, config);
        };


      </script>

    <script type="text/javascript">
      function show_modal(index) {
        var kohousha_no_namae = $('.'+index+' .kohousha_no_namae').html();
        var visi_misi = $('.'+index+' .visi_misi').html();

        $('.mo_kohousha_no_namae').html(kohousha_no_namae);
        $('.mo_visi_misi').html(visi_misi);
      }
    </script>
    
  

<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="2" style="font-weight:bold;font-size:2pt;font-family:Arial, Helvetica, Open Sans, sans-serif">32x32</text></svg></body></html>