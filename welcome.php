<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Shortee</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            text-align: center;
            padding: 50px;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Shortee</h1>
        <h2>Your Ultimate URL Shortener</h2>
        <p><a href="login.php">Login</a> or <a href="register.php">Register</a> to start shortening URLs!</p>
    </div>
</body>
</html>
