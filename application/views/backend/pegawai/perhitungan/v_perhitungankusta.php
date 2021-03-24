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
                                        <h4 class="mt-0 header-title">Data Kasus Kusta</h4>
                                        <div class="dropdown-divider mb-3"></div>
                                        <div class="row mb-4">

                                            <div class="offset-1 col-sm-5">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Excel
                                                </button>
                                                <div class="dropdown-menu">
                                                    <?php foreach ($tahun as $thn) : ?>
                                                        <a class="dropdown-item" href="<?= site_url(''); ?>perhitungan/excel_kusta/<?= $thn['tahun'] ?>"><?= $thn['tahun'] ?></a>
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
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">Tahun</th>
                                                    <th rowspan="2">Kecamatan</th>
                                                    <th rowspan="2">Jumlah Penduduk</th>
                                                    <th rowspan="2">Kasus Baru</th>
                                                    <th rowspan="2">CDR</th>
                                                    <th colspan="2">Kasus Terdaftar</th>
                                                    <th rowspan="2">PR</th>
                                                </tr>
                                                <tr>
                                                    <th>PB</th>
                                                    <th>MB</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($kasus as $kps) : ?>
                                                    <?php
                                                    $jumlahPenduduk = $kps['jumlahPenduduk'];
                                                    $total = $kps['pb'] + $kps['mb'];
                                                    $kasus_baru = $kps['kasus_baru'];

                                                    $pr = ($total / $jumlahPenduduk) * 10000;
                                                    $cdr = ($kasus_baru / $jumlahPenduduk) * 100000;
                                                    ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $kps['tahun']; ?></td>
                                                        <td><?= $kps['nama']; ?></td>
                                                        <td><?= number_format($kps['jumlahPenduduk'], 0, '', ','); ?></td>
                                                        <td><?= $kps['kasus_baru']; ?></td>
                                                        <td><?= number_format($cdr, 2); ?></td>
                                                        <td><?= $kps['pb']; ?></td>
                                                        <td><?= $kps['mb']; ?></td>
                                                        <td><?= number_format($pr, 2); ?></td>
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