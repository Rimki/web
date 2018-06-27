<?php
	$conn = mysqli_connect("localhost","eun","Abcd23@#","multiple");
	if(mysqli_connect_errno($conn)) {
		echo "불러올 수 없습니다.";
	}
	
	mysqli_set_charset($conn,'utf8');
	$sel_id = $_POST['sel_id'];
	$sel_val = $_POST['sel_val'];

	$id_arr = explode(',',$sel_id);
	$val_arr = explode(',',$sel_val);
	
	$len = count($id_arr);

	for ( $i =0 ; $i < $len; $i++){
		//$old_query = "select ";
		echo "$id_arr[$i] $val_arr[$i]<br>";
		
	}

	//echo "<script>location.replace('main.html');</script>";	
?>
