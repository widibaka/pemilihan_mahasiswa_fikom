
<!-- card secrion -->
    <section class="h-100 w-100" style="box-sizing: border-box; background-color: transparent" id="skill">
      <div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="container mx-auto">
          <div class="d-flex flex-column text-center w-100" style="margin-bottom: 1rem">
            <h2 class="title-text">Kandidat Ketua</h2>
            <h2 class="title-text"><?php echo $main_data['nama_organisasi'] ?></h2>
          </div>
            
          <?php foreach ($kandidat as $key => $kndt): ?>
            <?php echo form_open(base_url()."admin/kandidat_ketua/simpan_kandidat/".$main_data['id_organisasi'].'/'.$kndt['id_kandidat'],'enctype="multipart/form-data"') ?>

              <div class="container card shadow p-4 mb-5" style="background-color: #f2f2f2;">
                <div class="form-group mb-4">
                  <label for="id_kandidat">ID Kandidat (Auto-Generated)</label>
                  <input type="text" class="form-control" id="id_kandidat" placeholder="" name="id_kandidat" value="<?php echo $kndt['id_kandidat'] ?>" required />
                </div>
                <!-- ID Kandidat -->

                <div class="form-group mb-4">
                  <label for="nama_kandidat">Nama Kandidat</label>
                  <input type="text" class="form-control" id="nama_kandidat" placeholder="" name="nama_kandidat" value="<?php echo $kndt['nama_kandidat'] ?>" required />
                </div>
                <!-- Nama Kandidat -->

                <div class="form-group mb-4">
                  <label for="image">Image<br>
                  <img src="<?php echo base_url() ?>assets/pemilu/<?php echo $kndt['image'] ?>" id="preview_image<?php echo $kndt['id_kandidat'] ?>" style="width: 100%; max-width: 400px;">
                  </label>
                  <div class="form-group">
                    
                      <input class="form-control" name="userfile" accept="image/*" type='file' id="image<?php echo $kndt['id_kandidat'] ?>" class="custom-file-input btn-lg" onchange="preview_image('<?php echo $kndt['id_kandidat'] ?>')">
                      <small> Mendukung format svg, jpg, png, gif </small>
                    
                  </div>
                </div>
                <!-- Image -->

                <div class="form-group mb-4">
                  <label for="caption">Visi</label><br>
                  <div class="form-group">
                    
                      <textarea class="form-control" name="visi" id="" cols="30" rows="5" id="visi" placeholder="Halo visi saya adalah ...." required><?php echo $kndt['visi'] ?></textarea>
                    
                  </div>
                </div>
                <!-- Visi -->

                <div class="form-group mb-4">
                  <label for="caption">Misi</label><br>
                  <div class="form-group">
                    
                      <textarea class="form-control" name="misi" id="" cols="30" rows="5" id="misi" placeholder="Halo misi saya adalah ...." required><?php echo $kndt['misi'] ?></textarea>
                    
                  </div>
                </div>
                <!-- Visi -->

                <div class="col-12 text-end">
                  <button type="submit" class="btn btn-warning mb-3">
                    <i class="fa fa-save"></i> Simpan Data Kandidat
                  </button>
                  <a onclick="return confirm('Apakah Anda yakin ingin menghapus?')" class="btn btn-danger mb-3" href="<?php echo base_url() . 'admin/kandidat_ketua/hapus_kandidat/' . $kndt['id_organisasi'] . '/' . $kndt['id_kandidat'] ?>">
                    <i class="fa fa-trash"></i>
                    Hapus Kandidat
                  </a>
                </div>
                <!-- hapus kandidat -->

              </div>
              <!-- Satu kandidat -->
            </form>
          <?php endforeach ?>
            
              
              <div class="col-12 mb-1">
                <p class="text-center">
                  <div class="mt-2">
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-fill w-100">
                      <i class="fa fa-plus"></i> Tambah Kandidat
                    </a>
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
              <div class="col-12 mb-1">
                <p class="text-center">
                  <div class="mt-2">
                    <a target="_blank" href="<?php echo base_url(); ?>admin/organisasi/index/<?php echo $main_data['id_organisasi']; ?>" class="btn btn-fill w-100">
                      <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                  </div>
                </p>
              </div>
            

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

          <?php echo form_open( base_url() . 'admin/kandidat_ketua/tambah_kandidat/' . $main_data['id_organisasi'] ) ?>

            <div class="modal-body">
              <input type="hidden" name="id_organisasi" value="<?php echo $main_data['id_organisasi'] ?>">
              <div class="md-form mb-6">
                <label for="nama_kandidat">Nama Kandidat</label>
                <input type="text" id="nama_kandidat" name="nama_kandidat" class="form-control" placeholder="Suprapto ..." required />
              </div>
            </div>
            <p class="text-center">
              <button type="submit" class="btn btn-warning justify-content-center align-items-center w-50">Create</button>
            </p>

          </form>


        </div>
      </div>
    </div>
    <!-- End Modal -->