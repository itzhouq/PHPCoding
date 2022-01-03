<?php

// 析构方法
class Teacher {
    public $name;
    public $school;

    // 构造方法
    public function __construct($name, $school) {
        $this -> name = $name;
        $this -> school = $school;
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

    // 析构方法
    public function __destruct() {
        echo '类执行完毕，要关闭了';
    }
}

// 实例化
$obj = new Teacher('沈逸', '复旦大学');
echo $obj -> fun3();
