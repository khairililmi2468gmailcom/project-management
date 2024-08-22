<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/assets/img/logo.jpeg" rel="icon">
    <link href="assets/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <style>
        /* Mengatur lebar tombol untuk panjang yang sama */
        .btn-equal-width {
            width: 120px;
            /* Atur lebar sesuai keinginan */
        }

        .rainbow-text {
            animation: rainbow 15s infinite;
        }

        @keyframes rainbow {
            0% { color: black; }
            12.5% { color: rgb(255, 165, 0); }
            25% { color: rgb(255, 255, 0); }
            37.5% { color: rgb(0, 128, 0); }
            50% { color: rgb(0, 0, 255); }
            62.5% { color: rgb(75, 0, 130); }
            75% { color: rgb(128, 0, 128); }
            87.5% { color: rgb(255, 20, 147); }
            100% { color: rgb(105, 105, 105); }
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= base_url('home') ?>" class="logo d-flex align-items-center">
                <img src="assets/assets/img/logo.jpeg" alt="" height="70" width="28">
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
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="<?=base_url('assets/foto/' . user()->foto)?>" alt="Profile" class="rounded-circle" id="profileImagePreview">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= user()->username; ?></span>
                    </a><!-- End Profile Iamge Icon -->

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

            <?php if (in_groups('member')) : ?>
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

    </aside><!-- End Sidebar-->
    <?= $this->renderSection('content'); ?>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>TIM PKL PIM</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="http://pnl.ac.id/id">PNL</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/assets/vendor/quill/quill.min.js"></script>
    <script src="assets/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/assets/js/main.js"></script>


</body>

</html>