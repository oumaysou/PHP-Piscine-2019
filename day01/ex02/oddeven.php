
<?php

while(42)
{
	echo "Entrez un nombre: ";
	$line = trim(fgets(STDIN));
	// if (feof(STDIN) == TRUE)
	// 	exit();
	if (!is_numeric($line))
	{
		echo  "'$line' n'est pas un chiffre";
		echo "\n";
	}
	else
	{
		echo 'Le chiffre '.$line.' est ';
		if (substr($line, 0) % 2 == 0)
		{
			echo  "Pair\n";
		}
		else
		{
			echo "Impair\n";
		}
	}
}

?>