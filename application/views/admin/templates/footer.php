
    <!-- <footer class="footer mt-auto py-3 bg-light shadow">
      <div class="container text-center">
        <span class="text-muted">Privided By HMPTI UDB 2021</span>
      </div>
    </footer> -->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- date-range-picker -->
    <script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- animasi particle network -->
    <script src='https://rawgit.com/JulianLaval/canvas-particle-network/master/particle-network.min.js'></script>
    <script  src="<?= base_url() ?>assets/particle_animation/script.js"></script>

    
    
  </body>
</html>



<script>
  // Loader for button
  function show_loader(element, caption="Loading...") {
    element.addClass('disabled');
    let captionAsli = element.html();
    element.attr('captionAsli', captionAsli);
    element.html('<img class="mr-2" src="<?php echo base_url() ?>assets/img/loader.gif"> ' + caption);
  }

  function hide_loader(element) {
    element.removeClass('disabled');
    let captionAsli = element.attr('captionAsli');
    element.html(captionAsli);
  }

  // kalo submit, otomatis beri loader
  $('form').submit(function () {
    show_loader( $(this).find('button[type="submit"]') );
  })


  


  $(document).ready(function() {
    $('.loading').fadeOut('slow');

  })
  
</script>

<?php $this->load->view('toast') ?>