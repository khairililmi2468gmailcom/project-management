
<br> <!-- Tambahan jarak satu baris di atas -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Progres</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('request') ?>">Request</a></li>
            </ol>
        </nav>
        <?php if (session()->getFlashdata('message')) : ?>
            <p><?= session()->getFlashdata('message'); ?></p>
        <?php endif; ?>
    </div><!-- End Page Title -->

    <div class="card mt-4"> <!-- Menambahkan margin top -->
        <div class="card-body">
            <?php if (isset($progres) && is_array($progres)) : ?>
                <ul class="list-group">
                    <?php foreach ($progres as $col) : ?>
                        <li class="list-group-item mt-3"> <!-- Menambahkan margin bottom -->
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="mb-1">Progres dari <b>( <?= $col['nama_modul']; ?> )</b> untuk seger di tinjau</h5>
                                    <p class="mb-1">file peninjauan  <a href="<?= base_url('progres/view_pdf/' . $col['bukti']) ?>">View PDF</a></p>
                                    <small>Waktu Pengiriman: <?= date('d-m-Y H:i:s', strtotime($col['tanggal_pengajuan'])); ?></small><br>
                                    <?php
                                    $createdTime = strtotime($col['tanggal_pengajuan']);
                                    $currentTime = time();
                                    $timeElapsed = $currentTime - $createdTime;

                                    if ($timeElapsed < 60) {
                                        $timeElapsedString = $timeElapsed . ' detik yang lalu';
                                    } elseif ($timeElapsed < 3600) {
                                        $timeElapsedString = floor($timeElapsed / 60) . ' menit yang lalu';
                                    } elseif ($timeElapsed < 86400) {
                                        $timeElapsedString = floor($timeElapsed / 3600) . ' jam yang lalu';
                                    } else {
                                        $timeElapsedString = floor($timeElapsed / 86400) . ' hari yang lalu';
                                    }
                                    ?>
                                    <small>Waktu yang telah berlalu: <?= $timeElapsedString; ?></small></br>
          <span class="text">Status:</span>
          <?php
            if ($col['id_status'] == 1) {
            echo '<span class="badge bg-secondary">Pending</span>';
            } elseif ($col['id_status'] == 2) {
              echo '<span class="badge bg-warning">Submission</span>';
            } elseif ($col['id_status'] == 3) {
              echo '<span class="badge bg-danger">Rejected</span>';
            } elseif ($col['id_status'] == 4) {
              echo '<span class="badge bg-success">Approved</span>';
            } else {
              echo '<span class="badge bg-muted">Unknown Status</span>';
            }
          ?>
        </div>
                             <div class="col-md-4 d-flex align-items-center justify-content-end"> <!-- Menambahkan alignment -->
                                    <?php if ($col['id_status'] == '2') : ?>
                                        <a href="<?= base_url('request/approveRequest/' . $col['id_modul']); ?>" class="btn btn-primary btn-sm me-2">Terima</a>
                                        <a href="<?= base_url('request/rejectRequest/' . $col['id_modul']); ?>" class="btn btn-danger btn-sm">Tolak</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>Tidak ada permintaan.</p>
            <?php endif; ?>
        </div>
    </div>
</main><!-- End #main -->
