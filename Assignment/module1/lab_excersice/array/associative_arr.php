<?php
session_start();
 session_destroy();


// Initialize user list if not set
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

// Store user data if form is submitted
if (isset($_POST['submit'])) {
    $user = [
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "age" => $_POST['age']
    ];
    $_SESSION['users'][] = $user;
}

// Reset session if reset clicked
if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
</head>
<body>
    <h2>Enter User Details</h2>
    <form method="post">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Age: <input type="number" name="age" required><br><br>
        <input type="submit" name="submit" value="Submit">
        <input type="submit" name="reset" value="Reset All">
    </form>

    <?php
    if (!empty($_SESSION['users'])) {
        echo "<h3>All Users:</h3>";
        echo "<table border='1' cellpadding='5'>
                <tr><th>Name</th><th>Email</th><th>Age</th></tr>";
        foreach ($_SESSION['users'] as $u) {
            echo "<tr>
                    <td>{$u['name']}</td>
                    <td>{$u['email']}</td>
                    <td>{$u['age']}</td>
                  </tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
