<?php
include_once("header.php");
?>

<?php
// Get student_id from URL
$student_id = isset($_GET['student_id']) ? intval($_GET['student_id']) : 0;

// Dummy student data (replace with DB query later)
$students = [
    1 => "Ravi Kumar",
    2 => "Neha Sharma",
    3 => "Amit Verma"
];

// If not found, show "Unknown Student"
$student_name = $students[$student_id] ?? "Unknown Student";
?>


<div class="body-wrapper-inner">
    <div class="container-fluid">
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-4">
        <h3 class="mb-4 text-center">Student Attendance Summary</h3>

        <!-- Student Selection & Filter -->
        <form class="row g-3 mb-4" method="GET" action="student_attendance_summary.php">
            <div class="col-md-4">
                <label class="form-label">Select Student</label>
                <select name="student_id" class="form-select">
                    <option value="">-- Choose Student --</option>
                    <option value="1" <?php if(isset($_GET['student_id']) && $_GET['student_id']==1) echo "selected"; ?>>Ravi Kumar (Class 1 - A)</option>
                    <option value="2" <?php if(isset($_GET['student_id']) && $_GET['student_id']==2) echo "selected"; ?>>Neha Sharma (Class 1 - A)</option>
                    <option value="3" <?php if(isset($_GET['student_id']) && $_GET['student_id']==3) echo "selected"; ?>>Amit Verma (Class 2 - B)</option>
                    <option value="4" <?php if(isset($_GET['student_id']) && $_GET['student_id']==4) echo "selected"; ?>>Pooja Singh (Class 2 - B)</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Month</label>
                <select class="form-select">
                    <option value="">-- Choose Month --</option>
                    <option>January</option>
                    <option>February</option>
                    <option>March</option>
                    <option>April</option>
                    <option>May</option>
                    <option>June</option>
                    <option>July</option>
                    <option>August</option>
                    <option>September</option>
                    <option>October</option>
                    <option>November</option>
                    <option>December</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Year</label>
                <select class="form-select">
                    <option>2025</option>
                    <option>2024</option>
                    <option>2023</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Show Summary</button>
            </div>
        </form>

        <!-- Attendance Summary -->
        <div class="card p-3 mb-4">
           <h5>Attendance Report for <span class="text-primary"><?php echo $student_name; ?></span> - August 2025</h5>

            <div class="row text-center mt-3">
                <div class="col-md-4">
                    <div class="p-3 bg-light rounded">
                        <h4 class="text-success">20</h4>
                        <p>Days Present</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-light rounded">
                        <h4 class="text-danger">5</h4>
                        <p>Days Absent</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-light rounded">
                        <h4 class="text-info">25</h4>
                        <p>Total School Days</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daily Attendance Details -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>2025-08-01</td><td><span class="badge bg-success">Present</span></td></tr>
                    <tr><td>2025-08-02</td><td><span class="badge bg-success">Present</span></td></tr>
                    <tr><td>2025-08-03</td><td><span class="badge bg-danger">Absent</span></td></tr>
                    <tr><td>2025-08-04</td><td><span class="badge bg-success">Present</span></td></tr>
                    <tr><td>2025-08-05</td><td><span class="badge bg-success">Present</span></td></tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>

    </div>
</div>