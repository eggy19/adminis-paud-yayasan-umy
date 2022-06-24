<form method="post" id="form">
    <p>Yakin ingin menghapus <?= $siswa->nama ?> </p>
    <input type="hidden" name="id" value="<?= $siswa->id ?>">
    <button id="tombol_hapus" type="button" class="btn btn-danger" data-dismiss="modal">Hapus</button>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tombol_hapus").click(function() {
            var data = $('#form').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>siswa/hapusSiswa",
                data: data,
                cache: false,
                success: function(data) {
                    $('#data-tabel').load("<?php echo base_url(); ?>/siswa/dataSiswa");
                    // alert('Berhasil Terhapus');
                }
            });
        });
    });
</script>