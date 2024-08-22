<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>
<main id="main" class="main">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
  <div class="pagetitle text-center">
    <h1>USER</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">User</a></li>
        <li class="breadcrumb-item active">Edit User</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <form action="<?= base_url('user/update/' . $users['id']) ?>" method="post">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $users['id']; ?>">
    <section class="section">
      <div class="row mt-3">
        <div class="col">
          <section class="section profile">
            <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                  <img src="<?=base_url('assets/foto/' . $users['foto'])?>" alt="Profile" class="rounded-circle img-fluid profile-image" id="profileImagePreview">
                    <h2><?= $users['username'] ?></h2>
                    <h3><?= $users['email'] ?></h3>
                    <div class="social-links mt-2">
                      <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-8">
                <div class="card">
                  <div class="card-body">
                    <div class="row g-3">
                      <div class="col-12 mt-4">
                        <label for="username" class="form-label">Name</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $users['username'] ?>">
                      </div>
                      <div class="col-12">
                        <label for="telp" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="telp" name="telp" value="<?= $users['telp'] ?>">
                      </div>
                      <div class="col-12">
                        <label for="alamat" class="form-label">Address</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $users['alamat'] ?>">
                      </div>
                      <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $users['email'] ?>">
                      </div>
                      <div class="col-12">
                        <label for="jenis_kelamin" class="form-label">Gender</label>
                        <div class="form-floating mb-3">
                          <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option selected hidden value="<?= $users['jenis_kelamin'] ?>"><?= $users['jenis_kelamin'] ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-6 d-flex justify-content-md-start">
                          <button type="submit" class="btn btn-primary mt-3 ml-3">Save</button>
                        </div>
                        <div class="col-md-6 d-flex justify-content-md-end">
                          <a type="reset" class="btn btn-danger mt-3" href="<?= base_url('user') ?>">Close</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </form>
</main>
<?= $this->endSection() ?>