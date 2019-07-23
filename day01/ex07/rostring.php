<?php
    if ($argc == 1)
        exit();
    $array = trim ($argv[1]);
    $array = preg_replace('/[ ]{2,}/', ' ', $array);
    $array = explode (" ", $array);
    $i = 0;
    while (++$i < count($array))
    {
        echo $array[$i];
        if ($i != count($array))
            echo " ";
    }
    echo $array[0] ."\n";
?>