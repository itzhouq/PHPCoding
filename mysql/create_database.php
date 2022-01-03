<?php
// 创建数据库
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

// 创建数据库
$sql = "CREATE DATABASE myDB";
if ($conn -> query($sql) === TRUE) {
    echo "数据库创建成功";
} else {
    echo "Error creating database: " . $conn -> error;
}

$conn -> close();
