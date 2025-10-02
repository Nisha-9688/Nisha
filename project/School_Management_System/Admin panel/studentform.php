<?php
include_once("header.php");


?>
<div class="body-wrapper-inner">
  <div class="container-fluid">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12">
          <div class="card shadow">
            <div class="card-body">
              <button type="button" class="btn btn-primary me-2 mb-3" onclick="window.history.back()">← Back</button>
              <div class="mb-4 d-flex align-items-center">
                <h3 class="mb-0">Add New Student</h3>
              </div>
              <form class="new-added-form" method="post" enctype="multipart/form-data">
            <div class=" row">
                <div class="col-md-3 form-group">
                  <label>Roll no *</label>
                  <input type="number" name="roll_no" class="form-control" required>
                </div>

                <div class="col-md-4 form-group">
                  <label>School Type *</label>
                  <select name="school_type_id" class="form-select" required>
                    <option value="">Please Select School Type</option>
                    <option value="1">Primary</option>
                    <option value="2">Secondary</option>
                    <option value="3">Higher Secondary</option>
                    <!-- Add more options as per your school_type table -->
                  </select>
                </div>
                <!-- Clear to new row -->
                <div class="w-100"></div>

                <div class="col-md-3 form-group">
                  <label>First Name *</label>
                  <input type="text" class="form-control" name="first_name" required>
                </div>
                <div class="col-md-3 form-group">
                  <label>Last Name *</label>
                  <input type="text" class="form-control" name="last_name" required>
                </div>
                <div class="col-md-3 form-group">
                  <label>Father Name *</label>
                  <input type="text" class="form-control" name="father_name"required>
                </div>
                <div class="col-md-3 form-group">
                  <label>Mother Name *</label>
                  <input type="text" class="form-control" name="mother_name" required>
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
                  <label>Place of Birth *</label>
                  <div class="input-group">
                    <input name="dobplace" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-3 form-group">
                  <label>Date Of Birth *</label>
                  <div class="input-group">
                    <input type="date" name="dob" class="form-control" required>
                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                  </div>
                </div>
                <div class="col-md-3 form-group">
                  <label>Religion *</label>
                  <select name="religion" class="form-select" required>
                    <option value="">Please Select Religion *</option>
                    <option value="hindu">Hindu</option>
                    <option value="islam">Islam</option>
                    <option value="christian">Christian</option>
                    <option value="budish">Budish</option>
                    <option value="other">Other</option>
                  </select>
                </div>
                <div class="col-md-4 form-group">
                  <label>Address</label>
                  <input type="text" name="address" class="form-control">
                </div>
                <div class="col-md-4 form-group">
                  <label>School Admission Date *</label>
                  <div class="input-group">
                    <input type="date" name="admission_date" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-4 form-group">
                  <label>Last School Name*</label>
                  <div class="input-group">
                    <input type="text" name="last_schoolname" class="form-control" required>
                  </div>
                </div>
                <!-- Clear to new row -->
                <div class="w-100"></div>
                <div class="col-md-4 form-group">
                  <label>Class *</label>
                  <select name="class_id" class="form-select" required>
                    <option value="">Please Select Class *</option>
                    <option value="1">Play</option>
                    <option value="2">1st</option>
                    <option value="3">2nd</option>
                    <option value="4">3rd</option>
                    <option value="5">4th</option>
                    <option value="6">5th</option>
                    <option value="7">6th</option>
                  </select>
                </div>
                <div class="col-md-4 form-group">
                  <label></label>
                  <select name="section" class="form-select" required>
                    <option value="">Please Select Section *</option>
                    <option value="1">A</option>
                    <option value="2">B</option> 
                  </select>
                </div>
                <div class="col-md-6 form-group">
                  <label>Phone</label>
                  <input type="text" name="phone" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                  <label>E-Mail</label>
                  <input type="email" name="email" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                  <label>Upload Student Photo *</label>
                  <input type="file" name="profile_image" class="form-control" accept="image/*" required>
                </div>
                <div class="col-12 form-group mt-3">
                  <button type="submit" name="submit" class="btn btn-secondary mt-3 btn-hover-danger">Save</button>
                  <button type="reset" class="btn btn-secondary mt-3 btn-hover-danger">Reset</button>
                  <button type="cancel" class="btn btn-secondary mt-3 btn-hover-danger">Cancel</button>
                  <a href="edit_student?id=roll_no" class="btn btn-secondary mt-3 btn-hover-danger">Edit</a>
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