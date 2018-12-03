<?php
require("connexion_bdd.php");
require("configuration.php");

$pseudo = $_POST['pseudo'];
$date = $_POST['date'];
$contenu = $_POST['contenu'];

$db = mysqli_connect($hostname, $username, $password, $database);
if(mysqli_connect_errno()) {
	echo '<p>Erreur de connexion a la base de donnees: '.mysqli_connect_error().'</p>';
}

$sql = "INSERT INTO dl_News(pseudo,contenu,date) VALUES('".$pseudo."','".nl2br($contenu)."','".$date."')"; 
$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());

echo "Les données ont bien été insérées.<br/><br/><a href='ajouter_news.html'>Retour</a>";

mysqli_close($db);
?>