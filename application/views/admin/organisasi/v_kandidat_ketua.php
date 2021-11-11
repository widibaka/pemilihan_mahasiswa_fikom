
<!-- card secrion -->
    <section class="h-100 w-100" style="box-sizing: border-box; background-color: transparent" id="skill">
      <div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="container mx-auto">
          <div class="d-flex flex-column text-center w-100" style="margin-bottom: 1rem">
            <h2 class="title-text">Kandidat Ketua</h2>
          </div>

          <?php echo form_open(base_url()."admin/organisasi/simpan_pengaturan/".$main_data['id_organisasi'],'enctype="multipart/form-data"') ?>
            
            <?php foreach ($kandidat as $key => $kndt): ?>
              <div class="container card shadow p-4 mb-5" style="background-color: #f2f2f2;">
                <input type="hidden" value="<?php echo $kndt['id_kandidat'] ?>">
                <div class="form-group mb-4">
                  <label for="nama_kandidat">Nama Kandidat</label>
                  <input type="text" class="form-control" id="nama_kandidat" placeholder="" name="nama_kandidat" value="<?php echo $kndt['nama_kandidat'] ?>" />
                </div>
                <!-- Nama Kandidat -->
                <div class="form-group mb-4">
                  <label for="image">Image<br>
                  <img src="<?php echo base_url() ?>assets/pemilu/<?php echo $kndt['image'] ?>" id="preview_image" style="width: 100%; max-width: 400px;">
                  </label>
                  <div class="form-group">
                    
                      <input class="form-control" name="userfile" accept="image/*" type='file' id="logo" class="custom-file-input btn-lg">
                      <small> Mendukung format svg, jpg, png, gif </small>
                    
                  </div>
                </div>
                <!-- Image -->

                <div class="form-group mb-4">
                  <label for="caption">Visi</label><br>
                  <div class="form-group">
                    
                      <textarea class="form-control" name="visi" id="" cols="30" rows="5" id="visi" placeholder="Halo selamat datang calon pemilih ...."><?php echo $kndt['visi'] ?></textarea>
                    
                  </div>
                </div>
                <!-- Visi -->

                <div class="form-group mb-4">
                  <label for="caption">Misi</label><br>
                  <div class="form-group">
                    
                      <textarea class="form-control" name="misi" id="" cols="30" rows="5" id="misi" placeholder="Halo selamat datang calon pemilih ...."><?php echo $kndt['misi'] ?></textarea>
                    
                  </div>
                </div>
                <!-- Visi -->

              </div>
              <!-- Satu kandidat -->
            <?php endforeach ?>
            
              <div class="col-12 mb-1">
                <p class="text-center">
                  <div class="mt-2">
                    <button type="submit" class="btn btn-fill w-100">
                      <i class="fa fa-save"></i> Simpan Data Kandidat
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
            <h5 class="modal-title">Tambah Kandidat</h5>
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