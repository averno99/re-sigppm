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
                                            <li class="breadcrumb-item">Kelola Data Jumlah Penduduk</li>
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
                                        <h4 class="mt-0 header-title">Data Jumlah Penduduk</h4>
                                        <div class="dropdown-divider mb-3"></div>
                                        <div class="row mb-4">
                                            <div class="col-sm-2">
                                                <a href="<?= site_url('penduduk/tambah'); ?>" class="btn btn-primary mb-3 ml-3 waves-effect waves-light">
                                                    <i class="fa fa-plus pr-1"></i> Tambah
                                                </a>
                                            </div>
                                            <div class="col-sm-4 mx-auto">
                                                <form action="" method="GET">
                                                    <div class="col-sm-12 ml-auto">
                                                        <div class="input-group mt-2">
                                                            <select class="custom-select" name="kecamatan" id="kecamatan">
                                                                <option selected disabled>--Pilih Kecamatan--</option>

                                                                <?php foreach ($kecamatan as $kcm) : ?>
                                                                    <?php if ($kcm['id'] == $this->input->get('kecamatan')) : ?>
                                                                        <option value="<?= $kcm['id']; ?>" selected><?= $kcm['nama']; ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?= $kcm['id']; ?>"><?= $kcm['nama']; ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-success" type="submit">Pilih</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-4 mx-auto">
                                                <form action="" method="GET">
                                                    <div class="col-sm-12 ml-auto">
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
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($penduduk as $pdk) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $pdk['tahun']; ?></td>
                                                        <td><?= $pdk['nama']; ?></td>
                                                        <td><?= number_format($pdk['jumlah'], 0, '', ','); ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?= site_url(); ?>penduduk/ubah/<?= $pdk['id'] ?>" class="btn btn-warning btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="Ubah Data">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="<?= site_url(); ?>penduduk/hapus/<?= $pdk['id'] ?>" class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" data-placement="top" title="Hapus Data">
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