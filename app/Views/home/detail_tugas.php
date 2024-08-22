detail_tugas.php

<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Detail Tugas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('tugas') ?>">Task</a></li>
                <li class="breadcrumb-item active">Detail Tugas</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body pt-3">
            <ul class="nav nav-tabs nav-tabs-bordered"></ul>
            <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <?php if ($modul) : ?>
                        <h5 class="card-title"><?= esc($modul['nama_modul']) ?></h5>    
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Nama Project</th>
                                    <td><?= esc($modul['nama_project']) ?></td>
                                </tr>
                                <tr>
                                    <th>Project Manager</th>
                                    <td><?= esc($modul['username']) ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Mulai</th>
                                    <td><?= esc($modul['tanggal_mulai']) ?></td>
                                </tr>
                                <tr>
                                    <th>Deadline</th>
                                    <td><?= esc($modul['deadline']) ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Selesai</th>
                                    <td><?= esc($modul['tanggal_selesai']) ?></td>
                                </tr>
                                <tr>
                                    <th>Bobot</th>
                                    <td><?= esc($modul['bobot']) ?></td>
                                </tr>
                                <tr>
                                    <th>Prioritas</th>
                                    <td><?= esc($modul['prioritas']) ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php
                                        switch ($modul['id_status']) {
                                            case 1:
                                                echo 'Pending';
                                                break;
                                            case 2:
                                                echo 'On Progress';
                                                break;
                                            case 3:
                                                echo 'Done';
                                                break;
                                            default:
                                                echo 'Unknown Status';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p class="text-danger">Data modul tidak ditemukan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>


<?= $this->endSection('content') ?>