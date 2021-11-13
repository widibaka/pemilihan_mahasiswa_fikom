    <!-- card secrion -->
    <section class="h-100 w-100" style="box-sizing: border-box; background: transparent" id="skill">
      <div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="container mx-auto">
          <div class="d-flex flex-column text-center w-100">
            <h2 class="title-text">Settings</h2>
          </div>
          <hr>
          <div class="d-flex flex-column text-center w-100">
            <h4>Akun Admin</h4>
            <p class="caption-text mx-auto">Menambah dan mengurangi akun admin</p>
          </div>

          <div class="card align-content-center mb-5">
            <ul class="list-group list-group-flush">
              <?php foreach ($data_admin as $key => $val): ?>
                <li class="list-group-item">
                  <?php echo $val['nama_admin'] ?>
                  <a href="<?php echo base_url() . 'admin/settings/hapus_admin/' . $val['id_admin'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')">Hapus</a>
                </li>
                
              <?php endforeach ?>
              
            </ul>
          </div>

          <div class="col-12">
            <p class="text-center">
              <a class="btn btn-fill justify-content-center align-items-center w-100 shadow" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="fa fa-plus-circle"></span> Tambah Admin</a>
            </p>
          </div>


          <hr class="my-5">
          <!-- Pembatas -->


          <div class="d-flex flex-column text-center w-100 mt-5" style="margin-bottom: 1rem">
            <h4>Jadwal Secara Global</h4>
            <p class="caption-text mx-auto">Akan diterapkan untuk semua ormawa secara global</p>
          </div>

          <?php echo form_open(base_url() . 'admin/settings/update_settings', "") ?>
            
            <div class="form-group mb-4">
              <label for="tanggal_mulai">Tanggal Mulai</label>
              <div class="input-group date tanggal_waktu mb-3" id="A" data-target-input="nearest">
                <input name="tanggal_mulai" type="text" class="form-control datetimepicker-input" data-target="#A" id="tanggal_mulai" placeholder="YYYY-MM-DD HH:mm:ss"

                 value="<?php echo $data_settings['tanggal_mulai'] ?>"
                
                required />
                <div class="form-control bg-warning" data-target="#A" data-toggle="datetimepicker" style="max-width: 70px;">
                    <div class="text-center w-100"><i class="fa fa-calendar"></i> </div>
                </div>
              </div>
            </div>
            <div class="form-group mb-5">
              <label for="tanggal_selesai">Tanggal Selesai</label>
              <div class="input-group date tanggal_waktu mb-3" id="B" data-target-input="nearest">
                <input name="tanggal_selesai" type="text" class="form-control datetimepicker-input" data-target="#A" id="tanggal_selesai"  placeholder="YYYY-MM-DD HH:mm:ss"
                
                
                 value="<?php echo $data_settings['tanggal_selesai'] ?>"
                
                
                required />
                <div class="form-control bg-warning" data-target="#B" data-toggle="datetimepicker" style="max-width: 70px;">
                    <div class="text-center w-100"><i class="fa fa-calendar"></i> </div>
                </div>
              </div>
            </div>
            <div class="col-12 mb-lg-5">
              <p class="text-center pt-4">
                <button type="submit" class="btn btn-fill justify-content-center align-items-center w-100 shadow">Terapkan</button>
              </p>
            </div>
          </form>
        </div>
      </div>

      
    </section>
    <!-- end card section -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Admin</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php echo form_open(base_url() . 'admin/settings/tambah_admin', "") ?>
            <div class="modal-body text-center">
              <div class="md-form mb-6">
                <label for="nama_admin">Username</label>
                <input type="text" id="nama_admin" name="nama_admin" class="form-control validate" />
              </div>
              <br />
              <div class="md-form mb-6">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control validate" />
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

    <!-- Modal -->
    <div class="modal fade" id="modalWarning" tabindex="-1" aria-labelledby="modalWarningLabel" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Peringatan!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php echo form_open(base_url() . 'admin/settings/tambah_admin', "") ?>
            <div class="modal-body text-center">
              <h3>Peringatan!</h3>
              <p>Halaman ini berisi pengaturan-pengaturan sensitif. Mohon berhati-hati.</p>
            </div>
            <p class="text-center">
              <a href="<?php echo base_url() . 'admin/welcome' ?>" class="btn btn-warning justify-content-center align-items-center w-25 shadow">Kembali</a>
              <a  data-bs-dismiss="modal" class="btn btn-danger justify-content-center align-items-center w-25 shadow">Lanjut</a>
            </p>
            </form>
        </div>
          
      </div>
    </div>
    <!-- End Modal -->