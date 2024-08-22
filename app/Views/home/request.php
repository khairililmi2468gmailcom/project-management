
<br> <!-- Tambahan jarak satu baris di atas -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Halaman Request</h1>
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
            <?php if (isset($requests) && is_array($requests)) : ?>
                <ul class="list-group">
                    <?php foreach ($requests as $request) : ?>
                        <li class="list-group-item mb-2 mt-3"> <!-- Menambahkan margin bottom -->
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="mb-1">Permintaan dari <?= $request['username']; ?> untuk menjadi Project Manager</h5>
                                    <p class="mb-1">Status: <?= $request['status']; ?></p>
                                    <small>Waktu Permintaan: <?= date('d-m-Y H:i:s', strtotime($request['created_at'])); ?></small><br>
                                    <?php
                                    $createdTime = strtotime($request['created_at']);
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
                                    <small>Waktu yang telah berlalu: <?= $timeElapsedString; ?></small>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-end"> <!-- Menambahkan alignment -->
                                    <?php if ($request['status'] == 'pending') : ?>
                                        <a href="<?= base_url('request/approveRequest/' . $request['id']); ?>" class="btn btn-primary btn-sm me-2">Terima</a>
                                        <a href="<?= base_url('request/rejectRequest/' . $request['id']); ?>" class="btn btn-danger btn-sm">Tolak</a>
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
