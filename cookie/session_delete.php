<?php
session_start();

// 存储 session 数据
$_SESSION['views'] = 1;

if(isset($_SESSION['views'])) {
    unset($_SESSION['views']);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>session测试</title>
</head>
<body>


<?php
// 检索 session 数据
echo "浏览量：" . $_SESSION['views'];
?>
</body>
</html>
