<!-- ColorSelector:Writeaprogramtodisplaythenameofacolorbasedonuserinput(red,green,blue). -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
   <form method="post">
    <h1>Enter your choice:</h1>
    Enter color between (red,blue,green)
    <input type="text" name="color" ><br>
    
    <input type="submit" name="submit">
   </form> 
 <?php
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $color=$_POST['color'];

        switch($color){
            case "red":
                echo "It is a red color";
                break;
            
            case "blue":
                echo "It is a blue color";
                break;

            case "green":
                echo "It is a green color";
                break;

            default:
                echo "No color is selected";
                break;
        }
    }
 ?>
 </body>
 </html>