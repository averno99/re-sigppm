<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($dash as $d) {
                    echo "'" . $d['nama'] . "',";
                }
                ?>
            ],
            datasets: [{
                label: <?php
                        if ($this->input->get('cari'))
                            echo "' Jumlah Penduduk Tahun " . $this->input->get('cari') . "'";
                        ?>,
                data: [
                    <?php foreach ($dash as $d) {
                        echo "'" . $d['jumlah'] . "',";
                    }
                    ?>
                ],
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
                        return value + ' Penduduk';
                    }
                }
            }
        }
    });
</script>

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
                        $kasusTotal = $d['total'];
                        $hasil = $kasusTotal / $jumlahPenduduk * 100000;

                        echo "'" . number_format($hasil, 2) . "',";
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
                        return 'API ' + value;
                    }

                }
            }
        }
    });
</script>

<script>
    <?php
    $persenM = round($rasioD['totalL'] / $rasioD['total'] * 100, 2);
    $persenP = round($rasioD['totalP'] / $rasioD['total'] * 100, 2);
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
<!-- End DBD -->