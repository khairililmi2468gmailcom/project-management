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

</aside><!-- End Sidebar-->