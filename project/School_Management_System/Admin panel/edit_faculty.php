<?php
include_once("header.php");
include_once("db_connect.php");

$id = $_GET['id']; // faculty id
$sql = "SELECT * FROM teachers WHERE teacher_id=$id";
$result = $conn->query($sql);
$teacher = $result->fetch_assoc();

// Handle update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];   
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $doj = $_POST['doj'];
    $religion = $_POST['religion'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Keep old image if no new one uploaded
    $profile_image = $teacher['profile_image'];

    if (!empty($_FILES['profile_image']['name'])) {
        $targetDir="assets/images/upload/faculty/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // create folder if not exists
        }

        $fileName = time() . "_" . basename($_FILES['profile_image']['name']);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFilePath)) {
            // Delete old file if exists
            if (!empty($teacher['profile_image']) && file_exists($teacher['profile_image'])) {
                unlink($teacher['profile_image']);
            }
            $profile_image =$fileName;
        }
    }

    $update = "UPDATE teachers SET 
        fname='$fname',
        lname='$lname',
        gender='$gender',
        dob='$dob',
        doj='$doj',
        religion='$religion',
        address='$address',
        phone='$phone',
        email='$email',
        profile_image='$profile_image'
        WHERE teacher_id=$id";
}
?>
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="container mt-5">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($conn->query($update) === TRUE) { ?>
                    <div class="alert alert-success text-center">
                        ✅ Faculty data updated successfully!
                    </div>
                <?php
                } else { ?>
                    <div class="alert alert-danger text-center">
                        ❌ Error updating faculty: <?= $conn->error ?>
                    </div>
            <?php
                }
            }
            ?>
            <h3>Edit Faculty</h3>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fname" value="<?= $teacher['fname'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lname" value="<?= $teacher['lname'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="male" <?= ($teacher['gender'] == "male" ? "selected" : "") ?>>Male</option>
                        <option value="female" <?= ($teacher['gender'] == "female" ? "selected" : "") ?>>Female</option>
                        <option value="other" <?= ($teacher['gender'] == "other" ? "selected" : "") ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" value="<?= $teacher['dob'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Date of Joining</label>
                    <input type="date" name="doj" value="<?= $teacher['doj'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Religion</label>
                <select class="form-select" name="religion" value="<?= $teacher['religion'] ?>"required>
                   <option value="hindu">Hindu</option>
                  <option value="islam">Islam</option>
                  <option value="christian">Christian</option>
                  <option value="budish">Budish</option>
                  <option value="other">Other</option>
                </select>
                    <!-- <input type="text" name="religion" value="" class="form-control"> -->
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control"><?= $teacher['address'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?= $teacher['phone'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= $teacher['email'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Profile Image</label><br>
                    <?php if (!empty($teacher['profile_image'])) { ?>
                        <img src="<?= $teacher['profile_image'] ?>" width="100" class="mb-2"><br>
                    <?php } ?>
                    <input type="file" name="profile_image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
                <a href="faculty_detail?id=<?= $id ?>" class="btn btn-secondary mt-3">Back</a>

            </form>
        </div>
    </div>
</div>
