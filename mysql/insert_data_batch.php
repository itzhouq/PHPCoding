<?php

// 批量插入|事务
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 开始事务
    $conn -> beginTransaction();
    // SQL 语句
    $conn -> exec("INSERT INTO t_guests (firstname, lastname, email) 
    VALUES ('John', 'Doe', 'john@example.com')");
    $conn -> exec("INSERT INTO t_guests (firstname, lastname, email) 
    VALUES ('Mary', 'Moe', 'mary@example.com')");
    $conn -> exec("INSERT INTO t_guests (firstname, lastname, email) 
    VALUES ('Julie', 'Dooley', 'julie@example.com')");

    // 提交事务
    $conn -> commit();
    echo "新记录插入成功";
} catch (PDOException $e) {
    // 如果执行失败回滚
    $conn -> rollback();
    $sql = "";
    echo $sql . "<br>" . $e -> getMessage();
}

$conn = null;
