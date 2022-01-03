<?php

// 填充数组
// 把指定目录中的所有项填充到数组
$handle = opendir('./../..');
while (false !== ($file = readdir($handle))) {
    $files[] = $file;
    foreach ($files as $f) {
        echo "$f\n";
    }
}
closedir($handle);
