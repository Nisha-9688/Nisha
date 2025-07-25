<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        header("Location: if_conditions.php");
        exit();
    }

    if (isset($_POST['refresh'])) {
        header("Refresh: 5; URL=for_loop.php");
        echo "You will be redirected to 'for_loop.php' in 5 seconds...";
        exit();
    }
    if (isset($_POST['download'])) {
        header('Content-type:application/octect-stream'); // we will be outputing a pdf and octect-stream for any file download
        header('Content-Disposition:attachment;filename="nisha.pdf"'); // we will called downlod pdf
        readfile('multipliaction.php'); // download lower side in loading it must readfile full path/rename of original file     
        exit();
    }
}
?>
<html>
    <head>
        <title>header function</title>
    </head>
    <body>
             <form method="post">
             <input type="submit" name="submit" value="Location">
              <input type="submit" name="refresh" value="Refresh after 5 seconds">
                <input type="submit" name="refresh" value="download">
              
             </form> 
    </body>
</html>
