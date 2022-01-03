<?php

// PHP8新特性：构造方法
class Teacher {

    // 构造方法
    public function __construct(public $name, public $school) {
    }

    public function fun1() {
        echo '姓名：罗翔，学校：中国政法大学<hr/>';
    }

    public function fun2() {
        return '姓名：罗翔，学校：中国政法大学<hr/>';
    }

    public function fun3() {
        // 在类中使用伪变量: "$this" 引用当前类的成员变量
        return '姓名：' . $this -> name . '，学校：' . $this -> school . '<hr/>';
    }

    public function fun4() {
        // 在类中使用伪变量: "$this" 引用当前类的成员方法
        return $this -> fun3();
    }
}

// 实例化
$obj = new Teacher('沈逸', '复旦大学');
echo $obj -> fun4();