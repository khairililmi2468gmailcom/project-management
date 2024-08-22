<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Report</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Report</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Top 5 Members by Modules</h5>
                    <div class="chart-container">
                        <canvas id="lineChart" class="chart-size"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Top 5 Members by Modules</h5>
                    <div class="chart-container">
                        <canvas id="doughnutChart" class="chart-size-small"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .chart-container {
            position: relative;
            width: 100%;
            height: 300px; /* Ubah tinggi sesuai kebutuhan */
        }
        .chart-size {
            position: absolute;
            width: 100%;
            height: 100%;
        }
        .chart-size-small {
            width: 100%;
            height: 200px; /* Ubah tinggi sesuai kebutuhan */
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctxLine = document.getElementById('lineChart').getContext('2d');
        var chartData = <?= json_encode($chartData) ?>;
        var doughnutChartData = <?= json_encode($doughnutChartData) ?>;
        var totalBobotDone = <?= json_encode($totalBobotDone) ?>;

        var lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: chartData.labels,
                datasets: chartData.datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        type: 'category',
                        title: {
                            display: true,
                            text: 'Tanggal Selesai'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        min: 0, // Memastikan sumbu y mulai dari 0
                        max: 100, // Membatasi sumbu y hingga 100
                        title: {
                            display: true,
                            text: 'Bobot'
                        }
                    }
                },
                elements: {
                    line: {
                        tension: 0.4
                    },
                    point: {
                        radius: 5,
                        backgroundColor: 'rgba(50, 168, 82, 1)'
                    }
                },
                plugins: {
                    legend: {
                        display: true
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });

        Chart.register({
            id: 'centerText',
            beforeDraw: function(chart) {
                if (chart.config.type === 'doughnut') {
                    var width = chart.width,
                        height = chart.height,
                        ctx = chart.ctx;

                    ctx.restore();
                    var fontSize = (height / 114).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";
                    ctx.textAlign = "center";

                    var text = totalBobotDone,
                        textX = Math.round(width / 2),
                        textY = (height / 2) + 30;

                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            }
        });

        document.addEventListener("DOMContentLoaded", () => {
            new Chart(document.querySelector('#doughnutChart'), {
                type: 'doughnut',
                data: doughnutChartData,
                options: {
                    plugins: {
                        centerText: {
                            display: true,
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });
        });
    </script>

<?= $this->endSection() ?>
