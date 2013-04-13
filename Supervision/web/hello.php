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
	
	<script type="text/javascript">
	// Actualise la page toute les 1 secondes
	setTimeout("document.location.href='hello.php'", 10000);
	</script>

<SCRIPT language="javascript">
   function ouvre_popup(page) {
       window.open(page,"nom_popup","menubar=no, status=no, scrollbars=no, menubar=no, width=450, height=460");
   }
</SCRIPT>

	<body>
		<div class="header">
		</div>
		
	<div class="tableau">
	<div class="CSSTableGenerator">
	
	<table>
		<tr> 
			<td>
				O.S
			</td>
			<td>
				Nom
			</td>
			<td >
				 
			</td>
			<td >
				Adresse IP
			</td>
			<td>
				Adresse MAC
			</td>
			<td>
				Temps
			</td>
			<td>
				Date M.A.J
			</td>
			<td>
				Informations
			</td>
			<td>
				 
			</td>
		</tr>
		
		

<?php

	$today = date("H:i:s"); // Heures : minutes : secondes
	$heure = date('H')*3600;
	$minute = date('i')*60;
	$temps_php = $heure + $minute + date('s') + 7200 ; // H + 2h (france)
	$nmb_users = 0;

	// Connection à la BDD:
	include("mysql.php");
	
	// Récupération des données :
	$nom = $_POST['nom'];
	$addip = $_POST['addip'];
	$addmac = $_POST['addmac'];
	$tps = $_POST['tps'];
	$date = $_POST['date'];
	$tps_current = $_POST['tps_current'];
	$os = $_POST['os'];
	$disk = $_POST['disk'];
	$ram = $_POST['ram'];
	$cpu = $_POST['cpu'];	

	// On supprime les doublons :
	$sql= "SELECT * FROM users;";
	$req = mysql_query($sql);
	$doublon = 0;
	
	while($data = mysql_fetch_array($req))
	{
		$nmb_users = $nmb_users +1;
		if($data['addmac'] == $addmac)
		{
			$doublon = $doublon +1;
			

		}
	}
	
	
	if(($doublon == 0) && ($addmac != ""))
	{
		$sql= 'INSERT INTO users (nom, addip, addmac, tps, date,status, tps_current,os,disk,ram,cpu) VALUES ("'.$nom.'","'.$addip.'","'.$addmac.'","'.$tps.'","'.$date.'","1","'.$tps_current.'","'.$os.'","'.$disk.'","'.$ram.'","'.$cpu.'")';
		$req = mysql_query($sql);
	}
	
	else 
	{
		$sql= 'UPDATE users SET addip="'.$addip.'", nom="'.$nom.'", tps="'.$tps.'", date="'.$date.'", status="1" , tps_current="'.$tps_current.'", os="'.$os.'", disk="'.$disk.'", ram="'.$ram.'", cpu="'.$cpu.'" WHERE addmac="'.$addmac.'";';
	    $req = mysql_query($sql);

	}
	
	// Banniere en haut du tableau  :
	echo "<div class='ban'> ( Il y a <b>".$nmb_users." Périphérique(s) </b> sur ce réseau ) </div>";
	

	
	// On affiche le tableau de la table de la BDD:
	$sql= "SELECT * FROM users;";
	$req = mysql_query($sql);
		


	while($data = mysql_fetch_array($req))
	{
	 	include("espion.php");

					echo "<tr>";
					
			if($data['os'] == "Mac OS X")
	 		{
	 			echo "<td> <img src='img/apple.png'/></td>";

	 		}
	 		
	 		else if(($data['os'] == "Windows 7")||($data['os'] == "Windows XP")||($data['os'] == "Windows 8"))
	 		{
	 			echo "<td> <img src='img/windows.png'/></td>";

	 		}
	 		
	 		else if($data['os'] == "Linux")
	 		{
	 			echo "<td> <img src='img/linux.png'/></td>";

	 		}
	 		else
	 		{
	 			echo "<td> <img src='img/osinconnu.png'/></td>";

	 		}
					
	 				echo '<td><div class="nom">';
	 				echo '<a href="javascript:ouvre_popup(';
	 				echo "'details.php?&mac=";
	 				echo $data['addmac'];
	 				echo "')"; 
	 				echo ' " style="color:black;text-decoration:none;">'.$data['nom'].'</a><div/></td>';


	 		if($data['status'] == 1)
	 		{
	 			echo "<td><img src='img/enligne.png'/></td>";

	 		}
	 		
	 		if($data['status'] == 0)
	 		{
	 			echo "<td><img src='img/pasenligne.png'/></td>";

	 		}
	 				echo "<td>".$data['addip']."</td>";
	 				
	 				echo "<td>".$data['addmac']."</td>";

	 				echo "<td>".$data['tps']." sec</td>";
	 				
	 				echo "<td style='width:130px;'>".$data['date']."</td>";
	 				
	 				// POur les barres de pourcentages en couleurs :
	 				include("info_barre.php");
	 					
	 				echo '</td>';
	 				echo '<td>';
	 					echo '<a href="action.php?&mac='.$data['addmac'].'"><img src="img/supp.png"/></a>';
	 				echo '</td>';
					echo '</tr>';
					
			
			if((abs($data['tps_current']- $temps_php)) > 15)
			{
					$sql2 = 'UPDATE users SET status="0" WHERE addmac="'.$data['addmac'].'";';
					$req2 = mysql_query($sql2);

			}

			else
			{
					$sql2 = 'UPDATE users SET status="1" WHERE addmac="'.$data['addmac'].'";';
					$req2 = mysql_query($sql2);

			}
			
			
	}

?>
		</table>
		</div>
		</div>
		<div class="bouton">
		</br>
		</br>
			<a href="mail.php" onclick="alert ('Votre alerte a bien été envoyé à l\'administrateur réseau. Merci !')" onMouseOver="document.img_1.src='img/boutonOFF.png';" 
onMouseOut="document.img_1.src='img/boutonON.png';"> <img class="img" name="img_1" src="img/boutonON.png"> </a>

		</div>
		<div class="bas">
		
		</div>
		

	</body>
</html>