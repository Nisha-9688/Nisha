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
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-white"><i class="bi bi-people-fill"></i> User List</h5>
                    <a href="userform" class="btn btn-light btn-sm"><i class="bi bi-plus-circle"></i> Add User</a>
                </div>
                <div class="card-body">

                    <!-- Search Filters -->
                    <div class="row g-2 mb-3">
                        <div class="col-md-4">
                            <input type="text" id="searchID" class="form-control" placeholder="Search by ID">
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="searchUsername" class="form-control" placeholder="Search by Username">
                        </div>
                        <div class="col-md-4">
                            <select id="searchRole" class="form-select">
                                <option value="">Filter by Role</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="userTable" class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Student name</th>
                                    <th>Teacher name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!empty($user))
                                {
                                    foreach($user as $u)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $u->u_id?></td>
                                            <td><?php echo $u->email?></td>
                                            <td><?php echo $u->password?></td>
                                            <td><?php echo $u->role?></td>
                                            <td><?php echo $u->student_name ?: '-' ?></td>
                                            <td><?php echo $u->teacher_name ?: '-' ?></td>
                                            <td class="text-center">
                                                 <a href="edit_user?id=<?php echo $u->u_id; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                <a href="delete?dlt_user=<?php echo $u->user_id?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
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
// Search filter function
function filterTable() {
  const id = document.getElementById("searchID").value.toLowerCase();
  const username = document.getElementById("searchUsername").value.toLowerCase();
  const role = document.getElementById("searchRole").value.toLowerCase();

  const rows = document.querySelectorAll("#userTable tbody tr");

  rows.forEach(row => {
    const cells = row.querySelectorAll("td");
    const matchID = cells[0].innerText.toLowerCase().includes(id);
    const matchUsername = cells[1].innerText.toLowerCase().includes(username);
    const matchRole = role === "" || cells[3].innerText.toLowerCase() === role;

    if (matchID && matchUsername && matchRole) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  });
}

// Attach events
document.getElementById("searchID").addEventListener("input", filterTable);
document.getElementById("searchUsername").addEventListener("input", filterTable);
document.getElementById("searchRole").addEventListener("change", filterTable);
</script>