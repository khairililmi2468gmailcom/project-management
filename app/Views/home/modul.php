<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>


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

    <style>
        .rainbow-text {
            animation: rainbow 15s infinite;
        }

        @keyframes rainbow {
            0% { color: black; }
            12.5% { color: rgb(255, 165, 0); }
            25% { color: rgb(255, 255, 0); }
            37.5% { color: rgb(0, 128, 0); }
            50% { color: rgb(0, 0, 255); }
            62.5% { color: rgb(75, 0, 130); }
            75% { color: rgb(128, 0, 128); }
            87.5% { color: rgb(255, 20, 147); }
            100% { color: rgb(105, 105, 105); }
        }
    </style>
</head>

<body>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Module</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('project') ?>">Project</a></li>
                    <li class="breadcrumb-item active">Module</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="card">
            <div class="card-body">

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($modul)): ?>
                    <span>Project Name </span><h2 class="card-title mb-5">(<?= esc($modul[0]['nama_project']) ?>)</h2>
                <?php else: ?>
                    <h5 class="card-title">No modules found for this project</h5>
                <?php endif; ?>

                <!-- Form add Modul -->
                <form id="modulForm" action="<?= base_url('proses_add_modul') ?>" method="post" enctype="multipart/form-data" class="row g-3">
                    <input type="hidden" name="id_project" value="<?= $id_project ?>">
                    <input type="hidden" name="id_status" value="1">

                    <div class="col-md-6">
                        <label for="inputName4" class="form-label">Module Name</label>
                        <input type="text" class="form-control" name="nama_modul" placeholder="Module Name">
                    </div>

                    <div class="col-md-6">
                        <label for="inputStartDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" name="tanggal_mulai" id="startDate">
                    </div>

                    <div class="col-md-6 mt-1">
                        <label for="inputDeadline" class="form-label">Deadline</label>
                        <input type="date" class="form-control" name="deadline" id="deadline">
                    </div>

                    <div class="col-md-6 mt-1">
                        <label for="prioritas" class="form-label">Priority</label>
                        <select class="form-control" id="prioritas" name="prioritas">
                            <option selected hidden value="">Choose Priority</option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>

                    <div class="col-md-6 mt-1">
                        <label for="inputBobot" class="form-label">Bobot Nilai</label>
                        <input type="text" class="form-control" name="bobot" placeholder="Bobot">
                    </div>

                    <div class="col-md-6 mt-1">
                        <label for="inputOfficer" class="form-label">Officer</label>
                        <select class="form-control" name="id">
                            <option selected hidden value="">Choose User</option>
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">No users available</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="col-md-6 mt-1">
                        <label for="inputFile4" class="form-label">Upload File</label>
                        <input type="file" class="form-control" id="inputFile4" name="upload" accept=".pdf" max="10485760">
                    </div>

                    <div class="col-md-6 mt-3">
                        <div id="error-message" class="text-danger mb-2" style="display: none;"></div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </form><!-- End form add modul -->
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <marquee behavior="alternate">
                    <h1 class="card-title rainbow-text">__________List Module__________</h1>
                </marquee>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Module Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Start</th>
                            <th scope="col">Finish Date</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">File</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($modul)): ?>
                            <?php foreach ($modul as $m): ?>
                                <tr>
                                    <td><?= esc($m['nama_modul']) ?></td>
                                    <td><?= esc($m['username']) ?></td>
                                    <td><?= esc($m['tanggal_mulai']) ?></td>
                                    <td><?= esc($m['tanggal_selesai']) ?></td>
                                    <td><?= esc($m['deadline']) ?></td>
                                    <td><?= esc($m['bobot']) ?></td>
                                    <td>
                                        <?php if (!empty($m['upload'])): ?>
                                            <a href="<?= base_url('modul/view_pdf/' . $m['upload']) ?>">View PDF</a>
                                        <?php else: ?>
                                            File not available
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <form action="<?= base_url('modul/delete/' . $m['id_modul']) ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">No modules available</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <a href="<?= base_url('modul/generatePDF') ?>" class="btn btn-primary">Download File</a>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('modulForm').addEventListener('submit', function(event) {
            var startDate = document.getElementById('startDate').value;
            var deadline = document.getElementById('deadline').value;
            var errorMessage = document.getElementById('error-message');

            if (new Date(deadline) < new Date(startDate)) {
                event.preventDefault();
                errorMessage.style.display = 'block';
                errorMessage.textContent = 'Deadline cannot be earlier than Start Date.';
            } else {
                errorMessage.style.display = 'none';
            }
        });
    </script>
</body>

</html>



<?= $this->endSection() ?>