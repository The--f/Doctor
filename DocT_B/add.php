<?php
include_once ('connetion.php');
$requete = "INSERT INTO etudiant VALUES (".$_POST['id'].",'".$_POST['nom']."','".$_POST['prenom']."')"; 
$reponse = mysql_query($requete); 
if($reponse==true)
    { 
        header("location:acceil.php"); 
   // echo 'etudiant ajouter';
    } 

?>
