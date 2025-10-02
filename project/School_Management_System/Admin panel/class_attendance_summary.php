<?php include_once("header.php"); ?>

<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="container mt-5">
  <div class="card shadow-lg p-4 rounded-4">
    <h3 class="mb-4 text-center">Class Attendance Summary</h3>

    <!-- Filter -->
    <form method="GET" action="attend_table.php" class="row g-3 mb-4">
      <div class="col-md-6">
        <label for="class_id" class="form-label">Select Class</label>
        <select id="class_id" name="class_id" class="form-select" required>
          <option value="">-- Choose Class --</option>
          <option value="1">Class 1 - A</option>
          <option value="2">Class 2 - B</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="attendance_date" class="form-label">Select Date</label>
        <input type="date" id="attendance_date" name="attendance_date" class="form-control" value="<?php echo date('d-m-Y'); ?>" required>
      </div>
      <div class="col-md-2 d-flex align-items-end">
        <button type="submit" class="btn btn-primary w-100">View</button>
         <!-- <a href="attend_table.php" class="btn btn-primary w-100">View</a> -->

      </div>
    </form>

    <!-- Summary Table -->
    <!-- <table class="table table-bordered text-center">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Student Name</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
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
      </tbody>
    </table> -->

    <a href="index.php" class="btn btn-primary" style="width:100px;">Back</a>
  </div>
    </div>
</div>