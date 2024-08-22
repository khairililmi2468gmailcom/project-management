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
                        <h5 class="card-title">Projects of Manager ID <?= $id ?></h5>
                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Modul Name</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Finish Date</th>
                                    <th scope="col">Deadline</th>
                                    <th scope="col">Priorirty</th>
                                    <th scope="col">Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($modul as $m) : ?>
                                    <tr>
                                        <td scope="row"><?= $i; ?></td>
                                        <td><?= $m['nama_project']; ?></td>
                                        <td><?= $m['nama_modul']; ?></td>
                                        <td><?= $m['tanggal_mulai']; ?></td>
                                        <td><?= $m['tanggal_selesai']; ?></td>
                                        <td><?= $m['deadline']; ?></td>
                                        <td><?= $m['prioritas']; ?></td>
                                        <td><?= $m['bobot']; ?></td>
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