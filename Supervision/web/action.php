<?php
session_start() ;

if(($_SESSION["user"] == "rt") && ($_SESSION["mdp"]== "Reun10n"))
{
	//RIEN
}

else
{
	header("Location: Formulaire/login.php"); 
}	



// On retrouve l'ordi avec l'adresse MAC recu en GET:
$mac = $_GET['mac'];

// Connection à la BDD:
	include("mysql.php");	

if ($_GET['supp_erreur'] == oui)
{
	$sql= 'UPDATE users SET msg="" WHERE addmac="'.$mac.'";';
	$req = mysql_query($sql);
	$url = "details.php?&mac=".$mac;
	header("Location: ".$url); 
}
else
{
// Pour supprimer :
	$sql= 'DELETE FROM users WHERE addmac="'.$mac.'";';
	$req = mysql_query($sql);
	header("Location: hello.php"); 
}

?>