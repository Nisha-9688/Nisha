<?php
        session_start();

?>
<html>
    <body>
        <form method="post">
            Enter name <input type="text" name="username" >
            <input type="submit" name="submit" value="Enter">
            <input type="submit" name="delete" value="delete">
        </form>
    </body>
</html>
<?php
        if(isset($_POST['submit']))
        {
            // $uname=$_POST['username'];
            $_SESSION['username']=$_POST['username'];

            //access data
            if(isset($_SESSION["username"]))
            {
                echo "welcome &nbsp;".$_SESSION['username']."<br>";
            }
            else{
                echo "session is not generated";
            }
        }
        if(isset($_POST['delete']))
        {
            if(!isset($_SESSION["username"]))
            {
                echo "session is not generated and cannot be deleted";
            }
            else{
                session_unset();
                session_destroy();
                echo "session is deleted";
            }
        }

?>