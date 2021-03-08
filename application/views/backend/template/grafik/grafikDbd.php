<!-- DBD -->
<script>
    var ctx = document.getElementById('ir').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($irDbd as $t) {
                    echo "'" . $t['nama'] . "',";
                }
                ?>
            ],
            datasets: [{
                label: <?php
                        if ($this->input->get('cari'))
                            echo "' IR Tahun " . $this->input->get('cari') . "'";
                        ?>,

                data: [
                    <?php foreach ($irDbd as $d) {
                        $jumlahPenduduk = $d['jumlahPenduduk'];
                        $total_kasus = $d['jumlah_kasus'];
                        $ir = $total_kasus / $jumlahPenduduk * 100000;

                        echo "'" . number_format($ir, 2) . "',";
                    }
                    ?>
                ],
                backgroundColor: '#00CED1',
                borderColor: '#00CED1',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            plugins: {
                datalabels: {
                    color: '#000',
                    font: {
                        weight: 'bold',
                        size: '10'
                    },
                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('meninggal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($irDbd as $t) {
                    echo "'" . $t['nama'] . "',";
                }
                ?>
            ],
            datasets: [{
                    label: 'Hidup',
                    data: [
                        <?php foreach ($irDbd as $d) {
                            $total_kasus = $d['jumlah_kasus'];
                            $meninggal = $d['dbd_meninggal'];
                            $hidup = $total_kasus - $meninggal;

                            echo "'" . $hidup . "',";
                        }
                        ?>
                    ],
                    backgroundColor: '#00CED1',
                    borderColor: '#00CED1',
                    borderWidth: 1
                },
                {
                    label: 'Mati',
                    data: [
                        <?php foreach ($irDbd as $d) {
                            echo "'" . $d['dbd_meninggal'] . "',";
                        }
                        ?>
                    ],
                    backgroundColor: 'yellow',
                    borderColor: 'yellow',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            plugins: {
                datalabels: {
                    color: '#000',
                    font: {
                        weight: 'bold',
                        size: '10'
                    }
                }
            }
        }
    });
</script>

<script>
    <?php
    $persenM = round($rasioD['totalL'] / $rasioD['jumlah_kasus'] * 100, 2);
    $persenP = round($rasioD['totalP'] / $rasioD['jumlah_kasus'] * 100, 2);
    ?>

    var ctx = document.getElementById('rasioDbd').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Laki-Laki', 'Perempuan'],
            datasets: [{
                label: '# of Votes',
                data: ['<?= $persenM ?>', '<?= $persenP ?>'],
                backgroundColor: [
                    '#FB3640',
                    '#253058'
                ]
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom'
            },
            animation: {
                animateScale: true
            },
            plugins: {
                datalabels: {
                    color: '#fff',
                    anchor: 'end',
                    align: 'start',
                    offset: -10,
                    borderWidth: 2,
                    borderColor: '#fff',
                    borderRadius: 25,
                    backgroundColor: (context) => {
                        return context.dataset.backgroundColor;
                    },
                    font: {
                        weight: 'bold',
                        size: '10'
                    },
                    formatter: (value) => {
                        return value + ' %';
                    }

                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('usiaD').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['< 1 th', '1 - 4 th', '5 - 9 th', '10 - 14 th', '15 - 19 th', '20 - 44 th', '> 45 th'],
            datasets: [{
                label: 'Jumlah Kasus',
                data: [
                    '<?= $usiaD['dbd1']; ?>',
                    '<?= $usiaD['dbd14']; ?>',
                    '<?= $usiaD['dbd59']; ?>',
                    '<?= $usiaD['dbd1014']; ?>',
                    '<?= $usiaD['dbd1519']; ?>',
                    '<?= $usiaD['dbd2044']; ?>',
                    '<?= $usiaD['dbd45']; ?>'
                ],
                backgroundColor: 'yellow',
                borderColor: 'yellow',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            plugins: {
                datalabels: {
                    color: '#000',
                    font: {
                        weight: 'bold',
                        size: '10'
                    }

                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('waktu').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Jumlah Kasus',
                data: [
                    <?php foreach ($waktuDbd as $d) {

                        echo "'" . $d['jumlah_kasus'] . "',";
                    }
                    ?>
                ],
                fill: false,
                backgroundColor: '#00CED1',
                borderColor: '#00CED1',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            plugins: {
                datalabels: {
                    color: '#000',
                    font: {
                        weight: 'bold',
                        size: '10'
                    }
                }
            }
        }
    });
</script>
<!-- End DBD -->