<?php

// 类的方法

class Teacher {
    public $name = '罗翔';
    public $school = '中国政法大学';

    public function fun1() {
        echo '姓名：罗翔，学校：中国政法大学<hr/>';
    }

    public function fun2() {
        return '姓名：罗翔222，学校：中国政法大学222<hr/>';
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

// 类实例化
$luoxiang = new Teacher();
$luoxiang -> fun1();
echo $luoxiang -> fun2();
echo $luoxiang -> fun3();
echo $luoxiang -> fun4();
