<?php
include_once("header.php");
?>
<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f7f7f77a;">
  <div class="login-modal">
    <!-- Left side image -->
    <div class="login-left">
      <img src="img/school_icon.jpg" alt="Login Illustration">
    </div>

    <!-- Right side content -->
    <div class="login-right">
      <h4 class="mb-5">Log-in to your account</h4>
      <a href="student_login" class="btn btn-green login-btn">
        <i class="fa fa-user me-2"></i> Student Login
      </a>

      <a href="teacher_login" class="btn btn-green login-btn">
        <i class="fa fa-university me-2"></i> Teacher Login
      </a>
    </div>
  </div>
</div>

<style>
  .login-modal {
    display: flex;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    max-width: 700px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
  }

  .login-left {
    background-color: #cbdaf2ff;
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
  }

  .login-left img {
    max-width: 100%;
  }

  .login-right {
    flex: 1;
    padding: 30px;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Vertically center content */
    align-items: center;     /* Horizontally center buttons and heading */
    text-align: center;
  }

  .login-right h4 {
    font-weight: 500;
    margin-bottom: 20px;
  }

  .login-btn {
    width: 100%;
    margin-bottom: 20px;
     display: inline-block; 
  }

  .btn-green {
    background-color: #a2b1caff;
    color: white;
  }

  .btn-green:hover {
    background-color:#1849D6;
    color: white;
  }
</style>
<?php
include_once("footer.php");
?>