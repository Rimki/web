<?php
    $con =mysqli_connect("localhost","eun","Abcd23@#","multiple");
	if(mysqli_connect_errno($con)){
		echo "database 접근 실패";
	}
	
	mysqli_set_charset($con,'utf8');

    $id=$_POST["id"];
    $pw=$_POST["pw"];
    $name=$_POST["name"];
	
	$position = '택배기사';

    $statement = mysqli_prepare($con,"INSERT INTO soongsil VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($statement,"ssss",$id,$name,$position,$pw);
    mysqli_stmt_execute($statement);

	$create_query = "CREATE TABLE soongsil_".$id."(aid INT,address VARCHAR(50),item VARCHAR(20),priority INT,primary key(aid)) default character set utf8;";
	mysqli_query($con,$create_query);
	
    $response=array();
    $response["success"]=true;

    echo json_encode($response);
?>
