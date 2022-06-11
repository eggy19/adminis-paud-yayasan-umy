<form method="post" id="form">
    <div class="form-group">
        <label for="email">Kode Kelas:</label>
        <input type="text" class="form-control" name="kode_kelas" placeholder="Masukan Kode Kelas">
    </div>
    <div class="form-group">
        <label for="email">Nama Kelas:</label>
        <input type="text" class="form-control" name="nama_kelas" placeholder="Masukan Nama Kelas">
    </div>
    <div class="form-group">
        <label>Kelompok:</label>
        <select class="form-control" name="kelompok">
            <option value="TI">Teknik Informatika</option>
            <option value="SI">Sistem Informasi</option>
            <option value="TK">Teknik Komputer</option>
            <option value="MI">Manajemen Informatika</option>
        </select>
    </div>
    <div class="form-group">
        <label for="email">Wali Kelas:</label>
        <input type="text" class="form-control" name="wali" placeholder="Masukan Nama Wali">
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