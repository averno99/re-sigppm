    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?= $judul ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <?php if ($this->session->flashdata('login')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?= $this->session->flashdata('login'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mx-auto mb-3">
                    <form action="" method="GET">
                        <div class="col-md-4 ml-auto">
                            <div class="input-group mt-2">
                                <select class="custom-select" name="cari" id="cari">
                                    <option selected disabled>--Pilih Tahun--</option>
                                    <?php for ($y = date('Y'); $y >= 2000; $y--) : ?>
                                        <?php if ($y == $this->input->get('cari')) : ?>
                                            <option value="<?= $y; ?>" selected><?= $y; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $y; ?>"><?= $y; ?></option>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">Pilih</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <?php if (empty($dash && $rasioM && $rasioD && $rasioK)) : ?>
                <div class="alert alert-danger col-sm-12" role="alert">
                    Data tidak ditemukan.
                </div>
            <?php else : ?>
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="col-3 align-self-center">
                                        <div class="round">
                                            <a href="<?= site_url('dashboard/dash_malaria'); ?>"><i class="mdi mdi-hospital"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-9 align-self-center text-center">
                                        <div class="m-l-10">
                                            <h5 class="mt-0 round-inner text-danger"><?= $rasioM['mal_positif'] ?></h5>
                                            <p class="mb-0 text-muted">Kasus Malaria di Tahun <?= $rasioM['tahun'] ?></p>
                                            <a href="<?= site_url('dashboard/dash_malaria'); ?>"><span>Lebih Lanjut</span> <i class="mdi mdi-arrow-right mt-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="col-3 align-self-center">
                                        <div class="round">
                                            <i class="mdi mdi-hospital"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 text-center align-self-center">
                                        <div class="m-l-10 ">
                                            <h5 class="mt-0 round-inner text-danger"><?= $rasioD['jumlah_kasus'] ?></h5>
                                            <p class="mb-0 text-muted">Kasus DBD di Tahun <?= $rasioD['tahun'] ?></p>
                                            <a href="<?= site_url('dashboard/dash_dbd'); ?>"><span>Lebih Lanjut</span> <i class="mdi mdi-arrow-right mt-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="col-3 align-self-center">
                                        <div class="round ">
                                            <i class="mdi mdi-hospital"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 align-self-center text-center">
                                        <div class="m-l-10 ">
                                            <?php
                                            $total = $rasioK['totalPB'] + $rasioK['totalMB'];
                                            ?>
                                            <h5 class="mt-0 round-inner text-danger"><?= $total ?></h5>
                                            <p class="mb-0 text-muted">Kasus Kusta di Tahun <?= $rasioK['tahun'] ?></p>
                                            <a href="<?= site_url('dashboard/dash_kusta'); ?>"><span>Lebih Lanjut</span> <i class="mdi mdi-arrow-right mt-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Grafik Jumlah Penduduk</h4>
                                <div class="dropdown-divider mb-3"></div>

                                <canvas id="myChart" width="200" height="70"></canvas>


                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


        </div><!-- container -->

    </div> <!-- Page content Wrapper -->

    </div> <!-- content -->