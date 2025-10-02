<?php
include_once("header.php");
include_once("db_connect.php");

// Get class ID from URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid request. No class ID provided.");
}
$class_id = intval($_GET['id']);

// Fetch existing class details
$sql = "SELECT * FROM classes WHERE class_id = $class_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    die("Class not found.");
}
$class = mysqli_fetch_assoc($result);

// Handle update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $school_type_id = intval($_POST['school_type_id']);

    $update_sql = "UPDATE classes 
                   SET class_name='$class_name', section='$section', school_type_id='$school_type_id'
                   WHERE class_id=$class_id";

    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Class updated successfully!');window.location='class_list.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>
<div class="body-wrapper-inner">
  <div class="container-fluid">
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary">
            <h5 class="mb-0 text-white">Edit Class</h5>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Class Name</label>
                    <input type="text" name="class_name" value="<?php echo htmlspecialchars($class['class_name']); ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Section</label>
                    <input type="text" name="section" value="<?php echo htmlspecialchars($class['section']); ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">School Type</label>
                    <select name="school_type_id" class="form-select" required>
                        <option value="">-- Select School Type --</option>
                        <?php
                        $stype_qry = mysqli_query($conn, "SELECT * FROM school_type");
                        while ($stype = mysqli_fetch_assoc($stype_qry)) {
                            $selected = ($stype['school_type_id'] == $class['school_type_id']) ? "selected" : "";
                            echo "<option value='{$stype['school_type_id']}' $selected>{$stype['school_type_name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Update Class</button>
                <a href="class_list.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script>
