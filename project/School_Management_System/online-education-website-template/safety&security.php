<?php
include_once("header.php");
?>

        <!-- Header Start -->
    <div class="jumbotron position-relative overlay-bottom" style="margin-bottom: 80px; height:800px; background:url('img/security_banner.jpg')">
        <!-- <div class="jumbotron page-header" style="background: url('img/eader.jpg')"> -->

        <div class="container text-center py-5">
            <h1 class="text-white display-1" style="margin-top:200px;">Safety and Security</h1>

        </div>
    </div>
    <!-- Header End -->

<div class="container my-5">
    <h2 class="text-center mb-5">🏫 School Safety</h2>
    <div class="row">
      <!-- Emergency Alerts -->
      <div class="col-md-6">
        <div class="card p-5" style="height:auto;">
          <div class="d-flex align-items-center mb-2">
            <i class="bi bi-exclamation-triangle-fill text-warning card-icon me-2"></i>
            <span class="card-title">Emergency Alerts</span>
          </div>
          <div class="card-body p-0">
            <p>For reasons purely beyond our control, emergency alerts sent from the school through SMS do not reach parents at times. All such emergency announcements are uploaded on the school website as a matter of course and sent as ‘Notifications’ on the school portal.</p>
            <p>In case of unforeseen weather conditions, last-minute announcements from the government/administration, or any other unpredictable contingency, parents may kindly visit the school website and check on the ‘Alerts’ link on the Home page</p>
          </div>
        </div>
      </div>

      <!-- Emergency Closing -->
      <div class="col-md-6">
        <div class="card p-5" style="height:auto;">
          <div class="d-flex align-items-center mb-2">
            <i class="bi bi-shield-lock-fill text-danger card-icon me-2"></i>
            <span class="card-title">Emergency Closing</span>
          </div>
          <div class="card-body p-0">
            <ul>
              <li>Keep child at home during disturbances.</li>
              <li>Children remain on campus if emergency occurs.</li>
              <li>Pick-up only with valid ID.</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Building Security -->
      <div class="col-md-6">
        <div class="card p-5" style="height:20rem;">
          <div class="d-flex align-items-center mb-2">
            <i class="bi bi-person-bounding-box text-primary card-icon me-2"></i>
            <span class="card-title">Building Security</span>
          </div>
          <div class="card-body p-0">
            <p>Trained guards from certified agencies are stationed at key points on the school premises at all times.</p>
          </div>
        </div>
      </div>

      <!-- Fire Drill -->
      <div class="col-md-6">
        <div class="card p-5" style="height:20rem;">
          <div class="d-flex align-items-center mb-2">
            <i class="bi bi-fire text-secondary card-icon me-2"></i>
            <span class="card-title">Fire Drill</span>
          </div>
          <div class="card-body p-0">
            <ul>
              <li>Regular fire drills are conducted.</li>
              <li>Exit charts are displayed on all floors.</li>
            </ul>
          </div>
        </div>
      </div>

    </div>
</div>
   <style>
    /* Card Styles */
    .card {
      background-color: #ffffff;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      margin-bottom: 20px;
    }

    .card:hover {
      box-shadow: 0 4px 20px rgba(55, 124, 173, 0.6);
      transform: translateY(-5px);
      cursor: pointer;
    }

    /* Icon Zoom on Hover */
    .card-icon {
      font-size: 32px;
      transition: transform 0.3s ease;
    }

    .card:hover .card-icon {
      transform: scale(1.5);
    }

    .card-body p,
    .card-body ul {
      margin-bottom: 0;
    }

    .card-title {
      font-size: 1.25rem;
      font-weight: bold;
    }
  </style>


<?php
include_once("footer.php");
?>