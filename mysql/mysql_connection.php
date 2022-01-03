<?php

// 连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$database = "test";
$port = "3307";

// 创建连接
$conn = new mysqli($servername, $username, $password, $database, $port);

// 检测连接
if ($conn -> connect_error) {
    die("连接失败: " . $conn -> connect_error);
}
echo "连接成功";
