<!-- card secrion -->
    <section class="h-100 w-100" style="box-sizing: border-box; background-color: transparent" id="skill">
      <div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="container mx-auto">
          <div class="d-flex flex-column text-center w-100" style="margin-bottom: 1rem">
            <h2 class="title-text">Peserta Pemilihan <?php echo $main_data['nama_organisasi'] ?></h2>
          </div>

          <h4>Program Studi</h4>
          <?php echo form_open(base_url()."admin/peserta_pemilihan/simpan/".$main_data['id_organisasi'],'enctype="multipart/form-data"') ?>
            <div class="form-check">
              <input name="si" class="form-check-input" type="checkbox" value="1" id="si" <?php echo ( $main_data['si'] == '1' ) ? 'checked' : '' ?> >
              <label class="form-check-label" for="si">
                (SI) S1 - Sistem Informasi
              </label>
            </div>
            <!-- SI -->
            
            <div class="form-check">
              <input name="mi" class="form-check-input" type="checkbox" value="1" id="mi" <?php echo ( $main_data['mi'] == '1' ) ? 'checked' : '' ?> >
              <label class="form-check-label" for="mi">
                (MI) D3 - Manajemen Informatika
              </label>
            </div>
            <!-- MI -->
            
            <div class="form-check">
              <input name="ti" class="form-check-input" type="checkbox" value="1" id="ti" <?php echo ( $main_data['ti'] == '1' ) ? 'checked' : '' ?> >
              <label class="form-check-label" for="ti">
                (TI) S1 - Teknik Informatika
              </label>
            </div>
            <!-- SI -->
            
            <div class="form-check">
              <input name="tk" class="form-check-input" type="checkbox" value="1" id="tk" <?php echo ( $main_data['tk'] == '1' ) ? 'checked' : '' ?> >
              <label class="form-check-label" for="tk">
                (TK) D3 - Teknik Komputer
              </label>
            </div>
            <!-- SI -->
            
            <div class="form-check">
              <input name="email_khusus" class="form-check-input" type="checkbox" value="1" id="email_khusus" <?php echo ( $main_data['email_khusus'] == '1' ) ? 'checked' : '' ?> >
              <label class="form-check-label" for="email_khusus">
                Email Pemilih Khusus
              </label>
            </div>
            <!-- SI -->

            <div class="col-12 mb-1">
              <p class="text-center">
                <div class="mt-2">
                  <button type="submit" class="btn btn-fill w-100">
                    <i class="fa fa-save"></i> Simpan Pengaturan
                  </button>
                </div>
              </p>
            </div>
            
          </form>

          
          <h4 class="mt-5">Email Pemilih Khusus</h4>
          <ol>
            <?php foreach ($email_khusus as $key => $val): ?>
              <li>
                <?php echo $val['email'] ?> 
                <a onclick="return confirm('Anda yakin ingin menghapus?')" href="<?php echo base_url() . 'admin/peserta_pemilihan/hapus/' . $main_data['id_organisasi'] . '/' . $val['id_pem_khus'] ?>">
                  <i class="fa fa-times text-danger"></i>
                </a>
              </li>
            <?php endforeach ?>
          </ol>

          <div class="col-12 mb-1">
            <p class="text-center">
              <div class="mt-2">
                <button onclick="$('#exampleModal').modal('toggle')" class="btn btn-fill w-100">
                  <i class="fa fa-plus"></i> Tambah Email
                </button>
              </div>
            </p>
          </div>
          <div class="col-12 mb-1">
            <p class="text-center">
              <div class="mt-2">
                <a href="<?php echo base_url(); ?>admin/organisasi/index/<?php echo $main_data['id_organisasi']; ?>" class="btn btn-fill w-100">
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
            <h5 class="modal-title">Tambah Email</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <?php echo form_open( base_url() . 'admin/peserta_pemilihan/tambah_email/' . $main_data['id_organisasi'] ) ?>
          <div class="modal-body">
            <div class="md-form mb-6">
              <label for="#">Email (Pisahkan dengan linebreak / "enter" untuk menambahkan banyak email sekaligus.)</label>
              <textarea name="email" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
          </div>
          <p class="text-center">
            <button type="submit" class="btn btn-warning">
              <i class="fa fa-save"></i> Tambahkan
            </button>
          </p>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal -->