<?php


if (isset($_COOKIE["user"]))
    echo "欢迎 " . $_COOKIE["user"] . "!<br>";
else
    echo "普通访客!<br>";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>测试cookie</title>
</head>
<body>

</body>
</html>
