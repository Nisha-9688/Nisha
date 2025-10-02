<?php
include_once("header.php");
include_once("model.php");

// Get student_id from URL
if (isset($_GET['id'])) {
    $student_id = intval($_GET['id']);
    // Call model to fetch all teachers
    $students = $this->select("student");

    // Find the specific teacher
    $student = null;
    foreach ($students as $s) {
        if ($s->student_id == $student_id) {
            $student = $s;
            break;
        }
    }

    if (!$student) {
        echo "<div class='container mt-5'><div class='alert alert-danger'>student not found!</div></div>";
        exit;
    }
} else {
    echo "<div class='container mt-5' style='margin-top:160px !important;'><div class='alert alert-warning'>No student selected!</div></div>";
    exit;
}
?>
<style>
    body {
        padding-top: 100px;
        /* Adjust this to your navbar height */
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
    <?php if (isset($_GET['updated'])) { ?>
    <div id="updateAlert" class="alert alert-success text-center mt-3">
        ✅ Student data updated successfully!
    </div>
    <script>
        setTimeout(() => {
            let alertBox = document.getElementById('updateAlert');
            if (alertBox) {
                alertBox.style.display = 'none';
            }
        }, 3000);
    </script>
<?php } ?>


            <div class="card shadow-lg">
                <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Student Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Left Side (Profile) -->
                        <div class="col-md-4 text-center">
                           <?php
                                    $uploadDir = "assets/images/upload/students/"; // adjust path if inside Admin panel
                                    $photoPath = !empty($student->profile_image) 
                                  ? $uploadDir . $student->profile_image 
                                 : $uploadDir . "default.jpg";
                            ?>
                            <img src="<?php echo $photoPath; ?>"
                                class="img-fluid rounded-circle mb-3"
                                alt="Student Photo" style="width:150px;height:150px;">

                            <h5><?php echo $student->first_name . " " . $student->last_name; ?></h5>
                            <p class="text-muted">Roll No: <?php echo $student->roll_no; ?></p>
                            <a href="edit_student?id=<?php echo $student->student_id; ?>" class="btn btn-warning btn-sm">Edit</a>
                        </div>

                        <!-- Right Side (Details) -->
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Full Name</th>
                                        <td><?php echo $student->first_name . " " . $student->father_name . " " . $student->last_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Class / Section</th>
                                        <td><?php echo $student->class_name . " - " . $student->section; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth</th>
                                        <td><?php echo $student->dob; ?></td>
                                    </tr>
                                     <tr>
                                        <th>Place of Birth</th>
                                        <td><?php echo $student->place_of_birth; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td><?php echo $student->gender; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Religion</th>
                                        <td><?php echo $student->religion; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Father Name</th>
                                        <td><?php echo $student->father_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mother Name</th>
                                        <td><?php echo $student->mother_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><?php echo $student->address; ?></td>
                                    </tr>
                                
                                    <tr>
                                        <th>Parent Contact</th>
                                        <td><?php echo $student->phone; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $student->email; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Date of Admission</th>
                                        <td><?php echo $student->admission_date; ?></td>
                                    </tr>
                                     <tr>
                                        <th>Last school name</th>
                                        <td><?php echo $student->last_schoolname; ?></td>
                                    </tr>
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