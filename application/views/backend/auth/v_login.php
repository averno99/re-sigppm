<body class="fixed-left">

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
        <?php if ($this->session->flashdata('pesan')) : ?>
        <?php endif; ?>


        <div class="card">
            <div class="card-body">
                <!-- <?= $this->session->flashdata('pesan') ?> -->

                <h3 class="text-center">
                    <a href="#" class="logo logo-admin">SIGPPM</a>
                </h3>

                <div class="p-3">
                    <?php if ($this->session->flashdata('logout')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?= $this->session->flashdata('logout'); ?>
                        </div>
                    <?php endif; ?>
                    <form class="form-horizontal m-t-20" action="<?= site_url('auth') ?>" method="POST">

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="text" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                                <?= form_error('username', ' <small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                                <?= form_error('username', ' <small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Masuk</button>
                            </div>
                        </div>

                        <!-- <div class="form-group m-t-10 mb-0 row">
                            <div class="col-sm-7 m-t-20">
                                <a href="#" class="text-muted"><i class="mdi mdi-lock"></i> <small>Lupa password ?</small></a>
                            </div>
                        </div> -->
                    </form>
                </div>

            </div>
        </div>
    </div>