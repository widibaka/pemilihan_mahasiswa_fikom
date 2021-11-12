<!-- Summernote -->
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-lite.min.js"></script>

<script>
      // preview gambar
      function preview_image(id_kandidat) {
        const [file] = document.getElementById('image'+id_kandidat).files
        if (file) {
          document.getElementById('preview_image'+id_kandidat).src = URL.createObjectURL(file)
        }
      }

      $("textarea").summernote({
        placeholder: 'Type here...',
        tabsize: 2,
        height: 150,
        toolbar: [
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });


</script>