<?php
// Connection à la BDD:
	$link = mysql_connect("localhost","root","root");
	mysql_select_db("supervision",$link);
	mysql_query("SET NAMES utf8" );	

?>