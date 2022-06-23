<form action="<?= base_url('kelas/ubahKelas') ?>" method="post" id="form">
    <div class="form-group">
        <label for="email">Nama Kelas:</label>
        <input type="hidden" name="id" value="<?= $kelas->id ?>">
        <input type="hidden" name="user_id" value="<?= $kelas->user_id ?>">
        <input type="text" class="form-control" name="kelas" value="<?= $kelas->kelas ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Wali Kelas 1:</label>
        <input type="text" class="form-control" name="wali_kelas1" value="<?= $kelas->wali_kelas1 ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Wali Kelas 2:</label>
        <input type="text" class="form-control" name="wali_kelas2" value="<?= $kelas->wali_kelas2 ?>">
        <small class="text text-danger">* Wali Kelas dapat diisi satu saja</small>
    </div>
    <button id="tombol_tambah" type="submit" class="btn btn-primary">Simpan</button>
</form>