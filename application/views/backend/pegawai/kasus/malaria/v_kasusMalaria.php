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
                                            <li class="breadcrumb-item">Kelola Data Kasus Malaria</li>
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

                                            <div class="col-sm-6">
                                                <a href="<?= site_url('kasus_malaria/tambah'); ?>" class="btn btn-primary mb-3 ml-3 waves-effect waves-light">
                                                    <i class="fa fa-plus pr-1"></i> Tambah
                                                </a>
                                            </div>


                                            <div class="col-sm-6 mx-auto">
                                                <form action="" method="GET">
                                                    <div class="col-sm-6 ml-auto">
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
                                        </div>

                                        <table id="example1" class="table table-striped table-bordered table-responsive text-center" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th rowspan="3">No</th>
                                                    <th rowspan="3">Tahun</th>
                                                    <th rowspan="3">Kecamatan</th>
                                                    <th rowspan="3">Suspek</th>
                                                    <th colspan="12">Penderita Terdaftar</th>
                                                    <th colspan="2" rowspan="2">Konfirmasi Lab</th>
                                                    <th colspan="5" rowspan="2">Jenis Parasit</th>
                                                    <th rowspan="3">Meninggal</th>
                                                    <th rowspan="3">Total Kasus Positif</th>
                                                    <th rowspan="3">Aksi</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">0-11 bln</th>
                                                    <th colspan="2">1-4 thn</th>
                                                    <th colspan="2">5-9 thn</th>
                                                    <th colspan="2">10-14 thn</th>
                                                    <th colspan="2">15-64 thn</th>
                                                    <th colspan="2">&gt;64 thn</th>
                                                </tr>
                                                <tr>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>RDT</th>
                                                    <th>Mikroskop</th>
                                                    <th>Pf</th>
                                                    <th>Pv</th>
                                                    <th>Pm</th>
                                                    <th>Po</th>
                                                    <th>Mix</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($kasus as $kps) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $kps['tahun']; ?></td>
                                                        <td><?= $kps['nama']; ?></td>
                                                        <td><?= $kps['malaria_klinis']; ?></td>
                                                        <td><?= $kps['mal011L']; ?></td>
                                                        <td><?= $kps['mal011P']; ?></td>
                                                        <td><?= $kps['mal14L']; ?></td>
                                                        <td><?= $kps['mal14P']; ?></td>
                                                        <td><?= $kps['mal59L']; ?></td>
                                                        <td><?= $kps['mal59P']; ?></td>
                                                        <td><?= $kps['mal1014L']; ?></td>
                                                        <td><?= $kps['mal1014P']; ?></td>
                                                        <td><?= $kps['mal1564L']; ?></td>
                                                        <td><?= $kps['mal1564P']; ?></td>
                                                        <td><?= $kps['mal65L']; ?></td>
                                                        <td><?= $kps['mal65P']; ?></td>
                                                        <td><?= $kps['rdt']; ?></td>
                                                        <td><?= $kps['mik']; ?></td>
                                                        <td><?= $kps['pf']; ?></td>
                                                        <td><?= $kps['pv']; ?></td>
                                                        <td><?= $kps['pm']; ?></td>
                                                        <td><?= $kps['po']; ?></td>
                                                        <td><?= $kps['mix']; ?></td>
                                                        <td><?= $kps['malaria_meninggal']; ?></td>
                                                        <td><?= $kps['malaria_positif']; ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?= site_url(); ?>kasus_malaria/ubah/<?= $kps['id'] ?>" class="btn btn-warning btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="Ubah Data">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="<?= site_url(); ?>kasus_malaria/hapus/<?= $kps['id'] ?>" class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" data-placement="top" title="Hapus Data">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </div>

                                                        </td>
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