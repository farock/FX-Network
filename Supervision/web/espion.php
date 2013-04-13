<?php
$date_espion = date("d-m-Y");
$heure_espion = date('H')+3;
$minute_espion = date('i');
$heure_espion= $heure_espion.":".$minute_espion.":".date('s'); // H + 3h (france)
	
$msg_espion = "";
$addressemac = $data['addmac'];


if($data['status']==0)
{
	$msg_espion = $msg_espion."@#@"."Le ".$date_espion." à ".$heure_espion.": ".$data['nom']." ne répond plus !";	
}

if($data['status']==1)
{
	if($data['disk']>90)
	{
		$msg_espion = $msg_espion."@#@"."Le ".$date_espion." à ".$heure_espion.": Le Disque Dur est presque plein: ".$data['disk']." %";	
	}
	
	if($data['ram']>90)
	{
		$msg_espion = $msg_espion."@#@"."Le ".$date_espion." à ".$heure_espion.": Problème de la Mémoire Vive: ".$data['ram']." %";	
	}
	
	if($data['cpu']>90)
	{
		$msg_espion = $msg_espion."@#@"."Le ".$date_espion." à ".$heure_espion.": Problème au niveau du CPU: ".$data['ram']." %";	
	}


}

$sql_espion= 'SELECT * FROM users WHERE addmac="'.$addressemac.'";';
$req_espion = mysql_query($sql_espion);
$data_espion = mysql_fetch_array($req_espion);

$msg_espion2 = $data_espion['msg'].$msg_espion;

$sql_espion= 'UPDATE users SET msg="'.$msg_espion2.'" WHERE addmac="'.$addressemac.'";';
$req_espion = mysql_query($sql_espion);
?>