<?php

// 遍历

/* foreach 示例 1：仅 value */
$a = array(1, 2, 3, 17);

foreach ($a as $v) {
    echo "Current value of \$a: $v.\n";
}

//Current value of $a: 1.
//Current value of $a: 2.
//Current value of $a: 3.
//Current value of $a: 17.



/* foreach 示例 2：value （打印手动访问的符号以供说明） */
$a = array(1, 2, 3, 17);

$i = 0; /* 仅供说明 */

foreach ($a as $v) {
    echo "\$a[$i] => $v.\n";
    $i++;
}
//$a[0] => 1.
//$a[1] => 2.
//$a[2] => 3.
//$a[3] => 17.


/* foreach 示例 3：key 和 value */
$a = array(
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
);

foreach ($a as $k => $v) {
    echo "\$a[$k] => $v.\n";
}
//$a[one] => 1.
//$a[two] => 2.
//$a[three] => 3.
//$a[seventeen] => 17.



/* foreach 示例 4：多维数组 */
$a = array();
$a[0][0] = "a";
$a[0][1] = "b";
$a[1][0] = "y";
$a[1][1] = "z";

foreach ($a as $v1) {
    foreach ($v1 as $v2) {
        echo "$v2\n";
    }
}
//a
//b
//y
//z


/* foreach 示例 5：动态数组 */
foreach (array(1, 2, 3, 4, 5) as $v) {
    echo "$v\n";
}
//1
//2
//3
//4
//5
