                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item">Beranda</li>
                                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?= $judul ?></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title end breadcrumb -->
                        <!-- <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card m-b-30">
                                    <div class="card-body">

                                        <?php if ($this->session->flashdata('login')) : ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <?= $this->session->flashdata('login'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <h4 class="mt-0 header-title">Dashboard</h4>
                                        <div class="dropdown-divider mb-3"></div>

                                        <canvas id="myChart" width="200" height="70"></canvas>




                                    </div>
                                </div>
                            </div>
                        </div> -->


                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Rasio Perbandingan Kasus Malaria Berdasarkan Jenis Kelamin</h4>
                                        <div class="dropdown-divider mb-3"></div>
                                        <div class="mx-auto mb-3">
                                            <form action="<?= base_url('dashboard/malariaDash') ?>" method="GET">
                                                <div class="col-md-4">
                                                    <div class="input-group mt-2">
                                                        <select class="custom-select" name="cari" id="cari">
                                                            <option selected disabled>--Pilih Tahun--</option>
                                                            <?php for ($y = date('Y'); $y >= 1990; $y--) : ?>
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

                                        <canvas id="rasioMalaria" width="200" height="70"></canvas>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Grafik Annual Paracite Incidence</h4>
                                        <div class="dropdown-divider mb-3"></div>

                                        <canvas id="api" width="200" height="70"></canvas>


                                    </div>
                                </div>
                            </div>
                        </div>



                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

                </div> <!-- content -->