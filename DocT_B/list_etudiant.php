<?php
include_once("connetion.php"); 
$requete = "SELECT * FROM etudiant"; 
$resultat = mysql_query($requete);
//list($id,$nom,$prenom) = $affiche;
echo "<table border = 2><tr><td>ID</td><td>Nom</td><td>Prenom</td><td>modification</td></tr>";
while ($donne = mysql_fetch_assoc($resultat))
{
   echo "<tr><td>".$donne['ID']."</td><td>".$donne['Nom']."</td><td>".$donne['Prenom']."</td><td><a href = modifEtudiant.php?id=".$donne['ID'].">Modifier</a></tr>";
}
echo "</table>";
mysql_close();
?>
