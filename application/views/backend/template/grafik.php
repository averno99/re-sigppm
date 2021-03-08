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