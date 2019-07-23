#!/usr/bin/php
<?php

    if ($argc === 2)
    {
        if (file_exists($argv[1]))
        {
            $file = fopen($argv[1], 'r');
            while ($line_num = fgets($file))
            {
                $line_fire = fgets($file);
                $heure = explode (",", $line_fire);
                $com = fgets($file);
                $space = fgets($file);
                $Heure_com[] = array("Heure" => $heure[0], "Line" => $line_fire ,"Com" => $com);
            }
            sort($Heure_com);
            $i = 1;
            foreach($Heure_com as $key => $elem)
            {
                if ($i != 1)
                    echo "\n";
                echo "$i\n";
                echo $elem['Line'];
                echo $elem['Com'];
                $i++;
            }
        }
    }

?>