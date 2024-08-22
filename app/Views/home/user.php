<main id="main" class="main">
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row mt-3">
            <div class="col">
                
                    <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Admin</h5>
                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">no</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Telpon</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($admin as $row) : ?>
                                    <tr>
                                        <td scope="row"><?= $i; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['jenis_kelamin']; ?></td>
                                        <td><?php echo $row['telp']; ?></td>
                                        <td><?php echo $row['alamat']; ?></td>
                                        <td>
    <a href="<?= base_url('view_user') . '/' . $row['id'] ?>" class="btn btn-primary btn-equal-width">View</a>
    
    <a class="btn btn-success btn-equal-width mt-1" href="<?= base_url('user/edit_user/' . $row['id']) . '' ?>">Edit</a>
    <button type="button" class="btn btn-danger mt-1 btn-equal-width" data-bs-toggle="modal" data-bs-target="#deleteModal" data-username="<?= $row['username']; ?>" data-url="<?= base_url('user/' . $row['id']); ?>">DELETE</button>
</td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Project Manager</h5>
                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">no</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Telpon</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($projectManagers as $row) : ?>
                                    <tr>
                                        <td scope="row"><?= $i; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['jenis_kelamin']; ?></td>
                                        <td><?php echo $row['telp']; ?></td>
                                        <td><?php echo $row['alamat']; ?></td>
                                        <td>
                                            <a href="<?= base_url('view_user') . '/' . $row['id'] ?>" class="btn btn-primary btn-equal-width">View</a>
                                            <a href="<?= base_url('user/view_projects') . '/' . $row['id'] ?>" class="btn btn-info btn-equal-width ">Projects</a>
                                            <button type="button" class="btn btn-danger mt-1 btn-equal-width" data-bs-toggle="modal" data-bs-target="#deleteModal" data-username="<?= $row['username']; ?>" data-url="<?= base_url('user/' . $row['id']); ?>">DELETE</button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Members</h5>
                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">no</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Telpon</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($members as $row) : ?>
                                    <tr>
                                        <td scope="row"><?= $i; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['jenis_kelamin']; ?></td>
                                        <td><?php echo $row['telp']; ?></td>
                                        <td><?php echo $row['alamat']; ?></td>
                                        <td>
                                            <a href="<?= base_url('view_user') . '/' . $row['id'] ?>" class="btn btn-primary btn-equal-width">View</a>
                                            <a href="<?= base_url('user/view_modul') . '/' . $row['id'] ?>" class="btn btn-info btn-equal-width ">Modul</a>
                                            <a class="btn btn-success btn-equal-width mt-1" href="<?= base_url('user/edit_user/' . $row['id']) . '' ?>">Edit</a>
                                            <button type="button" class="btn btn-danger mt-1 btn-equal-width" data-bs-toggle="modal" data-bs-target="#deleteModal" data-username="<?= $row['username']; ?>" data-url="<?= base_url('user/' . $row['id']); ?>">DELETE</button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->
                    </div>
                </div>

                 <!-- Modal HTML -->
                 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Deleted Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are You Sure To Delete <span id="modal-username"></span>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form id="deleteForm" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End Modal HTML -->

            </div>
        </div>
    </section>
</main>

<script>
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var username = button.getAttribute('data-username');
        var url = button.getAttribute('data-url');
        var modalUsername = deleteModal.querySelector('#modal-username');
        var deleteForm = deleteModal.querySelector('#deleteForm');

        modalUsername.textContent = username;
        deleteForm.action = url;
    });
</script>
