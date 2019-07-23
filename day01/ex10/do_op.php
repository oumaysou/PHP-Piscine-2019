<?php

    if ($argc != 4)
    {
      echo "Incorrect Parameters\n";
     exit();
    }

    $nb1 = trim($argv[1]);
    $nb2 = trim($argv[3]);
    $op = trim($argv[2]);
    if ($op == "+")
       echo $nb1 + $nb2;
    elseif ($op == "-")
      echo $nb1 - $nb2;
    elseif ($op == "*")
     echo $nb1 * $nb2;
    elseif ($op == "/")
     echo $nb1 / $nb2;
    elseif ($op == "%")
     echo $nb1 % $nb2;
    echo "\n";
?>