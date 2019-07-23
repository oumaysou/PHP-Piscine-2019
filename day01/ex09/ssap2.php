<?php

if ($argc == 1)
    exit();

$array = array();
$i = 0;
while (++$i < $argc)
{
    $tab = trim($argv[$i]);
    $tab = preg_replace('/[ ]{2,}/', ' ', $tab);
    $tab = explode(" ", $tab);
    $array = array_merge($array, $tab);
    sort($array);
}

foreach($array as $elem)
{
    if (is_numeric($elem))
        $num[] = $elem;
}
sort($num, SORT_STRING);

foreach($array as $elem)
{
    if (ctype_alpha($elem))
        $alpha[] = $elem;
}
sort($alpha, SORT_STRING | SORT_FLAG_CASE);

foreach($array as $elem)
{
    if (!is_numeric($elem) && !ctype_alpha($elem))
        $rest[] = $elem; 
}
sort ($rest);
foreach($alpha as $i)
    echo $i . "\n";
foreach($num as $i)
    echo $i . "\n";
foreach($rest as $i)
    echo $i . "\n";
?>