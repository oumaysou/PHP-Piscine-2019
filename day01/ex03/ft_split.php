<?php

    function ft_split($string)
    {
        $tab = explode(" ", $string);
        if ($string != null)
            sort($tab);
        return ($tab);
    }
    
?>