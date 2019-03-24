<?php
include "Class/Log.php";

use logProcessing as lp;
?>
    <form method="post" action="readLog.php">
        <input style="width: 25%" type='text' name='content' placeholder='Zadejte název dokumentu/cestu:'><br>
        <input style="width: 25%" type='text' name='start' placeholder='Zadejte začínající oddělavací symbol/řetezec'><br>
        <input style="width: 25%" type='text' name='end' placeholder='Zadejte konečný oddělavací symbol/řetezec'><br>
        <button name="do">Show Log</button>
    </form>
<?php
$obj = new lp\Log();
call_user_func(array($obj, 'myCallbackMethod'));
if (isset($_POST["do"])) {
    //získané pdaje od uživatele
    $content = $_POST["content"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    $file = new lp\log();
    $content = $_POST["content"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    //použítí třídy pro zpracování a výstup
    $newContent = $file->getContent($content, $start, $end);
    foreach ($newContent as $x => $x_value) {
        $printFormat($x, $x_value);
    }
}