<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="fi"
<head>
    <link rel="icon" href="logo.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/clicker.js"></script>     
    <link rel="stylesheet" type="text/css" href="css/clikker_style.css"> 
    <link rel="stylesheet" type="text/css" href="css/login_refister.css"> 
    <meta charset="utf-8"/>
    <title></title>
</head>
    <body>
        <div class="login_screen">
            <div class="login_page">
                <form method="post" action="login.php">
                <?php include('errors.php'); ?>
                    Käyttäjätunnus:<br>
                    <input type="text" name="username">
                    <br>
                    Salasana:<br>
                    <input type="password" name="password" >
                    <br><br>
                    <button type="submit" class="btn" name="login_user">Login</button>
                </form> 
            </div>
            <a href="register.php" class="register_text">Rekisteröidy nyt</a>
        </div>
    </body>
</html>