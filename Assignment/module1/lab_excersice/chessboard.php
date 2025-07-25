 <!-- Chessboard Pattern:Use a nested loop to create a chess board pattern(8x8grid) -->
<html> 
<head>
    <title>Chessboard pattern</title>
    <style>
        td {
            width: 50px;
            height: 50px;
        }
        .white{
            background-color:white;
        }
        .black{
            background-color: black;
        }
    </style>
</head>
<body>
    <table border="1px"  align="center">
          <?php
            for($r=1;$r<=8;$r++)
            {
                echo "<tr>";
                for($c=1;$c<=8;$c++)
                {
                    $total=$r+$c;
                    if($total%2 == 0)
                    echo "<td class='white'> </td>";
                    else
                        echo "<td class='black'> </td>";
                }
                echo "<br>";
            }
    ?>
    </table>
</body>    
</html>