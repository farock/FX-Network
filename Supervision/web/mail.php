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

// Connection à la BDD:
	include("mysql.php");


	$sql= "SELECT * FROM users WHERE status=0;";
	$req = mysql_query($sql);
	$msg = "Bonjour, Voici la liste des périphériques qui ne répondent plus sur le réseau : </br><ul>";
	while($data = mysql_fetch_array($req))
	{
		$msg = $msg."<li><b>".$data['nom']."</b> | ".$data['addip']." | ".$data['addmac']."</li>";
	}
	 		
	 $msg = $msg."</ul>";

// MAIL : 

$destinataire = 'f.payet@rt-iut.re';
// Adresse email du destinataire
$sujet = '[ ERREUR SUR LE RESEAU ]';
// Titre de l'email

// Pour envoyer un email HTML, l'en-tête Content-type doit être défini
$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

mail($destinataire, $sujet, $msg, $headers);
// Fonction principale qui envoi l'email
	header("Location: hello.php"); 



?>