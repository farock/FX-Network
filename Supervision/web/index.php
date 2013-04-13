<?php
session_start() ;
$_SESSION["user"]="";
$_SESSION["user"] ="";
if(($_SESSION["user"] == "rt") && ($_SESSION["mdp"]== "Reun10n"))
{
	header("Location: hello.php"); 
}

else
{
	header("Location: Formulaire/login.php"); 
}	
?>