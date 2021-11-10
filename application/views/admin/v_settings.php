    <!-- card secrion -->
    <section class="h-100 w-100" style="box-sizing: border-box; background-color: #f2f6ff" id="skill">
      <div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="container mx-auto">
          <div class="d-flex flex-column text-center w-100">
            <h2 class="title-text">Settings</h2>
          </div>
          <div class="d-flex flex-column text-center w-100">
            <h4>Users</h4>
            <p class="caption-text mx-auto">Menambah dan mengurangi akun admin</p>
          </div>

          <div class="card align-content-center mb-5">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Admin 1 <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')">Hapus</a></li>
              <li class="list-group-item">Admin 2 <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')">Hapus</a></li>
              <li class="list-group-item">Bukan Admin <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')">Hapus</a></li>
            </ul>
          </div>

          <div class="col-12">
            <p class="text-center">
              <a class="btn btn-fill justify-content-center align-items-center w-100 shadow" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="fa fa-plus-circle"></span> Tambah Pengguna</a>
            </p>
          </div>


          <hr class="my-5">
          <!-- Pembatas -->


          <div class="d-flex flex-column text-center w-100 mt-5" style="margin-bottom: 1rem">
            <h4>Jadwal Secara Global</h4>
            <p class="caption-text mx-auto">Akan diterapkan untuk semua ormawa secara global</p>
          </div>

          <form>
            
            <div class="form-group mb-4">
              <label for="tanggal_mulai">Tanggal Mulai</label>
              <div class="input-group date tanggal_waktu mb-3" id="A" data-target-input="nearest">
                <input name="tanggal_mulai" type="text" class="form-control datetimepicker-input" data-target="#A" id="tanggal_mulai" placeholder="YYYY-MM-DD HH:mm:ss" required />
                <div class="form-control bg-warning" data-target="#A" data-toggle="datetimepicker" style="max-width: 70px;">
                    <div class="text-center w-100"><i class="fa fa-calendar"></i> </div>
                </div>
              </div>
            </div>
            <div class="form-group mb-5">
              <label for="tanggal_selesai">Tanggal Selesai</label>
              <div class="input-group date tanggal_waktu mb-3" id="B" data-target-input="nearest">
                <input name="tanggal_selesai" type="text" class="form-control datetimepicker-input" data-target="#A" id="tanggal_selesai"  placeholder="YYYY-MM-DD HH:mm:ss" required />
                <div class="form-control bg-warning" data-target="#B" data-toggle="datetimepicker" style="max-width: 70px;">
                    <div class="text-center w-100"><i class="fa fa-calendar"></i> </div>
                </div>
              </div>
            </div>
            <div class="col-12 mb-lg-5">
              <p class="text-center pt-4">
                <a class="btn btn-fill justify-content-center align-items-center w-100 shadow" href="#" role="button">Terapkan</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- end card section -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Pengguna</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="md-form mb-6">
              <label for="#">User</label>
              <input type="text" id="user" class="form-control" />
            </div>
            <br />
            <div class="md-form mb-6">
              <label for="#">Password</label>
              <input type="password" id="password" class="form-control" />
            </div>
          </div>
          <p class="text-center">
            <a class="btn btn-warning justify-content-center align-items-center w-50 shadow" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</a>
          </p>
        </div>
      </div>
    </div>
    <!-- End Modal -->