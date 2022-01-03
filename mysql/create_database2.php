<?php
// 创建数据库
$servername = "localhost";
$username = "root";
$password = "123456";

try {
    $conn = new PDO("mysql:host=$servername;port=3307", $username, $password);

    // 设置 PDO 错误模式为异常
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE myDBPDO";

    // 使用 exec() ，因为没有结果返回
    $conn -> exec($sql);

    echo "数据库创建成功<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e -> getMessage();
}

$conn = null;
