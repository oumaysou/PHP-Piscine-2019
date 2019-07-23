<?php

if ($argc == 2)
{
    $string = trim($argv[1]);
    $string = preg_replace('/[ ]{2,}/', ' ', $string);
    echo $string . "\n";
}

?>