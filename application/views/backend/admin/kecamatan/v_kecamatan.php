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
                                            <li class="breadcrumb-item">Kelola Data Kecamatan</li>
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
                                        <h4 class="mt-0 header-title">Data Kecamatan</h4>
                                        <div class="dropdown-divider mb-3"></div>

                                        <a href="<?= site_url('kecamatan/tambah'); ?>" class="btn btn-primary mb-3 ml-3 waves-effect waves-light">
                                            <i class="fa fa-plus pr-1"></i> Tambah
                                        </a>

                                        <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Kecamatan</th>
                                                    <th>Keterangan</th>
                                                    <th>Geojson</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($kecamatan as $kcm) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $kcm['nama']; ?></td>
                                                        <td><?= $kcm['keterangan']; ?></td>
                                                        <td><a href="<?= site_url('assets/geojson/') . $kcm['geojson']; ?>" target="_BLANK"><?= $kcm['geojson']; ?></a></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?= site_url(); ?>kecamatan/lihat/<?= $kcm['id'] ?>" class="btn btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="Lihat Data">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="<?= site_url(); ?>kecamatan/ubah/<?= $kcm['id'] ?>" class="btn btn-warning btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="Ubah Data">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="<?= site_url(); ?>kecamatan/hapus/<?= $kcm['id'] ?>" class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" data-placement="top" title="Hapus Data">
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