
<?php
session_start();
include_once('../Admin panel/model.php');

class control extends model{
    function __construct()
    {
        model::__construct();

        $url=$_SERVER['PATH_INFO'];

        switch($url)
        {
            case '/':
                include('index.php');
                break;
            
            case '/index':
                include('index.php');
                break;
            
            case '/profile':
                 if(isset($_SESSION['student_id']))
                {
                  $student_id = $_SESSION['student_id'];

                 $where = array("student_id" => $student_id);
                    $run = $this->select_where('students', $where);
                    if($run->num_rows > 0)
                    {
                        $fetch = $run->fetch_object(); // now contains all student details
                         // Fetch class name using class_id
                         $class_run = $this->select_where('classes', array("class_id" => $fetch->class_id ));
                         if($class_run->num_rows > 0)
                         {
                          $class = $class_run->fetch_object();
                             $fetch->class_name = $class->class_name; // add class_name to student object
                             $fetch->section=$class->section;
                         } 
                         else
                        {
                         $fetch->class_name = "N/A";
                         }

                        $school_type=$this->select_where('school_type',array("school_type_id"=>$fetch->school_type_id));
                        if($school_type->num_rows>0)
                        {
                            $school_type=$school_type->fetch_object();
                            $fetch -> school_type_name= $school_type -> school_type_name;
                        }
                       else
                        {
                         $fetch->school_type_name = "N/A";
                         }


                        // user detail 
                         $user_run = $this->select_where('user', array("student_id" => $student_id));
                        if($user_run -> num_rows > 0)
                        {
                        $user = $user_run->fetch_object();
                        $fetch->role = $user->role;
                        } 
                        else 
                        {
                            $fetch->role = "N/A";
                        }
                    }
                }
                    
                else{
                        echo "No student found!";
                       exit;
                    }
                    
                include('profile.php');
                break;
                
            case '/about':
                include('about.php');
                break;
            
            case '/admission':
                include('admission.php');
                break;
            
            case '/contact':
                include('contact.php');
                break;
            
            case '/course':
                include('course.php');
                break;
            
            case '/detail':
                include('detail.php');
                break;
            
            case '/feature':
                include('feature.php');
                break;
            
            case '/feedback_form':
                include('feedback_form.php');
                break;
            
            case '/forget_pw':
                include('forget_pw.php');
                break;
            case '/safety&security':
                include('safety&security.php');
                break;
            
            case '/login':
                include('login.php');
                break;
            
            case '/logout':
                session_destroy();
                unset($_SESSION['u_id']);
                unset($_SESSION['email']);

                echo "<script>
                        alert('login success');
                        window.location='login';
                        </script>";
                break;

            case '/student_login':
                if(isset($_REQUEST['submit1']))
                {
                    $email=$_POST['email']?? '';
                    $pass=$_POST['password']?? '';
                    $md_pass=md5($pass);

                    $where=array("email"=>$email,"password"=>$md_pass);
                    $run=$this->select_where('user',$where);
                    $ans=$run->num_rows;// check row wise condition
                    if($ans==1)
                    {
                        $fetch=$run->fetch_object();   //get user details
                        
                        $_SESSION['u_id']=$fetch->u_id;
                        $_SESSION['email']=$fetch->email;
                        $_SESSION['student_id'] = $fetch->student_id; // FK to student table

                        echo "<script>
                        alert('login success');
                        window.location='index';
                        </script>";
                    }
                    else{
                        	echo "<script>
							alert('Login Failed due to wrong creadential');
							window.location='login';
						    </script>";
                    }
                }
                include('student_login.php');
                break;

            case '/teacher_login':
                if(isset($_REQUEST['submit']))
                {
                    $email=$_POST['email']?? '';
                    $pass=$_POST['password']?? '';
                    $md_pass=md5($pass);

                    $where=array("email"=>$email,"password"=>$md_pass);
                    $run=$this->select_where('user',$where);
                    $ans=$run->num_rows;// check row wise condition
                    if($ans==1)
                    {
                        echo "<script>
                        alert('login success');
                        window.location='index';
                        </script>";
                    }
                    else{
                        	echo "<script>
							alert('Login Failed due to wrong creadential');
							window.location='login';
						    </script>";
                    }
                }
                include('teacher_login.php');
                break;

            case '/team':
                include('team.php');
                break;

            case '/testimonial':
                include('testimonial.php');
                break;

        }
    }
}
$obj=new control;
?>