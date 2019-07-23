<?php
	if ($_POST["submit"] === "OK" && $_POST["oldpw"] !== "" )
	{
		if ($_POST["newpw"] === "")
		{
			echo "ERROR\n";
		}
		else
		{
			$modify = FALSE;
			$pwd = hash('whirlpool', $_POST['newpw']);
			$oldpwd = hash("whirlpool", $_POST['oldpw']);
			$array = file_get_contents("../private/passwd");
			$test = unserialize($array);
			foreach ($test as $key => $elem) 
			{
				if ($elem['login'] === $_POST['login'] && $oldpwd === $elem['passwd'])
				{
					$test[$key]['passwd'] = $pwd;
					$modify = TRUE;
				}
			}
			if ($modify == TRUE)
			{
				$seri = serialize($test);
				file_put_contents("../private/passwd", $seri);
				echo "OK\n";
			}
			else
				echo "ERROR\n";
		}
	}
?>