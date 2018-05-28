<?php
require_once('server.php');
require_once('db.php');

header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
/* "INSERT INTO user_items (kahvi_2, kahvi_3, kahvi_4, clicks, kerroin, kahviplus, kahvi, timerPS, ps) 
    VALUES ('$obj->kahvi_2', '$obj->kahvi_3', '$obj->kahvi_4', '$obj->clicks', '$obj->kerroin', '$obj->kahviplus', '$obj->kahvi', '$obj->timerPS', '$obj->ps');";
// $sql = "INSERT INTO user_items (kahvi_2, kahvi_3, kahvi_4, clicks, kerroin, kahviplus, kahvi, timerPS) VALUES ('$obj->kahvi_2', '$obj->kahvi_3', '$obj->kahvi_4', '$obj->clicks', '$obj->kerroin', '$obj->kahviplus', '$obj->kahvi', '$obj->timerPS');";
Ä*/
 
  /*" SELECT id FROM user_items, UPDATE user_items SET clicks = '$obj->clicks', kahvi ='$obj->kahvi')";*/

 $sql = " UPDATE user_items SET clicks = '$obj->clicks', kahvi_2 = '$obj->kahvi_2', kahvi_3 = '$obj->kahvi_3', kahvi_4 = '$obj->kahvi_4', kerroin = '$obj->kerroin', kahviplus = '$obj->kahviplus', kahvi = '$obj->kahvi', timerPS = '$obj->timerPS', ps = '$obj->ps'  WHERE id = id;";

$result = $db->query($sql);
if (!$result) {
     $data = array(
         'status' => 'error',
         'sql' => $sql
     );
 } else {
     $data = array(
         'status' => 'ok',
         'sql' => $sql
     );
}
echo json_encode($data);