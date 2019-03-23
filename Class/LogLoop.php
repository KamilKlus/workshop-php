<?php

namespace logProcessingLoop;


class LogLoop
{
    public function readFile(string $fileName, string $preg): array
    {
        //načtení souboru po řádkách a vyjmutí obsahu, dle parametrů
        $file = fopen($fileName, "r");
        $array = array();
        while (!feof($file)) {
            $input = fgets($file);
            if (preg_match($preg, $input, $match) == 1) {
                if (!array_key_exists($match[1], $array)) {
                    $array[$match[1]] = 1;
                } else {
                    $array[$match[1]] = $array[$match[1]] + 1;
                }
            }
        }
        return $array;
    }
}
//formát pro výpus procházenného souboru
$printFormatLoop = function (string $key, int $value) {
    printf(strtolower($key) . " : " . $value . "<br>");
};