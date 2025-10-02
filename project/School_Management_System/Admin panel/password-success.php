<?php
include_once("header.php");
?>
<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f5f7fa;">
  <div class="success-card text-center">
    <h2 class="mb-4">Your password changed successfully</h2>
    <a href="index.php" class="btn btn-primary px-5">OK</a>
  </div>
</div>

<style>
  .success-card {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }
  .btn-success {
    font-weight: bold;
  }
</style>

<?php
include_once("footer.php");
?>
