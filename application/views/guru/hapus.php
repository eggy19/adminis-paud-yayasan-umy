<form method="post" id="form">
    <p>Yakin ingin menghapus <?= $guru->nama ?> </p>
    <input type="hidden" name="id_guru" value="<?= $guru->id ?>">
    <button id="tombol_hapus" type="button" class="btn btn-danger" data-dismiss="modal">Hapus</button>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        $("#tombol_hapus").click(function() {
            var data = $('#form').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>guru/hapusGuru",
                data: data,
                cache: false,
                success: function(data) {
                    $('#tampil').load("<?php echo base_url(); ?>/guru/tampilGuru");
                }
            });
        });
    });
</script>