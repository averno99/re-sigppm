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
                                            <li class="breadcrumb-item">Kelola Data Kasus Kusta</li>
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
                                        <h4 class="mt-0 header-title">Data Kasus Kusta</h4>
                                        <div class="dropdown-divider mb-3"></div>
                                        <div class="row mb-4">
                                            <div class="col-sm-6">
                                                <a href="<?= site_url('kasus_kusta/tambah'); ?>" class="btn btn-primary mb-3 ml-3 waves-effect waves-light">
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
                                                    <th rowspan="4">No</th>
                                                    <th rowspan="4">Tahun</th>
                                                    <th rowspan="4">Kecamatan</th>
                                                    <th colspan="25">Penderita Terdaftar</th>
                                                    <th colspan="2" rowspan="3">Kasus Baru</th>
                                                    <th rowspan="4">Aksi</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="4">&lt;15 thn</th>
                                                    <th colspan="4">16-25 thn</th>
                                                    <th colspan="4">26-35 thn</th>
                                                    <th colspan="4">36-45 thn</th>
                                                    <th colspan="4">46-55 thn</th>
                                                    <th colspan="4">&gt;56 thn</th>
                                                    <th rowspan="3">Total Kasus</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">L</th>
                                                    <th colspan="2">P</th>
                                                    <th colspan="2">L</th>
                                                    <th colspan="2">P</th>
                                                    <th colspan="2">L</th>
                                                    <th colspan="2">P</th>
                                                    <th colspan="2">L</th>
                                                    <th colspan="2">P</th>
                                                    <th colspan="2">L</th>
                                                    <th colspan="2">P</th>
                                                    <th colspan="2">L</th>
                                                    <th colspan="2">P</th>
                                                </tr>
                                                <tr>
                                                    <th>PB</th>
                                                    <th>MB</th>
                                                    <th>PB</th>
                                                    <th>MB</th>
                                                    <th>PB</th>
                                                    <th>MB</th>
                                                    <th>PB</th>
                                                    <th>MB</th>
                                                    <th>PB</th>
                                                    <th>MB</th>
                                                    <th>PB</th>
                                                    <th>MB</th>
                                                    <th>PB</th>
                                                    <th>MB</th>
                                                    <th>PB</th>
                                                    <th>MB</th>
                                                    <th>PB</th>
                                                    <th>MB</th>
                                                    <th>PB</th>
                                                    <th>MB</th>
                                                    <th>PB</th>
                                                    <th>MB</th>
                                                    <th>PB</th>
                                                    <th>MB</th>
                                                    <th>PB</th>
                                                    <th>MB</th>
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
                                                        <td><?= $kps['kus15LPB']; ?></td>
                                                        <td><?= $kps['kus15LMB']; ?></td>
                                                        <td><?= $kps['kus15PPB']; ?></td>
                                                        <td><?= $kps['kus15PMB']; ?></td>
                                                        <td><?= $kps['kus1625LPB']; ?></td>
                                                        <td><?= $kps['kus1625LMB']; ?></td>
                                                        <td><?= $kps['kus1625PPB']; ?></td>
                                                        <td><?= $kps['kus1625PMB']; ?></td>
                                                        <td><?= $kps['kus2635LPB']; ?></td>
                                                        <td><?= $kps['kus2635LMB']; ?></td>
                                                        <td><?= $kps['kus2635PPB']; ?></td>
                                                        <td><?= $kps['kus2635PMB']; ?></td>
                                                        <td><?= $kps['kus3645LPB']; ?></td>
                                                        <td><?= $kps['kus3645LMB']; ?></td>
                                                        <td><?= $kps['kus3645PPB']; ?></td>
                                                        <td><?= $kps['kus3645PMB']; ?></td>
                                                        <td><?= $kps['kus4655LPB']; ?></td>
                                                        <td><?= $kps['kus4655LMB']; ?></td>
                                                        <td><?= $kps['kus4655PPB']; ?></td>
                                                        <td><?= $kps['kus4655PMB']; ?></td>
                                                        <td><?= $kps['kus56LPB']; ?></td>
                                                        <td><?= $kps['kus56LMB']; ?></td>
                                                        <td><?= $kps['kus56PPB']; ?></td>
                                                        <td><?= $kps['kus56PMB']; ?></td>
                                                        <td><?= $kps['kus_total']; ?></td>
                                                        <td><?= $kps['kusta_baruPB']; ?></td>
                                                        <td><?= $kps['kusta_baruMB']; ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?= site_url(); ?>kasus_kusta/ubah/<?= $kps['id'] ?>" class="btn btn-warning btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="Ubah Data">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="<?= site_url(); ?>kasus_kusta/hapus/<?= $kps['id'] ?>" class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" data-placement="top" title="Hapus Data">
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