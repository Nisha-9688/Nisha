<?php 
include_once("header.php"); 
// For demo: show success alert if form is submitted
$success = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $success = true;
}

?>


<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-4">
        <h3 class="mb-4 text-center">Edit Subject</h3>

        <!-- Success Message -->
        <?php if ($success): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                ✅ Subject edit successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form method="post" action="">
            <!-- Subject Name -->
            <div class="mb-3">
                <label for="subject_name" class="form-label">Subject Name</label>
                <input type="text" class="form-control" id="subject_name" name="subject_name" placeholder="Enter subject name" required>
            </div>

            <!-- Select Class -->
            <div class="mb-3">
                <label for="class_id" class="form-label">Select Class</label>
                <select class="form-select" id="class_id" name="class_id" required>
                    <option value="">-- Choose Class --</option>
                    <option value="1">Class 1 - A</option>
                    <option value="2">Class 2 - B</option>
                    <option value="3">Class 3 - C</option>
                    <option value="4">Class 4 - A</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <a href="subjecttable.php" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-success">Edit Subject</button>
            </div>
        </form>
    </div>
</div>
    </div>
</div>