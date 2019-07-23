#!/usr/bin/php
<?php

    if ($argc > 1)
    {
        $arg = trim($argv[1]);
        $arg = preg_replace('/[\s\t]{2,}/', ' ', $arg);
        echo $arg . "\n";
    }

?>
