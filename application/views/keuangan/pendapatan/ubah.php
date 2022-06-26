<form action="<?= base_url('keuangan/ubahPendapatan') ?>" method="post" id="form">
    <div class="form-group">
        <input type="hidden" name="id" value="<?= $rencana_pendapatan->id ?>">
        <input type="hidden" name="user_id" value="<?= $rencana_pendapatan->user_id ?>">
        <label for="email">Sumber Dana:</label>
        <input type="text" class="form-control" name="sumber_dana" value="<?= $rencana_pendapatan->sumber_dana ?>" required>
    </div>
    <div class=" form-group">
        <label for="email">Jumlah Pendapatan (Rp.):</label>
        <input type="number" class="form-control" name="jumlah" value="<?= $rencana_pendapatan->jumlah ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Tanggal:</label>
        <input type="date" class="form-control" name="tanggal" value="<?= $rencana_pendapatan->tanggal ?>">
    </div>
    <button id="tombol_tambah" type="submit" class="btn btn-primary">Simpan</button>
</form>