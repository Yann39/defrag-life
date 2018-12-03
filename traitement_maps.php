<?php
require("connexion_bdd.php");
require("configuration.php");

$nom = $_POST['nom'];
$createur = $_POST['createur'];
$physics = $_POST['physics'];
$taille = $_POST['taille'];
$date = $_POST['date'];
$format = $_POST['format'];
$screen1 = $_POST['screen1'];
$screen2 = $_POST['screen2'];

$db = mysqli_connect($hostname, $username, $password, $database);
if(mysqli_connect_errno()) {
	echo '<p>Erreur de connexion a la base de donnees: '.mysqli_connect_error().'</p>';
}

$sql = "INSERT INTO dl_Maps(nom,createur,physics,taille,date,lien,screen1,screen2) VALUES('".$nom."','".$createur."','".$physics."','".$taille."','".$date."','".$format."','".$screen1."','".$screen2."')"; 
$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());

echo "Les données ont bien été insérées.<br/><br/><a href='ajouter_maps.html'>Retour</a>";

mysqli_close($db);
?>