<?php
include_once("header.php");
include_once("model.php");
$obj = new model();

$id = $_GET['id'] ?? null;    // ID from the link
$user = null;

if ($id) {
    $where = array("u_id" => $id);     // adjust column name if different
    $res   = $obj->select_where("user", $where);

    if ($res) {
        $user = $res->fetch_assoc();
    }
}
?>
<?php
// var_dump($id);
// var_dump($user);
// exit;
?>


<div class="body-wrapper-inner">
    <div class="container-fluid">
                <div class="container mt-5">
  <div class="card shadow-lg rounded-3">
    <div class="card-header bg-primary">
      <h5 class="mb-0  text-white"><i class="bi bi-pencil-square"></i> Edit User</h5>
    </div>
    <div class="card-body">
      <?php
      // On form submit
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $role = $_POST['role'];

          echo "<div class='alert alert-success'>
                  <i class='bi bi-check-circle-fill'></i> 
                  User <strong>$username</strong> updated successfully as <strong>$role</strong>!
                </div>";
      }
      ?>
      
      <form method="POST" action="">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" value="<?= $user['email'] ?? '';?>" class="form-control" placeholder="Enter username" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" value="<?= $user['password'] ?? '';?>" class="form-control" placeholder="Enter password" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Role</label>
          <select name="role" class="form-select" required>
            <option value="">Select Role</option>
            <option value="teacher" <?= ($user['role'] ?? '')==='teacher' ? 'selected' : '' ?>>Teacher</option>
            <option value="student" <?= ($user['role'] ?? '')==='student' ? 'selected' : '' ?>>Student</option>

          </select>
        </div>
        <div class="d-flex justify-content-between">
          <a href="user_table" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
          <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Update User</button>
        </div>
      </form>
    </div>
  </div>
</div>

    </div>
</div>