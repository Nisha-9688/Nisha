<?php
session_start();

// Set default password only if not set
if (!isset($_SESSION['password'])) {
    $_SESSION['password'] = "nisha";
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Signup'])) {
    $pswd = $_POST['pswd'];
    $encrypt = md5($pswd);
    $dupencrypt = md5($_SESSION['password']);

    if ($encrypt === $dupencrypt) {
        $_SESSION['logged_in'] = true;
        header("Location:page.php");
        exit;
    }
    else {
        $error = "Incorrect password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Library Management System</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #ffdde1, #ee9ca7);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-wrapper {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            width: 350px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .form-wrapper h1 {
            margin: 0 0 25px;
            text-align: center;
            color: #d63384;
        }

        .form-wrapper input[type="email"],
        .form-wrapper input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        .form-wrapper input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #d63384;
            color: #fff;
            border: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-wrapper input[type="submit"]:hover {
            background-color: #c2185b;
        }

        .error-message {
            margin-top: 10px;
            text-align: center;
            color: red;
            font-size: 14px;
        }

        .system-title {
            position: absolute;
            top: 20px;
            text-align: center;
            width: 100%;
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.4);
        }
    </style>
</head>
<body>
    <div class="system-title">Welcome to Library Management System</div>
    <div class="form-wrapper">
        <form method="POST">
            <h1>Login</h1>
            <input type="email" name="mail" placeholder="Email" required>
            <input type="password" name="pswd" placeholder="Password" required>
            <input type="submit" name="Signup" value="Login">
            <?php if ($error): ?>
                <div class="error-message"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
