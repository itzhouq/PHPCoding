<?php

// 使用PDO连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";

try {
    $conn = new PDO("mysql:host=$servername;port=3307", $username, $password);
    echo "连接成功";
} catch (PDOException $e) {
    echo $e -> getMessage();
}
