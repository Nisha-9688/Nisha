<?php
session_start();

// Set default password
if (!isset($_SESSION['password'])) {
    $_SESSION['password'] = "nisha";
}

$error = "";
$success = "";

// Change Password Logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change'])) {
    $old = $_POST['old_password'] ?? '';
    $new = $_POST['new_password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    $encrypt_old = md5($old);
    $encrypt_session = md5($_SESSION['password']);

    if ($encrypt_old !== $encrypt_session) {
        $error = "Old password is incorrect!";
    } elseif ($new !== $confirm) {
        $error = "New passwords do not match!";
    } else {
        $_SESSION['password'] = $new;  // Storing plain for simplicity
        $success = "Password changed successfully!";
    }

      // Redirect to include.php after 1 second with message
        $_SESSION['success_message'] = "Password changed successfully!";
        header("Location: include.php");
        exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password Page</title>
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            background-color: #ffe6f0;
            padding: 30px 40px;
            border-radius: 15px;
            border: 2px solid #ff80ab;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            width: 350px;
        }

        .form-box h3 {
            text-align: center;
            color: #d63384;
            margin-bottom: 20px;
        }

        .form-box input[type="password"],
        .form-box input[type="submit"],
        .form-box button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .form-box input[type="password"] {
            border: 1px solid #ccc;
        }

        .form-box input[type="submit"] {
            background-color: #d63384;
            color: white;
            border: none;
            cursor: pointer;
        }

        .form-box input[type="submit"]:hover {
            background-color: #c2185b;
        }

        .form-box button {
            background-color: #6c757d;
            color: white;
            border: none;
            cursor: pointer;
        }

        .form-box button:hover {
            background-color: #5a6268;
        }

        .message {
            text-align: center;
            margin-top: 10px;
            color: red;
        }

        .message.success {
            color: green;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-box">
        <form method="POST">
            <h3>Change Password</h3>
            <input type="password" name="old_password" placeholder="Old Password" required>
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <input type="submit" name="change" value="Change Password">

            <!-- Login Button Below Submit -->
            <!-- <button type="button" onclick="window.location.href='include.php'">Back to Login</button> -->
        </form>

        <?php if ($error): ?>
            <p class="message"><?= $error ?></p>
        <?php elseif ($success): ?>
            <p class="message success"><?= $success ?></p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
