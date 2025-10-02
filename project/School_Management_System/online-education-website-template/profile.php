<?php
include_once('header.php');
// session_start();
if(!isset($_SESSION['student_id'])){
    // redirect to login if session not set
    header("Location: login");
    echo "data not found";
    exit;
}
?>
<?php /*echo "<pre>";
print_r($fetch);
echo "</pre>";*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
    }
    .profile-container {
      max-width: 900px;
      margin: 50px auto;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      overflow: hidden;
    }
    .profile-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .left-side {
      background: #f1f1f1;
      padding: 20px;
      text-align: center;
    }
    .left-side img {
      border-radius: 50%;
      width: 180px;
      height: 180px;
      object-fit: cover;
      border: 5px solid #fff;
      box-shadow: 0 3px 10px rgba(0,0,0,0.2);
    }
    .right-side {
      padding: 30px;
    }
    .detail-item {
      margin-bottom: 15px;
    }
    .detail-item strong {
      width: 120px;
      display: inline-block;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="profile-container row">
    <!-- Left Side (Image) -->
    <div class="col-md-4 left-side d-flex align-items-center justify-content-center">
      <div>
        <img src="img/upload/students/<?php echo $fetch->profile_image?>" alt="Profile Picture">
        <h4 class="mt-3"><?php echo $fetch->first_name  .' '. $fetch->last_name ?></h4>
        <p class="text-muted"><?php echo $fetch->role; ?></p>
      </div>
    </div>

    <!-- Right Side (Details) -->
    <div class="col-md-8 right-side">
      <h3 class="mb-4">Profile Details</h3>

        <div class="detail-item">
        <strong>student_Id:</strong> <?php echo $fetch->student_id ?>
      </div>
      <div class="detail-item">
        <strong>Roll no:</strong> <?php echo $fetch->roll_no ?>
      </div>
      <div class="detail-item">
        <strong>Name:</strong> <?php echo $fetch->first_name .' '. $fetch->last_name ?>
      </div>
      <div class="detail-item">
        <strong>Gender:</strong> <?php echo $fetch->gender ?>
      </div>
      <div class="detail-item">
        <strong>Class:</strong> <?php echo $fetch->class_name .' '. $fetch->section ?>
      </div>
      <div class="detail-item">
        <strong>Date of Birth:</strong> <?php echo $fetch->dob ?>
      </div>
      <div class="detail-item">
        <strong>Address:</strong> <?php echo $fetch->address ?>
      </div>
      <div class="detail-item">
        <strong>Email:</strong> <?php echo $fetch->email ?>
      </div>
      <div class="detail-item">
        <strong>Phone:</strong><?php echo $fetch->phone ?>
      </div>

      <div class="detail-item">
        <strong>School :</strong><?php echo $fetch -> school_type_name?>
      </div>

      <div class="mt-4">
        <a href="#" class="btn btn-primary btn-sm">Edit Profile</a>
        <a href="logout" class="btn btn-outline-danger btn-sm">Logout</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<?php 
include_once('footer.php');
?>
