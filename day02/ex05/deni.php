#!/usr/bin/php
<?php

if ($argc == 3 && file_exists($argv[1]))
{
    $fd = fopen($argv[1], "r");
    $entry_key = $argv[2];
    $first_line = fgets($fd);
    $file_keys = explode(";", trim($first_line));
    //recherche strict activer avec true ;)
    if (array_search($entry_key, $file_keys, true) === FALSE)
        return;
    $i = 0;
    $big = array();
    while ($line = fgets($fd))
    {
        $line_j = explode(";", trim($line));
        $y = 0;
        foreach ($file_keys as $key)
        {
            $big_data[$x][$key] = $line_j[$y];
            $y++;
        }
        $x++;
    }
    // print_r ($big_data);
    while (42) 
    {
        echo "Entrez votre commande : ";
        if (($input = fgets(STDIN)) == null)
        {
            return;
        }
        if (trim($input) !== "toto titi tutu")
        {
            $to_replace = null;
        //cherch cle + value
            preg_match_all("/[\w]+\['[\w]+'\]/", $input, $matches_tab);
        // print_r($matches_tab);
            $matches = $matches_tab[0];
            foreach ($matches as $match)
            {
            //cle chercher what
                preg_match("/^[\w]+/", $match, $what_tab);
                $what = $what_tab[0];
    
            //qui
                preg_match("/'[\w]+'/", $match, $who_tab);
                $who = trim($who_tab[0], "'");
            //chercher le tab ds le big qui contient mes elems
                foreach ($big_data as $elem)
                {
                    if ($elem[$entry_key] == $who) {
                    $to_replace = $elem[$what];
                // echo ">>$elem[$what]<<";
                }
            }
            $input = str_replace("$".$match, "\"" . $to_replace . "\"", $input);
            }
            //LANCER LA NOUVELLE COMMANDE ENFIN!!!
            eval($input);
        }
        else
            echo "PHP Parse error : syntax error, unexpected T_STRING in [....]\n";
    }
}
?>