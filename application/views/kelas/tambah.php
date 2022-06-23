<form action="<?= base_url('kelas/simpanKelas') ?>" method="post" id="form">
    <div class="form-group">
        <label for="email">Nama Kelas:</label>
        <input type="text" class="form-control" name="kelas" placeholder="Masukan Nama Kelas" required>
    </div>
    <div class="form-group">
        <label for="email">Wali Kelas 1:</label>
        <input type="text" class="form-control" name="wali_kelas1" placeholder="Masukan Nama Wali Kelas" required>
    </div>
    <div class="form-group">
        <label for="email">Wali Kelas 2:</label>
        <input type="text" class="form-control" name="wali_kelas2" placeholder="Masukan Nama Wali Kelas">
        <small class="text text-danger">* Wali Kelas dapat diisi satu saja</small>
    </div>
    <button id="tombol_tambah" type="submit" class="btn btn-primary">Simpan</button>
</form>