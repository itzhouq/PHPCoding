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