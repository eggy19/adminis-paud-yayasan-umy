<form method="post" id="form">
    <div class="form-group">
        <label for="email">Nomor Induk:</label>
        <input type="text" class="form-control" name="kode_kelas" placeholder="Masukan Kode Kelas">
    </div>
    <div class="form-group">
        <label for="email">Nama Siswa:</label>
        <input type="text" class="form-control" name="nama_kelas" placeholder="Masukan Nama Kelas">
    </div>
    <div class="form-group">
        <label>Kelompok:</label>
        <select class="form-control" name="kelompok">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="email">Nama Siswa:</label>
        <input type="date" class="form-control" name="tgl_lahir">
    </div>
    <div class="form-group">
        <label for="email">Berat Badan (Kg):</label>
        <input type="number" class="form-control" name="berat" placeholder="Masukan Angka">
    </div>
    <div class="form-group">
        <label for="email">Tinggi Badan (cm):</label>
        <input type="number" class="form-control" name="tinggi" placeholder="Masukan Angka">
    </div>
    <div class="form-group">
        <label for="email">Lingkar Kepala (cm):</label>
        <input type="number" class="form-control" name="lingkar" placeholder="Masukan Angka">
    </div>
    <div class="form-group">
        <label for="email">Nama Orang Tua:</label>
        <input type="text" class="form-control" name="ortu" placeholder="Masukan Angka">
    </div>
    <div class="form-group">
        <label for="email">Alamat:</label>
        <input type="text" class="form-control" name="alamat" placeholder="Masukan Angka">
    </div>
    <div class="form-group">
        <label for="email">No Telepon:</label>
        <input type="text" class="form-control" name="no_hp" placeholder="Masukan Angka">
    </div>
    <button id="tombol_tambah" type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tombol_edit").click(function() {
            var data = $('#form').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>/mahasiswa/editMahasiswa",
                data: data,
                cache: false,
                success: function(data) {
                    $('#tampil').load("<?php echo base_url(); ?>/mahasiswa/tampilMahasiswa");
                }
            });
        });
    });
</script>