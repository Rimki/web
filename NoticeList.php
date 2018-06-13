<?php
//  header("Content-Type: text/html;charset=UTF-8");
  $con  = mysqli_connect("localhost","eun","Abcd23@#","multiple");
  mysqli_set_charset($con,"utf8");
  //$id=$_GET["id"];

  $result = mysqli_query($con,"SELECT address,item FROM soongsil_test");
  $response = array();

  while($row = mysqli_fetch_array($result)){
      array_push($response,array("address"->$row[0],"item"->$row[1]));
  }

  echo json_encode(array("response"->$response));
  mysqli_close($con);

?>
