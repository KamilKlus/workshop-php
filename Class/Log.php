<?php
namespace logProcessing;

class Log

{
    public function getStringBetween($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    public function getContent(string $content, string $start, string $end): array
    {
        $file = fopen($content, "r");
        $array = array();
        while (($line = fgets($file)) !== false) {
            if (strpos($line, $start) !== false) {
                $key = $this->getStringBetween($line, $start, $end);
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

$printFormat = function (string $key, int $value) {
    printf(strtolower($key) . " : " . $value . "<br>");
};
