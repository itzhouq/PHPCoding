<?php

$xml = simplexml_load_file("test.xml");
print_r($xml);
var_dump($xml);
echo PHP_EOL;

echo $xml -> to . "<br>";
echo $xml -> from . "<br>";
echo $xml -> heading . "<br>";
echo $xml -> body;