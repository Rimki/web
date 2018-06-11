<?php
    $con =mysqli_connect("localhost:3306","multiple","Abcd23@#","multiple");

    $id=$_POST["id"];
    $pw=$_POST["pw"];

    $statement=mysqli_prepare($con,"SELECT * FROM soongsil WHERE id=? AND pw=?");
    mysqli_stmt_bind_param($statement,"ss",$id,$pw);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement,$id,$name,$pw);

    $response=array();
    $response["success"]=false;

    while(mysqli_stmt_fetch($statement)){
      $response["success"]=true;
      $response["id"]=$id;
      $response["pw"]=$pw;
      $response["name"]=$name;

    }
    echo json_encode($response);

    ?>
