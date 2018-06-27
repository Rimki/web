<?php
	$conn = mysqli_connect("localhost","eun","Abcd23@#","multiple");
	if (mysqli_connect_errno($conn)) {
		echo "불러올 수 없습니다.";
	}
	mysqli_set_charset($conn, 'utf8');
	$addr = $_POST['addr'];
	$aid = $_POST['id'];
	
	$update_query = "update soongsil_delivery set address = '$addr' where aid=$aid ";
	mysqli_query($conn, $update_query);
	mysqli_close($conn);

	echo "<script>location.replace('main.html');</script>";
?>
