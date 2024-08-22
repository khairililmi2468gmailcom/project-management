<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Project</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('project') ?>">Project</a></li>
        <li class="breadcrumb-item active">Add Project</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col">
        <div class="row">

          <!-- Customers Card -->
          <div class="col-xxl-5 col-xl-12">

            <div class="card">
              <div class="card-body mt-3">
                <!-- No Labels Form -->
                <form class="row g-3">
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Project Name">
                  </div>
                  <div class="col-md-6">
                    <input type="email" class="form-control" placeholder="Start">
                  </div>
                  <div class="col-md-6">
                    <input type="password" class="form-control" placeholder="Deadline">
                  </div>
                  <!-- modul -->
                  <div class="col-md-12">
                    <div class="row border">
                      <h6>Module</h6>
                      <div class="col-md-6">
                        <input type="password" class="form-control" placeholder="Module Name">
                      </div>
                      <div class="col-md-6">
                        <input type="password" class="form-control" placeholder="Member">
                      </div>
                      <div class="text-center">
                        <button type="button" class="btn btn-success" id="addModule">Tambah Modul</button>
                      </div>
                    </div>
                  </div>
                  <!-- end modul -->
                  <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="City">
                  </div>
                  <div class="col-md-4">
                    <select id="inputState" class="form-select">
                      <option selected>Choose...</option>
                      <option>...</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Zip">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
                </form><!-- End No Labels Form -->

              </div>
            </div>


  </section>



</main><!-- End #main -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("addModule").addEventListener("click", function() {
      var modulesContainer = document.querySelector(".modul-container"); // Ganti dengan selector yang sesuai
      var moduleRow = document.createElement("div");
      moduleRow.classList.add("row", "border", "mt-3", "modul-row"); // Ganti dengan kelas yang sesuai

      var moduleNameInput = document.createElement("div");
      moduleNameInput.classList.add("col-md-6");
      moduleNameInput.innerHTML = '<input type="text" class="form-control" placeholder="Module Name">';

      var memberInput = document.createElement("div");
      memberInput.classList.add("col-md-6");
      memberInput.innerHTML = '<input type="text" class="form-control" placeholder="Member">';

      var removeButton = document.createElement("button");
      removeButton.classList.add("btn", "btn-danger", "mt-2", "remove-module");
      removeButton.textContent = "Hapus Modul";

      moduleRow.appendChild(moduleNameInput);
      moduleRow.appendChild(memberInput);
      moduleRow.appendChild(removeButton);

      modulesContainer.appendChild(moduleRow);
    });

    // Tambahkan event listener untuk menghapus modul
    document.addEventListener("click", function(event) {
      if (event.target.classList.contains("remove-module")) {
        var moduleRow = event.target.closest(".modul-row");
        moduleRow.remove();
      }
    });
  });
</script>