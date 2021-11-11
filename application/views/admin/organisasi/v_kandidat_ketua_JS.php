<script>
      // preview gambar
      function preview_image(id_kandidat) {
        const [file] = document.getElementById('image'+id_kandidat).files
        if (file) {
          document.getElementById('preview_image'+id_kandidat).src = URL.createObjectURL(file)
        }
      }

</script>