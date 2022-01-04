<?php
$expire = time() + 60 * 60 * 24 * 30;
setcookie("user", "test", $expire);

// 输出 cookie 值
echo $_COOKIE["user"];

// 查看所有 cookie
print_r($_COOKIE);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>测试cookie</title>
</head>
<body>

</body>
</html>