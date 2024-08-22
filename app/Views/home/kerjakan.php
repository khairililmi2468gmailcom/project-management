
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<Body><main id="main" class="main">

<div class="card">
<div class="card-body">
<div class="pagetitle">
    <h1>Do It Modul ( <?=esc($modul['nama_modul'])?> )</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item "><a href=<?= base_url('tugas') ?>">Tugas</a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Projek</h5>

        <!-- Floating Labels Form -->
        <form class="row g-3" action="<?= base_url('proses_addprogres') ?>" method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
                <div class="form-floating">
                <label for="floatingName">Modul Name</label>
                    <input type="text" class="form-control" id="floatingName" placeholder="<?=esc($modul['nama_modul'])?>" disabled>
                </div>
            </div>
            <div class="col-md-1 mb-3">
    <label for="viewPDF" class="form-label d-block">Instruction</label>
    <a id="viewPDF" class="btn btn-primary d-block" href="<?= base_url('modul/view_pdf/' . $modul['upload']) ?>">View PDF</a>
</div>
            <div class="col-md-5">
                <div class="form-floating">
                <label for="floatingEmail">Start Date</label>
                    <input type="email" class="form-control" id="floatingEmail" placeholder="<?=esc($modul['tanggal_mulai'])?>" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                <label for="floatingPassword">Deadline</label>
                    <input type="password" class="form-control" id="floatingPassword" placeholder="<?=esc($modul['deadline'])?>" disabled>
                </div>
            </div>
            <input type="hidden" name="id_modul" value="<?=esc($modul['id_modul'])?>">
            <input type="hidden" name="id_status" value="2">
            <?php

                $tanggalPengajuan = new DateTime(); // Membuat objek DateTime baru
                $tanggalPengajuanFormat = $tanggalPengajuan->format('Y-m-d H:i:s'); // Mengubah objek DateTime menjadi format string YYYY-MM-DD HH:II:SS

                echo '<input type="hidden" name="tanggal_pengajuan" value="' . $tanggalPengajuanFormat . '">';

                ?>
            <input type="hidden" name="status" value="submission">
            <div class="col-md-6">
                <label for="foto" class="form-label">Upload Bukti</label>
                <input type="file" class="form-control" id="bukti" name="bukti">
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                <label for="floatingnote">Note</label>
                    <input type="text" class="form-control" id="bukti" name="catatan" placeholder="Note">
                </div>
            </div>


            <!-- <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="State">
                        <option selected>hasn't started yet</option>
                        <option value="1">On Progress</option>
                        <option value="2">Done</option>
                    </select>
                    <label for="floatingSelect">Status</label>
                </div>
            </div> -->
            <div class="col-md-10">
                
            </div>
            <div class="col-md-2">
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </div>
        </form><!-- End floating Labels Form -->

    </div>
</div>
</div>
</div>

</div>
</div>
</section>
</main>
</Body>
</html>
