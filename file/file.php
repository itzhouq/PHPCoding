<html lang="en">
<body>

<?php
$file = fopen("welcome.txt", "w") or exit("Unable to open file!");
echo $file;

fclose($file);
?>

</body>
</html>
