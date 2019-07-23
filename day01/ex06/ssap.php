<?php

    if ($argc == 1)
        exit();
    function epur_str($string)
    {
        $tab = trim($string);
        $tab = preg_replace('/[ ]{2,}/', ' ', $tab);
        return ($tab);
    }
    function ft_split($string)
    {
        $tab = epur_str($string);
        $tab = explode(" ", $tab);
        sort($tab);
        return ($tab);
    }
    $array = array();
    foreach ($argv as $arg)
    {
        if ($arg != $argv[0])
        {
            $tab = ft_split($arg);
            $array = array_merge($array, $tab);
        }
    }
    sort($array);
    foreach ($array as $word)
        echo $word . "\n";
        
?>