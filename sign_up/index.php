<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old_input = $_SESSION['old_input'] ?? [];

unset($_SESSION['errors']);
unset($_SESSION['old_input']);
?>
<!DOCTYPE html>
<html lang="en">
<head><link rel="stylesheet" href="../public/css/style.css">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="container">

  
<div id="signup-form">
            <h2>Sign Up</h2>
            <form action="regisert.php" method="post">
                <div class="input-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="<?= htmlspecialchars($old_input['name'] ?? '') ?>" required>
                    <p class="err" > <?=$errors['invalide name']??'';?></p>

                </div>
                <div class="input-group">
                    <label for="email-signup">Email</label>
                    <input type="email" id="email-signup" name="email" value="<?= htmlspecialchars($old_input['email'] ?? '') ?>" required>        
                    <p class="err" > <?=$errors['usedEmail']??'';?></p>
                    <p class="err" > <?=$errors['invalide email']??'';?></p>

                </div>
                <div class="input-group">
                    <label for="password-signup">Password</label>
                    <input type="password" id="password-signup" name="password" required>
                    <p class="err" > <?=$errors['invalide password']??'';?></p>

                </div>
                <div class="input-group">
                    <label for="conform-password"> Confirme Password</label>
                    <input type="password" id="conform-password" name="password_conf" required>
                    <p class="err" > <?=$errors['missmatch']??'';?></p>

                </div>
                <button type="submit" name="btn" class="btn">Sign Up</button>
            </form>
            <a href="../sign_in/index.php">Already have an account? Sign in</a>
          </div>
    </div>

    <script src="../public/js/script.js"></script>