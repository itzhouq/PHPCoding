<?php

// 读取文件显示
$file = fopen("welcome.txt", "r") or exit("无法打开文件!");
// 读取文件每一行，直到文件结尾
while (!feof($file)) {
    echo fgets($file) . "<br>";
}
echo '文件尾部';
fclose($file);
