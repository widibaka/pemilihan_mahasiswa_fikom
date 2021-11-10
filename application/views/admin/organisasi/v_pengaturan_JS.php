<script>
      // preview gambar
      logo.onchange = evt => {
        const [file] = logo.files
        if (file) {
          preview_logo.src = URL.createObjectURL(file)
        }
      }
      // preview gambar
      background_halaman.onchange = evt => {
        const [file] = background_halaman.files
        if (file) {
          preview_background_halaman.src = URL.createObjectURL(file)
        }
      }

</script>