<?php
include_once("header.php");
include_once("model.php"); // use model.php instead of direct db_connect

// Get teacher_id from URL
if (isset($_GET['id'])) {
    $teacher_id = intval($_GET['id']);

    // Call model to fetch all teachers
    $teachers = $this->select("teachers");

    // Find the specific teacher
    $teacher = null;
    foreach ($teachers as $t) {
        if ($t->teacher_id == $teacher_id) {
            $teacher = $t;
            break;
        }
    }

    if (!$teacher) {
        echo "<div class='container mt-5'><div class='alert alert-danger'>Faculty not found!</div></div>";
        exit;
    }
} else {
    echo "<div class='container mt-5'><div class='alert alert-warning'>No faculty selected!</div></div>";
    exit;
}
?>
<style>
    body {
        padding-top: 100px; /* Adjust for navbar */
    }
    .table td, .table th {
        vertical-align: middle;
    }
</style>

<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="container mt-5">
            <div class="card shadow-lg">
                <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Faculty Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Left Side (Profile) -->
                        <div class="col-md-4 text-center">
                            <?php
                                    $uploadDir = "assets/images/upload/faculty/"; // adjust path if inside Admin panel
                                    $photoPath = !empty($teacher->profile_image) 
                                  ? $uploadDir . $teacher->profile_image 
                                 : $uploadDir . "default.jpg";                            ?>
                            <img src="<?php echo $photoPath; ?>" 
                                class="img-fluid rounded-circle mb-3" 
                                alt="Faculty Photo" style="width:150px;height:150px;">

                            <h5><?php echo $teacher->fname . " " . $teacher->lname; ?></h5>
                            <p class="text-muted">Faculty ID: <?php echo $teacher->teacher_id; ?></p>
                            <a href="edit_faculty?id=<?php echo $teacher->teacher_id; ?>" class="btn btn-warning btn-sm">Edit</a>
                        </div>

                        <!-- Right Side (Details) -->
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Full Name</th>
                                        <td><?php echo $teacher->fname . " " . $teacher->lname; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td><?php echo $teacher->gender; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth</th>
                                        <td><?php echo $teacher->dob; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Date of Joining</th>
                                        <td><?php echo $teacher->doj; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Religion</th>
                                        <td><?php echo $teacher->religion; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><?php echo $teacher->address; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td><?php echo $teacher->phone; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $teacher->email; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- row -->
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div>
    </div>
</div>
