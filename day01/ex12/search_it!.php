<?php
    if ($argc < 3)
        exit();
    while (--$argc > 1)
    {
        $tab = trim($argv[$argc]);
        $tab = preg_replace('/[ ]{2,}/', '', $tab);
        $value = explode(":", $tab);
        if ($value[0] == $argv[1])
        {    
            echo $value[1] . "\n";
            exit();
        }
    }
?>