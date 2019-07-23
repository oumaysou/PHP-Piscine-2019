<?php

    function ft_is_sort($array)
    {
        $nonsorted = $array;
        sort($array);
        $i = -1;
        while (++$i < count($nonsorted))
        {
            if ($array[$i] != $nonsorted[$i])
                return (FALSE);
        }
        return (TRUE);
    }
    
?>