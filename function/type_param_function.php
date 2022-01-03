<?php

// 使用非标量类型作为默认参数
function makecoffee($types = array("cappuccino"), $coffeeMaker = NULL)
{
    $device = is_null($coffeeMaker) ? "hands" : $coffeeMaker;
    return "Making a cup of ".join(", ", $types)." with $device.\n";
}
echo makecoffee(); // Making a cup of cappuccino with hands.
echo makecoffee(array("cappuccino", "lavazza"), "teapot"); // Making a cup of cappuccino, lavazza with teapot.
