<form action="<?= base_url('keuangan/simpanPengeluaran') ?>" method="post" id="form">
    <div class="form-group">
        <label for="email">Program:</label>
        <input type="text" class="form-control" name="program" placeholder="Masukan Program" required>
    </div>
    <div class="form-group">
        <label for="email">Kegiatan:</label>
        <textarea name="kegiatan" class="form-control" placeholder="Masukan Kegiatan" required></textarea>
    </div>
    <div class="form-group">
        <label for="email">Waktu Kegiatan:</label>
        <input type="date" class="form-control" name="waktu_pelaksanaan" placeholder="Masukan tanggal">
    </div>
    <div class="form-group">
        <label for="email">Jumlah Penggunaan (Rp.):</label>
        <input type="number" class="form-control" name="jumlah" placeholder="Masukan Jumlah Penggunaan" required>
    </div>
    <button id="tombol_tambah" type="submit" class="btn btn-primary">Simpan</button>
</form>