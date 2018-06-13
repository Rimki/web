<?php
$source = $_FILES['upfile']['tmp_name'];
$dest = "./".basename($_FILES['upfile']['name']);
move_uploaded_file($source,$dest);

shell_exec("cd /var/www/html/web");

$command = "python upload.py -f list.xlms";
exec(command,$out,$error);

echo $command;
echo '<BR>';
echo $error;
echo'<BR>';
echo $out[1];
?>
