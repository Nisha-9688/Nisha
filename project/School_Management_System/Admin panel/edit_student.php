<?php
include_once("header.php");
include_once("db_connect.php");

$id = $_GET['id']; // student id
$sql = "SELECT * FROM students WHERE student_id=$id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();

// Handle update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $place_of_birth = $_POST['place_of_birth'];
    $religion = $_POST['religion'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $admission_date = $_POST['admission_date'];
    $class_id = $_POST['class_id'];
    $school_type_id = $_POST['school_type_id'];

    // Keep old image if no new one uploaded
    $profile_image = $student['profile_image'];

    if (!empty($_FILES['profile_image']['name'])) {
        $targetDir = "assets/images/upload/students/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // create folder if not exists
        }

        $fileName = time() . "_" . basename($_FILES['profile_image']['name']);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFilePath)) {
            // Delete old file if exists
            if (!empty($student['profile_image']) && file_exists($student['profile_image'])) {
                unlink($student['profile_image']);
            }
            $profile_image = $fileName;
        }
    }

    $update = "UPDATE students SET 
        first_name='$first_name',
        last_name='$last_name',
        father_name='$father_name',
        mother_name='$mother_name',
        gender='$gender',
        dob='$dob',
        place_of_birth='$place_of_birth',
        religion='$religion',
        address='$address',
        phone='$phone',
        email='$email',
        admission_date='$admission_date',
        class_id='$class_id',
        school_type_id='$school_type_id',
        profile_image='$profile_image'
        WHERE student_id=$id";
}
?>
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="container mt-5">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($conn->query($update) === TRUE) { ?>
                    <div class="alert alert-success text-center">
                        ✅ Student data updated successfully!
                    </div>
                <?php
                } else { ?>
                    <div class="alert alert-danger text-center">
                        ❌ Error updating student: <?= $conn->error ?>
                    </div>
            <?php
                }
            }
            ?>
            <h3>Edit Student</h3>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" value="<?= $student['first_name'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" value="<?= $student['last_name'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Father Name</label>
                    <input type="text" name="father_name" value="<?= $student['father_name'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Mother Name</label>
                    <input type="text" name="mother_name" value="<?= $student['mother_name'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="male" <?= ($student['gender'] == "male" ? "selected" : "") ?>>Male</option>
                        <option value="female" <?= ($student['gender'] == "female" ? "selected" : "") ?>>Female</option>
                        <option value="other" <?= ($student['gender'] == "other" ? "selected" : "") ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" value="<?= $student['dob'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Place of Birth</label>
                    <input type="text" name="place_of_birth" value="<?= $student['place_of_birth'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Religion</label>
                    <input type="text" name="religion" value="<?= $student['religion'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control"><?= $student['address'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?= $student['phone'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= $student['email'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Admission Date</label>
                    <input type="date" name="admission_date" value="<?= $student['admission_date'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Class ID</label>
                    <input type="text" name="class_id" value="<?= $student['class_id'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>School Type ID</label>
                    <input type="text" name="school_type_id" value="<?= $student['school_type_id'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Profile Image</label><br>
                    <?php if (!empty($student['profile_image'])) { ?>
                        <img src="<?= $student['profile_image'] ?>" width="100" class="mb-2"><br>
                    <?php } ?>
                    <input type="file" name="profile_image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
                <a href="student_detail?id=<?= $id ?>" class="btn btn-secondary mt-3">Back</a>

            </form>
        </div>
    </div>
</div>