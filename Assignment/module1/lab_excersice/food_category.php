<!-- . Restaurant FoodCategory Program:Use a switchcase to display the category (Starter/MainCourse/Dessert)and dish based on user selection. -->
<html>
    <head>
        <title>Restaurant Food Category</title>
    </head>
    <body>
        <form method="post" >
            <h1>Restaurant Food Category</h1>
            <p>
                &nbsp 1. Starter<br>
                &nbsp 2. Maincourse <br>
                &nbsp 3. Dessert <br>
            </p>
            Enter your choice:>
            <input type="number" name="choice" min="1" max="3" required><br><br>
            <input type="submit" value="Show dishes">
        </form>
    </body>
</html>
<?php
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $choice=$_POST['choice'];

            switch ($choice){
                case 1: 
                    echo "<h1>Category: Starter</h1>";
                    echo "Green Kabab";
                    break;

                case 2:
                    echo "<h1>Category: MainCourse</h1>";
                    echo "Paneer Masala with Naan";
                    break;
                
                case 3:
                    echo "<h1>Category: Dessert</h1>";
                    echo "Gulab jaamun";
                    break;
                default:
                    echo "Please enter number between 1-3";
                    break;
            }
        }
?>