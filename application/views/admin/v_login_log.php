    <!-- card secrion -->
    <section class="h-100 w-100" style="box-sizing: border-box; background-color: transparent" id="skill">
      <div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="container mx-auto">
          <div class="d-flex flex-column text-center w-100" style="margin-bottom: 1rem">
            <h2 class="title-text">Login Log</h2>
          </div>

          <div class="card align-content-center mb-5">
            <table class="table table-bordered">
              <thead class="bg-kuning-dika">
                <tr>
                  <th scope="col">Admin</th>
                  <th scope="col">Waktu</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($main_data as $key => $val): ?>
                  <tr>
                    <td><?php echo $val['nama_admin'] ?></td>
                    <td><?php echo $val['waktu'] ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
            <center>...</center>
          </div>

        </div>
      </div>
    </section>