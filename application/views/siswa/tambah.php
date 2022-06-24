<form method="post" id="form">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email">Nomor Induk:</label>
                <input type="text" class="form-control" name="induk" placeholder="Masukan Kode Kelas">
            </div>
            <div class="form-group">
                <label for="email">Nama Siswa:</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Kelas">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                <select class="form-control" id="exampleFormControlSelect1" name="gender">
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Tempat Lahir:</label>
                <input type="text" class="form-control" name="t_lahir" placeholder="Masukan Nama Kelas">
            </div>
            <div class="form-group">
                <label for="email">Tanggal Lahir:</label>
                <input type="date" class="form-control" name="tgl_lahir">
            </div>
            <div class="form-group">
                <label for="email">Berat Badan (Kg):</label>
                <input type="number" class="form-control" name="berat" placeholder="Masukan Angka">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="email">Tinggi Badan (cm):</label>
                <input type="number" class="form-control" name="tinggi" placeholder="Masukan Angka">
            </div>
            <div class="form-group">
                <label for="email">Lingkar Kepala (cm):</label>
                <input type="number" class="form-control" name="lingkar" placeholder="Masukan Angka">
            </div>
            <div class="form-group">
                <label for="email">Nama Orang Tua:</label>
                <input type="text" class="form-control" name="ortu" placeholder="Masukan Nama Orang tua">
            </div>
            <div class="form-group">
                <label for="email">Alamat:</label>
                <input type="text" class="form-control" name="alamat" placeholder="Masukan alamat">
            </div>
            <div class="form-group">
                <label for="email">No Telepon:</label>
                <input type="text" class="form-control" name="no_hp" placeholder="Masukan no telpon">
            </div>
        </div>
    </div>
    <div id="pesan">
    </div>
    <button id="tombol_tambah" type="button" class="btn btn-primary mt-3 ml-2">Simpan</button>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tombol_tambah").click(function() {
            var data = $('#form').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>/siswa/simpanSiswa",
                data: data,
                dataType: 'json',
                cache: false,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#data-tabel').load("<?php echo base_url(); ?>/siswa/dataSiswa");
                        $('#myModal').modal('hide');
                        alert(data.success);
                        // console.log(data);
                    } else {
                        console.log('tampil error');
                        $("#pesan").html('<div class="alert alert-danger"><small>' + data.error + '</small></div>');
                    }
                }
            });
        });
    });
</script>