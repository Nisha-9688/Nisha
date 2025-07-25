 <!-- 2. Find and display the number of odd and even elements in an array. -->

<html>
<head>
    <title>Odd and even number</title>
</head>
<body>
    <form method="post">
        <br>
        &nbsp;<input type="text" name="number" placeholder="Enter random num eg 5,6,9"><br>
         &nbsp;<input type="submit" name="submit" value="submit" >
    </form>
</body>
</html>

<?php

 if(isset($_POST['submit']))
 {
    $num=$_POST['number'];

    //converting string to array
    $numarr=explode(",",$num);
    $even=0;
    $odd=0;

    foreach($numarr as $num){
    if($num % 2==0)
    {
        echo "$num is Even<br>";
        $even++;
    }
    else{
        echo "$num is Odd<br>";
        $odd++;
    }
}
//display the result
echo "Total even number:>".$even."<br>";
echo "Total odd number:>".$odd;

 }
/*$numbers=[2,5,34,65,33,1,6];
$even=0;
$odd=0;

foreach($numbers as $num){
    if($num % 2==0)
    {
        echo "$num is Even<br>";
        $even++;
    }
    else{
        echo "$num is Odd<br>";
        $odd++;
    }
}
//display the result
echo "Total even number:>".$even."<br>";
echo "Total odd number:>".$odd;*/
?>