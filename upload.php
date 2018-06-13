<?php
$source = $_FILES['upfile']['tmp_name'];
$dest = "./".basename($_FILES['upfile']['name']);
move_uploaded_file($source,$dest);
$filename = basename($_FILES['upfile']['name']);

shell_exec("cd /var/www/html/web");

$command = "python upload.py -f ".$filename;
exec($command,$output,$return);

for($i = 0; $i < count($output); $i++)
{
	print($output[$i]);
	print('<BR>');
}

print($i."개 추가완료");
print('<BR>');

echo "<a href='main.html'>확인</a>";

shell_exec("rm ".$filename);
?>
