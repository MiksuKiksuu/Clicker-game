<?php
require_once('server.php');
require_once('db.php');
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

$id = (isset($_SESSION['id'])) ? $_SESSION['id'] : 0;

$sql = "SELECT clicks, kerroin, kahvi_2, kahvi_3, kahvi_4, ps, kahvi, kahviplus, timerPS FROM user_items WHERE id = $id;";

$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

$outp = array();
// $outp = $result->fetch_all(MYSQLI_ASSOC);
//echo $sql ;
echo json_encode($row);