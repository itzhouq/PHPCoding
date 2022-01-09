<?php

$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
echo json_encode($arr);


class Emp {
    public $name = "";
    public $hobbies = "";
    public $birthdate = "";
}

$e = new Emp();
$e -> name = "sachin";
$e -> hobbies = "sports";
$e -> birthdate = date('Y-m-d H:i:s');

echo json_encode($e);

echo PHP_EOL;
$arr = array('google' => '谷歌', 'taobao' => '淘宝网');
echo json_encode($arr); // 编码中文
echo PHP_EOL;
echo json_encode($arr, JSON_UNESCAPED_UNICODE);  // 不编码中文