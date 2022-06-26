<form method="post" id="form">
    <p>Yakin ingin menghapus <?= $prestasi->nama_kegiatan ?> </p>
    <input type="hidden" name="id" value="<?= $prestasi->id ?>">
    <button id="tombol_hapus" type="button" class="btn btn-danger" data-dismiss="modal">Hapus</button>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        $("#tombol_hapus").click(function() {
            var data = $('#form').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>prestasi/hapus_prestasi",
                data: data,

                cache: false,
                success: function(data) {
                    $('#tampil-tabel').load("<?php echo base_url(); ?>/prestasi/index");

                }
            });
        });
    });
</script>