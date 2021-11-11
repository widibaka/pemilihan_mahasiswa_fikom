<script>
      // preview gambar
      logo.onchange = evt => {
        const [file] = logo.files
        if (file) {
          preview_logo.src = URL.createObjectURL(file)
        }
      }

</script>