<?php

// 回调函数
function convertSpace($string) {
    return str_replace("_", ".", $string);
}

$string = "www_google_com!";

echo filter_var($string, FILTER_CALLBACK, array("options" => "convertSpace"));
