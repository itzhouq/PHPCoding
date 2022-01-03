<?php

// 创建数据表
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "test";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn -> connect_error) {
    die("连接失败: " . $conn -> connect_error);
}

// 使用 sql 创建数据表
$sql = "CREATE TABLE t_guests (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT '主键',
    firstname VARCHAR(30) NOT NULL COMMENT '名',
    lastname VARCHAR(30) NOT NULL COMMENT '姓',
    email VARCHAR(50) COMMENT '邮箱',
    reg_date TIMESTAMP COMMENT '注册时间',
    `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间'
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if ($conn -> query($sql) === TRUE) {
    echo "Table t_guest created successfully";
} else {
    echo "创建数据表错误: " . $conn -> error;
}

$conn -> close();
