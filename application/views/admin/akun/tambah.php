<form method="post" id="form">
    <div class="form-group">
        <label for="email">Nama:</label>
        <input type="text" class="form-control" name="kode_kelas" placeholder="Masukan Kode Kelas">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="nama_kelas" placeholder="Masukan Nama Kelas">
    </div>
    <div class="form-group">
        <label for="email">Password:</label>
        <input type="date" class="form-control" name="tmt">
    </div>
    <div class="form-group">
        <label for="email">Ulang Password:</label>
        <input type="text" class="form-control" name="nbm">
    </div>
    <button id="tombol_tambah" type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tombol_tambah").click(function() {
            var data = $('#form').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>/mahasiswa/simpanMahasiswa",
                data: data,
                cache: false,
                success: function(data) {
                    $('#tampil').load("<?php echo base_url(); ?>/mahasiswa/tampilMahasiswa");
                }
            });
        });
    });
</script>