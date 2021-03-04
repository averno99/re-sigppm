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
                                            <li class="breadcrumb-item">Beranda</li>
                                            <li class="breadcrumb-item active">Data Perhitungan</li>
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
                                        <h4 class="mt-0 header-title">Data Perhitungan</h4>
                                        <div class="dropdown-divider mb-3"></div>
                                        <div class="row mb-4">
                                            <div class="col-sm-6">
                                                <a href="<?= site_url('perhitungan/tambah'); ?>" class="btn btn-primary ml-3 waves-effect waves-light">
                                                    <i class="fa fa-plus pr-1"></i> Tambah
                                                </a>
                                            </div>
                                            <div class="col-sm-6 mx-auto">
                                                <form action="<?= base_url('perhitungan/cari') ?>" method="GET">
                                                    <div class="col-sm-6 ml-auto">
                                                        <div class="input-group mt-2">
                                                            <select class="custom-select" name="cari" id="cari">
                                                                <option selected disabled>--Pilih Tahun--</option>
                                                                <?php foreach ($tahun as $thn) : ?>
                                                                    <?php if ($thn['tahun'] == $this->input->get('cari')) : ?>
                                                                        <option value="<?= $thn['tahun']; ?>" selected><?= $thn['tahun']; ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?= $thn['tahun']; ?>"><?= $thn['tahun']; ?></option>
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
                                        </div>
                                        <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tahun</th>
                                                    <th>Penyakit</th>
                                                    <th>Kecamatan</th>
                                                    <th>Jumlah Penduduk</th>
                                                    <th>Jumlah Kasus</th>
                                                    <th>Hasil Perhitungan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($perhitungan as $pht) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $pht['tahun']; ?></td>
                                                        <td><?= $pht['penyakit']; ?></td>
                                                        <td><?= $pht['nama']; ?></td>
                                                        <td><?= number_format($pht['jumlahPenduduk'], 0, '', ','); ?></td>
                                                        <td><?= number_format($pht['jumlahKasus'], 0, '', ','); ?></td>
                                                        <td><?= $pht['hasil']; ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="#" class="btn btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="Lihat Data">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="<?= site_url(); ?>perhitungan/hapus/<?= $pht['idPerhitungan'] ?>" class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" data-placement="top" title="Hapus Data">
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