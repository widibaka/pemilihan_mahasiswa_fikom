<!-- toast -->
<script src='<?php echo base_url() ?>/assets/@dmuy/toast/dist/mdtoast.min.js'></script>
<script>
  // Toast START
  var globalCount = 0;

  function getPemilihTerakhir() {
    $.ajax({
      url: '<?php echo base_url() ?>api/pemilih_terakhir',
      success: function (response) {
        let data = JSON.parse(response);
        // Info Toast
        mdtoast.info(`${data.nama_pemilih} telah menggunakan hak suara.`, { duration: 3000 });
      }
    })
  }

  function checkJumlahPemilih() {
    $.ajax({
      url: '<?php echo base_url() ?>api/jumlah_pemilih',
      success: function (response) {
        let data = JSON.parse(response);
        // console.log(globalCount);
        // console.log(data.count);
        // 
        if ( globalCount == 0 ) {
          globalCount = parseInt(data.count);
        }else if( globalCount != parseInt(data.count) ){
          // tampilkan toast
          getPemilihTerakhir();
          // lalu update globalCount
          globalCount = parseInt(data.count);
        }
      }
    })
  }

  setInterval(function () {
    checkJumlahPemilih();
  }, 4000);
  // Toast END
</script>