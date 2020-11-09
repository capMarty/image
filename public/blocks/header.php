<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="assets/main.js"></script>
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            logo
        </div>

        <nav class="menu">
            <ul>
                <li><a href="/">home</a></li>
                <li><a href="user.php">users</a></li>
                <li><a href="entities.php">entities</a></li>

                <?php if(@$_SESSION["name"]): ?>
                    <li><a href="login/logout.php">logout</a></li>
                <?php else: ?>  
                    <li><a href="auth.php">sign up</a></li>
                <?php endif; ?>      
            </ul>
        </nav>
    </header>