<form action="<?= base_url('keuangan/simpanPendapatan') ?>" method="post" id="form">
    <div class="form-group">
        <label for="email">Program:</label>
        <input type="text" class="form-control" name="kelas" placeholder="Masukan Sumber Dana" required>
    </div>
    <div class="form-group">
        <label for="email">Kegiatan:</label>
        <textarea name="kegiatan" class="form-control" placeholder="Masukan Sumber Dana" required></textarea>
    </div>
    <div class="form-group">
        <label for="email">Waktu Kegiatan:</label>
        <input type="text" class="form-control" name="wali_kelas2" placeholder="Masukan tanggal">
    </div>
    <div class="form-group">
        <label for="email">Jumlah Penggunaan (Rp.):</label>
        <input type="number" class="form-control" name="wali_kelas1" placeholder="Masukan Jumlah Pendapatan" required>
    </div>
    <button id="tombol_tambah" type="submit" class="btn btn-primary">Simpan</button>
</form>