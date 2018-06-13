<?php
$source = $_FILES['upfile']['tmp_name'];
$dest = "./".basename($_FILES['upfile']['name']);
move_uploaded_file($source,$dest);
$filename = basename($_FILES['upfile']['name']);

shell_exec("cd /var/www/html/web");

$command = "python upload.py -f ".$filename;
exec($command,$output,$return);

echo "Output : ";
print_r($output);

shell_exec("rm ".$filename);
?>
