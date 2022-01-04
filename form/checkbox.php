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
