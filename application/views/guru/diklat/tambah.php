<form method="post" action="<?= base_url('guru/simpanDiklat/') . $guru_id ?>" enctype="multipart/form-data" id="form">
    <div class="form-group">
        <label for="email">Nama Diklat:</label>
        <input type="hidden" class="form-control" name="guru_id" value="<?= $guru_id ?>">
        <input type="text" class="form-control" name="diklat" required>
    </div>
    <div class="form-group">
        <label for="email">Lokasi Diklat:</label>
        <input type="text" class="form-control" name="lokasi" required>
    </div>
    <div class="form-group">
        <label for="email">Tanggal:</label>
        <input type="date" class="form-control" name="tgl" required>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Sertifikat</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="sertif" required>
                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text">Upload</span>
            </div>
        </div>
        <small class="text text-danger">*maksimal 4Mb</small>
    </div>
    <button id="tombol_tambah" type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>

<!-- bs-custom-file-input -->
<script src="<?= base_url('assets/templates/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
    $(function() {
        bsCustomFileInput.init();
    });
</script>