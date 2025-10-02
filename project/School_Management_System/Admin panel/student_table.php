<?php
include_once("header.php");
// include_once("db_connect.php");
?>
<style>
    /* Fix body-wrapper-inner so it won't block sidebar clicks */
    .body-wrapper-inner {
        position: relative !important;
        /* removes overlay effect */
        z-index: 0 !important;
        /* keep it behind sidebar */
        background: transparent !important;
        /* no background overlay */
        pointer-events: none;
        /* make it non-clickable */
    }

    .body-wrapper-inner * {
        pointer-events: auto;
        /* re-enable clicks for inner elements */
    }


    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        color: white;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 16px;
    }

    .dropdown-toggle::after {
        display: none;
    }

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
                    <h5 class="mb-0 text-white">Student List</h5>
                    <a href="studentform" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Add New Student
                    </a>
                </div>

                <div class="card-body">

                    <!-- Search Filters -->
                    <div class="row g-2 mb-3">
                        <div class="col-md-3">
                            <input type="text" id="searchID" class="form-control" placeholder="Search by ID">
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="searchName" class="form-control" placeholder="Search by Name">
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="searchClass" class="form-control" placeholder="Search by Class">
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="searchSection" class="form-control" placeholder="Search by Section">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle" id="studentTable">
                            <thead class="table-light">
                                <tr>

                                    <th>ID</th>
                                    <th>Roll no</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>E-mail</th>
                                    <th>Action</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($list)) {
                                    foreach ($list as $li) {
                                        // Handle both array and object access
                                        $student_id = is_array($li) ? $li['student_id'] : $li->student_id;
                                        $roll_no    = is_array($li) ? $li['roll_no']    : $li->roll_no;
                                        $first_name = is_array($li) ? $li['first_name'] : $li->first_name;
                                        $last_name  = is_array($li) ? $li['last_name']  : $li->last_name;
                                        $gender     = is_array($li) ? $li['gender']     : $li->gender;
                                        $class_name = is_array($li) ? $li['class_name'] : $li->class_name;
                                        $section    = is_array($li) ? $li['section']    : $li->section;
                                        $address    = is_array($li) ? $li['address']    : $li->address;
                                        $phone      = is_array($li) ? $li['phone']      : $li->phone;
                                        $email      = is_array($li) ? $li['email']      : $li->email;

                                        // Avatar initials
                                        $initial = strtoupper(substr($first_name, 0, 1) . substr($last_name, 0, 1));

                                        echo "<tr>";
                                        echo "<td>#" . str_pad($student_id, 4, '0', STR_PAD_LEFT) . "</td>";
                                        echo "<td>$roll_no</td>";
                                        echo "<td><div class='avatar bg-success'>$initial</div></td>";
                                        echo "<td>$first_name $last_name</td>";
                                        echo "<td>$gender</td>";
                                        echo "<td>$class_name</td>";
                                        echo "<td>$section</td>";
                                        echo "<td>$address</td>";
                                        echo "<td>$phone</td>";
                                        echo "<td>$email</td>";

                                        echo "<td>
                                        <div class='dropdown'>
                                             <a href='#' class='btn btn-sm btn-light' data-bs-toggle='dropdown' aria-expanded='false'>
                                              <i class='bi bi-three-dots-vertical'></i>
                                             </a>
                                            <ul class='dropdown-menu dropdown-menu-end'>
                                               <li><a class='dropdown-item text-success' href='edit_student?id=$student_id'>Edit</a></li>
                                              <li><a class='dropdown-item text-warning' href='delete?dlt_student?id=$student_id'>Delete</a></li>
                                            </ul>
                                        </div>
                                        </td>";

                                        echo "<td>
                                        <a href='student_detail?id=$student_id' class='btn btn-info btn-sm'>
                                            <i class='bi bi-eye'></i> View
                                        </a>
                                        </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='12' class='text-center text-muted'>No students found</td></tr>";
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>

                    <!-- Pagination Controls -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <label>Show
                                <select id="rowsPerPage" class="form-select d-inline-block w-auto">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                </select> entries
                            </label>
                        </div>
                        <nav>
                            <ul class="pagination mb-0" id="pagination"></ul>
                        </nav>
                    </div>


                    <script>
                        const table = document.getElementById("studentTable").getElementsByTagName("tbody")[0];
                        const rows = table.getElementsByTagName("tr");
                        const pagination = document.getElementById("pagination");
                        const rowsPerPageSelect = document.getElementById("rowsPerPage");

                        let currentPage = 1;
                        let rowsPerPage = parseInt(rowsPerPageSelect.value);

                        function displayTable() {
                            let start = (currentPage - 1) * rowsPerPage;
                            let end = start + rowsPerPage;

                            for (let i = 0; i < rows.length; i++) {
                                rows[i].style.display = (i >= start && i < end) ? "" : "none";
                            }
                            updatePagination();
                        }

                        function updatePagination() {
                            pagination.innerHTML = "";
                            let pageCount = Math.ceil(rows.length / rowsPerPage);

                            for (let i = 1; i <= pageCount; i++) {
                                let li = document.createElement("li");
                                li.className = "page-item " + (i === currentPage ? "active" : "");
                                li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                                li.addEventListener("click", function(e) {
                                    e.preventDefault();
                                    currentPage = i;
                                    displayTable();
                                });
                                pagination.appendChild(li);
                            }
                        }

                        rowsPerPageSelect.addEventListener("change", function() {
                            rowsPerPage = parseInt(this.value);
                            currentPage = 1;
                            displayTable();
                        });

                        displayTable();
                    </script>
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
        const name = document.getElementById("searchName").value.toLowerCase();
        const cls = document.getElementById("searchClass").value.toLowerCase();
        const section = document.getElementById("searchSection").value.toLowerCase();

        const rows = document.querySelectorAll("#studentTable tbody tr");

        rows.forEach(row => {
            const cells = row.querySelectorAll("td");
            const matchID = cells[1].innerText.toLowerCase().includes(id);
            const matchName = cells[3].innerText.toLowerCase().includes(name);
            const matchClass = cells[5].innerText.toLowerCase().includes(cls);
            const matchSection = cells[6].innerText.toLowerCase().includes(section);

            if (matchID && matchName && matchClass && matchSection) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    };

    // Attach search input events
    document.getElementById("searchID").addEventListener("input", filterTable);
    document.getElementById("searchName").addEventListener("input", filterTable);
    document.getElementById("searchClass").addEventListener("input", filterTable);
    document.getElementById("searchSection").addEventListener("input", filterTable);
</script>