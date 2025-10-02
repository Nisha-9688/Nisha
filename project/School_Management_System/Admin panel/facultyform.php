<?php
include_once("header.php");
?>
<div class="body-wrapper-inner">
    <div class="container-fluid">
      <div class="container mt-5">
      <?php if (!empty($alertMessage)): ?>
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <?php echo $alertMessage; ?>
      </div>
    </div>
  </div>
<?php endif; ?>  


  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-body">
          <div class="mb-4">
            <h3>Add New Teacher</h3>
          </div>
          <form method="post" class="new-added-form" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-3 form-group">
                <label>First Name *</label>
                <input type="text" name="fname" class="form-control" required>
              </div>
              <div class="col-md-3 form-group">
                <label>Last Name *</label>
                <input type="text" name="lname"class="form-control" required>
              </div>
              <div class="col-md-3 form-group">
                <label>Gender *</label>
                <select name="gender" class="form-select" required>
                  <option value="">Please Select</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Others</option>
                </select>
              </div>
              <div class="col-md-3 form-group">
                <label>Date Of Birth *</label>
                <div class="input-group">
                  <input type="date" name="dob" class="form-control" required>
                  <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                </div>
              </div>
              
               <div class="col-md-4 form-group">
                <label>Date of Join *</label>
                <input type="date" name="doj" class="form-control" required>
              </div>
              <div class="col-md-4 form-group">
                <label>religion *</label>
                <select name="religion" class="form-select"  required>
                  <option value="">Please Select Religion *</option>
                  <option value="hindu">Hindu</option>
                  <option value="islam">Islam</option>
                  <option value="christian">Christian</option>
                  <option value="budish">Budish</option>
                  <option value="other">Other</option>
                </select>
              </div>
<!-- 
              <div class="col-md-4 form-group">
                <label>class *</label>
                <select class="form-select" name="class" required>
                  <option value="">Please Select subject *</option>
                  <option value="1">Maths</option>
                  <option value="2">Science</option>
                  <option value="3">English</option>
                  <option value="4">Hindi</option>
                  <option value="5">Gujarati</option>
                  <option value="6">Social Science</option>
                  <option value="7">Computer</option>
                </select>
              </div> -->
              <div class="col-md-4 form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control">
              </div>
              <div class="col-md-4 form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control">
              </div>
              <div class="col-md-4 form-group">
                <label>E-Mail</label>
                <input type="email" name="email" class="form-control">
              </div>
              <div class="col-md-4 form-group">
                <label>Upload Student Photo *</label>
                <input type="file" name="profile_image" class="form-control" accept="image/*" required>
              </div>

              <div class="col-12 form-group mt-3">
                <button type="submit" name="submit" class="btn btn-secondary mt-3 btn-hover-danger">Save</button>
                <button type="reset" class="btn btn-secondary mt-3 btn-hover-danger">Reset</button>
                <button type="cancel" class="btn btn-secondary mt-3 btn-hover-danger">Cancel</button>
                <!-- <a href="edit_faculty.php?id=$teacher_id" class="btn btn-secondary mt-3 btn-hover-danger">Edit</a> -->

              </div>
            </div>
          </form>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->
    </div>
     <style>
    .btn-fill-lg {
      padding: 10px 25px;
      font-size: 16px;
    }
    .btn-gradient-yellow {
      background: linear-gradient(45deg, #fceabb, #f8b500);
      color: #fff;
      border: none;
    }
    .btn-hover-bluedark:hover {
      background-color: #003366 !important;
      color: #fff;
    }
    .bg-blue-dark {
      background-color: #003366;
      color: #fff;
    }
    .btn-hover-yellow:hover {
      background-color: #f8b500 !important;
      color: #fff;
    }
    .form-group {
      margin-bottom: 1.5rem;
    }
  </style>