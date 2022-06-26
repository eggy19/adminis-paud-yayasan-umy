<form action="<?= base_url('keuangan/ubahPengeluaran') ?>" method="post" id="form">
    <div class="form-group">
        <input type="hidden" name="id" value="<?= $rencana_penggunaan->id ?>">
        <input type="hidden" name="user_id" value="<?= $rencana_penggunaan->user_id ?>">
        <label for="email">Program:</label>
        <input type="text" class="form-control" name="program" value="<?= $rencana_penggunaan->program ?>" required>
    </div>
    <div class=" form-group">
        <label for="email">Kegiatan:</label>
        <textarea name="kegiatan" class="form-control" required><?= $rencana_penggunaan->kegiatan ?></textarea>
    </div>
    <div class="form-group">
        <label for="email">Waktu Kegiatan:</label>
        <input type="date" class="form-control" name="waktu_pelaksanaan" value="<?= $rencana_penggunaan->waktu_pelaksanaan ?>">
    </div>
    <div class="form-group">
        <label for="email">Jumlah Penggunaan (Rp.):</label>
        <input type="number" class="form-control" name="jumlah" value="<?= $rencana_penggunaan->jumlah ?>" required>
    </div>
    <button id=" tombol_tambah" type="submit" class="btn btn-primary">Simpan</button>
</form>