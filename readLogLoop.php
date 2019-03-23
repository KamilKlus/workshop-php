<?php

include "Class/LogLoop.php";

use logProcessingLoop as lpl;
?>
    <form method="post" action="readLogLoop.php">
        <input style="width: 25%" type='text' name='content' placeholder='Zadejte název dokumentu/cestu:'><br>
        <input style="width: 25%" type='text' name='start' placeholder='Zadejte začínající oddělavací symbol/řetezec'><br>
        <input style="width: 25%" type='text' name='end' placeholder='Zadejte konečný oddělavací symbol/řetezec'><br>
        <button name="do">Show Log</button>
    </form>
<?php
if (isset($_POST["do"])) {
    //získané pdaje od uživatele
    $content = $_POST["content"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    $loopFile = new lpl\LogLoop();
    $preg = "/" . $start . "(.*?)" . $end . "/";
    //cyklus pro zpracování a výpis
    while (true) {
        $getContent = $loopFile->readFile($content, $preg);
        foreach ($getContent as $x => $x_value) {
            $printFormatLoop($x, $x_value);
        }
        echo "-------------------------------------<br>";
        ob_flush();
        flush();
        //počet sekudn před dalším provedení cyklu
        sleep(5);
        //umožnění nekonečného cyklu
        Set_time_limit(0);
    }
}

