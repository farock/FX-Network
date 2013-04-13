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

?>

<html>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<head>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<title> [FXNetwork] Supervision </title> 
		
	</head>
	<body>
<?php	
// Connection à la BDD:
	include("mysql.php");


// On sélectionne le pc cliqué :
$addmac = $_GET['mac'];

	$sql= 'SELECT * FROM users WHERE addmac="'.$addmac.'";';
	$req = mysql_query($sql);
	$data = mysql_fetch_array($req);
	
	// Pour le TITRE :
	echo '<br/><div class="titre-details">';
	echo '<div class="os-details">';
	if($data['os'] == "Mac OS X")
	 		{
	 			echo "<img src='img/apple.png'/>";

	 		}
	 		
	 		else if(($data['os'] == "Windows 7")||($data['os'] == "Windows XP")||($data['os'] == "Windows 8"))
	 		{
	 			echo "<img src='img/windows.png'/>";

	 		}
	 		
	 		else if($data['os'] == "Linux")
	 		{
	 			echo "<img src='img/linux.png'/>";

	 		}
	 		else
	 		{
	 			echo "<img src='img/osinconnu.png'/>";

	 		}
	echo '</br></div>';
	echo $data['nom'];
	echo '</div>';
	
	// Pour les infos :
	echo '<div class="info-details">';
	echo '<table>';
	echo '<tr><td> &#9658 <b>OS :</b></td><td>'.$data['os'].'</td></tr>';
	echo '<tr><td>  &#9658 <b>Status :</b> </td><td>';
		if($data['status'] == 1)
	 		{
	 			echo "Connecté";
	 		}
	 		
	 		if($data['status'] == 0)
	 		{
	 			echo "Déconnecté";

	 		}
	 	echo '</td></tr>';
	echo '<tr><td>  &#9658 <b>Adresse IP :</b></td><td>'.$data['addip'].'</td></tr>';
	echo '<tr><td>  &#9658 <b>Adrese MAC :</b></td><td>'.$data['addmac'].'</td></tr>';
	echo '<tr><td>  &#9658 <b>Temps sur le réseau :</b></td><td>'.$data['tps'].' secondes </td></tr>';
	echo '<tr><td>  &#9658 <b>Dernière M.A.J :</b></td><td>'.$data['date'].'</td></tr>';
	echo '<tr><td>  &#9658 <b>Disque Dur Principal :</b></td><td>'.$data['disk'].' % utilisé</td></tr>';
	echo '<tr><td>  &#9658 <b>Ram :</b></td><td>'.$data['ram'].' % utilisé</td></tr>';
	echo '<tr><td>  &#9658 <b>CPU :</b></td><td>'.$data['cpu'].' % utilisé</td></tr>';
	echo '</table><hr>';
	echo " &#9658 <b>Messages d'erreur de ".$data['nom']." :";
	
	echo ' </b><i>(vider) </i><a href="action.php?&mac='.$data['addmac'].'&supp_erreur=oui"><img src="img/supp.png"/></a>';

	echo "</br>";
	echo "<div class='erreur-details'>";
	$rep_separer = explode("@#@", $data['msg']);
	
	for($i = 1; $i < count($rep_separer) ; $i++)
	{
		echo " <i> &#8594 ";
		echo nl2br($rep_separer[$i]);
	    echo "</i>"; 	            
	    echo "</br>";

	}

	


	echo '</div></div>';

	?>

	</body>
</html>