<?php

// 注意当使用默认参数时，任何默认参数必须放在任何非默认参数的右侧
function makeyogurt($flavour, $type = "acidophilus")
{
    return "Making a bowl of $type $flavour.\n";
}

echo makeyogurt("raspberry");   // Making a bowl of acidophilus raspberry.

function makeyogurt2($type = "acidophilus", $flavour)
{
    return "Making a bowl of $type $flavour.\n";
}

echo makeyogurt2("raspberry");   // 报错Uncaught ArgumentCountError: Too few arguments to function makeyogurt2(), 1 passed
