<p>Yakin ingin menghapus <?= $rencana_pendapatan->sumber_dana ?> / <?= $rencana_pendapatan->jumlah ?> / <?= $rencana_pendapatan->tanggal ?> </p>
<a href="<?= base_url('keuangan/hapusPendapatan/') . $rencana_pendapatan->id . '/' . $rencana_pendapatan->sumber_dana ?>" class="btn btn-danger">Hapus</a>