<?php
        // index array

        // $fruit=['mango','papaya','orange','kivi'];

        // for($i=0;$i<count($fruit);$i++)
        // {
        //         echo "<h1>".$fruit[$i]."</h1>";
        //         echo "<h1>".$i ."</h1>"."<br>";
        // }

        // associative array

        $user=[
            "Name" => "Nisha",
            "Age" => 20,
            "city" => "Ahm",
            "state" => "Gujarat"
        ];

        foreach($user as $key => $value){
            echo $key. " => " .$value ."<br>";
        }
        //second way to print using foreach
        foreach($user as $key => $value):
            echo $key. " => " .$value ."<br>";
        endforeach;
?>