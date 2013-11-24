<html>
<head>
	<title>Formulaire</title>
</head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<body>
 <?php
include_once("connetion.php");
$requete = "SELECT * FROM etudiant where ID='".$_GET['id']."'"; 
$resultat = mysql_query($requete)or die(mysql_error());
$row = mysql_fetch_array($resultat);
?>
<form action = 'add.php' method = 'POST'>
<table border = '1' width = 50% align = 'center' bgcolor = '#BBD2E1' bordercolor = white >
<tr>
	<td colspan = '2' align = 'center'><h3>Formulaire d'inscription</h3>
<tr>
	<td>ID Etudiant 
        <td><input type = 'text' name = 'id' <?php echo "value ='".$row['ID']."'";?>>
</tr>
<tr>
	<td>Nom 
	<td><input type = 'text' name = 'nom' <?php echo "value ='".$row['Nom']."'";?>>
</tr>
<tr>
	<td>Prenom 
	<td><input type = 'text' name = 'prenom' <?php echo "value ='".$row['Prenom']."'";?>>
</tr><tr>
	<td colspan = 2 align = 'center'><input type = 'submit' value = 'Valider'><input type = 'reset' value = 'effacer'>
</table>
</form>
</body>
</html>
