<!DOCTYPE html>
<html lang="en">

<head>
    <!-- cobacoba -->
    <link href="<?= base_url('assets/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/assets/css/style.css') ?>" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/assets/vendor/chart.js/chart.umd.js') ?>"></script>
    <script src="<?= base_url('assets/assets/vendor/echarts/echarts.min.js') ?>"></script>
    <script src="<?= base_url('assets/assets/vendor/quill/quill.min.js') ?>"></script>
    <script src="<?= base_url('assets/assets/vendor/simple-datatables/simple-datatables.js') ?>"></script>
    <script src="<?= base_url('assets/assets/vendor/tinymce/tinymce.min.js') ?>"></script>
    <script src="<?= base_url('assets/assets/vendor/php-email-form/validate.js') ?>"></script>

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/assets/css/style.css') ?>" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Updated: Mar 17 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->

    <style>
        .btn-equal-width {
            width: 120px;
        }

        canvas {
            width: 100% !important;
            height: auto !important;
        }

        div {
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= base_url('home') ?>" class="logo d-flex align-items-center">
                <img src="<?= base_url('assets/assets/img/logo.jpeg') ?>" alt="PROMAN Logo" height="70" width="28">
                <span class="d-none d-lg-block">PROMAN</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon -->
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    </ul><!-- End Notification Dropdown Items -->
                </li><!-- End Notification Nav -->
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="<?= base_url('assets/assets/img/profile-img.jpg') ?>" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= user()->username; ?></span>
                    </a><!-- End Profile Image Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= user()->username; ?></h6>
                            <span><?= user()->level; ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('logout') ?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->
            </ul>
        </nav><!-- End Icons Navigation -->
    </header><!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <!-- Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('home') ?>">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <!-- End Dashboard Nav -->

    <!-- User Nav -->
    <?php if (in_groups('admin')) : ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('user') ?>">
          <i class="bi bi-people"></i>
          <span>User</span>
        </a>
      </li>
      <!-- End user Nav -->
    <?php endif; ?>


    <?php if (in_groups('admin')) : ?>
      <!-- request Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('request') ?>">
          <i class="bi bi-person-raised-hand"></i>
          <span>Request</span>
        </a>
      </li>
      <!-- End request Nav -->
    <?php endif; ?>

    <?php if (in_groups('member') || in_groups('project_manager')) : ?>
      <!-- Tugas Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('tugas') ?>">
          <i class="bi bi-list-task"></i>
          <span>Task</span>
        </a>
      </li>
      <!-- End Tugas Nav -->
    <?php endif; ?>

    <?php if (in_groups('project_manager')) : ?>
      <!-- project Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('project') ?>">
          <i class="bi bi-motherboard"></i>
          <span>Project</span>
        </a>
      </li>
      <!-- End project Nav -->
    <?php endif; ?>

    <?php if (in_groups('project_manager')) : ?>
      <!-- project Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('progres') ?>">
          <i class="bi bi-motherboard"></i>
          <span>Progres</span>
        </a>
      </li>
      <!-- End project Nav -->
    <?php endif; ?>

    <?php if (in_groups('project_manager') || in_groups('admin')) : ?>
      <!-- Report Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('report') ?>">
          <i class="bi bi-card-list"></i>
          <span>Report</span>
        </a>
      </li>
      <!-- End Report Nav -->
    <?php endif; ?>

    <!-- Profile Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('profile') ?>">
        <i class="bi bi-person-circle"></i>
        <span>Profile</span>
      </a>
    </li>
    <!-- End Profile Nav -->
        </ul>
    </aside><!-- End Sidebar -->
    <?= $this->renderSection('content'); ?>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>TIM PKL PIM</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="http://pnl.ac.id/id">PNL</a>
        </div>
    </footer><!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="<?= base_url('assets/assets/js/main.js') ?>"></script>
</body>

</html>