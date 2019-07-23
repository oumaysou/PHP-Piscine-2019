<?php

    $hash = file_get_contents("table");
    $test1 = hash("whirlpool","123");
    $test2 = hash("whirlpool","123");
    $test3 = hash("whirlpool","99"); 
    $hash = unserialize($hash);
    // foreach ($hash as $key => $elem)
    // {
    //     echo ">>" . $key . "<<";
    //     print_r ($elem);
    //     echo "-----";
    // }
    echo ($test1); echo "\n";
    echo ($test2); echo "\n";
    echo ($test3); echo "\n";
?>