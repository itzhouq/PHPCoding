<?php
// 创建类

# 创建类
class Teacher{

}
# 调用类（实例化）
$zhou = new Teacher();
$wang = new Teacher();
$li = new Teacher();

var_dump($zhou);
var_dump($wang);
var_dump($li);

echo '<br>';
var_dump($zhou == $wang); // true
echo '<br>';
var_dump($zhou == $li); // true
echo '<br>';
var_dump($li == $wang); // true
echo '<br>';


echo '<hr>';
var_dump($zhou === $wang); // false
echo '<br>';
var_dump($zhou === $li); // false
echo '<br>';
var_dump($li === $wang); // false
echo '<br>';
