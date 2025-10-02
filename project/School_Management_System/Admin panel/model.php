<?php
class model
{
    public $conn="";
    function __construct()
    {
        $this->conn=new mysqli('localhost','root','','school_management_system');
    }
    function select($tbl)
    {
        $arr=[];
            // Student 
            if($tbl=="student")
            {
                $sel="SELECT s.student_id,s.roll_no, s.profile_image, s.first_name, s.last_name, s.father_name,s.mother_name, s.gender, s.place_of_birth, s.dob, s.religion, s.address, s.phone, s.email, s.admission_date,s.last_schoolname,c.class_name, c.section FROM students s LEFT JOIN classes c ON s.class_id = c.class_id";

            }
            elseif($tbl=="teachers")
            {
                $sel="SELECT teacher_id,profile_image,fname,lname,gender,dob,doj,religion,address,phone,email FROM teachers";

            }
            elseif($tbl=="class_list"){
                $sel="SELECT c.class_id,c.class_name,c.section,s.school_type_name from classes c LEFT JOIN school_type s ON c.school_type_id=s.school_type_id";
            }
            elseif($tbl=="user"){
                $sel="
                SELECT u.u_id, u.email,u.password,u.role,
                CONCAT(s.first_name, ' ', s.last_name) AS student_name,
                CONCAT(t.fname, ' ', t.lname) AS teacher_name FROM user u
                LEFT JOIN students s ON u.student_id = s.student_id
                LEFT JOIN teachers t ON u.teacher_id = t.teacher_id";
            }
            elseif($tbl=="admin"){
                $sel="SELECT * from admin";
            }
            elseif($tbl=="classes"){
                $sel="SELECT * from classes";
            }
            else{
                 return []; // invalid table name
            }

            $run=$this->conn->query($sel);
            if($run){
                while($fetch=$run->fetch_object()){
                   $arr[]=$fetch;
                }
            }
            
        return $arr;
    }
    function insert($tbl, $arr)
    {

        // $arr=array("roll_no"=>$roll_no,"first_name"=>$first_name,"last_name"=>$last_name,"father_name"=>$father_name,"mother_name"=>$mother_name,"gender"=>$gender,"dob"=>$dob,"dobplace"=>$dobplace,"religion"=>$religion,"address"=>$address,"phone"=>$phone,"email"=>$email,"admission_date"=>$admission_date,"class_id"=>$class_id,"section"=>$section,"last_schoolname"=>$last_schoolname,"school_type_id"=>$school_type_id,"student_photo"=>$student_photo);

        $array_key=array_keys($arr);
        $col=implode(",",$array_key);

        $array_value=array_values($arr);
        $values=implode("','",$array_value);

        $ins="insert into $tbl ($col) values ('$values')";
        //  echo "<div class='m-4 alert alert-danger m-10'>".$ins."</div>";// to show error
        $run=$this->conn->query($ins); 
        return $run;

    }

    function select_where($tbl,$where)
    {
        $sel="select * from $tbl where 1=1";    //1=1 means query continue

        $array_key=array_keys($where);
        $array_value=array_values($where);
        $i=0;
        foreach($where as $w)
        {
            $sel.=" and $array_key[$i]='$array_value[$i]'";
            $i++;
        }
        $run=$this->conn->query($sel);  //query run on db

        /*  Login
        $ans=$run->num_rows();
        */

        /* data fetch for multiple user
        while($fetch=$run->fetch_object())
        {
            $arr[]=$fetch;
        }*/

        return $run;
    }
    function delete_where($tbl,$where)
    {
        $del="DELETE from $tbl where 1=1";  //1=1 meqns query continue
        
        $array_key=array_keys($where);
        $array_value=array_values($where);
        $i=0;
        foreach($where as $w)
        {
            $del.=" and $array_key[$i]='$array_value[$i]'";
            $i++;
        }
        $run=$this->conn->query($del);  //query run on db
        return $run;
    }
    function update()
    {

    }
    function getcount($tbl)
    {
        $sql="SELECT COUNT(*) AS total FROM $tbl";
        $res=$this->conn->query($sql);
        $row=$res->fetch_assoc();
        return $row['total'];
    }
     // Get student count by gender
    function getStudentGenderCount()
    {
        $male = 0;
        $female = 0;
        $sql = "SELECT gender, COUNT(*) as cnt FROM students GROUP BY gender";
        $res = $this->conn->query($sql);
        while ($row = $res->fetch_assoc()) {
            if (strtolower($row['gender']) == "male") {
                $male = $row['cnt'];
            } elseif (strtolower($row['gender']) == "female") {
                $female = $row['cnt'];
            }
        }
        return ["male" => $male, "female" => $female];
    }
}
$obj=new model();

?>