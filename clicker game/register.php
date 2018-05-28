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
                <form method="post" action="register.php" >
                <?php include('errors.php'); ?>
                    Käyttäjätunnus:<br>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                    <br><br>
                    Sähköposti:<br>
                    <input type="email" name="email" value="<?php echo $email; ?>">
                    <br>
                    Salasana:<br>
                    <input type="password" name="password_1">
                    <br><br>
                    Salasana uudelleen:<br>
                    <input type="password" name="password_2">
                    <br><br>
                    <button type="submit" class="btn" name="reg_user">Register</button>                </form> 
            </div>
            <a href="login.php" class="register_text">Kirjaudu</a>
        </div>
    </body>
</html>