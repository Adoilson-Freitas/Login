<?php 
	session_start();
	if(!isset($_SESSION['id_usuario']))
	{
		header("localhost: index.php");
		exit;
	}

?>


Seja bem Vindo!
<a href="Sair.php">Sair</a>