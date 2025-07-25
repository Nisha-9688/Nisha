<!-- TernaryOperatorExample:Writeascriptusingtheternaryoperatortodisplayamessageiftheageisgreaterthan18. -->
 <?php
        $a=3;

        $age= ($a>18)? ("<h1>you are eligible for voting</h1>") : ("<h1>you are not eligible for voting</h1>") ;
        echo $age;
 ?>