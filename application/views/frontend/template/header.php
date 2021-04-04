<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <span>SIGPPM</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="<?= site_url() ?>beranda">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="<?= site_url() ?>beranda/penyakit">Informasi</a></li>
                    <li class="dropdown"><a href="#"><span>Pemetaan</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= site_url() ?>beranda/pemetaan_malaria">Malaria</a></li>
                            <li><a href="<?= site_url() ?>beranda/pemetaan_dbd">DBD</a></li>
                            <li><a href="<?= site_url() ?>beranda/pemetaan_kusta">Kusta</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Grafik</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= site_url() ?>beranda/grafik_malaria">Malaria</a></li>
                            <li><a href="<?= site_url() ?>beranda/grafik_dbd">DBD</a></li>
                            <li><a href="<?= site_url() ?>beranda/grafik_kusta">Kusta</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->