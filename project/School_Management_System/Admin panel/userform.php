<?php
include_once("header.php");

include_once("model.php"); // Make sure model.php has select() function
$model = new model();

// Fetch all students and teachers
$students = $model->select("student"); // returns array of student objects
$teachers = $model->select("teachers");  // returns array of teacher objects
?>
<style>
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
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 text-white"><i class="bi bi-person-plus-fill"></i> Add User</h5>
                </div>
                <div class="card-body">
                    <?php
                    // Show message after submit
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $role = $_POST['role'];

                        echo "<div class='alert alert-success'><i class='bi bi-check-circle-fill'></i> 
                  User <strong>$username</strong> added successfully as <strong>$role</strong>!
                </div>";
                    }
                    ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="">Select Role</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Student">Student</option>
                            </select>
                        </div>
                        <div class="mb-3" id="studentDiv"  style="display:none;">
                            <label class="form-label">Select Student</label>
                            <select name="student_id" class="form-select">
                                <option value="">Select Student</option>
                                <?php foreach($students as $s){ ?>
                                    <option value="<?= $s->student_id ?>"><?= $s->first_name.' '.$s->last_name ?> </option>
                                 <?php } ?>
                            </select>   
                        </div>

                        <div class="mb-3" id="teacherDiv"  style="display:none;">
                            <label class="form-label">Select Teacher</label>
                            <select name="teacher_id" class="form-select">
                                <option value="">Select Teacher</option>
                                <?php foreach($teachers  as $t){ ?>
                                    <option value="<?= $t->teacher_id ?>"><?= $t->fname.' '.$t->lname ?></option>
                                 <?php } ?>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="user_table" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
                            <button type="submit" name="submit" class="btn btn-success"><i class="bi bi-save"></i> Save User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const roleSelect = document.querySelector('select[name="role"]');
const studentDiv = document.getElementById('studentDiv');
const teacherDiv = document.getElementById('teacherDiv');

roleSelect.addEventListener('change', function() {
    const role = this.value;
    if(role === 'Student') {
        studentDiv.style.display = 'block';
        teacherDiv.style.display = 'none';
    } else if(role === 'Teacher') {
        studentDiv.style.display = 'none';
        teacherDiv.style.display = 'block';
    } else {
        studentDiv.style.display = 'none';
        teacherDiv.style.display = 'none';
    }
});
</script>
