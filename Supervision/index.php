<?php
session_start() ;
$_SESSION["user"]="";
$_SESSION["user"] ="";
if(($_SESSION["user"] == "rt") && ($_SESSION["mdp"]== "Reun10n"))
{
	header("Location: web/hello.php"); 
}

else
{
	header("Location: web/Formulaire/login.php"); 
}	
?>