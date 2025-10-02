<?php
include_once("header.php");
include_once("db_connect.php"); // your DB connection file

$alertMessage = ""; // for success/error messages
$class_name = "";
$section = "";
$school_type_id = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $class_name = $_POST['class_name'];
  $section = $_POST['section'];
  $school_type_id = $_POST['school_type_id'];

  $sql = "INSERT INTO classes (class_name, section, school_type_id) 
          VALUES ('$class_name', '$section', '$school_type_id')";

  if (mysqli_query($conn, $sql)) {
    $alertMessage = "<div class='alert alert-success mt-3'>✅ Class Added Successfully!</div>";

    // clear form values
    $class_name = "";
    $section = "";
    $school_type_id = "";

    // JS redirect after 2 seconds
    $alertMessage .= "<script>
      setTimeout(function() {
        window.location.href = 'class_list.php';
      }, 000);
    </script>";

  } else {
    $alertMessage = "<div class='alert alert-danger mt-3'>❌ Error: " . mysqli_error($conn) . "</div>";
  }
}
?>
<div class="body-wrapper-inner">
  <div class="container-fluid">
    <div class="container mt-5">
      <div class="card shadow p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h3 class="mb-0">Add Class</h3>
          <button type="button" class="btn btn-sm btn-primary px-3 py-1" onclick="window.history.back()">← Back</button>
        </div>

        <!-- ✅ Display alert message here -->
        <?php if (!empty($alertMessage)) { echo $alertMessage; } ?>

        <form method="POST" action="">
          <div class="mb-3">
            <label class="form-label">Class Name</label>
            <input type="text" class="form-control" name="class_name" value="<?= htmlspecialchars($class_name) ?>" placeholder="Enter Class (e.g. Class 1)" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Section</label>
            <input type="text" maxlength="1" class="form-control" name="section" value="<?= htmlspecialchars($section) ?>" placeholder="Enter Section (e.g. A)">
          </div>

          <div class="mb-3">
            <label class="form-label">School Type</label>
            <select class="form-select" name="school_type_id" required>
              <option value="">-- Select School Type --</option>
              <?php
              $result = mysqli_query($conn, "SELECT * FROM school_type");
              while ($row = mysqli_fetch_assoc($result)) {
                $selected = ($row['school_type_id'] == $school_type_id) ? "selected" : "";
                echo "<option value='{$row['school_type_id']}' $selected>{$row['school_type_name']}</option>";
              }
              ?>
            </select>
          </div>

          <button type="submit" class="btn btn-primary text-white">Add Class</button>
        </form>
      </div>
    </div>
  </div>
</div>
