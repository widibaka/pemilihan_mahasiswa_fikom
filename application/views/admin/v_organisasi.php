    <!-- card secrion -->
    <section class="h-100 w-100" style="box-sizing: border-box; background-color: transparent" id="skill">
      <div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="mx-auto row">
          <div class="d-flex flex-column text-center w-100" style="margin-bottom: 1rem">
            <h2 class="title-text"><?php echo $main_data['nama_organisasi'] ?></h2>
            <p class="caption-text mx-auto">
              <img src="<?php echo base_url() . 'assets/logo/' . $main_data['logo'] ?>" alt="" style="height: 150px;">
            </p>
          </div>

          <p class="text-center">
            Dipublikasikan: <strong><?php echo $main_data['publikasi'] ?></strong>
          </p>

          <div class="col-11">
            <a href="<?php echo base_url(); ?>admin/kandidat_ketua/index/<?php echo $main_data['id_organisasi']; ?>" class="btn btn-fill justify-content-center align-items-center w-100 shadow" role="button">
              <span class="fa fa-user-circle"></span>
              <span>Kandidat Ketua</span>
            </a>
          </div>
          <div class="col-1">
            <a class="btn btn-success justify-content-center align-items-center shadow rounded-circle" role="button" style="height: 40px; width: 40px;" onclick="$('#keterangan-kandidat-ketua').toggle(400)">
              <span class="fa fa-info"></span>
            </a>
          </div>
          <div class="col-12 mt-2" style="display: none;" id="keterangan-kandidat-ketua">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem tempora fugiat laudantium hic facilis aliquam odit deleniti, dolorem pariatur et nihil veniam voluptatum accusamus fugit! Alias eveniet unde molestiae exercitationem?</p>
          </div>
          <hr style="opacity: 0;">
          <!-- Satu item -->

          <div class="col-11">
            <a class="btn btn-fill justify-content-center align-items-center w-100 shadow" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <span class="fa fa-chart-pie"></span>
              <span>Hasil Pemilihan</span>
            </a>
          </div>
          <div class="col-1">
            <a class="btn btn-success justify-content-center align-items-center shadow rounded-circle" role="button" style="height: 40px; width: 40px;" onclick="$('#keterangan-hasil-pemilihan').toggle(400)">
              <span class="fa fa-info"></span>
            </a>
          </div>
          <div class="col-12 mt-2" style="display: none;" id="keterangan-hasil-pemilihan">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem tempora fugiat laudantium hic facilis aliquam odit deleniti, dolorem pariatur et nihil veniam voluptatum accusamus fugit! Alias eveniet unde molestiae exercitationem?</p>
          </div>
          <hr style="opacity: 0;">
          <!-- Satu item -->

          <div class="col-11">
            <a target="_blank" href="<?php echo base_url(); ?>ormawa/i/<?php echo str_replace(' ', "_", $main_data['nama_organisasi']); ?>" class="btn btn-fill justify-content-center align-items-center w-100 shadow" role="button" href="<?php echo base_url() ?>">
              <span class="fa fa-eye"></span>
              <span>Lihat Halaman Pemilihan</span>
            </a>
          </div>
          <div class="col-1">
            <a class="btn btn-success justify-content-center align-items-center shadow rounded-circle" role="button" style="height: 40px; width: 40px;" onclick="$('#keterangan-lihat-halaman').toggle(400)">
              <span class="fa fa-info"></span>
            </a>
          </div>
          <div class="col-12 mt-2" style="display: none;" id="keterangan-lihat-halaman">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem tempora fugiat laudantium hic facilis aliquam odit deleniti, dolorem pariatur et nihil veniam voluptatum accusamus fugit! Alias eveniet unde molestiae exercitationem?</p>
          </div>
          <hr style="opacity: 0;">
          <!-- Satu item -->

          <div class="col-11">
            <a href="<?php echo base_url(); ?>admin/peserta_pemilihan/index/<?php echo $main_data['id_organisasi'] ?>" class="btn btn-fill justify-content-center align-items-center w-100 shadow">
              <span class="fa fa-users-cog"></span>
              <span>Peserta Pemilihan</span>
            </a>
          </div>
          <div class="col-1">
            <a class="btn btn-success justify-content-center align-items-center shadow rounded-circle" role="button" style="height: 40px; width: 40px;" onclick="$('#keterangan-peserta-pemilihan').toggle(400)">
              <span class="fa fa-info"></span>
            </a>
          </div>
          <div class="col-12 mt-2" style="display: none;" id="keterangan-peserta-pemilihan">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem tempora fugiat laudantium hic facilis aliquam odit deleniti, dolorem pariatur et nihil veniam voluptatum accusamus fugit! Alias eveniet unde molestiae exercitationem?</p>
          </div>
          <hr style="opacity: 0;">
          <!-- Satu item -->

          <div class="col-11">
            <a href="<?php echo base_url(); ?>admin/organisasi/pengaturan/<?php echo $main_data['id_organisasi'] ?>" class="btn btn-fill justify-content-center align-items-center w-100 shadow">
              <span class="fa fa-cogs"></span>
              <span>Pengaturan</span>
            </a>
          </div>
          <div class="col-1 text-start">
            <a class="btn btn-success justify-content-center align-items-center shadow rounded-circle" role="button" style="height: 40px; width: 40px;" onclick="$('#keterangan-pengaturan').toggle(400)">
              <span class="fa fa-info"></span>
            </a>
          </div>
          <div class="col-12 mt-2" style="display: none;" id="keterangan-pengaturan">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem tempora fugiat laudantium hic facilis aliquam odit deleniti, dolorem pariatur et nihil veniam voluptatum accusamus fugit! Alias eveniet unde molestiae exercitationem?</p>
          </div>
          <hr style="opacity: 0;">
          <!-- Satu item -->

        </div>
      </div>
    </section>
    <!-- end card section -->