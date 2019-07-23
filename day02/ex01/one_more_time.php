#!/usr/bin/php
<?php

    date_default_timezone_set('Europe/Paris');
 
    $month = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
    $count = 5;
    if ($argc == 1)
        exit();
    if (count($tab = preg_split('/[ ]/', $argv[1])) != 5)
    {
        echo "Wrong Format\n";
        return;
    }
    else
    { 
        if (preg_match('/^((([Ll]un|[Mm](ar|ercre)|[Jj]eu|[Vv]endre|[Ss]ame)(di))|[Dd](imanche))$/', $tab[0]))
            $count--;
        if (1 <= $tab[1] && $tab[1] <= 31)
        {
            if (preg_match('/^[1-9]$|^0[1-9]$|^[12][0-9]$|3[01]/', $tab[1]))
            $count--;
        }
        if (preg_match('/^([Jj]anvier|[Ff]évrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj](uin|uillet)|[Aa]oût|([Ss]eptem|[Oo]cto|[Nn]ovem|[Dd]écem)(bre))$/', $tab[2]))
            $count--;
        if (preg_match('/^[0-9]{4}$/', $tab[3]))
            $count--;
        if (preg_match('/(^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9]$))/', $tab[4]))
            $count--;
    }
    if (!$count)
    {
        $date = explode(':', $tab[4]);
        $month_index = preg_grep("/^$tab[2]$/", $month);
        if (!$month_index)
            $month_index = preg_grep("/^$tab[2]$/", array_map('ucfirst', $month));
        echo mktime($date[0], $date[1], $date[2], key($month_index) + 1, $tab[1], $tab[3]) . "\n";
    }
    else
        echo "Wrong Format\n";
?>
