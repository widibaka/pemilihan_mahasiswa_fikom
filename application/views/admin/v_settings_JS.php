
<script>
    //Date and time picker
    $('.tanggal_waktu').datetimepicker({ 
        icons: { time: 'far fa-clock' },
        format: 'YYYY-MM-DD HH:mm:ss'
    });

    setTimeout(function () {
        $("#modalWarning").modal("show");
    }, 500);

</script>