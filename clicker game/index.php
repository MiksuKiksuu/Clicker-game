<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
          header("location: login.php");
          
  }

?>
<!DOCTYPE html>
<html lang="fi"
<head>
    <link rel="icon" href="logo.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/clikker_style.css"> 
    <link rel="stylesheet" type="text/css" href="css/login_refister.css"> 
    <meta charset="utf-8"/>
    <title></title>
</head>
        <body onload="get_stuff();">
        <?php include('errors.php'); ?>
                
                <div class="login_system_text">
                        <?php if (isset($_SESSION['success'])) : ?>
                                <div class="error success" >
                                <h3>
                                        <?php 
                                        echo $_SESSION['success']; 
                                        unset($_SESSION['success']);
                                        ?>
                                </h3>
                        </div>
                        <?php endif ?>

                        <?php  if (isset($_SESSION['username'])) : ?>
                                <p>Tervetuloa <strong><?php echo $_SESSION['username'] . " " . $_SESSION['id']; ?></strong></p>
                                <p> <a href="index.php?logout='1'" style="color: red;">Kirjaudu ulos</a> </p>
                        <?php endif ?>
                </div>            
                <button id="send_json">XD</button>
                <button id="save_json_to_db">Tallenna peli</button>

                <p id="kahviplus_output" ></p>

                <div class="test"><img id="kliker" onclick="klikkaus()" src="image/kahvi_1.png"></div>
                <p id="clicks-text">Kahvisi: <a id="clicks_output" ></a></p>
                <p id="clicks-text">Purut: <a id="kerroin_output" ></a> Kpl</p>

                <!--<div class="shop">
                        <h1>Kauppa</h1>
                        <button id="purut" onclick="purut()"><p>purujen hinta: <a id="kahvi"> </a>€</p></button>
                        <button id="purut" onclick="aloita()"><p>timerPS: <a id="timerPS"></a>€</p></button>
                </div>-->
                <div class="image-shop">
                        <h1>Kauppa</h1>
                        <img id="clikker-image" src="image/kahvi_1.png" onClick="kahvi<1()">
                        <img id="clikker-image" src="image/kahvi_3.png" onClick="kahvi3()">
                        <button id="purut" onclick="kahvi__3()">600</button>
                        <img id="clikker-image" src="image/kahvi_5.png" onClick="kahvi4()">
                        <button id="purut" onclick="kahvi__4()">100</button>       
                        <img id="clikker-image" src="image/kahvi_2.png" onClick="kahvi2()">
                        <button id="purut" onclick="kahvi__2()">800</button>
                        <button id="shop-button" onclick="purut()"><p>purujen hinta: <a id="kahvi_output"> </a>€</p></button>
                        <button id="shop-button" onclick="aloita()"><p>timerPS: <a id="timerPS_output"></a>€</p></button>
                </div>


                <script type="text/javascript" src="js/clicker.js"></script>     



        </body>
</html>