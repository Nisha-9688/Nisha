<?php include_once("header.php"); ?>

<div class="body-wrapper-inner">
    <div class="container-fluid">
<div class="container mt-4">
  <div class="card shadow p-4 rounded-4">
    <h3 class="mb-3">Class Attendance Detail</h3>

   <p><strong>Class:</strong> 
    <?php 
      if (isset($_GET['class_id'])) {
          if ($_GET['class_id'] == 1) echo "Class 1 - A";
          elseif ($_GET['class_id'] == 2) echo "Class 2 - B";
          else echo "Unknown";
      } else {
          echo "N/A";
      }
    ?>
</p>

<p><strong>Date:</strong> <?php echo $_GET['attendance_date'] ?? 'N/A'; ?></p>

    <div class="table-responsive">
      <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <!-- Dummy Data -->
          <tr>
            <td>1</td>
            <td>Ravi Kumar</td>
            <td><span class="badge bg-success">Present</span></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Neha Sharma</td>
            <td><span class="badge bg-danger">Absent</span></td>
          </tr>
          <tr>
            <td>3</td>
            <td>Amit Verma</td>
            <td><span class="badge bg-success">Present</span></td>
          </tr>
        </tbody>
      </table>
    </div>

    <a href="class_attendance_summary.php" class="btn btn-secondary mt-3">⬅ Back to Class Summary</a>
  </div>
</div>

    </div>
</div>