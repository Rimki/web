<?
	$conn = mysqli_connect("localhost","eun","Abcd23@#","multiple");
	if(mysqli_connect_errno($conn)) {
		echo "불러올 수 없습니다.";
	}
    mysqli_set_charset($conn,'utf8'); // 한글 문자 패치
	$add = $_POST['add'];
	$item = $_POST['item'];
	$phone = $_POST['phone'];
	$name = $_POST['cname'];
	$pay = $_POST['pay'];


	//$max_aid = 8;
	
	$aid_query = "select * from soongsil_delivery";
	$result_set = mysqli_query($conn, $aid_query);
	
	while($row = mysqli_fetch_array($result_set)){
		$max_aid = $row[0];
	}
	$max_aid++;
	
	$insert_query = "insert into soongsil_delivery values('$max_aid','$add','$item','$phone','$name','$pay','')";
	mysqli_query($conn, $insert_query);

	echo "<script>location.replace('main.html');</script>";
?>
