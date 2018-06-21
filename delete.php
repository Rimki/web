<?php
  $con  = mysqli_connect("localhost","eun","Abcd23@#","multiple");
  mysqli_set_charset($con,"utf-8");
  $a=$_POST['aid'];
  $aid=explode(',',$a);
	

  for($i = 0; $i < count($aid); $i++)
  {
	  $statement = mysqli_prepare($con,"DELETE FROM soongsil_delivery WHERE aid=?");
	  mysqli_stmt_bind_param($statement,"s",$aid[$i]);
	  mysqli_stmt_execute($statement);
  }

  mysqli_close($con);
  echo "<script>location.replace('main.html');</script>";
?>
