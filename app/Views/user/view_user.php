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
        <li class="breadcrumb-item active">View User</li>
      </ol>
    </nav>
  </div>

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
                    <a href="#" class="twitter"><i class="bi bi-twitter fs-4"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook fs-4"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram fs-4"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin fs-1"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-8">
              <div class="card">
                <div class="card-body">
                  <!-- Form with disabled inputs to display user data -->
                  <form class="row g-3">
                    <div class="col-12 mt-4">
                      <label for="inputName" class="form-label">Name</label>
                      <input type="text" class="form-control" id="inputName" value="<?= $users['username'] ?>" disabled>
                    </div>
                    <div class="col-12">
                      <label for="inputPhone" class="form-label">Phone Number</label>
                      <input type="text" class="form-control" id="inputPhone" value="<?= $users['telp'] ?>" disabled>
                    </div>
                    <div class="col-12">
                      <label for="inputAddress" class="form-label">Address</label>
                      <input type="text" class="form-control" id="inputAddress" value="<?= $users['alamat'] ?>" disabled>
                    </div>
                    <div class="col-12">
                      <label for="inputEmail" class="form-label">Email</label>
                      <input type="text" class="form-control" id="inputEmail" value="<?= $users['email'] ?>" disabled>
                    </div>
                    <div class="col-12">
                      <label for="inputGender" class="form-label">Gender</label>
                      <input type="text" class="form-control" id="inputGender" value="<?= $users['jenis_kelamin'] ?>" disabled>
                    </div>
                    <div class="text-center col-12">
                      <a type="reset" class="btn btn-Danger mt-3" href="<?= base_url('user') ?>">Close</a>
                    </div>
                  </form><!-- End Form with disabled inputs -->
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</main>
<?= $this->endSection() ?>