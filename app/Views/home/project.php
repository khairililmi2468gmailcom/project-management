<main id="main" class="main">

  <div class="pagetitle">
    <h1>Project</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
        <li class="breadcrumb-item active">Project</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row mt-3">
      <div class="col">

        <div class="card">
          <div class="card-body">
            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Add Project
            </button> <!-- Table with hoverable rows -->

            <div class="row">
              <?php foreach ($tampildata as $col) : ?>
                <div class="col-md-4 mt-3">
                  <!-- <div class="row mt-3">
                <div class="col"> -->
                  <div class="card rounded-2" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $col['nama_project']; ?></h5>
                      <p class="card-text"><?php echo $col['deskripsi_project']; ?></p>
                      <a class="btn btn-primary" href="<?= base_url('modul/' . $col['id_project']) ?>">Modul</a>
                      <a class="btn btn-info" href="<?= base_url('detail_project/' . $col['id_project']) ?>">Detail</a>
                      <form action="<?= base_url('project/delete/' . $col['id_project']); ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- </div>
              </div> -->
              <?php endforeach; ?>
            </div>
            <!-- End Table with hoverable rows -->
          </div>

  </section>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Project</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form starts here -->
        <form action="<?=base_url('proses_add_project')?>" method="POST" enctype="multipart/form-data" class="row g-3">
          <div class="col-md-6">
            <input type="text" class="form-control" name="nama_project" placeholder="Project Name" required>
          </div>
          <input type="hidden" name="id" value="<?=user()->id;?>">
          <div class="col-md-12">
            <textarea class="form-control" name="deskripsi_project" placeholder="Deskripsi Project" required></textarea>
          </div>
          <div class="col-md-6 mt-1">
            <label for="inputFile4" class="form-label">Upload File</label>
            <input type="file" class="form-control" id="inputFile4" name="upload" accept=".pdf">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <!-- Note: Changed anchor tag to button for form submission -->
      </div>
      </form> <!-- Form ends here -->
    </div>
  </div>
</div>