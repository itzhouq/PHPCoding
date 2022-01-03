<?php

// 函数中的函数
//function foo() {
//    function bar() {
//        echo "I don't exist until foo() is called.\n";
//    }
//}

/* 现在还不能调用 bar() 函数，因为它还不存在 */

//foo();
//
///* 现在可以调用 bar() 函数了，因为 foo() 函数
//   的执行使得 bar() 函数变为已定义的函数 */
//
//bar();

function foo() {

}

function bar() {
    echo "I don't exist until foo() is called.\n";
}

foo();
bar();

