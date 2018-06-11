<?php
    $con =mysqli_connect("localhost:3306","multiple","Abcd23@#","multiple");

    $id=$_POST["id"];
    $pw=$_POST["pw"];
    $name=$_POST["name"];

    $statement=mysqli_prepare($con,"INSERT INTO soongsil VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($statement,"ssss",$id,$name,"택배기사",$pw);
    mysqli_stmt_execute($statement);

    $response=array();
    $response["success"]=true;
    echo json_encode($response);

    ?>
