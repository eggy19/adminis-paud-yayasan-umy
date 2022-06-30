<form method="post" id="form">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email">Nomor Induk:</label>
                <input type="hidden" name="id" value="<?= $siswa->id_siswa ?>">
                <input type="hidden" name="user_id" value="<?= $siswa->user_id ?>">
                <input type="text" class="form-control" name="induk" value="<?= $siswa->nomor_induk ?>">
            </div>
            <div class="form-group">
                <label for="email">Nama Siswa:</label>
                <input type="text" class="form-control" name="nama" value="<?= $siswa->nama ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                <select class="form-control" id="exampleFormControlSelect1" name="gender">
                    <option value="<?= $siswa->gender ?>" selected><?= $siswa->gender ?></option>
                    <option>Laki-Laki</option>
                    <option>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Tempat Lahir:</label>
                <input type="text" class="form-control" name="t_lahir" value="<?= $siswa->t_lahir ?>">
            </div>
            <div class="form-group">
                <label for="email">Tanggal Lahir:</label>
                <input type="date" class="form-control" name="tgl_lahir" value="<?= $siswa->tgl_lahir ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas :</label>
                <select class="form-control" id="exampleFormControlSelect1" name="kelas">
                    <option value="<?= $siswa->id_kelas ?>" selected><?= $siswa->kelas ?></option>
                    <?php foreach ($kelas as $i) { ?>
                        <option value="<?= $i->id ?>"><?= $i->kelas ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col">

            <div class="form-group">
                <label for="email">Berat Badan (Kg):</label>
                <input type="number" class="form-control" name="berat" value="<?= $siswa->bb ?>">
            </div>
            <div class="form-group">
                <label for="email">Tinggi Badan (cm):</label>
                <input type="number" class="form-control" name="tinggi" value="<?= $siswa->tb ?>">
            </div>
            <div class="form-group">
                <label for="email">Lingkar Kepala (cm):</label>
                <input type="number" class="form-control" name="lingkar" value="<?= $siswa->lk ?>">
            </div>
            <div class="form-group">
                <label for="email">Nama Orang Tua:</label>
                <input type="text" class="form-control" name="ortu" value="<?= $siswa->ortu ?>">
            </div>
            <div class="form-group">
                <label for="email">Alamat:</label>
                <input type="text" class="form-control" name="alamat" value="<?= $siswa->alamat ?>">
            </div>
            <div class="form-group">
                <label for="email">No Telepon:</label>
                <input type="text" class="form-control" name="no_hp" value="<?= $siswa->no_hp ?>">
            </div>
        </div>
    </div>
    <div id="pesan">
    </div>
    <button id="tombol_edit" type="button" class="btn btn-primary mt-3 ml-2">Simpan</button>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tombol_edit").click(function() {
            var data = $('#form').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>/siswa/ubahSiswa",
                data: data,
                cache: false,
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#data-tabel').load("<?php echo base_url(); ?>/siswa/dataSiswa");
                        $('#myModal').modal('hide');
                        console.log(data.success);
                        alert(data.success);
                    } else {
                        console.log(data.error);
                        $("#pesan").html('<div class="alert alert-danger"><small>' + data.error + '</small></div>');
                    }
                }
            });
        });
    });
</script>