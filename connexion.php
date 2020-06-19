<?php
	try
	{
		$pdo=new PDO('mysql:host=localhost;dbname=sagem','root','');
   	}
    catch (PDOException $e)
	{
		die($e -> getMessage());
    }
 ?>
