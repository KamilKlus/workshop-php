<?php
namespace logProcessing;

class Log

{
    //funkce pro separování obsahu
    public function getStringBetween($string, $start, $end)
    {
        $string = ' ' . $string;
        //nalezneme pozici
        $ini = strpos($string, $start);
        // pokud není vracíme prázdný řetězec
        if ($ini == 0) return '';
        //separování řetězce pokud existuje a vracíme jej
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    public function getContent(string $content, string $start, string $end): array
    {
        //načteme soubor
        $file = fopen($content, "r");
        //deklarujeme pole
        $array = array();
        //procházíme soubor
        while (($line = fgets($file)) !== false) {
            if (strpos($line, $start) !== false) {
                //dostaneme obsah
                $key = $this->getStringBetween($line, $start, $end);
                //vkládánáme do pole jako klíč s hodnotou 1 a pokud již je, jeho hodnotu zvíšíme o jedna
                if (!array_key_exists($key, $array)) {
                    $array[$key] = 1;
                } else {
                    $array[$key] = $array[$key] + 1;
                }
            }
        }
        return $array;
    }

}
//formát pro výpus procházenného souboru
$printFormat= function (string $key, int $value) {
    printf(strtolower($key) . " : " . $value . "<br>");
};
