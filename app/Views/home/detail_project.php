<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Details</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1><?= esc($project['nama_project']) ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('project') ?>">Project</a></li>
          <li class="breadcrumb-item active">Detail Project</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body pt-1">
              <div class="tab-content">

                  <h5 class="card-title">Project Description</h5>
                  <h5><?= esc($project['deskripsi_project']) ?></h5>
                  <h5 class="card-title">File</h5>
                  <p>
                    <?php if (!empty($project['upload_file'])): ?>
                      <a class="btn btn-primary" href="<?= base_url('assets/files/' . $project['upload_file']) ?>" target="_blank">View Doc</a>
                    <?php else: ?>
                      No file uploaded.
                    <?php endif; ?>
                  </p>

                  <h5 class="card-title">Modules (<?= $modul_count ?>)</h5> <!-- Menampilkan jumlah modul -->
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Module Name</th>
                          <th scope="col">Officer</th>
                          <th scope="col">Bobot</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($modul) && is_array($modul)): ?>
                          <?php foreach ($modul as $modul): ?>
                            <tr>
                              <td><?= esc($modul['nama_modul']) ?></td>
                              <td><?= esc($modul['username']) ?></td>
                              <td><?= esc($modul['bobot']) ?></td>
                              <td>
                                <?php
                                  if ($modul['id_status'] == 1) {
                                      echo 'Pending';
                                  } elseif ($modul['id_status'] == 2) {
                                      echo 'Submission';
                                  } elseif ($modul['id_status'] == 3) {
                                      echo 'Rejected';
                                  } elseif ($modul['id_status'] == 4) {
                                      echo 'Approved';
                                  } else {
                                      echo 'Unknown Status';
                                  }
                                ?>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="4">No modules found for this project.</td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>

                  <h5 class="card-title">Progress Chart</h5>
                  <div class="chart-container">
                    <canvas id="lineChart" class="chart-size"></canvas>
                  </div>
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    var ctxLine = document.getElementById('lineChart').getContext('2d');
    var chartData = <?= json_encode($chartData) ?>;

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
              text: 'Deadline'
            }
          },
          y: {
            beginAtZero: true,
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
  </script>

  <style>
    .chart-container {
      position: relative;
      width: 100%;
      height: 500px; /* Increase height */
    }
    .chart-size {
      position: absolute;
      width: 100%;
      height: 100%;
    }
  </style>
</body>

</html>
<?= $this->endSection() ?>
