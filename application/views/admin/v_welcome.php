    <!-- card section -->
    <section id="skill">
      <div class="content-3-7 container-xxl mx-auto position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="container mx-auto">
          <div class="d-flex flex-column text-center w-100" style="margin-bottom: 1rem">
            <h2 class="title-text">Selamat Datang
            </h2>
            <p class="caption-text mx-auto">
              Platform Pemilihan Ketua Ormawa Fikom UDB
              <br>
              <br>
              Jadwal:
              <?php echo date("d/m/Y H:i:s", strtotime($settings['tanggal_mulai'])) ?> - 
              <?php echo date("d/m/Y H:i:s", strtotime($settings['tanggal_selesai'])) ?>
            </p>
          </div>

          <div class="d-flex flex-wrap">

            <?php foreach ($organisasi as $key => $val): ?>
              <a href="<?php echo base_url(); ?>admin/organisasi/index/<?php echo $val['id_organisasi'] ?>" class="mx-auto card-item position-relative" style="text-decoration: none;">
                  <div class=" shadow-sm card-item-outline d-flex flex-column position-relative overflow-hidden h-100">
                    <div style="
                        background-image: url('<?php echo base_url(); ?>assets/logo/<?php echo $val['logo'] ?>');
                        background-size: contain;
                        background-position: center;
                        height: 150px;
                        width: 100%;
                        background-repeat: no-repeat;
                      ">
                    </div>
                    <h2 class="price-title"><?php echo $val['nama_organisasi'] ?></h2>
                    <?php if ( $val['publikasi'] == 'Ya' ): ?>
                      <p class="price-caption text-success" style="text-align: center;">Dipublikasikan</p>
                    <?php else: ?>
                      <p class="price-caption text-danger" style="text-align: center;">Tidak Dipublikasikan</p>
                    <?php endif ?>
                    
                  </div>
              </a> <!-- Satu item -->
            <?php endforeach ?>
          

          </div>
          
          <hr>

          <div class="col-12">
            <p class="text-center">
              <a class="btn btn-fill justify-content-center align-items-center w-100 shadow" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <span class="fa fa-plus-circle"></span>
              Tambah Organisasi
              </a>
            </p>
          </div>

          <div class="col-12">
            <p class="text-center">
              <a class="btn btn-fill justify-content-center align-items-center w-100 shadow" href="<?php echo base_url(); ?>admin/settings" role="button">
              <span class="fa fa-cog"></span>
              Settings
              </a>
            </p>
          </div>

          <div class="col-12">
            <p class="text-center">
              <a class="btn btn-fill justify-content-center align-items-center w-100 shadow" href="<?php echo base_url(); ?>admin/login_log" role="button">
              <span class="fa fa-th-list"></span>
              Login Log
              </a>
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- end card section -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <?php echo form_open( base_url() . 'admin/welcome/tambah_ormawa' ) ?>
            <div class="modal-body">
              <div class="md-form mb-6">
                <label for="nama_organisasi">Nama Organisasi</label>
                <input type="text" name="nama_organisasi" id="nama_organisasi" placeholder="Estetika ..." required class="form-control mt-1">
              </div>
            </div>
            <p class="text-center">
              <button type="submit" class="btn btn-warning justify-content-center align-items-center shadow">Create</button>
            </p>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal -->