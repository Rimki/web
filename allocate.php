<?php
  $con  = mysqli_connect("localhost","eun","Abcd23@#","multiple");
  mysqli_set_charset($con,"utf-8");
  
  $aid = $_POST["aid"];
  $nn = $_POST["nn"];

  for($i = 0; $i < count(aid); $i++)
  {
	  mysqli_prepare($con,"SELECT allocate, address, item FROM soongsil_delivery WHERE aid=?");
	  mysqli_stmt_bind_param($statement,"s",$aid[i]);
	  $result = mysqli_stmt_execute($statement);
	  $address;
	  $item;
	  $oldallo;

	  if()
	  {
		mysqli_prepare($con,"DELETE FROM soongsil_".$oldallo." WHERE aid=?");
         	mysqli_stmt_bind_param($statement,"s",$aid[i]);
          	$result = mysqli_stmt_execute($statement);
	  }

	  mysqli_prepare($con,"UPDATE soogsil_delivery set allocate=? where aid=?");
          mysqli_stmt_bind_param($statement,"ss",$aid[i],$nn[i]);
          $result = mysqli_stmt_execute($statement);

	  mysqli_prepare($con,"INSERT INTO soongsil_".$nn[i]." values(?,?,?,999)");
          mysqli_stmt_bind_param($statement,"sss",$aid[i],$address,$item);
          $result = mysqli_stmt_execute($statement);
  }

  mysqli_close($con);
  echo "<script>location.replace('main.html');</script>";
?>
