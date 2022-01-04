<?php

namespace Foo\Bar;
include 'file1.php';

const FOO = 2;
function foo() {
    return 'foo_function2';
}

class foo {
    static function staticmethod() {
        echo "foo_static_method2";
    }
}

/* 非限定名 */
//echo FOO;
//echo foo();
//foo::staticmethod();

/* 限定名称 */
//echo subnamespace\FOO;
//echo subnamespace\foo();
//subnamespace\foo::staticmethod();

///* 完全限定名称 */
echo \Foo\Bar\FOO;
echo \Foo\Bar\foo();
echo \Foo\Bar\subnamespace\foo();
