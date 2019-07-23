<?php
include("ft_is_sort.php");

$tab = array("A", "B", "C", "D");
$tab[] = "Et qu'est ce qu'on fait maintenant ?";

if (ft_is_sort($tab))
    echo "Le tableau est trie\n";
else
    echo "le tableau n'est pas trie\n";
?>