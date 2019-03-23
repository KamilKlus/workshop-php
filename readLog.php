<?php
include "Class/Log.php";
use logProcessing as lp;

$file = new lp\log();
$newContent = $file->getContent("example.log","test.",":");
foreach ($newContent as $x => $x_value) {
    $printFormat($x,$x_value);
}