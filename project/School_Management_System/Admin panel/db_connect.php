<?php
$servername = "localhost";   // usually "localhost" if MySQL is on same server
$username   = "root";        // default XAMPP/WAMP username is "root"
$password   = "";            // default XAMPP/WAMP password is empty
$dbname     = "school_management_system";   // your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
