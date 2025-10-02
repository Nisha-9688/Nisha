<?php
include_once("header.php");
?>
<style>
  .table td,
  .table th {
    vertical-align: middle;
  }
</style>

<div class="body-wrapper-inner">
  <div class="container-fluid">
    <div class="container mt-5">
      <div class="card shadow-sm">
        <div class="card-header bg-primary d-flex justify-content-between align-items-center mb-4">
          <h5 class="mb-0 text-white">Class List</h5>
          <a href="add_class.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Class
          </a>
        </div>

        <!-- Table Card -->
        <div class="card shadow">
          <div class="card-body">
            <!-- Search Filters -->
            <div class="row g-2 mb-3">
              <div class="col-md-3">
                <input type="text" id="searchID" class="form-control" placeholder="Search by ID">
              </div>
              <div class="col-md-3">
                <input type="text" id="searchClass" class="form-control" placeholder="Search by Class">
              </div>
              <div class="col-md-3">
                <input type="text" id="searchSection" class="form-control" placeholder="Search by Section">
              </div>
              <div class="col-md-3">
                <input type="text" id="searchSchooltype" class="form-control" placeholder="Search by Schooltype">
              </div>
            </div>
            <div class="table-responsive">
              <table id="studentTable" class="table table-hover align-middle bg-primary">
                <thead class="table-light">
                  <tr>
                    
                    <th>Id</th>
                    <th>Class Name</th>
                    <th>Section</th>
                    <th>School Type</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                   <?php
                    if(!empty($list2))
                    {
                      foreach($list2 as $li)
                      {
                        $class_id=is_array($li) ? $li['class_id'] : $li->class_id;
                        $class_name=is_array($li) ? $li['class_name'] : $li->class_name;
                        $section=is_array($li) ? $li['section'] : $li->section;
                        $school_type_name=is_array($li) ? $li['school_type_name'] : $li->school_type_name;

                        echo "<tr>";
                        echo "<td>#". str_pad($class_id, 4, '0', STR_PAD_LEFT) . "</td>";
                        echo "<td> $class_name </td>";
                        echo "<td> $section </td>";
                        echo "<td> $school_type_name </td>";

                                        echo "<td class='text-center'>
                                            <a href='edit_class?id=$class_id' class='btn btn-sm btn-primary'><i class='bi bi-pencil-square'></i></a>
                                            <a href='delete_class.php?id=$class_id' class='btn btn-sm btn-danger'><i class='bi bi-trash'></i></a>

                                        </td>";

                                        echo "</tr>";
                      }
                    }
                    else{
                      echo "<tr><td colspan='12' class='text-center text-muted'>No students found</td></tr>";
                    }
                   ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script>
    // Filter logic
    const filterTable = () => {
      const id = document.getElementById("searchID").value.toLowerCase();
      const cls = document.getElementById("searchClass").value.toLowerCase();
      const section = document.getElementById("searchSection").value.toLowerCase();
      const school_type = document.getElementById("searchSchooltype").value.toLowerCase();

      const rows = document.querySelectorAll("#studentTable tbody tr");

      rows.forEach(row => {
        const cells = row.querySelectorAll("td");
        const matchID = cells[0].innerText.toLowerCase().includes(id);
        const matchClass = cells[1].innerText.toLowerCase().includes(cls);
        const matchSection = cells[2].innerText.toLowerCase().includes(section);
        const matchschooltype = cells[3].innerText.toLowerCase().includes(school_type);

        if (matchID && matchClass && matchschooltype && matchSection) {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    };

    // Attach search input events
    document.getElementById("searchID").addEventListener("input", filterTable);
    document.getElementById("searchClass").addEventListener("input", filterTable);
    document.getElementById("searchSection").addEventListener("input", filterTable);
    document.getElementById("searchSchooltype").addEventListener("input", filterTable);
  </script>