<?php
include_once('model.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

class control extends model
{
    function __construct(){
        model ::__construct();
        $url=$_SERVER['PATH_INFO'] ?? '/';     /*http://localhost/nisha/project/School_Management_System/Admin%20panel/i*/

        session_start();

    switch ($url) {

          case '/dashboard':
            $studentcount = $this->getcount('students');
            $teachercount=$this->getcount('teachers');

            $genderCounts = $this->getStudentGenderCount();
            $maleCount = $genderCounts['male'];
            $femaleCount = $genderCounts['female'];

            include('index.php');
            break;

        case '/authentication-login':
            if(isset($_REQUEST['submit']))
            {
                $email=$_REQUEST['email1'];
                $password=$_REQUEST['password'];
                $md_password=md5($password);
                $a_name="admin";

                // ✅ First check if any admin record exists
                 $checkAdmin = $this->select('admin');   // Select all admins
                 if (count($checkAdmin) == 0) {
                    // ⚠️ If NO admin exists, insert the first admin
                   $data = array("a_name"  => $a_name,"email"=> $email,"password"=> $md_password);
                    $this->insert('admin', $data);
                 }
                //now check login
                $where=array("a_name"=>$a_name,"email"=>$email,"password"=>$md_password);
                $run=$this->select_where('admin',$where);
                $ans=$run->num_rows;          //check row wise condition
                if($ans==1)
                {
                    $fetch=$run->fetch_object();

                    $_SESSION['a_id']=$fetch->a_id;
                    $_SESSION['a_name']=$fetch->a_name;
                    $_SESSION['email']=$fetch->email;
                     echo "
                        <div class='container mt-4'>
                            <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                            🎉 <strong>Login Success!</strong> Redirecting to dashboard...
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                        <script>
                        setTimeout(function(){
                        window.location='dashboard';
                        }, 500);
                        </script>";
                }
                else
                {
                       echo "
                        <div class='container mt-4'>
                            <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                            ❌ <strong>Login Failed!</strong> Invalid username or password. 
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                        <script>
                        setTimeout(function(){
                        window.location='authentication-login';
                        }, 500);
                        </script>";
                }

            }
            include('authentication-login.php');
            break;

        case '/logout':
            unset($_SESSION['a_id']);
            unset($_SESSION['a_name']);
            unset($_SESSION['email']);

                // echo "<script>
                // alert('you are Loged out');
                // window.location='authentication-login';
                // </script>";

                echo "
                        <div class='container mt-4'>
                            <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                            ❌ <strong>Login Failed!</strong> Loged out 
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                        <script>
                        setTimeout(function(){
                        window.location='authentication-login';
                        }, 500);
                        </script>";
            break;

        case '/user_table':
            $user=$this->select('user');
            include('user_table.php');
            break;

        case '/edit_user':
            include('edit_user.php');
            break;

        case '/subjectform':
            $classData=$this->select('classes');
            include('subjectform.php');
            break;

        case '/userform':
            if(isset($_REQUEST['submit']))
            {
                $username=$_REQUEST['username'];
                $password=$_REQUEST['password'];
                $role=$_REQUEST['role'];
                $md_password=md5($password);

                $arr=array('email'=>$username,'password'=>$md_password,'role'=>$role);

                 // ✅ Add student_id or teacher_id if selected
                if ($role == "Student" && !empty($_REQUEST['student_id'])) {
                    $arr['student_id'] = $_REQUEST['student_id'];
                } 
                elseif ($role == "Teacher" && !empty($_REQUEST['teacher_id'])) {
                    $arr['teacher_id'] = $_REQUEST['teacher_id'];
                }

                $res=$this->insert('user',$arr);
                
                    if($res)
                    {
                         echo "<div class='alert alert-success'>User added successfully!</div>";
                         echo "<script> window.location='user_table'; </script>";
                      
                    }
                    else
                    {
                        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                    }
            }
            include('userform.php');
            break;
        
        case '/subjecttable':
            include('subjecttable.php');
            break;

        case '/mark_attend';
            include('mark_attend.php');
            break;

        case '/student_attendance_summary':
            include('student_attendance_summary.php');
            break;

        case '/class_attendance_summary':
            include('class_attendance_summary.php');
            break;

        case '/':
            include('');    //result page
            break;

        case '/calendar':
            include('calendar.php');
            break;

        case '/':
            include('');    //profile page
            break;

        case '/':
            include('');    //message page
            break;

        case '/student_table':
            $list=$this->select('student');
            include('student_table.php');
            break;
        
        case '/faculty_table':
             $list1=$this->select('teachers');
            include('faculty_table.php');
            break;

        case '/class_list':
            $list2=$this->select('class_list');
            include('class_list.php');
            break;
        
        case '/studentform':
            if(isset($_REQUEST['submit']))
            {
                $roll_no=$_REQUEST['roll_no'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $father_name = $_POST['father_name'];
                $mother_name = $_POST['mother_name'];
                $gender = $_POST['gender'];
                $dob = $_POST['dob'];
                $dobplace = $_POST['dobplace'];
                $religion = $_POST['religion'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $admission_date = $_POST['admission_date'];
                $class_id = $_POST['class_id'];
                $section = $_POST['section'];
                $last_schoolname = $_POST['last_schoolname'];
                $school_type_id = $_POST['school_type_id'];
                $profile_image=$_FILES['profile_image']['name'];

                    // Handle file upload             
                    $photoName  = "";
                    if (!empty($_FILES['profile_image']['name'])) {
                        $targetDir = "assets/images/upload/students/";
                        if (!file_exists($targetDir)) {
                            mkdir($targetDir, 0777, true); // create folder if not exists
                        }
                        $photoName = time() . "_" . basename($_FILES['profile_image']['name']);
                        $targetFile = $targetDir . $photoName;

                        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile)) {
                             echo "<div class='alert alert-danger'>Success: file uploaded</div>";
                        }
                        else{
                            echo "<div class='alert alert-danger'>Failed to upload image.</div>";
                        }
                    }

                    $arr=array("roll_no"=>$roll_no,"first_name"=>$first_name,"last_name"=>$last_name,"father_name"=>$father_name,"mother_name"=>$mother_name,"gender"=>$gender,"dob"=>$dob,"place_of_birth"=>$dobplace,"religion"=>$religion,"address"=>$address,"phone"=>$phone,"email"=>$email,"admission_date"=>$admission_date,"class_id"=>$class_id,"last_schoolname"=>$last_schoolname,"school_type_id"=>$school_type_id,"profile_image"=>$photoName  );
                    
                    $res=$this->insert('students',$arr);
                    
                    if($res)
                    {
                         echo "<div class='alert alert-success'>Student added successfully!</div>";
                         echo "<script> window.location='student_table'; </script>";
                      
                    }
                    else
                    {
                        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                    }

            }
            include('studentform.php');
            break;

        case '/facultyform':
            if(isset($_POST['submit']))
            {
                $fname=$_POST['fname'];
                $lname=$_POST['lname'];
                $gender=$_POST['gender'];
                $dob=$_POST['dob'];
                $doj=$_POST['doj'];
                $religion=$_POST['religion']; 
                $address=$_POST['address'];
                $phone=$_POST['phone'];
                $email=$_POST['email'];
                $profile_image=$_FILES['profile_image']['name'];
            
                //file handel
                $photoName="";
                if(!empty($_FILES['profile_image']['name']))
                {
                    $targetDir="assets/images/upload/faculty/";
                    if(!file_exists($targetDir))
                    {
                        mkdir($targetDir,0777,true);
                    }
                    $photoName = time() . "_" . basename($_FILES['profile_image']['name']);
                    $targetFile = $targetDir . $photoName;

                    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile)) 
                    {
                     $alertMessage = "<div class='alert alert-success text-center'>✅ Image uploaded successfully.</div>";

                    }

                    else{
                $alertMessage = "<div class='alert alert-danger text-center'>❌ Failed to upload image.</div>";
                    }

                }

                $arr=array("fname"=>$fname,"lname"=>$lname,"gender"=>$gender,"dob"=>$dob,"doj"=>$doj,"religion"=>$religion,"address"=>$address,"phone"=>$phone,"email"=>$email,"profile_image"=>$photoName);

                $res=$this->insert('teachers',$arr);
                
                  if($res)
                    {
                        //  echo $res;
                         $alertMessage = "<div class='alert alert-success text-center'>🎉 Faculty added successfully!</div>";
                         echo "<script> window.location='faculty_table'; </script>";
                      
                    }
                    else{
                     $alertMessage = "<div class='alert alert-danger text-center'>❌ Failed to insert data.</div>";

                    }
            }
            include('facultyform.php');
            break;

        case '/edit_faculty':
            include('edit_faculty.php');
            break;

        case '/delete_faculty':
            include('delete_faculty.php');
            break;

        case '/faculty_detail':
            include('faculty_detail.php');
            break;
                
        case '/edit_student':
            include('edit_student.php');
            break;

        case '/delete_student':
            include('delete_student.php');
            break;

        case '/student_detail':
            include('student_detail.php');
            break;
        
        case '/edit_class':
            include('edit_class.php');
            break;

        case '/delete':
            if(isset($_REQUEST['dlt_user']))
            {
                $user_id=$_REQUEST['dlt_user'];
                $where=array("user_id"=>$user_id);

                $res=$this->delete_where('users',$where);
               if($res)
               {
                  $alertMessage = "<div class='alert alert-success text-center'>🎉 User deleted successfully!</div>";
                         echo "<script> window.location='user_table'; </script>";
                      
                }
                else{
                     $alertMessage = "<div class='alert alert-danger text-center'>❌ User does not deleted.</div>";

                    }
            }

            //deleting faculty
            if(isset($_REQUEST['dlt_faculty']))
            {
                $id=$_REQUEST['dlt_faculty'];
                $where=array("teacher_id"=>$id);

                $run=$this->select_where('teachers',$where);
                $fetch=$run->fetch_object();

                if($fetch)
                {
                    $del_image=$fetch->profile_image;

                }
                   $this->delete_where('class_teacher', $where);
                $res=$this->delete_where('teachers',$where);
                if($res)
                {
                    unlink('../assets/images/upload/faculty/'.$del_image);
                    echo "<script> 
                        alert('Faculty Delete successfully');
                        window.location='faculty_table';
                    </script>";
                }
                else{
                    echo "error";
                }

            }

            // deleting student
            if(isset($_REQUEST['dlt_student']))
            {
                $id=$_REQUEST['dlt_student'];
                $where=array('student'=>$student_id);

                $run=$this->select_where('students',$where);
                $fetch=$run->fetch_object();
                
            }
        default:
            echo "not found";
            break;
    }

    }
    
}


$obj=new control();
?>