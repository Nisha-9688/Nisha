<html>
    <head></head>
    <body>
        <form action="" method="post">
    Username :<input type="text" name="user" ><br><br>
    <input type="submit" name="create" value="Create"><br><br>
    <input type="submit" name="display" value="Display"><br><br>
    <input type="submit" name="delete" value="Delete"><br><br>
    </form>
    </body>
</html>

<?php
    // if(isset($_POST['submit'])){
        
    //     if($_POST['create']=="Create")
    //     {
    //         $val=$_POST['user'];
    //         setcookie("user",$val,time()+15);
    //         echo "cookie is set";
    //     }
    //     if($_POST['display']=="Display")
    //     {
    //         if(isset($_COOKIE['user']))
    //         echo "Cookie :> ".$_COOKIE['user'];
    //         else
    //             echo "there is no cookie is created";
    //     }
    //     if($_POST['delete']=="Delete")
    //     {
    //         if(isset($_COOKIE['user'])){
    //             setcookie('user',"",time()-15); 
    //         }
    //     }
    // }

     if(isset($_POST['create']))
        {
            $val=$_POST['user'];
            setcookie("user",$val,time()+15);
            echo "cookie is set";
        }
        if(isset($_POST['display']))
        {
            if(isset($_COOKIE['user']))
            echo "Cookie :> ".$_COOKIE['user'];
            else
                echo "there is no cookie is created";
        }
        if(isset($_POST['delete']))
        {
            if(isset($_COOKIE['user'])){
                setcookie('user',"",time()-15); 
            }
        }
?>