<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $nilai; ?></title>
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

    .green-circle {
      background-image: linear-gradient(to top, #008000 0%, #00FF00 100%);
      /* Green to light green gradient */
      border-radius: 50%;
      /* Creates a circular shape */
      width: 75px;
      /* Width of the circle */
      height: 75px;
      /* Height of the circle */
      position: absolute;
      /* Positions the circle relative to its container */
      top: 50%;
      /* Positions the circle vertically at 50% from its container's top */
      left: 50%;
      /* Positions the circle horizontally at 50% from its container's left */
      transform: translate(-50%, -50%);
      /* Adjusts the circle's position to center it within its container */
      display: flex;
      /* Enables flexbox for text centering */
      justify-content: center;
      /* Horizontally centers the text content */
      align-items: center;
      /* Vertically centers the text content */
      opacity: 0.9;
      /* Reduced opacity */
    }

    .green-circle h6 {
      margin: 0;
      /* Removes default margin from the text element */
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