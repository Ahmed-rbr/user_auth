<?php 
session_start();
$eroors=$_SESSION['eror']??'';
$old_eml= $_SESSION['old_eml']??'';

unset($_SESSION['eror']);
unset($_SESSION['old_eml']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication Page</title>
   <link rel="stylesheet" href="../public/css/style.css">
    
</head>
<body>
    <div class="container">
        <div id="login-form">
            <h2>Login</h2>
            <form action="sign_in.php" method="post">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" value="<?=$old_eml??''?>" id="email" name="email" placeholder="Enter your password" required>
                    <p class="err"><?=$eroors['error']??'' ?></p> 
                    </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="pwd" placeholder="Enter your password" required>
                   <p class="err"><?=$eroors['error']??'' ?></p> 

                </div>
                <button type="submit" name="btn" class="btn">Login</button>
            </form>
            <a href="../sign_up/index.php">Create an account</a>
        </div>

        <script src="../public/js/script.js"></script>
</body>
</html>
