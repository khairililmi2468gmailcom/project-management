<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col">
        <div class="row">
          <?php if (in_groups('admin')) : ?>
            <!-- Sales Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card" id="pmCard">
                <div class="card-body">
                  <h5 class="card-title">Project Manager</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-bounding-box"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$projectManagers?></h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

            <!-- Customers Card -->
            <div class="col-xxl-6 col-xl-12">
              <div class="card info-card customers-card" id="MemberCard" >
                <div class="card-body">
                  <h5 class="card-title">Members</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$members?></h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Customers Card -->

            <!-- Project Card for Admin -->
            <div class="col-xxl-12 col-md-12">
              <div class="card info-card revenue-card" id="adminProjectCard">
                <div class="card-body">
                  <h5 class="card-title">Project</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-motherboard"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$project_count?></h6>
                      <span class="text-success small pt-1 fw-bold"><?=$project_selesai?></span><span class="text-success small pt-2 ps-1">Done</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Project Card for Admin -->

             <!-- modul Card for Admin -->
             <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card" id="ModulCard">
                <div class="card-body">
                  <h5 class="card-title">Modul</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-motherboard"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$modulcount?></h6>
                      <span class="text-success small pt-1 fw-bold"><?=$modul_selesai?></span><span class="text-success small pt-2 ps-1">Done</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End modul Card for Admin -->

            <!-- Request Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card" id="reqCard">
                <div class="card-body">
                  <h5 class="card-title">Request</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-raised-hand"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$reqcount?></h6>
                      <span class="text-success small pt-1 fw-bold"><?=$approvereq?></span><span class="text-success small pt-2 ps-1">Approved</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Request Card -->
          <?php endif; ?>

         <!-- Project Manager Section -->
         <?php if (in_groups('project_manager')): ?>
            <!-- Project Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card" id="projectCard">
                <div class="card-body">
                  <h5 class="card-title">Project</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-motherboard"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$jprojperuser?></h6>
                      <span class="text-success small pt-1 fw-bold"><?=$project_bselesai?></span><span class="text-success small pt-2 ps-1">Not Finished Yet</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Project Card -->

            <!-- Task Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card" id="taskCard">
                <div class="card-body">
                  <h5 class="card-title">Task</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-list-task"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$jmodperuser?></h6>
                      <span class="text-success small pt-1 fw-bold"><?=$project_selesai?></span><span class="text-success small pt-2 ps-1">Not Finished Yet</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Task Card -->
          <?php endif; ?>

          <!-- Member Section -->
          <?php if (in_groups('member')): ?>
            <div class="col-8">
              <?php $i = 1;?>
              <?php foreach ($tampildataa as $col): ?>
                <div class="card info-card customers-card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-4">
                        <h5 class="card-title"><?=$col['nama_modul'];?> <span>|Tugas <?=$i;?></span> </h5>
                        <h6 class="card-title"><?=$col['nama_project'];?></h6>
                      </div>
                      <div class="col-5">
                        <div class="ps-3 mt-5">
                          <ul class="nav">
                            <li class="nav-item">
                              <a class="nav-link collapsed"></a>
                              <span class="text-danger">deadline</span>
                              <span class="text-danger"><?=$col['deadline'];?></span>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="d-flex justify-content-around mt-5">
                          <button class="btn btn-warning" onclick="location.href='<?=base_url('kerjakan/' . $col['id_modul'])?>'">
                            <i class="bi bi-pencil-square"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php $i++;?>
              <?php endforeach;?>
            </div>
            <div class="col-4">
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Task Status</h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  const modulData = <?php echo json_encode($tampildataa); ?>;

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
                    itemStyle: { color: statusDetails[status].color }
                  }));

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
          <?php endif;?>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

<!-- Modal -->
<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="projectModalLabel">Project List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- List of Projects -->
        <?php foreach ($tampildata as $col): ?>
          <div class="card info-card customers-card">
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <h5 class="card-title"><?= isset($col['total_modul']) ? $col['total_modul'] : 0; ?> modul</h5>
                  <h6><?= $col['nama_project']; ?></h6>
                </div>
                <div class="col-5">
                  <canvas id="doughnutChart-<?= $col['id_project']; ?>" style="max-height: 150px;"></canvas>
                  <div id="chartData-<?= $col['id_project']; ?>" class="text-center mt-2">
                    <div>
                      <strong class="text-center mt-2">Selesai:</strong>
                      <span id="completed-<?= $col['id_project']; ?>"></span>
                      <strong>Belum Selesai:</strong>
                      <span id="notCompleted-<?= $col['id_project']; ?>"></span>
                    </div>
                  </div>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      const ctx = document.querySelector('#doughnutChart-<?= $col['id_project']; ?>').getContext('2d');
                      const completed = <?= $col['doughnutChartData']['datasets'][0]['data'][0]; ?>;
                      const notCompleted = <?= $col['doughnutChartData']['datasets'][0]['data'][1]; ?>;
                      document.getElementById('completed-<?= $col['id_project']; ?>').textContent = completed;
                      document.getElementById('notCompleted-<?= $col['id_project']; ?>').textContent = notCompleted;
                      const data = {
                        labels: ['Selesai', 'Belum Selesai'],
                        datasets: [{
                          data: [completed, notCompleted],
                          backgroundColor: ['#28a745', '#dc3545'],
                          hoverBackgroundColor: ['#218838', '#c82333']
                        }]
                      };
                      const doughnutChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: data,
                        options: {
                          responsive: true,
                          maintainAspectRatio: false,
                          plugins: {
                            legend: { position: 'top' },
                            tooltip: {
                              callbacks: {
                                label: function(tooltipItem) {
                                  return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                              }
                            }
                          },
                          cutout: '50%'
                        },
                        plugins: [{
                          id: 'textCenter',
                          beforeDraw: function(chart) {
                            var width = chart.width, height = chart.height, ctx = chart.ctx;
                            ctx.restore();
                            var fontSize = (height / 100).toFixed(2);
                            ctx.font = fontSize + "em sans-serif";
                            ctx.textBaseline = "middle";
                            var text = completed, textX = Math.round((width - ctx.measureText(text).width) / 2), textY = height / 2 + 17;
                            ctx.fillText(text, textX, textY);
                            ctx.save();
                          }
                        }]
                      });
                    });
                  </script>
                </div>
                <div class="col-3 d-flex align-items-center justify-content-end">
                  <a class="btn btn-primary" href="<?= base_url('detail_project/' . $col['id_project']); ?>">
                    <i class="bi bi-person-fill-x"></i>
                    <span>Detail</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <!-- End list of Projects -->
      </div>
    </div>
  </div>
