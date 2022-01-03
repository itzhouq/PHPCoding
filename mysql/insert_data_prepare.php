<?php

// 预处理插入数据
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=3307", $username, $password);
    // 设置 PDO 错误模式为异常
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 预处理 SQL 并绑定参数
    $stmt = $conn -> prepare("INSERT INTO t_guests (firstname, lastname, email) 
    VALUES (:firstname, :lastname, :email)");
    $stmt -> bindParam(':firstname', $firstname);
    $stmt -> bindParam(':lastname', $lastname);
    $stmt -> bindParam(':email', $email);

    // 插入行
    $firstname = "John";
    $lastname = "Doe";
    $email = "john@example.com";
    $stmt -> execute();

    // 插入其他行
    $firstname = "Mary";
    $lastname = "Moe";
    $email = "mary@example.com";
    $stmt -> execute();

    // 插入其他行
    $firstname = "Julie";
    $lastname = "Dooley";
    $email = "julie@example.com";
    $stmt -> execute();

    echo "新记录插入成功";
} catch (PDOException $e) {
    echo "Error: " . $e -> getMessage();
}
$conn = null;
