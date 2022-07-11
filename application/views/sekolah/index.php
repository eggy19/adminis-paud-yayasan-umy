<!-- Header -->
<?php $this->load->view('template/head'); ?>
<div class="wrapper">

    <!-- Preloader -->


    <!-- Navbar -->
    <?php $this->load->view('template/nav'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view('template/sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?= $profil->nama_sekolah ?></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-success card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img" src="<?= base_url('assets/img/logo_sekolah/') . $profil->logo ?>" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"><?= $profil->nama_sekolah ?></h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Kelas</b> <a class="float-right"><?= $jml_kelas ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Guru</b> <a class="float-right"><?= $jml_guru ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Siswa</b> <a class="float-right"><?= $jml_siswa ?></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                <p class="text-muted"><?= $profil->alamat ?></p>

                                <hr>

                                <strong><i class="fas fa-book mr-1"></i> Visi</strong>
                                <p class="text-muted">
                                    <?= $profil->visi ?>
                                </p>


                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Misi</strong>

                                <p class="text-muted">
                                    <?= $profil->misi ?>
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Tujuan</strong>

                                <p class="text-muted"><?= $profil->tujuan ?></p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col">

                        <!-- Small boxes (Stat box) -->
                        <div class="row">

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <p>Jumlah Kelas</p>
                                        <h3><?= $jml_kelas ?></h3>

                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-university"></i>
                                    </div>
                                </div>

                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">

                                        <p>Jumlah Guru</p>
                                        <h3><?= $jml_guru ?></h3>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-stalker"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">

                                        <p>Jumlah Siswa</p>
                                        <h3><?= $jml_siswa ?></h3>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3><?= $jml_prestasi ?></h3>

                                        <p>Prestasi</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->

                            <div class="col">
                                <!-- PIE CHART -->
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Peserta Didik/Siswa</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="pieChartSiswa" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <!-- /.row -->
                        <div class="col">
                            <!-- STACKED BAR CHART -->
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Jumlah Siswa Per Kelas</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 400px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>




    <!-- Footer -->
    <?php $this->load->view('template/footer'); ?>

</div>
<!-- ./wrapper -->
<!-- JS -->
<?php $this->load->view('template/js'); ?>
<script>
    $(document).ready(function() {
        // chart Pie
        var pieChartCanvas = $('#pieChartSiswa').get(0).getContext('2d')
        var pieData = {
            labels: [
                'Laki-laki',
                'Perempuan'
            ],
            datasets: [{
                data: [<?= $lk ?>, <?= $pr ?>],
                backgroundColor: ['#f56954', '#f39c12'],
            }]
        }
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }

        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        });

        //=========================================================

        var barChart = $('#barChart').get(0).getContext('2d');
        const data = {
            labels: [
                <?php
                foreach ($kelas as $i) {
                    echo "'" . $i->kelas . "',";
                }

                ?>
            ],
            datasets: [{
                label: 'Siswa',
                data: [<?php
                        foreach ($kelas as $i) {
                            echo "'" . $i->jml_siswa . "',";
                        }

                        ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        new Chart(barChart, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        })
    });
</script>
</body>

</html>