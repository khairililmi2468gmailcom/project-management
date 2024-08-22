<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Projects of Manager</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                <li class="breadcrumb-item active">Projects</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Projects of Manager ID <?= $manager_id ?></h5>
                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Start Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($projects as $project) : ?>
                                    <tr>
                                        <td scope="row"><?= $i; ?></td>
                                        <td><?= $project['nama_project']; ?></td>
                                        <td><?= $project['deskripsi_project']; ?></td>
                                        <td><?= $project['status_project']; ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?= $this->endSection() ?>