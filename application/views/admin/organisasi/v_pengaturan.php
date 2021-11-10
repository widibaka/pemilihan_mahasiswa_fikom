<!-- card secrion -->
    <section class="h-100 w-100" style="box-sizing: border-box; background-color: #f2f6ff" id="skill">
      <div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="container mx-auto">
          <div class="d-flex flex-column text-center w-100" style="margin-bottom: 1rem">
            <h2 class="title-text">Pengaturan Organisasi</h2>
          </div>

          <form enctype="multipart/form-data">
            <div class="form-group mb-4">
              <label for="nama_organisasi">Nama Organisasi</label>
              <input type="text" class="form-control" id="nama_organisasi" placeholder="" name="nama_organisasi" />
            </div>
            <!-- Nama Organisasi -->
            <div class="form-group mb-4">
              <label for="logo">Logo<br>
              <img src="<?php echo base_url() ?>assets/default_logo.svg" id="preview_logo" style="width: 100%; max-width: 400px;">
              </label>
              <div class="form-group">
                
                  <input class="form-control" name="userfile" accept="image/*" type='file' id="logo" class="custom-file-input btn-lg">
                  <small> Mendukung format svg, jpg, png, gif </small>
                
              </div>
            </div>
            <!-- Logo -->

            <div class="form-group mb-4">
              <label for="background_halaman">Background Halaman<br>
              <img for="background_halaman" src='<?php echo base_url() ?>assets/pemilu/bg.jpg' id="preview_background_halaman" style="width: 100%; max-width: 400px;">
              </label>
              <div class="form-group">
                
                  <input class="form-control" name="userfile" accept="image/*" type='file' id="background_halaman" class="custom-file-input btn-lg">
                  <small> Mendukung format svg, jpg, png, gif </small>
                
              </div>
            </div>
            <!-- Background Halaman -->

            <div class="form-group mb-4">
              <label for="caption">Caption</label><br>
              <div class="form-group">
                
                  <textarea class="form-control" name="caption" id="" cols="30" rows="5" id="caption" placeholder="Halo selamat datang calon pemilih ...."></textarea>
                  <small> Caption ini akan muncul di halaman pemilihan dan akan dibaca oleh calon pemilih </small>
                
              </div>
            </div>
            <!-- Caption -->
            
            <div class="form-group mb-4">
              <label for="publikasikan">Publikasikan?</label><br>
              <div class="form-group">
                
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="publikasikan" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                      Ya
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="publikasikan" id="flexRadioDefault2" >
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
                  <a href="<?php echo base_url(); ?>" class="btn btn-fill w-100">
                    <i class="fa fa-eye"></i> Lihat Halaman Pemilihan
                  </a>
                </div>
              </p>
            </div>
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