<?php

use App\Controllers\Home;
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Users</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  <section class="section profile">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="<?=base_url('assets/foto/' . user()->foto)?>" alt="Profile" class="rounded-circle" id="profileImagePreview">
            <h2><?= user()->username; ?></h2>
            <h3><?php
                if (in_groups('member')) {
                  print("Member");
                } elseif (in_groups('project_manager')) {
                  print("Project Manager");
                } else {
                  print("Admin");
                }
                ?></h3>

                <!-- Posisikan tombol di tengah dan rapikan -->
            <div class="d-flex flex-column align-items-center mt-3">
              <?php if (in_groups('member')) : ?>
                <form action="<?= base_url('profile'); ?>" method="post">
                  <input type="hidden" name="user_id" value="<?= htmlspecialchars(user()->id, ENT_QUOTES, 'UTF-8'); ?>" />
                  <button type="submit" class="btn btn-secondary">Request to become Project Leader</button>
                </form>
              <?php endif; ?>

              <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-info mt-3">
                  <?= session()->getFlashdata('message'); ?>
                </div>
              <?php endif; ?>
            </div>

            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?= user()->username; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Position</div>
                  <div class="col-lg-9 col-md-8"><?php
                                                  if (in_groups('member')) {
                                                    print("Member");
                                                  } elseif (in_groups('project_manager')) {
                                                    print("Project Manager");
                                                  } else {
                                                    print("Admin");
                                                  }
                                                  ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Addres</div>
                  <div class="col-lg-9 col-md-8"><?= user()->alamat; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Gender</div>
                  <div class="col-lg-9 col-md-8"><?= user()->jenis_kelamin; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8"><?= user()->telp; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?= user()->email; ?></div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form action="<?=base_url('user/update_profil/' . user()->id)?>" method="post" enctype="multipart/form-data">
                                    <?=csrf_field();?>
                                    <input type="hidden" name="id" value="<?=user()->id;?>">
                                    <div class="row g-3">
                                        <div class="col-12 mt-4">
                                            <label for="username" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="username" name="username" value="<?=user()->username?>">
                                        </div>
                                        <div class="col-12">
                                            <label for="telp" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="telp" name="telp" value="<?=user()->telp?>">
                                        </div>
                                        <div class="col-12">
                                            <label for="alamat" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?=user()->alamat?>">
                                        </div>
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?=user()->email?>">
                                        </div>
                                        <div class="col-12">
                                            <label for="jenis_kelamin" class="form-label">Gender</label>
                                            <div class="form-floating mb-3">
                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                                    <option selected hidden value="<?=user()->jenis_kelamin?>"><?=user()->jenis_kelamin?></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="foto" class="form-label">Upload Foto</label>
                                            <input type="file" class="form-control" id="foto" name="foto">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 d-flex justify-content-md-start">
                                                <button type="submit" class="btn btn-primary mt-3 ml-3">Save</button>
                                            </div>
                                            <div class="col-md-6 d-flex justify-content-md-end">
                                                <a type="reset" class="btn btn-danger mt-3" href="<?=base_url('user')?>">Close</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- End Profile Edit Form -->
                            </div>


              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form>

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->