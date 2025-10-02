<?php
include_once("header.php");
?>
<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f5f7fa;">
  <div class="login-card">
    <!-- Logo -->
    <!-- Title -->
    <div class="login-title">Student Login</div>
    <div class="login-subtitle"></div>

    <!-- Form -->
    <form method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="email" id="username">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
      </div>
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="remember">
          <label class="form-check-label" for="remember">
            Remember this Device
          </label>
        </div>
        <a href="forget_pw.php" class="forgot-link">Forgot Password?</a>
      </div>
      <button type="submit" name="submit1" class="btn btn-primary w-100">Sign In</button>
    </form>

    <!-- Create Account -->
    <div class="create-account">
      Be the member of School
    </div>
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

  .login-logo {
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
  }

  .login-logo img {
    height: 40px;
  }

  .login-title {
    text-align: center;
    font-weight: bold;
    font-size: 24px;
  }

  .login-subtitle {
    text-align: center;
    color: gray;
    font-size: 14px;
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

  .form-check-label {
    font-size: 14px;
  }

  .forgot-link {
    font-size: 14px;
    text-decoration: none;
  }

  .forgot-link:hover {
    text-decoration: underline;
  }

  .create-account {
    font-size: 14px;
    text-align: center;
    margin-top: 15px;
    color: gray;
  }

  .create-account a {
    text-decoration: none;
    color: #1849D6;
  }

  .create-account a:hover {
    text-decoration: underline;
  }
</style>
<?php
include_once("footer.php");
?>