<?php $this->load->view('template/head'); ?>


<!-- Main content -->
<section class="content">
    <div class="error-page mt-5">
        <h1 class="headline text-danger">403</h1>

        <div class="error-content">
            <h2><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Access Forbidden</h2>

            <p>
                Halaman yang anda kunjungi Tidak dapat diakses.
                Sihlakan Kembali.
            </p>

            <h3>
                <a href="<?php
                            if ($role == 1) {
                                echo base_url('admin');
                            } else {
                                echo base_url('user/sekolah');
                            }
                            ?>">Kembali ke Dashboard</a>
            </h3>

        </div>
    </div>
    <!-- /.error-page -->

</section>
<!-- /.content -->


<!-- JS -->
<?php $this->load->view('template/js'); ?>

</body>

</html>