<?php

// 验证输入
if (!filter_has_var(INPUT_GET, "email")) {
    echo("没有 email 参数");
} else {
    if (!filter_input(INPUT_GET, "email", FILTER_VALIDATE_EMAIL)) {
        echo "不是一个合法的 E-Mail";
    } else {
        echo "是一个合法的 E-Mail";
    }
}
