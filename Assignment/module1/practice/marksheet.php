<html>

<head>
    <title>Marksheet</title>
</head>
<style>
    body{
        margin: 25px;
    }
    table {
        /* margin-top: 20px; */
        border-style:ridge;
        /* border-collapse: collapse; */
    }
    th{
        width:100px;
    }
     input[type="number"] {
      width: 100px;
    }
</style>

<body align="center">
    <form method="post">
      
            &nbsp;&nbsp;Name
            <input type="text" name="name">  <br>  <br>
            
                    <table border="1" align="center" cellpadding="10px" cellspacing="0px">
                        <tr>
                            <th>Subject</th>
                            <th>Marks out of 100</th>
                        </tr>
                        <tr>
                            <td>Maths</td>
                            <td><input type="number" name="maths" min="1" max="100"></td>
                        </tr>
                        <tr>
                            <td>English</td>
                            <td><input type="number" name="eng" min="1" max="100"></td>
                        </tr>
                        <tr>
                            <td>Social science</td>
                            <td><input type="number" name="ss" min="1" max="100"></td>
                        </tr>
                        <tr>
                            <td>Science</td>
                            <td><input type="number" name="sci" min="1" max="100"></td>
                        </tr>
                         <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Result"></td>
                        </tr>
                    </table>
    </form>

</body>
</html>
   <?php
            if(isset($_POST['submit']))
            {
                $math=$_POST['maths'];
                $eng=$_POST['eng'];
                $s_s=$_POST['ss'];
                $sci=$_POST['sci'];

                $total=$math+$eng+$s_s+$sci;
                echo "Total marks ".$total."<br>";

                $per=($total*100)/400;
                echo "Percentage ".$per."%"."<br>";

                if($per >90)
                    echo "Grade:- A+";
                elseif($per>80)
                     echo "Grade:- A";
                elseif($per>70)
                     echo "Grade:- B+";
                elseif($per>60)
                     echo "Grade:- B";
                elseif($per>50)
                     echo "Grade:- c+";
                elseif($per>40)
                     echo "Grade:- c";
                else
                     echo "Grade:- Fail";
            }

    ?>