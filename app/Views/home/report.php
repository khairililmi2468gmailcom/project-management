<main id="main" class="main">
  <div class="pagetitle">
    <h1>Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
        <li class="breadcrumb-item active">Report</li>
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
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Project Manager</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-bounding-box"></i>
                    </div>
                    <div class="ps-3">
                    <h6><?= count($projectManagers) ?></h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Members</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                    <h6><?= count($members) ?></h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Customers Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">
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
            </div><!-- End Revenue Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">
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
            </div><!-- End Revenue Card -->

            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Additional Users</h5>

                  <!-- Column Chart -->
                  <div id="columnChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      const memberCounts = <?= json_encode($memberCounts) ?>;
                      const projectManagerCounts = <?= json_encode($projectManagerCounts) ?>;

                      new ApexCharts(document.querySelector("#columnChart"), {
                        series: [{
                          name: 'Members',
                          data: memberCounts
                        }, {
                          name: 'Project Managers',
                          data: projectManagerCounts
                        }],
                        chart: {
                          type: 'bar',
                          height: 350
                        },
                        plotOptions: {
                          bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                          },
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          show: true,
                          width: 2,
                          colors: ['transparent']
                        },
                        xaxis: {
                          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        },
                        yaxis: {
                          title: {
                            text: 'Users'
                          }
                        },
                        fill: {
                          opacity: 1
                        },
                        tooltip: {
                          y: {
                            formatter: function(val) {
                              return val + " users"
                            }
                          }
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Column Chart -->
                </div>
              </div>
            </div>

            <div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Top 5 Project Managers by Projects</h5>

            <!-- Bar Chart -->
            <div id="projectManagerBarChart"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const projectManagerData = <?= json_encode($projectManagerData); ?>;

                    const categories = projectManagerData.map(pm => pm.username);
                    const data = projectManagerData.map(pm => pm.project_count);

                    new ApexCharts(document.querySelector("#projectManagerBarChart"), {
                        series: [{
                            data: data
                        }],
                        chart: {
                            type: 'bar',
                            height: 350
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: true,
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        xaxis: {
                            categories: categories,
                        }
                    }).render();
                });
            </script>
            <!-- End Bar Chart -->

        </div>
    </div>
</div>

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Account Type Distribution</h5>

            <!-- Pie Chart -->
            <div id="pieChart"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const admins = <?= json_encode(count($admins)); ?>;
                    const projectManagers = <?= json_encode(count($projectManagers)); ?>;
                    const members = <?= json_encode(count($members)); ?>;

                    console.log('Admins:', admins);
                    console.log('Project Managers:', projectManagers);
                    console.log('Members:', members);

                    new ApexCharts(document.querySelector("#pieChart"), {
                        series: [admins, projectManagers, members],
                        chart: {
                            height: 350,
                            type: 'pie',
                            toolbar: {
                                show: true
                            }
                        },
                        labels: ['Admin', 'Project Manager', 'Member'],
                        colors: ['#008FFB', '#00E396', '#FEB019']
                    }).render();
                });
            </script>
            <!-- End Pie Chart -->

        </div>
    </div>
</div>

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Top 5 Members by Modules</h5>

            <!-- Bar Chart -->
            <div id="memberBarChart"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const memberData = <?= json_encode($memberData); ?>;

                    // Extract usernames and module counts
                    const categories = memberData.map(member => member.username);
                    const data = memberData.map(member => member.modul_count);

                    new ApexCharts(document.querySelector("#memberBarChart"), {
                        series: [{
                            data: data
                        }],
                        chart: {
                            type: 'bar',
                            height: 350
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: true,
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        xaxis: {
                            categories: categories,
                        }
                    }).render();
                });
            </script>
            <!-- End Bar Chart -->

        </div>
    </div>
</div>


          <?php endif; ?>
          <?php if (in_groups('project_manager')) : ?>
          <div class="col-sm-12 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Project</h5>
                    <div style="max-height: 300px; overflow-y: auto;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Project Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($projects as $project) : ?>
                                    <?php if ($project['status_project'] == 'pending' || $project['status_project'] == 'submission' || $project['status_project'] == 'rejected') : ?>
                                        <tr onclick="location.href='<?= base_url('report/chart/' . $project['id_project']) ?>'">
                                            <td><?= esc($project['nama_project']) ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        
        </div>
        <?php endif; ?>

        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
