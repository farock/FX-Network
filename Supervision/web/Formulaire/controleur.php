<?php
session_start() ;



if(($_POST["user"] == "rt") && ($_POST["mdp"]== "Reun10n"))
{
	$_SESSION['user'] = $_POST["user"];
	$_SESSION['mdp'] = $_POST["mdp"];
	header("Location: ../hello.php"); 
}

else
{
	header("Location: login.php"); 
}

?>