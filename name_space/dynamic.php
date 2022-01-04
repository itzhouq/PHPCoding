<?php

namespace MyProject;

function get($classname) {
    $a = __NAMESPACE__ . '\\' . $classname;
//    $b = new MyProject2\classname();
    return new $a;
}
