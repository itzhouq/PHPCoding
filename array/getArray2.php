<?php

// 获取数组元素：数组解引用
function getArray() {
    return array(1, 2, 3);
}

$secondElement = getArray()[1];

// 或
list(, $secondElement) = getArray();

echo $secondElement;