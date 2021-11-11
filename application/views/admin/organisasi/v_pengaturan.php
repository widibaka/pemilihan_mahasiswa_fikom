<!-- card secrion -->
    <section class="h-100 w-100" style="box-sizing: border-box; background-color: transparent" id="skill">
      <div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="container mx-auto">
          <div class="d-flex flex-column text-center w-100" style="margin-bottom: 1rem">
            <h2 class="title-text">Pengaturan Organisasi</h2>
          </div>

          <?php echo form_open(base_url()."admin/organisasi/simpan_pengaturan/".$main_data['id_organisasi'],'enctype="multipart/form-data"') ?>
            <div class="form-group mb-4">
              <label for="nama_organisasi">Nama Organisasi</label>
              <input type="text" class="form-control" id="nama_organisasi" placeholder="" name="nama_organisasi" value="<?php echo $main_data['nama_organisasi'] ?>" />
            </div>
            <!-- Nama Organisasi -->
            <div class="form-group mb-4">
              <label for="logo">Logo<br>
              <img src="<?php echo base_url() ?>assets/logo/<?php echo $main_data['logo'] ?>" id="preview_logo" style="width: 100%; max-width: 400px;">
              </label>
              <div class="form-group">
                
                  <input class="form-control" name="userfile" accept="image/*" type='file' id="logo" class="custom-file-input btn-lg">
                  <small> Mendukung format svg, jpg, png, gif </small>
                
              </div>
            </div>
            <!-- Logo -->

            <div class="form-group mb-4">
              <label for="caption">Caption</label><br>
              <div class="form-group">
                
                  <textarea class="form-control" name="caption" id="" cols="30" rows="5" id="caption" placeholder="Halo selamat datang calon pemilih ...."><?php echo $main_data['caption'] ?></textarea>
                  <small> Caption ini akan muncul di halaman pemilihan dan akan dibaca oleh calon pemilih </small>
                
              </div>
            </div>
            <!-- Caption -->
            
            <div class="form-group mb-4">
              <label for="publikasi">Publikasikan?</label><br>
              <div class="form-group">
                
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="publikasi" id="flexRadioDefault1" <?php echo ($main_data['publikasi'] == 'Ya') ? 'checked' : '' ?> value="Ya">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Ya
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="publikasi" id="flexRadioDefault2" <?php echo ($main_data['publikasi'] == 'Tidak') ? 'checked' : '' ?>  value="Tidak">
                    <label class="form-check-label" for="flexRadioDefault2">
                      Tidak
                    </label>
                  </div>
                  <small> Menentukan apakah halaman pemilihan dipublikasikan atau tidak </small>
                
              </div>
            </div>
            
            <!-- Publikasikan -->
            
            <div class="col-12 mb-1">
              <p class="text-center">
                <div class="mt-2">
                  <button type="submit" class="btn btn-fill w-100" id="upload_gambar">
                    <i class="fa fa-save"></i> Simpan Pengaturan
                  </button>
                </div>
              </p>
            </div>
            <div class="col-12 mb-1">
              <p class="text-center">
                <div class="mt-2">
                  <a target="_blank" href="<?php echo base_url(); ?>ormawa/i/<?php echo str_replace(' ', "_", $main_data['nama_organisasi']); ?>" class="btn btn-fill w-100">
                    <i class="fa fa-eye"></i> Lihat Halaman Pemilihan
                  </a>
                </div>
              </p>
            </div>
            <!-- Lihat halaman -->

            <div class="col-12 mb-1">
              <p class="text-center">
                <div class="mt-2">
                  <a onclick="return confirm('Anda yakin ingin menghapus?')" href="<?php echo base_url(); ?>admin/organisasi/hapus_organisasi/<?php echo $main_data['id_organisasi']; ?>" class="btn btn-danger w-100 py-3">
                    <i class="fa fa-trash"></i> Hapus Organisasi
                  </a>
                </div>
              </p>
            </div>
            <!-- Hapus -->
            
          </form>
        </div>
      </div>
    </section>
    <!-- end card section -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Pengguna</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="md-form mb-6">
              <label for="#">User</label>
              <input type="text" id="user" class="form-control validate" />
            </div>
            <br />
            <div class="md-form mb-6">
              <label for="#">Password</label>
              <input type="password" id="password" class="form-control validate" />
            </div>
          </div>
          <p class="text-center">
            <a class="btn btn-primary justify-content-center align-items-center w-50" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</a>
          </p>
        </div>
      </div>
    </div>
    <!-- End Modal -->