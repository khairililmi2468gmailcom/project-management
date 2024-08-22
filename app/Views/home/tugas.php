<main id="main" class="main">
  <div class="pagetitle">
    <h1>Task</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Dashboard</a></li>
      </ol>
    </nav>
  </div>
  <section class="section dashboard">
    <div class="container">
      <div class="row">
        <div class="col-8">
          <?php $i = 1; ?>
          <?php foreach ($datamodul as $col) : ?>
            <div class="card info-card customers-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <h5 class="card-title"><?php echo $col['nama_project']; ?><span>|Tugas <?= $i; ?></span> </h5>
                    <h6 class="card-title"><?php echo $col['nama_modul']; ?></h6>
                  </div>
                  <div class="col-5">
                    <div class="ps-3 mt-5">
                      <ul class="nav">
                        <li class="nav-item">
                          <a class="nav-link collapsed"></a>
                          <span class="text-danger">Deadline:</span>
                          <span class="text-danger"><?php echo $col['deadline']; ?></span>
                          <div class="mt-2">
                            <span class="text">Status:</span>
                            <?php
                            if ($col['id_status'] == 1) {
                              echo '<span class="badge bg-secondary">Pending</span>';
                            } elseif ($col['id_status'] == 2) {
                              echo '<span class="badge bg-warning">Submission</span>';
                            } elseif ($col['id_status'] == 3) {
                              echo '<span class="badge bg-danger">Rejected</span>';
                            } elseif ($col['id_status'] == 4) {
                              echo '<span class="badge bg-success">Approved</span>';
                            } else {
                              echo '<span class="badge bg-muted">Unknown Status</span>';
                            }
                            ?>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-3 ">
                    <div class="ps-3 d-grid mt-4">
                      <button class="btn btn-primary" onclick="location.href='<?= base_url('detail_tugas/' . $col['id_modul']) ?>'">
                        <i class="bi bi-eyeglasses"></i>
                      </button>
                    </div>
                    <div class="ps-3 mt-2 d-grid">
                      <?php
                      $sudahAda = false;
                      foreach ($dataprogres as $row) {
                        if ($row['id_modul'] == $col['id_modul'] && ($row['id_status'] == 2 || $row['id_status'] == 4)) {
                          $sudahAda = true;
                          break;
                        }
                      }
                      ?>
                      <?php if (!$sudahAda): ?>
                        <a class="btn btn-warning" href="<?= base_url('kerjakan') . '/' . $col['id_modul'] ?>">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                      <?php else: ?>
                        <a class="btn btn-warning disabled" href="<?= base_url('kerjakan') . '/' . $col['id_modul'] ?>">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php $i++; ?>
          <?php endforeach; ?>
        </div>

        <!-- Website Traffic -->
        <div class="col-4">
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Task Status</h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  const modulData = <?php echo json_encode($datamodul); ?>;

                  // Aggregate the data by status
                  const statusCount = modulData.reduce((acc, modul) => {
                    acc[modul.id_status] = (acc[modul.id_status] || 0) + 1;
                    return acc;
                  }, {});

                  // Map status to colors and labels
                  const statusDetails = {
                    1: { color: '#808080', label: 'Pending' },
                    2: { color: '#FFD700', label: 'Submission' },
                    3: { color: '#FF0000', label: 'Rejected' },
                    4: { color: '#008000', label: 'Approved' }
                  };

                  // Transform the data for ECharts
                  const chartData = Object.keys(statusCount).map(status => ({
                    value: statusCount[status],
                    name: statusDetails[status].label,
                    itemStyle: {
                      color: statusDetails[status].color
                    }
                  }));

                  // Initialize ECharts and set the options
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Task Status',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: chartData
                    }]
                  });
                });
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
