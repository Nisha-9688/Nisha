 <!-- 1. Display the value of an array. -->
<?php
   // array using index array
   $material=array("school bag","pencil","pen","lunch box");

    echo "<h1>".$material[1]."</h1>";
    for($i=0;$i<count($material);$i++)
    {
        echo $material[$i]."<br>";
    }
    echo "<pre>";
    print_r($material);
    echo "</pre>";

    //array using associative array
    $student=array(
	    "rollno" => 1,
    	"name" =>"nisha",
    	"course" =>"PHP"
    ) ;
    foreach($student as $data=>$value){
        echo $data." => ".$value."<br>";
    }

    //mu;tidimensional array
    $marks = array(
     array("Math" => 85, "Science" => 90),
     array("Math" => 78, "Science" => 88)
    );
    // echo $marks["John"]["Math"];
    foreach($marks as $mark)
    {
        // print_r($marks[$i]);
        foreach($mark as $key=>$value){
            echo "<h1>".$key." is ". $value."</h1>"."<br>";
        }
    }

?>