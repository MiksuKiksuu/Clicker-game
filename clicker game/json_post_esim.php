<?php
require_once('server.php');
require_once('db.php');
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$sql = "SELECT clicks, kerroin, kahvi_2, kahvi_3, ps, kahvi, kahviplus, timerPS  FROM user_items WHERE id = user_items.id;";

$result = $conn->query($sql);
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);
 //echo $sql ;
echo json_encode($outp);