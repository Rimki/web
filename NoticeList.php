<?php
  header("Content-Type: text/html;charset=UTF-8");
  $con  = mysqli_connect("localhost","eun","Abcd23@#","multiple");

  $id=$_GET["id"];
  $result = mysqli_query($con,"SELECT address,item FROM soongil_".$id);
  $response = array();

  while($row = mysqli_fetch_array($result)){
      array_push($response,array("address"->$row[0],"item"->$row[1]));
  }
  echo json_encode(array("response"->$response),JSON_UNESCAPED_UNICODE);
  mysqli_close($con);

?>
