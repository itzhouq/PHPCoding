<?php

// 打开文件之前检验
if (!file_exists("welcome.txt")) {
    die("文件不存在");
} else {
    $file = fopen("welcome.txt", "r");
}