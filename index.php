<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: sign_in/index.php');
    exit();
}

$name = $_SESSION['name'] ?? 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
      
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Hello, <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>!</h1>
        <p>Welcome to your dashboard.</p>
        
        <?php if (isset($_SESSION['email'])): ?>
            <p>Logged in as: <?= htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>
        
        <a href="sign_in/logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>