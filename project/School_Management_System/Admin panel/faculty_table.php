<?php
include_once("header.php");
?>
<style>
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
                    <h5 class="mb-0 text-white">Teachers List</h5>
                    <a href="facultyform" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Add New Faculty
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
                            <div class="input-group">
                                    <select id="searchGender" class="form-select">
                                        <option value="">All Genders</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle" id="facultyTable">
                            <thead class="table-light">
                                <tr>
                                    
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>E-mail</th>
                                    <th>Action</th>
                                    <th>View</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(!empty($list1)){
                                        foreach($list1 as $li){
                                            $teacher_id=is_array($li) ? $li['teacher_id'] : $li->teacher_id;
                                            $fname=is_array($li) ? $li['fname'] : $li->fname;
                                            $lname  = is_array($li) ? $li['lname']  : $li->lname;
                                            $gender     = is_array($li) ? $li['gender']     : $li->gender;
                                            $address    = is_array($li) ? $li['address']    : $li->address;
                                            $phone      = is_array($li) ? $li['phone']      : $li->phone;
                                            $email      = is_array($li) ? $li['email']      : $li->email;

                                            //avatar initials
                                            $initial=strtoupper(substr($fname, 0, 1) . substr($lname, 0, 1));

                                            echo "<tr>";
                                            echo "<td>#".str_pad($teacher_id,4,'0',STR_PAD_LEFT)."</td>";
                                            echo "<td><div class='avatar bg-success'>$initial</div></td>";
                                            echo "<td>$fname $lname</td>";
                                            echo "<td>$gender</td>";
                                            echo "<td>$address</td>";
                                            echo "<td>$phone</td>";
                                            echo "<td>$email</td>";

                                         echo "<td>
                                        <div class='dropdown'>
                                             <a href='#' class='btn btn-sm btn-light' data-bs-toggle='dropdown' aria-expanded='false'>
                                              <i class='bi bi-three-dots-vertical'></i>
                                             </a>
                                            <ul class='dropdown-menu dropdown-menu-end'>
                                               <li><a class='dropdown-item text-success' href='edit_faculty?id=$teacher_id'>Edit</a></li>
                                              <li> <a class='dropdown-item text-danger' href='delete?dlt_faculty=$teacher_id' onclick=\"return confirm('Are you sure you want to delete this faculty?');\"><i class='bi bi-trash'></i> Delete</a></li>
                                            </ul>
                                        </div>
                                        </td>";

                                         echo "<td>
                                        <a href='faculty_detail?id=$teacher_id' class='btn btn-info btn-sm'>
                                            <i class='bi bi-eye'></i> View
                                        </a>
                                        </td>";
                                        echo "</tr>";
                                     }
                                    }
                                    else{
                                        echo "<tr><td colspan='12' class='text-center text-muted'>No Faculty found</td></tr>";
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<script>
    // Filter logic
    const filterTable = () => {
        const id     = document.getElementById("searchID").value.toLowerCase();
        const name   = document.getElementById("searchName").value.toLowerCase();
        const gender = document.getElementById("searchGender").value.toLowerCase();

        const rows = document.querySelectorAll("#facultyTable tbody tr");

        rows.forEach(row => {
            const cells = row.querySelectorAll("td");
            const matchID     = cells[0].innerText.toLowerCase().includes(id);   // ID
            const matchName   = cells[2].innerText.toLowerCase().includes(name); // Name
            const matchGender = (gender === "" || cells[3].innerText.toLowerCase() === gender); // Gender

            if (matchID && matchName && matchGender) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    };

    // Attach search events
    document.getElementById("searchID").addEventListener("input", filterTable);
    document.getElementById("searchName").addEventListener("input", filterTable);
    document.getElementById("searchGender").addEventListener("change", filterTable);

    // Reset Filters
    document.getElementById("resetFilters").addEventListener("click", () => {
        document.getElementById("searchID").value = "";
        document.getElementById("searchName").value = "";
        document.getElementById("searchGender").value = "";
        filterTable();
    });
</script>
