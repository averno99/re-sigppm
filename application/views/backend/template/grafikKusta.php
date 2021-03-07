<!-- Kusta -->
<script>
    <?php
    $persenM = round($rasioK['totalL'] / ($rasioK['totalPB'] + $rasioK['totalMB']) * 100, 2);
    $persenP = round($rasioK['totalP'] / ($rasioK['totalPB'] + $rasioK['totalMB']) * 100, 2);
    ?>

    var ctx = document.getElementById('rasioKusta').getContext('2d');
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
    var ctx = document.getElementById('tipeKusta').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['PB', 'MB'],
            datasets: [{
                label: <?= "'Kasus Kusta Tahun " . $this->input->get('cari') . "'" ?>,
                data: ['<?= $rasioK['totalPB'] ?>', '<?= $rasioK['totalMB'] ?>'],
                backgroundColor: '#ADD8E6',
                borderColor: '#93C3D2',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    },

                }]
            },
            plugins: {
                datalabels: {
                    color: '#000',
                    font: {
                        weight: 'bold',
                        size: '10'
                    },
                    formatter: (value) => {
                        return value + ' Kasus';
                    }
                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('pr').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($kusta as $k) {
                    echo "'" . $k['nama'] . "',";
                }
                ?>
            ],
            datasets: [{
                label: <?php
                        if ($this->input->get('cari'))
                            echo "' PR Tahun " . $this->input->get('cari') . "'";
                        ?>,

                data: [
                    <?php foreach ($kusta as $k) {
                        $jumlahPenduduk = $k['jumlahPenduduk'];
                        $total = $k['pb'] + $k['mb'];
                        $pr = ($total / $jumlahPenduduk) * 10000;

                        echo "'" . number_format($pr, 2) . "',";
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
                    formatter: (value) => {
                        return 'PR ' + value;
                    }

                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('cdr').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($kusta as $k) {
                    echo "'" . $k['nama'] . "',";
                }
                ?>
            ],
            datasets: [{
                label: <?php
                        if ($this->input->get('cari'))
                            echo "' CDR Tahun " . $this->input->get('cari') . "'";
                        ?>,

                data: [
                    <?php foreach ($kusta as $k) {
                        $jumlahPenduduk = $k['jumlahPenduduk'];
                        $kasus_baru = $k['kasus_baru'];
                        $cdr = ($kasus_baru / $jumlahPenduduk) * 100000;

                        echo "'" . number_format($cdr, 2) . "',";
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
                    formatter: (value) => {
                        return 'CDR ' + value;
                    }

                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('usiaK').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['< 15 th', '16 - 25 th', '26 - 35 th', '36 - 45 th', '46 - 55 th', '> 56 th'],
            datasets: [{
                    label: 'PB',
                    data: [
                        '<?= $usiaK['kus15PB']; ?>',
                        '<?= $usiaK['kus1625PB']; ?>',
                        '<?= $usiaK['kus2635PB']; ?>',
                        '<?= $usiaK['kus3645PB']; ?>',
                        '<?= $usiaK['kus4655PB']; ?>',
                        '<?= $usiaK['kus56PB']; ?>'
                    ],
                    backgroundColor: 'blue',
                    borderColor: 'blue',
                    borderWidth: 1
                },
                {
                    label: 'MB',
                    data: [
                        '<?= $usiaK['kus15MB']; ?>',
                        '<?= $usiaK['kus1625MB']; ?>',
                        '<?= $usiaK['kus2635MB']; ?>',
                        '<?= $usiaK['kus3645MB']; ?>',
                        '<?= $usiaK['kus4655MB']; ?>',
                        '<?= $usiaK['kus56MB']; ?>'
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
<!-- End Kusta -->