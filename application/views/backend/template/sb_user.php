<li class="menu-title">MENU</li>
<li>
    <a href="<?= site_url('penduduk') ?>" class="waves-effect">
        <i class="mdi mdi-account-card-details"></i>
        <span> Jumlah Penduduk </span>
    </a>
</li>

<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-hospital"></i> <span> Kasus </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li><a href="<?= site_url('kasus_malaria') ?>">Malaria</a></li>
    </ul>
    <ul class="list-unstyled">
        <li><a href="<?= site_url('kasus_dbd') ?>">DBD</a></li>
    </ul>
    <ul class="list-unstyled">
        <li><a href="<?= site_url('kasus_kusta') ?>">Kusta</a></li>
    </ul>
</li>

<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-calculator"></i> <span> Perhitungan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li><a href="<?= site_url('perhitungan/perhitungan_malaria') ?>">Malaria</a></li>
    </ul>
    <ul class="list-unstyled">
        <li><a href="<?= site_url('perhitungan/perhitungan_dbd') ?>">DBD</a></li>
    </ul>
    <ul class="list-unstyled">
        <li><a href="<?= site_url('perhitungan/perhitungan_kusta') ?>">Kusta</a></li>
    </ul>
</li>
<!-- <li>
    <a href="<?= site_url('pemetaan') ?>" class="waves-effect">
        <i class="mdi mdi-map-marker-multiple"></i>
        <span> Pemetaan </span>
    </a>
</li> -->
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-map-marker-multiple"></i> <span> Pemetaan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li><a href="<?= site_url('pemetaan/malaria') ?>">Malaria</a></li>
    </ul>
    <ul class="list-unstyled">
        <li><a href="<?= site_url('pemetaan/dbd') ?>">DBD</a></li>
    </ul>
    <ul class="list-unstyled">
        <li><a href="<?= site_url('pemetaan/kusta') ?>">Kusta</a></li>
    </ul>
</li>