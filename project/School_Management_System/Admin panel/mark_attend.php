<?php include_once("header.php"); ?>

<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-4">
        <h3 class="mb-4 text-center">Mark Attendance</h3>

        <!-- Attendance Date -->
        <div class="mb-3">
            <label for="attendance_date" class="form-label">Attendance Date</label>
            <input type="date" class="form-control" id="attendance_date" name="attendance_date" value="<?php echo date('Y-m-d'); ?>" required>
        </div>

        <!-- Class Selection -->
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

        <!-- Attendance Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Mark Attendance</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dummy Static Data -->
                    <tr>
                        <td>1</td>
                        <td>Ravi Kumar</td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="attendance_1" id="present_1" value="Present">
                                <label class="form-check-label" for="present_1">Present</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="attendance_1" id="absent_1" value="Absent">
                                <label class="form-check-label" for="absent_1">Absent</label>
                            </div>
                        </td>

                        <td>
                             <a href='student_attendance_summary.php?student_id=1' class='btn btn-info btn-sm'>
                             <i class='bi bi-eye'></i> View
                            </a>
                         </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Neha Sharma</td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="attendance_2" id="present_2" value="Present">
                                <label class="form-check-label" for="present_2">Present</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="attendance_2" id="absent_2" value="Absent">
                                <label class="form-check-label" for="absent_2">Absent</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Amit Verma</td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="attendance_3" id="present_3" value="Present">
                                <label class="form-check-label" for="present_3">Present</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="attendance_3" id="absent_3" value="Absent">
                                <label class="form-check-label" for="absent_3">Absent</label>
                            </div>
                        </td>
                        
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between">
            <a href="attend_table.php" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">Save Attendance</button>
        </div>
    </div>
</div>
    </div>
</div>