</div>

<!-- Modal Admin -->
<div class="modal fade" id="projectAdminModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="projectModalLabel">Project List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- List of Projects -->
        <?php foreach ($project as $col): ?>
          <div class="card info-card customers-card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-8">
                  <h5 class="card-title"><?= $col['nama_project']; ?></h5>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-end">
                  <a class="btn btn-primary" href="<?= base_url('detail_project/' . $col['id_project']); ?>">
                    <i class="bi bi-person-fill-x"></i>
                    <span>Detail</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <!-- End list of Projects -->
      </div>
    </div>
  </div>
</div>

<!-- Modal member card -->
<div class="modal fade" id="MemberModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="projectModalLabel">Member List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- List of Projects -->
        <?php foreach ($datamembers as $col): ?>
          <div class="card info-card customers-card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-8">
                  <h5 class="card-title"><?= $col['username']; ?></h5>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-end">
                  <a class="btn btn-primary" href="<?= base_url('user/view_user/' . $col['id']); ?>">
                    <i class="bi bi-person-fill-x"></i>
                    <span>Detail</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <!-- End list of Projects -->
      </div>
    </div>
  </div>
</div>

<!-- Modal projectmanager card -->
<div class="modal fade" id="pmModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="projectModalLabel">Project Manager List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- List of Projects -->
        <?php foreach ($datapm as $col): ?>
          <div class="card info-card customers-card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-8">
                  <h5 class="card-title"><?= $col['username']; ?></h5>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-end">
                  <a class="btn btn-primary" href="<?= base_url('user/view_user/' . $col['id']); ?>">
                    <i class="bi bi-person-fill-x"></i>
                    <span>Detail</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <!-- End list of Projects -->
      </div>
    </div>
  </div>
</div>

<!-- Modal modul card -->
<div class="modal fade" id="ModulModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="projectModalLabel">Modul List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- List of Projects -->
        <?php foreach ($almodul as $col): ?>
          <div class="card info-card customers-card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-8">
                  <h5 class="card-title"><?= $col['nama_modul']; ?></h5>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-end">
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
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <!-- End list of Projects -->
      </div>
    </div>
  </div>
</div>


<script>
  document.addEventListener("DOMContentLoaded", () => {
    console.log('DOM fully loaded and parsed');

    // Event listener untuk kartu proyek
    const projectCard = document.getElementById("projectCard");
    if (projectCard) {
      projectCard.addEventListener("click", () => {
        console.log('Project Card clicked');
        var projectModal = new bootstrap.Modal(document.getElementById('projectModal'));
        projectModal.show();
      });
    }

    // Event listener untuk kartu tugas
    const taskCard = document.getElementById("taskCard");
    if (taskCard) {
      taskCard.addEventListener("click", () => {
        console.log('Task Card clicked');
        window.location.href = "<?= base_url('tugas'); ?>"; // Ganti URL ini dengan URL tugas Anda
      });
    }

    const reqCard = document.getElementById("reqCard");
    if (reqCard) {
      reqCard.addEventListener("click", () => {
        console.log('Req Card clicked');
        window.location.href = "<?= base_url('request'); ?>"; // Ganti URL ini dengan URL tugas Anda
      });
    }

    // Event listener untuk kartu proyek admin
    const adminProjectCard = document.getElementById('adminProjectCard');
    if (adminProjectCard) {
      adminProjectCard.addEventListener('click', () => {
        console.log('Admin Project Card clicked');
        const projectModal = new bootstrap.Modal(document.getElementById('projectAdminModal'));
        projectModal.show();
      });
    }

    //members
    const MemberCard = document.getElementById('MemberCard');
    if (MemberCard) {
      MemberCard.addEventListener('click', () => {
        console.log('Member Card clicked');
        const MemberModal = new bootstrap.Modal(document.getElementById('MemberModal'));
        MemberModal.show();
      });
    }

    //pm
    const pmCard = document.getElementById('pmCard');
    if (pmCard) {
      pmCard.addEventListener('click', () => {
        console.log('Member Card clicked');
        const pmModal = new bootstrap.Modal(document.getElementById('pmModal'));
        pmModal.show();
      });
    }

    const ModulCard = document.getElementById('ModulCard');
    if (ModulCard) {
      ModulCard.addEventListener('click', () => {
        console.log('Member Card clicked');
        const ModulModal = new bootstrap.Modal(document.getElementById('ModulModal'));
        ModulModal.show();
      });
    }
  });
</script>
