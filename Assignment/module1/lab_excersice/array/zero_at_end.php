 <!-- Write a script to shift all zero values to the bottom of an array -->
  <?php
    $input=[0,7,0,10,45,0,5,0];
    $zero=[];
    $nonzero=[];

    foreach($input as $arr)
    {
        if($arr == 0)
        {
            $zero[]=$arr;
        }
        else{
            $nonzero[]=$arr;
        }
    }

    $result=array_merge($nonzero, $zero);
    echo "<pre>";
    print_r($result);
    echo "</pre>";
  ?>