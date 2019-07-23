#!/usr/bin/php
<?php

    if ($argc == 2)
    {
        if (file_exists($argv[1]))
            $myfile = file_get_contents($argv[1]);
        function strup($string)
        {
            return (strtoupper($string[0]));
        }
        function str2($string)
        {
            $tab = preg_replace_callback('/=\s*"(.|\n)*"|>[\w\s.]+</',"strup", $string);
            return ($tab[0]);
        }
        function str1($string)
        {
        $tab = preg_replace_callback('/title\s*?=\s*"(.|\n)*?"|>[\w\s.]+</', "str2", $string);
        return ($tab[0]);
        }
        $myfile = preg_replace_callback('/<a(.|\n)*<\/a>/', "str1", $myfile);
        echo $myfile;
    }

?>
