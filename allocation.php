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
		$id = $id_arr[$i];
		$val = $val_arr[$i];
		$is_alloc = "select allocate, aid, address, item from soongsil_delivery where aid=$id";
		$result_set = mysqli_query($conn, $is_alloc);

		while($row = mysqli_fetch_array($result_set)){
			if ($row[0] == ''){
				$alloc_update = "update soongsil_delivery set allocate='$val' where aid=$id";
				mysqli_query($conn, $alloc_update);
				
				$alloc_insert = "insert into soongsil_$val(aid, address, item) values('$row[1]','$row[2]','$row[3]')";
				mysqli_query($conn, $alloc_insert);
			}
			else {
				$alloc_delete = "delete from soongsil_$row[0] where aid = $id";
				mysqli_query($conn, $alloc_delete);

				$alloc_update = "update soongsil_delivery set allocate='$val' where aid=$id";
				mysqli_query($conn, $alloc_update);
				
				$alloc_insert = "insert into soongsil_$val(aid, address, item) values('$row[1]','$row[2]','$row[3]')";
				mysqli_query($conn, $alloc_insert);
			}
		}
		
	}

	echo "<script>location.replace('main.html');</script>";	
?>
