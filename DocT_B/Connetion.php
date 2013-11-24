<?php 
$mysql_host="localhost"; 
$mysql_login="root";  
$mysql_base="TPMULTI"; 

$connect= mysql_connect($mysql_host,$mysql_login,"") 
	or die("connection ࡍysql impossible");
$selectdb=mysql_select_db($mysql_base) 
	or die("connection ࡬a base  impossible");
?>
