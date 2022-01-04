---
typora-copy-images-to: upload
---

## 环境搭建

PHP 官网：https://www.php.net

XAMPP工具：https://www.apachefriends.org/index.html

![image-20211225220226294](https://gitee.com/itzhouq/images/raw/master/notes/2021/20211225220226.png)





项目运行环境：/Applications/XAMPP/htdocs。可以通过 /Applications/XAMPP/etc/httpd.conf 修改。



### 请求和响应

![image-20211225220346806](https://gitee.com/itzhouq/images/raw/master/notes/2021/20211225220346.png)

![image-20211225220511366](https://gitee.com/itzhouq/images/raw/master/notes/2021/20211225220511.png)

PHPStorm配置

![image-20211228111545579](https://gitee.com/itzhouq/images/raw/master/notes/2021/20211228111545.png)



### 获取环境信息

```php
<?php phpinfo();
```

![image-20211228113031169](https://gitee.com/itzhouq/images/raw/master/notes/2021/20211228113031.png)

## 类型

PHP 支持 10 种原始数据类型。

四种标量类型：

- bool（布尔型）
- int（整型）
- float（浮点型，也称作 double)
- string（字符串）

四种复合类型：

- array（数组）
- object（对象）
- [callable](https://www.php.net/manual/zh/language.types.callable.php)（可调用）
- [iterable](https://www.php.net/manual/zh/language.types.iterable.php)（可迭代）

最后是两种特殊类型：

- resource（资源）
- NULL（无类型）



- var_dump()：如果想查看某个[表达式](https://www.php.net/manual/zh/language.expressions.php)的值和类型，用 [var_dump()](https://www.php.net/manual/zh/function.var-dump.php) 函数。
- [gettype()](https://www.php.net/manual/zh/function.gettype.php) 函数
- `is_type` 函数

![image-20211225221456688](https://gitee.com/itzhouq/images/raw/master/notes/2021/20211225221456.png)



### 布尔值

要指定一个 bool，使用常量 **`true`** 或 **`false`**。两个都不区分大小写。



### 整型

进制转换：

```php
// 进制：逢几进一
$a = 1234; // 十进制数 0-9 10
$a = 0123; // 八进制数 (等于十进制 83) 0-7
// 34
//  3 * 8^1 + 4 * 8^0 = 24 + 4 = 28
$a = 0123; // 八进制数 (PHP 8.1.0 起)
$a = 0x1A; // 十六进制数 (等于十进制 26)
$a = 0b11111111; // 二进制数字 (等于十进制 255)
$a = 1_234_567; // 整型数值 (PHP 7.4.0 以后)
```



```php
echo PHP_INT_SIZE; // 字长：8
echo '<br/>';
echo PHP_INT_MAX;
echo '<br/>';
echo PHP_INT_MIN;
```

PHP 没有 int 除法取整运算符，要使用 [intdiv()](https://www.php.net/manual/zh/function.intdiv.php) 实现。 `1/2` 产生出 float `0.5`。 值可以舍弃小数部分，强制转换为 int，或者使用 [round()](https://www.php.net/manual/zh/function.round.php) 函数可以更好地进行四舍五入。

```php
<?php
var_dump(25/7);         // float(3.5714285714286) 
var_dump((int) (25/7)); // int(3)
var_dump(round(25/7));  // float(4) 
?>
```

>  Java 表示敏感数字：100.12 + 200 = 300.12；double   new Bigdecimal();

### 浮点型



浮点型（也叫浮点数 float，双精度数 double 或实数 real）可以用以下任一语法定义：



### 字符串



### [数组](https://www.php.net/manual/zh/language.types.array.php)

PHP 中的 array 实际上是一个有序映射。映射是一种把 *values* 关联到 *keys* 的类型。此类型针对多种不同用途进行了优化； 它可以被视为数组、列表（向量）、哈希表（映射的实现）、字典、集合、堆栈、队列等等。 由于 array 的值可以是其它 array 所以树形结构和多维 array 也是允许的。

可以用 [array()](https://www.php.net/manual/zh/function.array.php) 语言结构来新建一个 array。它接受任意数量用逗号分隔的 `键（key） => 值（value）` 对。

- **key 可以是 integer 或者 string。value 可以是任意类型。**

- key 为可选项。如果未指定，PHP 将自动使用之前用过的最大 int 键名加上 1 作为新的键名。
- String 中包含有效的十进制 int，除非数字前面有一个 `+` 号，否则将被转换为 int 类型。例如键名 `"8"` 实际会被储存为 `8`。另外， `"08"` 不会被强制转换，因为它不是一个有效的十进制整数。
- Float 也会被转换为 int ，意味着其小数部分会被舍去。例如键名 `8.7` 实际会被储存为 `8`。
- Bool 也会被转换成 int。即键名 `true` 实际会被储存为 `1` 而键名 `false` 会被储存为 `0`。
- Null 会被转换为空字符串，即键名 `null` 实际会被储存为 `""`。
- Array 和 object *不能* 被用为键名。坚持这么做会导致警告：`Illegal offset type`。

如果在数组定义时多个元素都使用相同键名，那么只有最后一个会被使用，其它的元素都会被覆盖。



**[数组函数](https://www.php.net/manual/zh/ref.array.php)**

- [unset()](https://www.php.net/manual/zh/function.unset.php) 函数允许删除 array 中的某个键。但要注意数组将*不会*重建索引。
- 如果需要删除后重建索引，可以用 [array_values()](https://www.php.net/manual/zh/function.array-values.php) 函数重建 array 索引。

![image-20211228154348521](https://gitee.com/itzhouq/images/raw/master/notes/2021/20211228154348.png)



**[遍历数组](https://www.php.net/manual/zh/control-structures.foreach.php)**

`foreach` 语法结构提供了遍历数组的简单方式。`foreach` 仅能够应用于数组和对象。

```php
<?php
// 遍历数组
$arr = array(1, 2, 3, 4, 5, 6);

//var_dump($arr);

foreach ($arr as $a) {
    echo $a;
    echo "\n";
}
```

```php
<?php

// 遍历

/* foreach 示例 1：仅 value */
$a = array(1, 2, 3, 17);

foreach ($a as $v) {
    echo "Current value of \$a: $v.\n";
}

//Current value of $a: 1.
//Current value of $a: 2.
//Current value of $a: 3.
//Current value of $a: 17.



/* foreach 示例 2：value （打印手动访问的符号以供说明） */
$a = array(1, 2, 3, 17);

$i = 0; /* 仅供说明 */

foreach ($a as $v) {
    echo "\$a[$i] => $v.\n";
    $i++;
}
//$a[0] => 1.
//$a[1] => 2.
//$a[2] => 3.
//$a[3] => 17.


/* foreach 示例 3：key 和 value */
$a = array(
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
);

foreach ($a as $k => $v) {
    echo "\$a[$k] => $v.\n";
}
//$a[one] => 1.
//$a[two] => 2.
//$a[three] => 3.
//$a[seventeen] => 17.



/* foreach 示例 4：多维数组 */
$a = array();
$a[0][0] = "a";
$a[0][1] = "b";
$a[1][0] = "y";
$a[1][1] = "z";

foreach ($a as $v1) {
    foreach ($v1 as $v2) {
        echo "$v2\n";
    }
}
//a
//b
//y
//z


/* foreach 示例 5：动态数组 */
foreach (array(1, 2, 3, 4, 5) as $v) {
    echo "$v\n";
}
//1
//2
//3
//4
//5
```



**[ 用 list() 给嵌套的数组解包](https://www.php.net/manual/zh/control-structures.foreach.php#control-structures.foreach.list)**

可以遍历一个数组的数组并且把嵌套的数组解包到循环变量中，只需将 [list()](https://www.php.net/manual/zh/function.list.php) 作为值提供。

```php
<?php

// 给嵌套的数组解包
$array = [
    [1, 2],
    [3, 4],
];

foreach ($array as list($a, $b)) {
    // $a 包含嵌套数组的第一个元素，
    // $b 包含嵌套数组的第二个元素。
    echo "A: $a; B: $b\n";
}
//A: 1; B: 2
//A: 3; B: 4


foreach ($array as list(, $b)) {
    // $a 包含嵌套数组的第一个元素，
    // $b 包含嵌套数组的第二个元素。
    echo "B: $b\n";
}
//B: 2
//B: 4
```



---



## 变量

变量默认总是传值赋值。

PHP 也提供了另外一种方式给变量赋值：[引用赋值](https://www.php.net/manual/zh/language.references.php)。

```PHP
<?php
// 引用
$foo = 'Bob';              // 将 'Bob' 赋给 $foo
$bar = &$foo;              // 通过 $bar 引用 $foo
$bar = "My name is $bar";  // 修改 $bar 变量
echo $bar;                  // My name is Bob
echo $foo;                 // $foo 的值也被修改 My name is Bob
```



### 全局变量

```PHP
<?php

$a = 1;
$b = 2;

function Sum()
{
    global $a, $b;

    $b = $a + $b;
}

Sum();
echo $b; // 3
```

```php
<?php

$a = 1;
$b = 2;

function Sum()
{
    $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
}

Sum();
echo $b; // 3
```



### 静态变量

```php
<?php

// 静态变量
function test()
{
    static $count = 0;

    $count++;
    echo $count;
    if ($count < 10) {
        test();
    }
    $count--;
}

test(); // 12345678910
```



## 常量

```php
<?php
// 合法的常量名
define("FOO",     "something");
define("FOO2",    "something else");
const FOO_BAR = "something more";

// 非法的常量名
//define("2FOO",    "something");

// 下面的定义是合法的，但应该避免这样做：(自定义常量不要以__开头)
// 也许将来有一天 PHP 会定义一个 __FOO__ 的魔术常量
// 这样就会与你的代码相冲突
//const __FOO__ = "something";

echo FOO;
echo FOO2;
echo FOO_BAR;
```



## 表达式

错误控制表达式

执行运算符

类型运算符





## 流程控制

### ifelse

常规 if else 写法。

特殊写法

```php
<?php
$a = 7;

if ($a == 5):
    echo "a equals 5";
    echo "...";
elseif ($a == 6):
    echo "a equals 6";
    echo "!!!";
else:
    echo "a is neither 5 nor 6";
endif;
```



### Goto

```php
<?php

// goto
goto a;
echo 'Foo'; // 不会输出

a:
echo 'Bar'; // Bar
```

```php
<?php

for($i=0,$j=50; $i<100; $i++) {
    while($j--) {
        if($j==17) goto end;
    }
}
echo "i = $i"; // 跳过
end:
echo 'j hit 17'; // j hit 17
```



---





## 类与对象

- 类是具有相同属性和操作的一组对象的集合

### 创建类

每个类的定义都以关键字 `class` 开头，后面跟着类名，后面跟着一对花括号，里面包含有类的属性与方法的定义。

### 对象

类的实例。





### 成员变量

- 成员变量，也叫类属性

```php
<?php

// 类属性
class Teacher {
    public $name = '罗翔';
    public $school = '中国政法大学';
}

$luoxiang = new Teacher();
echo $luoxiang->name;
echo '<br/>';
echo $luoxiang->school;
```



### 成员方法

- 类里成员有两种：属性（变量）和行为（方法）。

```php
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
```

### 魔术方法

构造方法



新特性：简洁的定义构造方法：



析构方法：PHP 有析构函数的概念，这类似于其它面向对象的语言，如 C++。析构函数会在到某个对象的所有引用都被删除或者当对象被显式销毁时执行。

### 其他魔术方法





---

## MySQL数据库

- MySQL 是开源的，所以你不需要支付额外的费用。
- MySQL 支持大型的数据库。可以处理拥有上千万条记录的大型数据库。

![image-20211230200313571](https://gitee.com/itzhouq/images/raw/master/notes/2021/20211230200313.png)

### 数据库基础知识

- MySQL是（关系型数据库管理系统）的应用软件之一
  - 数据以表格的形式出现
  - 每行：各种记录名称
  - 每列：记录名称所对应的数据域
  - 许多的行和列组成一张表单
  - 若干的表单组成database

![image-20211230201603400](https://gitee.com/itzhouq/images/raw/master/notes/2021/20211230201603.png)

启动 MySQL 服务修改密码：

![image-20211230202830626](https://gitee.com/itzhouq/images/raw/master/notes/2021/20211230202830.png)

```shell
sudo /Applications/XAMPP/xamppfiles/xampp security
```

数据库连接工具：Navicat



### 创建数据库

![image-20211230203159480](https://gitee.com/itzhouq/images/raw/master/notes/2021/20211230203159.png)

- 数据库: 数据库是一些关联表的集合。
- 数据表: 表是数据的矩阵。在一个数据库中的表看起来像一个简单的电子表格。
- 列: 一列(数据元素) 包含了相同的数据, 例如邮政编码的数据。
- 行：一行（=元组，或记录）是一组相关的数据，例如一条文章的数据



### MySQL 数据类型

#### 数值数据类型

| **类型**    | **用途**             | **范围(无符号)**                                      | **范围(有符号)**                                             |
| ----------- | -------------------- | ----------------------------------------------------- | ------------------------------------------------------------ |
| `tinyint`   | 极小整数类型         | (0，255)                                              | (-128，127)                                                  |
| `smallint`  | 小整数类型           | (0，65535)                                            | (-32768，32767)                                              |
| `mediumint` | 中整数类型           | (0，16777215)                                         | (-8388608，8388607)                                          |
| `int`       | 大整数类型           | (0，4294967295)                                       | (-2147483648，2147483647)                                    |
| `bigint`    | 极大整数类型         | (0，18446744073709551615)                             | (-9223372036854775808，9223372036854775807)                  |
| `float`     | 浮点小数类型(单精度) | 0，(1.175494351E-38，3.402823466E+38)                 | (-3.402823466E+38，-1.175494351E-38)，0，(1.175 494351E-38，3.402823466351E+38) |
| `double`    | 浮点小数类型(双精度) | 0，(2.2250738585072014E-308，1.7976931348623157E+308) | (-1.7976931348623157E+308，-2.2250738585072014E-308)，0，(2.2250738585072014E-308，1.7976931348623157E+308) |
| `decimal`   | 定点小数类型         | 依赖于M和D的值                                        | 依赖于M和D的值                                               |



#### 字符串数据类型

- BLOB 保存二进制数据
- TEXT 保存字符数据

| **类型**     | **用途**                        | **大小(字节)** |
| ------------ | ------------------------------- | -------------- |
| `char`       | 定长字符串                      | 0-255          |
| `varchar`    | 变长字符串                      | 0-65535        |
| `tinytext`   | 短文本字符串                    | 0-255          |
| `text`       | 长文本数据                      | 0-65535        |
| `mediumtext` | 中等长度文本数据                | 0-16777215     |
| `longtext`   | 极大文本数据                    | 0-4294967295   |
| `tinyblob`   | 不超过 255 个字符的二进制字符串 | 0-255          |
| `blob`       | 二进制形式的长文本数据          | 0-65535        |
| `mediumblob` | 二进制形式的中等长度文本数据    | 0-16777215     |
| `longblob`   | 二进制形式的极大文本数据        | 0-4294967295   |



#### 日期/时间数据类型

| **类型**    | **用途** | **大小(字节)** | **格式**            |
| ----------- | -------- | -------------- | ------------------- |
| `year`      | 年       | 3              | YYYY                |
| `data`      | 日期     | 3              | YYYY-MM-DD          |
| `time`      | 时间     | 3              | HH:MM:SS            |
| `datatime`  | 日期时间 | 8              | YYYY-MM-DD HH:MM:SS |
| `timestamp` | 时间戳   | 4              | YYYYMMDD HHMMSS     |



### MySQL数据表

#### 创建数据表

![image-20211230203642373](https://gitee.com/itzhouq/images/raw/master/notes/2021/20211230203642.png)



#### 创建数据表 MySQL语句

```sql
CREATE TABLE `t_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `images` varchar(1024) DEFAULT NULL COMMENT '图片链接',
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `create_time` timestamp DEFAULT NULL COMMENT '创建时间',
  `update_time` timestamp DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

- ENGINE：执行引擎
- CHARSET：字符编码
- 主键是唯一的，一个数据表中只能包含一个主键，你可以使用主键来查询数据。



修改时间字段：

```sql
ALTER TABLE t_course MODIFY COLUMN `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间';
ALTER TABLE t_course MODIFY COLUMN `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间';
```

- 修改创建时间默认使用当前时间戳，更新时间默认使用当前时间戳，每次更新记录时修改更新时间。

手动添加测试数据：

![image-20220103153807230](https://gitee.com/itzhouq/images/raw/master/notes/2021/20220103153807.png)



### MySQL 数据库增删改查

| **关键词** | **描述** |
| ---------- | -------- |
| `SELECT`   | 查询     |
| `INSERT`   | 添加     |
| `UPDSTE`   | 修改     |
| `DELETE`   | 删除     |



#### MySQL INSERT

MySQL 表中使用 **INSERT INTO** SQL语句来插入数据。可以通过 mysql 命令提示窗口中向数据表中插入数据，或者通过PHP脚本来插入数据。向 MySQL 数据表插入数据通用的 **INSERT INTO** SQL语法：

```sql
INSERT INTO table_name ( field1, field2,...fieldN )
                       VALUES
                       ( value1, value2,...valueN );
```

> 如果数据是字符型，必须使用单引号或者双引号，如："value"。

INSERT 数据：

```sql
INSERT INTO `test`.`t_users` (`name`, `age`) 
VALUES 
('诸葛亮', 40),
('赵子龙', 30),
('刘备', 44),
('关羽', 38),
('张飞', 37),
('曹操', 45),
('周瑜', 30)
;
```

```sql
INSERT INTO `test`.`t_users` (`name`, `age`, `create_time`, `update_time`) 
VALUES ('孙权', 33, '2022-01-03 15:43:52', '2022-01-03 15:43:52');
```



#### MySQL SELECT

MySQL 数据库使用SQL SELECT语句来查询数据。可以通过 mysql 令提示窗口中在数据库中查询数据，或者通过PHP脚本来查询数据。在MySQL数据库中查询数据通用的 SELECT 语法：

```sql
SELECT column_name,column_name
FROM table_name
[WHERE Clause]
[LIMIT N][ OFFSET M]
[ORDER BY id DESC|ASC]
```

- 查询全部数据

```sql
// 查询全部数据
SELECT * FROM t_users;

// 查询部分列
SELECT id, `name`, age FROM t_users;

// 别名
SELECT id AS cardId, `name` AS 用户名, age 年龄 FROM t_users;
```



- WHERE 条件
  - 可以在 WHERE 子句中指定任何条件。
  - 可以使用 AND 或者 OR 指定一个或多个条件。
  - WHERE 子句也可以运用于 SQL 的 DELETE 或者 UPDATE 命令。
  - WHERE 子句类似于程序语言中的 if 条件，根据 MySQL 表中的字段值来读取指定的数据。

```sql
// 多个条件
SELECT * FROM t_users WHERE age >= 20 AND age <= 30;
SELECT * FROM t_users WHERE age BETWEEN 20 AND 30;


SELECT * FROM t_users WHERE age BETWEEN 20 AND 30 AND create_time >= '2022-01-03 00:00:00';
```



- LIMIT分页：分页查询数据，
  - limit N : 返回 N 条记录
  - offset M : 跳过 M 条记录, 默认 M=0, 单独使用似乎不起作用
  - limit N,M : 相当于 **limit M offset N** , 从第 N 条记录开始, 返回 M 条记录


```sql
// 分页查询
SELECT * FROM t_users LIMIT 2, 4; 
```



- ORDER BY：用于对记录集中的数据进行排序，默认对记录进行升序排序。

```sql
// 排序
SELECT * FROM t_users ORDER BY age DESC, create_time;
```



#### MySQL UPDATE

用于更新表中已存在的记录，语法：

```sql
UPDATE table_name
SET column1 = value1, column2 = value2,...
WHERE some_column = some_value;
```

> WHERE 子句规定哪条记录或者哪些记录需要更新。如果省略了 WHERE 子句，所有的记录都将被更新！

```sql

UPDATE t_users SET age = 39 WHERE id = 8;
```



#### MySQL DELETE

语句用于删除表中的行，语法：

```sql
DELETE FROM table_name
WHERE some_column = some_value;
```

> WHERE 子句规定哪条记录或者哪些记录需要删除。如果省略了 WHERE 子句，所有的记录都将被删除！

```sql
DELETE FROM t_users WHERE id = 9;
```

- 物理删除
- 逻辑删除【添加标识字段】

```sql
ALTER TABLE t_users ADD COLUMN user_status TINYINT(2) DEFAULT 1 AFTER age COMMENT '是否删除 1 否 0 是';

UPDATE t_users SET user_status = 0 WHERE id = 21;
```



### MySQL运算符

#### MySQL比较运算符

| **符号** | **描述** |
| -------- | -------- |
| `=`      | 等号     |
| `<>`     | 不等于   |
| `>`      | 大于     |
| `<`      | 小于     |
| `>=`     | 大于等于 |
| `<=`     | 小于等于 |



#### MySQL逻辑运算符

| **符号** | **描述**     |
| -------- | ------------ |
| `NOT`    | 逻辑非，取反 |
| `AND`    | 逻辑与       |
| `OR`     | 逻辑或       |
| `XOR`    | 逻辑异或     |



#### MySQL比较运算符

| **符号**      | **描述**     |
| ------------- | ------------ |
| `BETWEEN`     | 在两值之间   |
| `NOT BETWEEN` | 不在两值之间 |
| `IN`          | 在集合中     |
| `NOT IN`      | 不在集合中   |
| `LIKE`        | 模糊匹配     |

```sql
SELECT * FROM t_users WHERE id IN (16, 17, 18);
```



### NULL值处理

MySQL 使用 SQL SELECT 命令及 WHERE 子句来读取数据表中的数据,但是当提供的查询条件字段为 NULL 时，该命令可能就无法正常工作。为了处理这种情况，MySQL提供了三大运算符:

- IS NULL: 当列的值是 NULL,此运算符返回 true。
- IS NOT NULL: 当列的值不为 NULL, 运算符返回 true。
- <=>: 比较操作符（不同于 = 运算符），当比较的的两个值相等或者都为 NULL 时返回 true。

> 不能使用 = NULL 或 != NULL 在列中查找 NULL 值 。

```sql
// 查询是NULL的记录
SELECT * FROM t_users WHERE `name` IS NULL;
SELECT * FROM t_users WHERE `name` = NULL;

SELECT * FROM t_users WHERE `name` <=> NULL;
SELECT * FROM t_users WHERE `age` <=> 40;
```



### LIKE

但是有时候我们需要获某个字段含有 "COM" 字符的所有记录，这时我们就需要在 WHERE 子句中使用 SQL LIKE 子句。SQL LIKE 子句中使用百分号 **%**字符来表示任意字符，类似于UNIX或正则表达式中的星号 *****。如果没有使用百分号 **%**, LIKE 子句与等号 **=** 的效果是一样的。

```sql
SELECT * FROM t_users WHERE `name` LIKE '%子%'; -- 包含 子
SELECT * FROM t_users WHERE `name` LIKE '子%'; -- 子 开头
SELECT * FROM t_users WHERE `name` LIKE '%权'; -- 权 结尾
```



### ALTER TABLE语句

ALTER TABLE 语句用于在已有的表中添加、删除或修改列。

- 添加字段

```sql
ALTER TABLE table_name ADD column_name datatype;

ALTER TABLE t_users ADD email VARCHAR(255) COMMENT '邮箱' AFTER user_status;
```

- 删除字段

```sql
ALTER TABLE table_name DROP COLUMN column_name;

ALTER TABLE t_users DROP email ;
```

- 修改字段

```sql
ALTER TABLE table_name MODIFY COLUMN column_name datatype;

ALTER TABLE t_users MODIFY email VARCHAR(255) COMMENT '邮箱2';
```



### GROUP BY分组

GROUP BY 语句根据一个或多个列对结果集进行分组。在分组的列上我们可以使用 COUNT, SUM, AVG,等函数。语法：

```sql
SELECT column_name, function(column_name)
FROM table_name
WHERE column_name operator value
GROUP BY column_name;
```



### MySQL函数

拥有很多可用于计数和计算的内建函数。

#### Aggregate 函数

- AVG() - 返回平均值
- COUNT() - 返回行数
- FIRST() - 返回第一个记录的值
- LAST() - 返回最后一个记录的值
- MAX() - 返回最大值
- MIN() - 返回最小值
- SUM() - 返回总和



#### Date函数

| 函数          | 描述                                |
| :------------ | :---------------------------------- |
| NOW()         | 返回当前的日期和时间                |
| CURDATE()     | 返回当前的日期                      |
| CURTIME()     | 返回当前的时间                      |
| DATE()        | 提取日期或日期/时间表达式的日期部分 |
| EXTRACT()     | 返回日期/时间的单独部分             |
| DATE_ADD()    | 向日期添加指定的时间间隔            |
| DATE_SUB()    | 从日期减去指定的时间间隔            |
| DATEDIFF()    | 返回两个日期之间的天数              |
| DATE_FORMAT() | 用不同的格式显示日期/时间           |

```sql
SELECT CURRENT_TIME();
SELECT DATE('2022-01-03 22:34:15');

SELECT EXTRACT(YEAR FROM '2022-01-03 22:35:30');

SELECT DATE_ADD('2022-01-03 22:36:01',INTERVAL 1 DAY);

SELECT DATEDIFF('2021-12-03 22:37:50', NOW());
SELECT DATEDIFF('2022-01-03 22:38:25', '2021-12-03 22:37:50');

SELECT DATE_FORMAT();
SELECT DATE_FORMAT('2007-10-04 22:23:00', '%H:%i:%s');
```



### 数据库三大范式

https://learnku.com/articles/35660



---

## PHP MySQL

### PHP MYSQL连接

可以使用以下方式连接 MySQL :

- **MySQLi extension** ("i" 意为 improved)
- **PDO (PHP Data Objects)**



#### MySQLi连接方式

```php
// 连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";

// 创建连接
$conn = new mysqli($servername, $username, $password);

// 检测连接
if ($conn -> connect_error) {
    die("连接失败: " . $conn -> connect_error);
}
echo "连接成功";
```

或者：

```php
// 连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";

// 创建连接
$conn = mysqli_connect($servername, $username, $password);

// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "连接成功";
```



#### PDO连接方式

```php

// 使用PDO连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";

try {
    $conn = new PDO("mysql:host=$servername;port=3307", $username, $password);
    echo "连接成功";
} catch (PDOException $e) {
    echo $e -> getMessage();
}
```



#### 关闭连接

连接在脚本执行完后会自动关闭。也可以使用以下代码来关闭连接：

```php
$conn->close();
// 或者
mysqli_close($conn);
// 或者
$conn = null;
```



#### 选择哪种连接方式

- 两种连接方式都可以
- MySQLi 只针对 MySQL 数据库；PDO 可以兼容 12 种不同的数据库。如果项目需要多种数据库切换，建议使用 PDO 方式。



### PHP MySQL 创建数据库

数据库存有一个或多个表。需要 CREATE 权限来创建或删除 MySQL 数据库。`CREATE DATABASE` 语句用于在 MySQL 中创建数据库。

```php
<?php
$servername = "localhost";
$username = "root";
$password = "123456";

// 创建连接
$conn = new mysqli($servername, $username, $password);
// 检测连接
if ($conn -> connect_error) {
    die("连接失败: " . $conn -> connect_error);
}

// 创建数据库
$sql = "CREATE DATABASE myDB";
if ($conn -> query($sql) === TRUE) {
    echo "数据库创建成功";
} else {
    echo "Error creating database: " . $conn -> error;
}

$conn -> close();
```

使用 PDO 实例创建数据库 **myDBPDO** :

```php
$servername = "localhost";
$username = "root";
$password = "123456";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);

    // 设置 PDO 错误模式为异常
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE myDBPDO";

    // 使用 exec() ，因为没有结果返回
    $conn -> exec($sql);

    echo "数据库创建成功<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e -> getMessage();
}

$conn = null;
```

- 使用 PDO 的最大好处是在数据库查询过程出现问题时可以使用异常类来处理问题。如果 try{ } 代码块出现异常，脚本会停止执行并会跳到第一个 catch(){ } 代码块执行代码。 在以上捕获的代码块中我们输出了 SQL 语句并生成错误信息。



### PHP MySQL 创建数据表

- 建表语句

```sql
CREATE TABLE t_guests (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT '主键',
    firstname VARCHAR(30) NOT NULL COMMENT '名',
    lastname VARCHAR(30) NOT NULL COMMENT '姓',
    email VARCHAR(50) COMMENT '邮箱',
    reg_date TIMESTAMP COMMENT '注册时间',
		`create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间'
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

>  UNSIGNED - 使用无符号数值类型，0 及正数

使用代码创建数据表：

```php
<?php

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "test";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn -> connect_error) {
    die("连接失败: " . $conn -> connect_error);
}

// 使用 sql 创建数据表
$sql = "CREATE TABLE t_guests (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT '主键',
    firstname VARCHAR(30) NOT NULL COMMENT '名',
    lastname VARCHAR(30) NOT NULL COMMENT '姓',
    email VARCHAR(50) COMMENT '邮箱',
    reg_date TIMESTAMP COMMENT '注册时间',
    `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间'
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if ($conn -> query($sql) === TRUE) {
    echo "Table t_guest created successfully";
} else {
    echo "创建数据表错误: " . $conn -> error;
}

$conn -> close();
```

- 另一种方式：

```php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // 设置 PDO 错误模式，用于抛出异常
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 使用 sql 创建数据表
    $sql = "CREATE TABLE t_guests (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT '主键',
    firstname VARCHAR(30) NOT NULL COMMENT '名',
    lastname VARCHAR(30) NOT NULL COMMENT '姓',
    email VARCHAR(50) COMMENT '邮箱',
    reg_date TIMESTAMP COMMENT '注册时间',
	  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间'
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    // 使用 exec() ，没有结果返回
    $conn -> exec($sql);
    echo "数据表 t_guests 创建成功";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e -> getMessage();
}

$conn = null;
```



### PHP MySQL 插入数据

在创建完数据库和表后，我们可以向表中添加数据。以下为一些语法规则：

- PHP 中 SQL 查询语句必须使用引号
- 在 SQL 查询语句中的字符串值必须加引号
- 数值的值不需要引号
- NULL 值不需要引号

```php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // 设置 PDO 错误模式，用于抛出异常
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO t_guests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";
    // 使用 exec() ，没有结果返回
    $conn -> exec($sql);
    echo "新记录插入成功";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e -> getMessage();
}

$conn = null;
```



### PHP MySQL 插入多条数据

```php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 开始事务
    $conn -> beginTransaction();
    // SQL 语句
    $conn -> exec("INSERT INTO t_guests (firstname, lastname, email) 
    VALUES ('John', 'Doe', 'john@example.com')");
    $conn -> exec("INSERT INTO t_guests (firstname, lastname, email) 
    VALUES ('Mary', 'Moe', 'mary@example.com')");
    $conn -> exec("INSERT INTO t_guests (firstname, lastname, email) 
    VALUES ('Julie', 'Dooley', 'julie@example.com')");

    // 提交事务
    $conn -> commit();
    echo "新记录插入成功";
} catch (PDOException $e) {
    // 如果执行失败回滚
    $conn -> rollback();
    $sql = "";
    echo $sql . "<br>" . $e -> getMessage();
}

$conn = null;
```



### PHP MySQL 预处理语句

预处理语句用于执行多个相同的 SQL 语句，并且执行效率更高。预处理语句的工作原理如下：

1. 预处理：创建 SQL 语句模板并发送到数据库。预留的值使用参数 "?" 标记 。例如：

```sql
INSERT INTO t_guests (firstname, lastname, email) VALUES(?, ?, ?)
```

2. 数据库解析，编译，对SQL语句模板执行查询优化，并存储结果不输出。
2. 执行：最后，将应用绑定的值传递给参数（"?" 标记），数据库执行语句。应用可以多次执行语句，如果参数的值不一样。

相比于直接执行SQL语句，预处理语句有两个主要优点：

- 绑定参数减少了服务器带宽，你只需要发送查询的参数，而不是整个语句。
- 预处理语句大大减少了分析时间，只做了一次查询（虽然语句多次执行）。

```php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // 设置 PDO 错误模式为异常
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 预处理 SQL 并绑定参数
    $stmt = $conn -> prepare("INSERT INTO t_guests (firstname, lastname, email) 
    VALUES (:firstname, :lastname, :email)");
    $stmt -> bindParam(':firstname', $firstname);
    $stmt -> bindParam(':lastname', $lastname);
    $stmt -> bindParam(':email', $email);

    // 插入行
    $firstname = "John";
    $lastname = "Doe";
    $email = "john@example.com";
    $stmt -> execute();

    // 插入其他行
    $firstname = "Mary";
    $lastname = "Moe";
    $email = "mary@example.com";
    $stmt -> execute();

    // 插入其他行
    $firstname = "Julie";
    $lastname = "Dooley";
    $email = "julie@example.com";
    $stmt -> execute();

    echo "新记录插入成功";
} catch (PDOException $e) {
    echo "Error: " . $e -> getMessage();
}
$conn = null;
```



### PHP MySQL 读取数据

```php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent ::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent ::current() . "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn -> prepare("SELECT id, firstname, lastname FROM t_guests");
    $stmt -> execute();

    // 设置结果集为关联数组
    $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
    foreach (new TableRows(new RecursiveArrayIterator($stmt -> fetchAll())) as $k => $v) {
        echo $v;
    }
} catch (PDOException $e) {
    echo "Error: " . $e -> getMessage();
}
$conn = null;
echo "</table>";
```

- 首先，我们设置了 SQL 语句从 t_guests 数据表中读取 id, firstname 和 lastname 三个字段。之后我们使用该 SQL 语句从数据库中取出结果集并赋给复制给变量 $result。

- 函数 num_rows() 判断返回的数据。

- 如果返回的是多条数据，函数 fetch_assoc() 将结合集放入到关联数组并循环输出。 while() 循环出结果集，并输出 id, firstname 和 lastname 三个字段值。



---

## PHP包含

在 PHP 中，您可以在服务器执行 PHP 文件之前在该文件中插入一个文件的内容。include 和 require 语句用于在执行流中插入写在其他文件中的有用的代码。

### 包含语法

```php
include 'filename';
// 或者
require 'filename';
```



### 实例1

假设您有一个标准的页头文件，名为 "header.php"。如需在页面中引用这个页头文件，请使用 include/require：

```php
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>测试包含</title>
</head>
<body>

<?php include 'header.php'; ?>
<h1>欢迎来到我的主页!</h1>
<p>一些文本。</p>

</body>
</html>
```



### 实例2

假设我们有一个在所有页面中使用的标准菜单文件。"menu.php":

```php
echo '<a href="/">主页</a>
<a href="/html">HTML 教程</a>
<a href="/php">PHP 教程</a>';
```

网站中的所有页面均应引用该菜单文件。以下是具体的做法：

```php
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>引入菜单</title>
</head>
<body>

<div class="leftmenu">
    <?php include 'menu.php'; ?>
</div>
<h1>欢迎来到我的主页!</h1>
<p>一些文本。</p>

</body>
</html>
```



### 实例3

假设我们有一个定义变量的包含文件（"vars.php"）：

```php
<?php
$color='red';
$car='BMW';
```

这些变量可用在调用文件中：

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>引入变量</title>
</head>
<body>

<h1>欢迎来到我的主页!</h1>
<?php
include 'vars.php';
echo "I have a $color $car"; // I have a red BMW
?>

</body>
</html>
```



### include 和 require 的区别

- require 一般放在 PHP 文件的最前面，程序在执行前就会先导入要引用的文件；
- include 一般放在程序的流程控制中，当程序执行时碰到才会引用，简化程序的执行流程。

- require 引入的文件有错误时，执行会中断，并返回一个致命错误；
- include 引入的文件有错误时，会继续执行，并返回一个警告。



---

## 命名空间

### 命名空间概述

- 命名空间是一种封装事物的方法，是一种抽象的概念。
- 类似操作系统中目录的组织方式：比如有个文件 `foo.txt`可以同时存在目录`/home/greg` 和目录 `/home/other` 中。这里使用目录将相关文件分组，起到了命名空间的作用。
- 在目录 `/home/grep` 之外访问 `foo.txt`文件时，需要将目录名和目录分隔符放在文件名之前得到 `/home/grep/foo.txt`。

- 命令空间的两个作用：处理重名和简化命名

```php
namespace my\name; // 定义命名空间

class MyClass {}
function myfunction() {}
const MYCONST = 1;

$a = new MyClass;
$c = new \my\name\MyClass; // 全局命名空间
```

> 命名空间名称大小写不敏感。名为 `PHP` 的命名空间，以及以这些名字开头的命名空间 （例如 `PHP\Classes`）被保留用作语言内核使用， 而不应该在用户空间的代码中使用。

- 完全限定名称：以反斜杠开头

- 受命名空间影响的类型：类、接口、函数、常量。



### 定义命名空间

```php
namespace MyProject;

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */  }
```



### 定义子命名空间

与目录和文件的关系很象，PHP 命名空间也允许指定层次化的命名空间的名称。因此，命名空间的名字可以使用分层次的方式定义：

```php
namespace MyProject\Sub\Level;

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */  }
```

上面的例子创建了常量 `MyProject\Sub\Level\CONNECT_OK`，类 `MyProject\Sub\Level\Connection` 和函数 `MyProject\Sub\Level\connect`。



### 在同一个文件中定义多个命名空间

也可以在同一个文件中定义多个命名空间。在同一个文件中定义多个命名空间有两种语法形式。

```php
namespace MyProject;

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */  }

namespace AnotherProject;

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */  }
```

不建议使用这种语法在单个文件中定义多个命名空间。建议使用下面的大括号形式的语法。

```php
namespace MyProject {

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */  }
}

namespace AnotherProject {

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */  }
}
```

将全局的非命名空间中的代码与命名空间中的代码组合在一起，只能使用大括号形式的语法。全局代码必须用一个不带名称的 namespace 语句加上大括号括起来，例如：

```php
namespace MyProject {

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */  }
}

// 全局代码
session_start();
$a = MyProject\connect();
echo MyProject\Connection::start();
```



### 使用命名空间：基础

在讨论如何使用命名空间之前，必须了解 PHP 是如何知道要使用哪一个命名空间中的元素的。可以将 PHP 命名空间与文件系统作一个简单的类比。在文件系统中访问一个文件有三种方式：

1. 相对文件名形式如 `foo.txt`。它会被解析为 `currentdirectory/foo.txt`，其中 currentdirectory 表示当前目录。因此如果当前目录是 `/home/foo`，则该文件名被解析为 `/home/foo/foo.txt`。
2. 相对路径名形式如 `subdirectory/foo.txt`。它会被解析为 `currentdirectory/subdirectory/foo.txt`。
3. 绝对路径名形式如 `/main/foo.txt`。它会被解析为 `/main/foo.txt`。

PHP 命名空间中的元素使用同样的原理。例如，类名可以通过三种方式引用：

1. 非限定名称，或不包含前缀的类名称，例如 `$a=new foo();` 或 `foo::staticmethod();`。如果当前命名空间是 `currentnamespace`，foo 将被解析为 `currentnamespace\foo`。如果使用 foo 的代码是全局的，不包含在任何命名空间中的代码，则 foo 会被解析为 `foo`。 警告：如果命名空间中的函数或常量未定义，则该非限定的函数名称或常量名称会被解析为全局函数名称或常量名称。
2. 限定名称,或包含前缀的名称，例如 `$a = new subnamespace\foo();` 或 `subnamespace\foo::staticmethod();`。如果当前的命名空间是 `currentnamespace`，则 foo 会被解析为 `currentnamespace\subnamespace\foo`。如果使用 foo 的代码是全局的，不包含在任何命名空间中的代码，foo 会被解析为 `subnamespace\foo`。
3. 完全限定名称，或包含了全局前缀操作符的名称，例如， `$a = new \currentnamespace\foo();` 或 `\currentnamespace\foo::staticmethod();`。在这种情况下，foo 总是被解析为代码中的文字名(literal name)`currentnamespace\foo`。

下面是一个使用这三种方式的实例：

file1.php

```php
namespace Foo\Bar\subnamespace;

const FOO = 1;
function foo() {
    return 'foo_function1';
}

class foo {
    static function staticmethod() {
        echo 'foo_static_method1';
    }
}
```

file2.php

```php
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


/* 完全限定名称 */
echo \Foo\Bar\FOO;
echo \Foo\Bar\foo();
echo \Foo\Bar\subnamespace\foo();
```

> 注意访问任意全局类、函数或常量，都可以使用完全限定名称，例如 **\strlen()** 或 **\Exception** 或 `\INI_ALL`。

```php
<?php
// 全局类、函数和常量
namespace Foo;

function strlen() {
return 'strlen() function';
}
const INI_ALL = 3;
class Exception {

}

$a = strlen('hi'); // 调用此命名空间的strlen
$b = \strlen('hi'); // 调用全局函数strlen
$c = INI_ALL; // 访问此命名空间常量 INI_ALL
$d = \INI_ALL; // 访问全局常量 INI_ALL
$e = new Exception('error'); // 实例化此命名空间的 Exception
$f = new \Exception('error'); // 实例化全局类 Exception

echo $a . PHP_EOL; // strlen() function
echo $b . PHP_EOL; // 2

echo $c . PHP_EOL; // 3
echo $d . PHP_EOL; // 7

$e;
$f;
```



- 同一个命名空间可以定义在多个文件中，即允许将同一个命名空间的内容分割存放在不同的文件中。

```php
namespace test1\test2;

function fun1() {
    return 'fun1 invoke';
}
```

```php
namespace test1\test2;

function fun2() {
    return 'fun2 invoke';
}
```

```php
include 'php1.php';
include 'php2.php';

echo test1\test2\fun1();
echo test1\test2\fun2();
```

### 命名空间和动态语言特征

- 动态访问元素

```php
<?php

class classname {
    function __construct() {
        echo __METHOD__, "\n";
    }
}

function funcname() {
    echo __FUNCTION__, "\n";
}
const constname = "global";

$a = 'classname';
$obj = new $a; // 输出 classname::__construct
$b = 'funcname';
$b(); // 输出 funcname
echo constant('constname'), "\n"; // 输出 global
```



### 使用命名空间：别名/导入

通过别名引用或导入外部的完全限定名称，是命名空间的一个重要特征。PHP 可以为常量、函数、类、接口、命名空间导入或设置别名。别名是通过操作符 `use` 来实现的。下面是五种导入方式的例子：

- **使用 use 操作符导入/使用别名**

```php
namespace foo;
use My\Full\Classname as Another;

// 下面的例子与 use My\Full\NSname as NSname 相同
use My\Full\NSname;

// 导入一个全局类
use ArrayObject;

// 导入函数
use function My\Full\functionName;

// 为函数设置别名
use function My\Full\functionName as func;

// 导入常量
use const My\Full\CONSTANT;

$obj = new namespace\Another; // 实例化 foo\Another 对象
$obj = new Another; // 实例化 My\Full\Classname　对象
NSname\subns\func(); // 调用函数 My\Full\NSname\subns\func
$a = new ArrayObject(array(1)); // 实例化 ArrayObject 对象
func(); // 调用函数 My\Full\functionName
echo CONSTANT; // 输出 My\Full\CONSTANT 的值
```



- **通过 use 操作符导入/使用别名，一行中包含多个 use 语句**

```php
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // 实例化 My\Full\Classname 对象
NSname\subns\func(); // 调用函数 My\Full\NSname\subns\func
```



- **导入和动态名称**

```php
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // 实例化一个 My\Full\Classname 对象
$a = 'Another';
$obj = new $a;      // 实际化一个 Another 对象
```

导入操作是在编译执行的，但动态的类名称、函数名称或常量名称则不是。



- **导入和完全限定名称**

导入操作只影响非限定名称和限定名称。完全限定名称由于是确定的，故不受导入的影响。

```php
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // class My\Full\Classname 的实例对象
$obj = new \Another; // class Another 的实例对象
$obj = new Another\thing; // class My\Full\Classname\thing 的实例对象
$obj = new \Another\thing; // class Another\thing 的实例对象
```



- `use` **声明编组**

通过单个 [`use`](https://www.php.net/manual/zh/language.namespaces.importing.php) 语句，可以将来自同一个 [`namespace`](https://www.php.net/manual/zh/language.namespaces.definition.php) 的 类、函数、常量一起编组导入。

```php
use some\namespace\ClassA;
use some\namespace\ClassB;
use some\namespace\ClassC as C;

use function some\namespace\fn_a;
use function some\namespace\fn_b;
use function some\namespace\fn_c;

use const some\namespace\ConstA;
use const some\namespace\ConstB;
use const some\namespace\ConstC;

// 等同于以下编组的 use 声明
use some\namespace\{ClassA, ClassB, ClassC as C};
use function some\namespace\{fn_a, fn_b, fn_c};
use const some\namespace\{ConstA, ConstB, ConstC};
```



### namespace关键词和_NAMESPACE__常量

访问当前命名空间内部元素的方法，**`__NAMESPACE__`** 魔术常量和 `namespace` 关键字。

- **输出命名空间名称**

```php
namespace MyProject;

echo '"', __NAMESPACE__, '"'; // "MyProject"
```

- **全局代码命名空间为空串**

```php
echo '"', __NAMESPACE__, '"'; // 输出 ""
```

- **使用 __NAMESPACE__ 动态创建名称**

```php
namespace MyProject;

function get($classname) {
    $a = __NAMESPACE__ . '\\' . $classname;
    return new $a;
}
```

- **namespace 操作符在命名空间中**

```php
namespace MyProject;

use blah\blah as mine; // 参考 "使用命名空间：别名/导入"

blah\mine(); // 调用函数 MyProject\blah\mine()
namespace\blah\mine(); // 调用函数 MyProject\blah\mine()

namespace\func(); // 调用函数 MyProject\func()
namespace\sub\func(); // 调用函数 MyProject\sub\func()
namespace\cname::method(); // 调用 class MyProject\cname 的静态方法 "method"
$a = new namespace\sub\cname(); // class MyProject\sub\cname 的实例对象
$b = namespace\CONSTANT; // 设置 $b 的值为常量 MyProject\CONSTANT
```

- **namespace 操作符在全局代码中**

```php
namespace\func(); // 调用函数 func()
namespace\sub\func(); // 调用函数 sub\func()
namespace\cname::method(); // 调用 class cname 的静态方法 "method"
$a = new namespace\sub\cname(); // class sub\cname 的实例对象
$b = namespace\CONSTANT; // 设置 $b 的值为常量 CONSTANT
```



### 全局空间

如果没有定义任何命名空间，所有的类与函数的定义都是在全局空间，与 PHP 引入命名空间概念前一样。在名称前加上前缀 `\` 表示该名称是全局空间中的名称，即使该名称位于其它的命名空间中时也是如此。

```php
namespace A\B\C;

/* 这个函数是 A\B\C\fopen */
function fopen() { 
     /* ... */
     $f = \fopen(...); // 调用全局的fopen函数
     return $f;
} 
```



### 使用命名空间：后备全局函数/常量

类的访问：类名称总是解析到当前命名空间中的名称。如果不是当前命名空间中的类必须使用完全限定类名。

```php
namespace A\B\C;
class Exception extends \Exception {}

$a = new Exception('hi'); // $a 是类 A\B\C\Exception 的一个对象
$b = new \Exception('hi'); // $b 是类 Exception 的一个对象

$c = new ArrayObject; // 致命错误, 找不到 A\B\C\ArrayObject 类
```

> 对于函数和常量来说，如果当前命名空间中不存在该函数或常量，PHP 会退而使用全局空间中的函数或常量。




## HTML和PHP结合使用

### PHP请求

PHP 中的 $_GET 和 $_POST 变量用于检索表单中的信息，比如用户输入。当处理 HTML 表单时，PHP 能把来自 HTML 页面中的表单元素自动变成可供 PHP 脚本使用。

form.html

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>测试表单的使用</title>
</head>
<body>
<form action="welcome.php" method="get">
    姓名: <input type="text" name="fname">
    年龄: <input type="text" name="age">
    <input type="submit" name="提交">
</form>
</body>
</html>
```

点击按钮时发送到服务器的 URL:

```
http://localhost/PHPCode/form/welcome.php?name=mq&age=20
```

welcome.php

```php
欢迎<?php echo $_POST["fname"]; ?>!<br>
你的年龄是 <?php echo $_POST["age"]; ?> 岁。
```

"welcome.php" 文件现在可以通过 $_GET 变量来收集表单数据了（请注意，表单域的名称会自动成为 $_GET 数组中的键）。

>  HTML 表单中使用 method="get" 时，所有的变量名和值都会显示在 URL 中。所以在发送密码或其他敏感信息时，不应该使用这个方法！

预定义的 $_POST 变量用于收集来自 method="post" 的表单中的值。从带有 POST 方法的表单发送的信息，对任何人都是不可见的（不会显示在浏览器的地址栏），并且对发送信息的量也没有限制。

![image-20220104101335347](https://gitee.com/itzhouq/images/raw/master/notes/2021/20220104101335.png)

https://www.processon.com/view/link/61d3ad5bf346fb06920556de

### PHP获取下拉菜单的数据

php_form_select：

```php
<?php
$q = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '';
if ($q) {
    if ($q == 'BAIDU') {
        echo '百度<br>http://www.baidu.com';
    } else if ($q == 'GOOGLE') {
        echo 'Google 搜索<br>http://www.google.com';
    } else if ($q == 'TAOBAO') {
        echo '淘宝<br>http://www.taobao.com';
    }
} else {
    ?>
    <form action="" method="get">
        <select name="q">
            <option value="">选择一个站点:</option>
            <option value="BAIDU">BAIDU</option>
            <option value="GOOGLE">Google</option>
            <option value="TAOBAO">Taobao</option>
        </select>
        <input type="submit" value="提交">
    </form>
    <?php
}
?>
```

- action 属性值为空表示提交到当前脚本
- isset：检测变量是否已声明并且其值不为 `null`
- htmlspecialchars：将特殊字符转换为 HTML 实体



### checkbox复选框

```php
<?php
$q = isset($_POST['q']) ? $_POST['q'] : '';
if (is_array($q)) {
    $sites = array(
        'BAIDU' => '百度: http://www.baidu.com',
        'GOOGLE' => 'Google 搜索: http://www.google.com',
        'TAOBAO' => '淘宝: http://www.taobao.com',
    );
    foreach ($q as $val) {
        echo $sites[$val] . PHP_EOL;
    }

} else {
    ?>
    <form action="" method="post">
        <input type="checkbox" name="q[]" value="BAIDU"> BAIDU<br>
        <input type="checkbox" name="q[]" value="GOOGLE"> Google<br>
        <input type="checkbox" name="q[]" value="TAOBAO"> Taobao<br>
        <input type="submit" value="提交">
    </form>
    <?php
}
?>
```



### PHP表单验证

```php
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>表单校验测试代码</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>
<body>

<?php
// 定义变量并默认设置为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "名字是必需的";
    } else {
        $name = test_input($_POST["name"]);
        // 检测名字是否只包含字母跟空格
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "只允许字母和空格";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "邮箱是必需的";
    } else {
        $email = test_input($_POST["email"]);
        // 检测邮箱是否合法
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
            $emailErr = "非法邮箱格式";
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
        // 检测 URL 地址是否合法
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $websiteErr = "非法的 URL 的地址";
        }
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "性别是必需的";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<h2>PHP 表单验证实例</h2>
<p><span class="error">* 必需字段。</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]); ?>">
    名字: <label>
        <input type="text" name="name" value="<?php echo $name; ?>">
    </label>
    <span class="error">* <?php echo $nameErr; ?></span>
    <br><br>
    E-mail: <label>
        <input type="text" name="email" value="<?php echo $email; ?>">
    </label>
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>
    网址: <label>
        <input type="text" name="website" value="<?php echo $website; ?>">
    </label>
    <span class="error"><?php echo $websiteErr; ?></span>
    <br><br>
    备注: <label>
        <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
    </label>
    <br><br>
    性别:
    <label>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?>
               value="female">
    </label>女
    <label>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?>
               value="male">
    </label>男
    <span class="error">* <?php echo $genderErr; ?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>您输入的内容是:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>
</html>
```

- `empty()`：检查一个变量是否为空

- `$_SERVER():`是一个包含了诸如头信息(header)、路径(path)、以及脚本位置(script locations)等等信息的数组。这个数组中的项目由 Web 服务器创建。

```php
<!DOCTYPE html>
<html lang="en">
<body>

<?php
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
?>

</body>
</html>

```

- `$_SERVER["PHP_SELF"]`：是超级全局变量，返回当前正在执行脚本的文件名
- `preg_match()：`用于执行一个正则表达式匹配。

- `htmlspecialchars() `：把一些预定义的字符转换为 HTML 实体。



### 验证必须字段

$nameErr, $emailErr, $genderErr, 和 $websiteErr.。这些错误变量将显示在必需字段上。 我们还为每个$_POST变量增加了一个if else语句。 这些语句将检查 $_POST 变量是 否为空（使用php的 empty() 函数）。如果为空，将显示对应的错误信息。 如果不为空，数据将传递给test_input() 函数。



### 显示错误信息

在 HTML 实例表单中，我们为每个字段中添加了一些脚本， 各个脚本会在信息输入错误时显示错误信息。如果用户未填写信息就提交表单则会输出错误信息。



### 验证名称和邮箱和URL

检测 name 字段是否包含字母和空格，如果 name 字段值不合法，将输出错误信息。

```php
$name = test_input($_POST["name"]);
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  $nameErr = "只允许字母和空格"; 
}
```

检测 e-mail 地址是否合法。如果 e-mail 地址不合法，将输出错误信息。

```php
$email = test_input($_POST["email"]);
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
  $emailErr = "非法邮箱格式"; 
}
```

检测URL地址是否合法 (以下正则表达式运行URL中含有破折号:"-")， 如果 URL 地址不合法，将输出错误信息。

```PHP
$website = test_input($_POST["website"]);
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
  $websiteErr = "非法的 URL 的地址"; 
}
```




## 日期

### 时区

**date_default_timezone_set()** 设定用于所有日期时间函数的默认时区。

- 获取时区

```php
date_default_timezone_set('America/Los_Angeles');

$script_tz = date_default_timezone_get();

var_dump($script_tz);
echo $script_tz . PHP_EOL;
```

- 上海时区：Asia/Shanghai
- 洛杉矶时区：America/Los_Angeles
- [支持的时区列表](https://www.php.net/manual/zh/timezones.php)



### date()函数

格式化本地日期和时间，并返回格式化的日期字符串：

```php
// 设置时区
date_default_timezone_set("PRC");

echo date("Y-m-d H:i:s")  . PHP_EOL;
echo date("Y 年 m 月 d 日 H 点 i 分 s 秒")  . PHP_EOL;
$time = strtotime("2018-01-18 08:08:08");  // 将指定日期转成时间戳
echo date("Y-m-d H:i:s", $time)  . PHP_EOL;
```

- PRC：People’s Republic of China，中华人民共和国，也就是日期使用中国的时区。


