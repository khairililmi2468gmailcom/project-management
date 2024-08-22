<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add User</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url('user') ?>">User</a></li>
        <li class="breadcrumb-item active">Add User</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <!-- Multi Columns Form -->
  <div class="card-body profile-card pt-4 d-flex flex-column">
    <form class="row g-3" action="<?= base_url('proses_adduser') ?>" method="POST">
      <div class="col-md-12">
        <input type="text" class="form-control" placeholder="email" for="email" id="email" name="email">
      </div>
      <div class="col-md-12">
        <input type="password" class="form-control" placeholder="Password" for="password" id="password" name="password">
      </div>
      <div class="col-md-12">
        <input type="text" class="form-control" placeholder="Username" for="username" id="username" name="username">
      </div>
      <!-- <div class="col-md-6">
        <div class="form-floating mb-3">
          <select class="form-select" aria-label="Default select example" for="level" id="level" name="level" required>
            <option selected hidden value="">Level User</option>
            <option value="1">Admin</option>
            <option value="2">Project Manager</option>
            <option value="3">Member</option>
          </select>
          <label for="floatingInput">Level User</label>
          <div class="invalid-feedback">
            please select level user
          </div>
        </div>

      </div> -->
      <div class="col-md-6">
        <div class="form-floating mb-3">
          <select class="form-select" aria-label="Default select example" for="jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin" required>
            <option selected hidden value="">Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          <label for="floatingInput">Gender</label>
          <div class="invalid-feedback">
            please select your gender
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <input type="text" class="form-control" placeholder="Phone Number" for="telp" id="telp" name="telp">
      </div>
      <div class="col-md-12">
        <input type="text" class="form-control" placeholder="Addres" for="alamat" id="alamat" name="alamat">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">save</button>
      </div>
    </form><!-- End Multi Columns Form -->
  </div>
  </div>
  </section>
</main>