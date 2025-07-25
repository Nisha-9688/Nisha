 <!-- Simple Calculator : Create a calculator using if-else conditions that takes two inputs and an operator(+,-,*,/). -->
<?php
 $a=10;
$b=20;
$operator='-';

if($operator == '-')
{
    echo "Subtraction of ". $a ." - ".$b ." is ". ($a - $b). "<br>";
}
elseif ($operator == '+')
{
    echo "Addition of ". $a ." + ".$b ." is ". ($a + $b). "<br>";
}
elseif ($operator == '*')
{
    echo "Multiplication of ". $a ." * ".$b ." is ". ($a*$b). "<br>";
}
elseif ($operator == '/')
{
    if($b!=0 )
    echo "Division of ". $a ." / ".$b ." is ". ($a/$b). "<br>";

    else
    echo "Division by Zero is not allow here";
}
else{
    echo "operator does not exist";
}
?>