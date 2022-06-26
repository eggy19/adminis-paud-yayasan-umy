<form action="<?= base_url('keuangan/simpanPendapatan') ?>" method="post" id="form">
    <div class="form-group">
        <label for="email">Sumber Dana:</label>
        <input type="text" class="form-control" name="sumber_dana" placeholder="Masukan Sumber Dana" required>
    </div>
    <div class="form-group">
        <label for="email">Jumlah Pendapatan (Rp.):</label>
        <input type="number" class="form-control" name="jumlah" placeholder="Masukan Jumlah Pendapatan" required>
    </div>
    <div class="form-group">
        <label for="email">Tanggal:</label>
        <input type="date" class="form-control" name="tanggal" placeholder="Masukan tanggal">
    </div>
    <button id="tombol_tambah" type="submit" class="btn btn-primary">Simpan</button>
</form>