<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            text-align: center;
            width: 350px;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        input[type="date"], input[type="submit"] {
            padding: 10px;
            width: 90%;
            margin: 10px 0;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        h3 {
            margin-top: 20px;
            color: #444;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Age Calculator</h1>
        <form method="post">
            <label>Enter your Date of Birth:</label><br>
            <input type="date" name="dob" required><br>
            <input type="submit" name="submit" value="Calculate Age">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $dob = $_POST['dob'];
            $dobDate = new DateTime($dob); 
            $todaydate = new DateTime();

            $age = $todaydate->diff($dobDate);
            echo "<h3>Your age is: " . $age->y . " years, " . $age->m . " months, and " . $age->d . " days.</h3>";
             echo $age->h . " hours, ";
            echo $age->i . " minutes, ";
            echo $age->s . " seconds.";
        }
        ?>
    </div>
</body>
</html>
