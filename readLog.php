<?php
include "Class/textFile.php";

use logProcessing as lp;
use logFormat as lf;

$file = new lp\textFile();
$newContent = $file->getContent("example.log","test.",":");
foreach ($newContent as $x => $x_value) {
    $printFormat($x,$x_value);
}