<?php
if($_SESSION['a_id'])
{

}
else
{
  echo "<script>
	window.location='authentication-login';
	</script>";
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="./assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!--  App Topstrip -->
    <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
        <a class="d-flex justify-content-center" href="#">
          <img src="assets/images/logos/logo-wrappixel.svg" alt="" width="150">
        </a>


      </div>

      <div class="d-lg-flex align-items-center gap-2">
        <h3 class="text-white mb-2 mb-lg-0 fs-5 text-center">Saraswati Primary, Higher and Higher Secondary School </h3>
        <div class="d-flex align-items-center justify-content-center gap-2">
        </div>
        <div class="d-flex align-items-center justify-content-center gap-2">
        </div>
      </div>

    </div>
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index" class="text-nowrap logo-img">
            <img src="assets/images/logos/logo.svg" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>

        <!-- <h3 class="text-danger mb-2 mb-lg-0 fs-5 text-center">Welcome : #<?php #echo $_SESSION['a_username'];?></h3> -->

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./dashboard" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Dashboard</span>
              </a>


              <!-- ---------------------------------- -->
              <!-- Dashboard -->
              <!-- ---------------------------------- -->
              <!-- main User -->
            </li>

            <ul id="sidebar-menu" class="sidebar-nav">
                <!-- User Menu -->
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                  data-bs-toggle="collapse" data-bs-target="#userMenu"
                  aria-expanded="false" aria-controls="userMenu">
                  <div class="d-flex align-items-center gap-3">
                    <span class="d-flex"><i class="ti ti-users"></i></span>
                    <span class="hide-menu">User</span>
                  </div>
                </a>

                <ul id="userMenu" class="collapse first-level"
                  data-bs-parent="#sidebar-menu">
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="user_table">
                      <div class="d-flex align-items-center gap-3">
                        <span class="d-flex"><i class="ti ti-circle"></i></span>
                        <span class="hide-menu">All User</span>
                      </div>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="userform">
                      <div class="d-flex align-items-center gap-3">
                        <span class="d-flex"><i class="ti ti-circle "></i></span>
                        <span class="hide-menu">Add User</span>
                       </div>
                   </a>
                  </li>
                </ul>
              </li>
                


              <!-- Faculty Menu -->
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                  data-bs-toggle="collapse" data-bs-target="#facultyMenu"
                  aria-expanded="false" aria-controls="studentMenu">
                  <div class="d-flex align-items-center gap-3">
                    <span class="d-flex"><i class="ti ti-school"></i></span>
                    <span class="hide-menu">Faculty</span>
                  </div>
                </a>

                <ul id="facultyMenu" class="collapse first-level"
                  data-bs-parent="#sidebar-menu">
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="faculty_table">
                      <div class="d-flex align-items-center gap-3">
                        <span class="d-flex"><i class="ti ti-circle"></i></span>
                        <span class="hide-menu">All Faculty</span>
                      </div>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="facultyform">
                      <div class="d-flex align-items-center gap-3">
                        <span class="d-flex"><i class="ti ti-circle "></i></span>
                        <span class="hide-menu">Add Faculty</span>
                       </div>
                   </a>
                  </li>
                </ul>
              </li>
                
              <!-- Student Menu -->
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                  data-bs-toggle="collapse" data-bs-target="#studentMenu"
                  aria-expanded="false" aria-controls="studentMenu">
                  <div class="d-flex align-items-center gap-3">
                    <span class="d-flex"><i class="ti ti-school"></i></span>
                    <span class="hide-menu">Student</span>
                  </div>
                </a>

                <ul id="studentMenu" class="collapse first-level"
                  data-bs-parent="#sidebar-menu">
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="student_table">
                      <div class="d-flex align-items-center gap-3">
                        <span class="d-flex"><i class="ti ti-circle"></i></span>
                        <span class="hide-menu">All Student</span>
                      </div>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="studentform">
                      <div class="d-flex align-items-center gap-3">
                        <span class="d-flex"><i class="ti ti-circle "></i></span>
                        <span class="hide-menu">Add student</span>
                       </div>
                   </a>
                  </li>
                </ul>
              </li>
              
              <!-- Example: Another Menu -->
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                  data-bs-toggle="collapse" data-bs-target="#classMenu"
                  aria-expanded="false" aria-controls="classMenu">
                  <div class="d-flex align-items-center gap-3">
                    <span class="d-flex"><i class="ti ti-tools"></i></span>
                    <span class="hide-menu">Class</span>
                  </div>
                </a>

                <ul id="classMenu" class="collapse first-level"
                  data-bs-parent="#sidebar-menu">
                  <li class="sidebar-item"><a class="sidebar-link" href="class_list">
                      <div class="d-flex align-items-center gap-3">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                          <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">All Class</span>
                      </div>
                    </a></li>
                </ul>
              </li>
            </ul>

            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between"
                href="subjecttable" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-book"></i>
                  </span>
                  <span class="hide-menu">Subject</span>
                </div>
              </a>
            </li>
            <!-- attendance -->

            <li class="sidebar-item">
                <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                  data-bs-toggle="collapse" data-bs-target="#attendanceMenu"
                  aria-expanded="false" aria-controls="attendanceMenu">
                  <div class="d-flex align-items-center gap-3">
                    <span class="d-flex"><i class="ti ti-pencil-plus"></i></span>
                    <span class="hide-menu">Attendance</span>
                  </div>
                </a>

                <ul id="attendanceMenu" class="collapse first-level"
                  data-bs-parent="#sidebar-menu">
                  <li class="sidebar-item"><a class="sidebar-link" href="mark_attend">
                      <div class="d-flex align-items-center gap-3">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                          <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Mark Attendance</span>
                      </div>
                    </a>
                  </li>
                  <li class="sidebar-item"><a class="sidebar-link" href="student_attendance_summary">
                      <div class="d-flex align-items-center gap-3">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                          <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Student Attendance</span>
                      </div>
                    </a>
                  </li>
                  <li class="sidebar-item"><a class="sidebar-link" href="class_attendance_summary">
                      <div class="d-flex align-items-center gap-3">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                          <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Class Attendance </span>
                      </div>
                    </a></li>
                </ul>
              </li>

            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between"
                href="#" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-clipboard-list"></i>
                  </span>
                  <span class="hide-menu">Result</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between"
                href="calendar" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-calendar"></i>
                  </span>
                  <span class="hide-menu">Calendar</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between"
                href="#"
                aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-user-circle"></i>
                  </span>
                  <span class="hide-menu">User Profile</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between"
                href="#" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-message-dots"></i>
                  </span>
                  <span class="hide-menu">Message</span>
                </div>
              </a>
            </li>

            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Auth</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="authentication-login" aria-expanded="false">
                <i class="ti ti-login"></i>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
            <!-- <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-register.php" aria-expanded="false">
                <i class="ti ti-user-plus"></i>
                <span class="hide-menu">Register</span>
              </a>
            </li> -->
            <!-- <li class="sidebar-item">
              <a class="sidebar-link justify-content-between"  
                href="#"
                aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-alert-circle"></i>
                  </span>
                  <span class="hide-menu">Error</span>
                </div>
                
              </a>
            </li> -->
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link " href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ti ti-bell"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                <div class="message-body">
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 1
                  </a>
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 2
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <h1 class="text-primary mb-2 mb-lg-0 fs-5 text-center">Welcome : <?php echo $_SESSION['a_name'];?></h1>

            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="./assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->