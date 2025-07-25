<html>
    <head>
        <title>Calculator</title>
    </head>
    <body>
        <h1>Calculator</h1>
        <form method="post" >
           &nbsp Enter first value :<input type="number" name="firstno" required>&nbsp&nbsp
            Enter second value:<input type="number" name="secondno" required><br><br>
           &nbsp <input type="submit" name="add" value="Addition">
                <input type="submit" name="sub" value="Subtraction">
                <input type="submit" name="mul" value="Multiplication">
                <input type="submit" name="div" value="Division">
        </form>

        <?php
                if(isset($_POST['add']))
                {
                    // $add=$_POST['add'];
                    $a=$_POST['firstno'];
                    $b=$_POST['secondno'];
                    $sum=$a + $b;
                    echo "Addition of ". $a ." and ". $b ." is ". $sum;
                }

                 if(isset($_POST['sub']))
                {
                    // $sub=$_POST['sub'];
                    $a=$_POST['firstno'];
                    $b=$_POST['secondno'];
                    $minus=$a - $b;
                    echo "Subtraction of ". $a ." and ". $b ." is ". $minus ."<br>"; 
                }
                  if(isset($_POST['mul']))
                {
                    // $sub=$_POST['sub'];
                    $a=$_POST['firstno'];
                    $b=$_POST['secondno'];
                    $mul=$a * $b;
                    echo "Multiplication of ". $a ." and ". $b ." is ". $mul ."<br>"; 
                }
                  if(isset($_POST['div']))
                {
                    // $sub=$_POST['sub'];
                    $a=$_POST['firstno'];
                    $b=$_POST['secondno'];

                    if($b != 0)
                    {
                         $div=$a / $b;
                         echo "Subtraction of ". $a ." and ". $b ." is ". $div ."<br>";
                    }
                    else{
                        echo "Denominator should be greater than 0";
                    }
                    
                }
        ?>
    </body>
</html>