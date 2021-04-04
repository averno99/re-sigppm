                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                        <?php if ($this->session->flashdata('flash')) : ?>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item active">Kelola Data Kasus</li>
                                            <li class="breadcrumb-item"><?= $judul ?></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?= $judul ?></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title end breadcrumb -->

                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card m-b-30">
                                    <div class="card-body table-responsive">
                                        <h4 class="mt-0 header-title">Data Kasus Malaria</h4>
                                        <div class="dropdown-divider mb-3"></div>
                                        <div class="row mb-4">

                                            <div class="offset-1 col-sm-5">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-file-excel"></i> Cetak
                                                </button>
                                                <div class="dropdown-menu">
                                                    <?php foreach ($tahun as $thn) : ?>
                                                        <a class="dropdown-item" href="<?= site_url(''); ?>perhitungan/excel_malaria/<?= $thn['tahun'] ?>"><?= $thn['tahun'] ?></a>
                                                    <?php endforeach; ?>

                                                </div>
                                            </div>

                                            <div class="col-sm-6 mx-auto">
                                                <form action="" method="GET">
                                                    <div class="col-sm-6 ml-auto">
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

                                        <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tahun</th>
                                                    <th>Kecamatan</th>
                                                    <th>Jumlah Penduduk</th>
                                                    <th>Suspek</th>
                                                    <th>AMI</th>
                                                    <th>Positif</th>
                                                    <th>API</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($kasus as $kps) : ?>
                                                    <?php
                                                    $jumlahPenduduk = $kps['jumlahPenduduk'];
                                                    $positif = $kps['malaria_positif'];
                                                    $klinis = $kps['malaria_klinis'];

                                                    $api = ($positif / $jumlahPenduduk) * 1000;
                                                    $ami = ($klinis / $jumlahPenduduk) * 1000;
                                                    ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $kps['tahun']; ?></td>
                                                        <td><?= $kps['nama']; ?></td>
                                                        <td><?= number_format($kps['jumlahPenduduk'], 0, '', ','); ?></td>
                                                        <td><?= $kps['malaria_klinis']; ?></td>
                                                        <td><?= number_format($ami, 2); ?></td>
                                                        <td><?= $kps['malaria_positif']; ?></td>
                                                        <td><?= number_format($api, 2); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->

                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

                </div> <!-- content -->