<?php
include_once("header.php")
?>
<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f5f7fa;">
  <div class="login-card">
    <div class="login-title">Change Password</div>

    <!-- Added form ID -->
    <form id="changePasswordForm">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" required>
      </div>

      <div class="mb-3 position-relative">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" required>
        <span class="toggle-password" onclick="togglePassword('password')" 
              style="position:absolute; right:10px; top:38px; cursor:pointer; color:gray;">
        </span>
      </div>

      <div class="mb-3 position-relative">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" required>
        <span class="toggle-password" onclick="togglePassword('confirmPassword')" 
              style="position:absolute; right:10px; top:38px; cursor:pointer; color:gray;">
        </span>
      </div>

      <button type="submit" class="btn btn-primary w-100">Change Password</button>
    </form>
  </div>
</div>

<style>
  .login-card {
    width: 100%;
    max-width: 400px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    padding: 30px;
  }
  .login-title {
    text-align: center;
    font-weight: bold;
    font-size: 24px;
    margin-bottom: 20px;
  }
  .form-label {
    font-weight: bold;
  }
  .btn-primary {
    background-color: #1849D6;
    border: none;
    font-weight: 500;
  }
</style>

<script>
function togglePassword(id) {
  const passField = document.getElementById(id);
  passField.type = passField.type === "password" ? "text" : "password";
}

document.getElementById("changePasswordForm").addEventListener("submit", function(e) {
  e.preventDefault();
  
  const pass = document.getElementById("password").value;
  const confirmPass = document.getElementById("confirmPassword").value;

  // Check if password is at least 6 characters
  if (pass.length < 6) {
    alert("❌ Password must be at least 6 characters long!");
    return;
  }

  if (pass !== confirmPass) {
    alert("Passwords do not match!");
    return;
  } else {
    // Redirect after success
    window.location.href = "password-success.php";
  }
});
</script>

<?php
include_once("footer.php");
?>
