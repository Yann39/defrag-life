<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>News adder</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
</head>
<body style="margin-left:0px; margin-top:0px; margin-right:0px; margin-bottom:0px; background-color:#000000; color:#FFFFFF;">
<div style="font-size:15pt;text-align:center;">Démos non validées</div><br/>
<div style="text-align:center;">
<?php 
require("connexion_bdd.php"); 

$db = mysqli_connect($hostname, $username, $password, $database);
if(mysqli_connect_errno()) {
	echo '<p>Erreur de connexion a la base de donnees: '.mysqli_connect_error().'</p>';
}

if (isset($_GET['idt'])) {
	$idt = $_GET['idt'];

	$sql2 = "UPDATE dl_Demos SET valide=1 WHERE id=".$idt;
	$req2 = mysqli_query($db, $sql2) or die('Erreur SQL !'.$sql2.'<br/>'.mysqli_error());

	//Vider la table dl_Classement
	$sql6 = "TRUNCATE dl_Classement";
	$req6 = mysqli_query($db, $sql6) or die('Erreur SQL !'.$sql6.'<br/>'.mysqli_error());
	//Mettre l'auto-increment à zéro
	$sql3 = "ALTER TABLE dl_Classement AUTO_INCREMENT=0";
	$req3 = mysqli_query($db, $sql3) or die('Erreur SQL !'.$sql3.'<br/>'.mysqli_error());
	//Insérer dans la table dl_Classement les dix meilleurs temps de la map
	$sql4 = "INSERT INTO dl_Classement(idDemo) SELECT id FROM dl_Demos WHERE map='".$_GET['mapp']."' AND physics='".$_GET['physs']."' AND valide=1 ORDER BY temps LIMIT 0,10";
	$req4 = mysqli_query($db, $sql4) or die('Erreur SQL !'.$sql4.'<br/>'.mysqli_error());
	//Vider les places existantes de la map qui vient d'être jouée dans la table dl_Demos
	//$sql4 = "UPDATE dl_Demos SET place = NULL WHERE map=".$mapname;
	//$req4 = mysqli_query($db, $sql4) or die('Erreur SQL !'.$sql4.'<br/>'.mysqli_error());
	$sql1 = "SELECT COUNT(*) FROM dl_Classement";
	$req1 = mysqli_query($db, $sql1) or die('Erreur SQL !'.$sql1.'<br/>'.mysqli_error());
	$row1 = mysqli_fetch_row($req1);
	$nb_maj = $row1[0];
	//Mettre à jour les places avec le nouveau classement
	for ($i=1; $i<=$nb_maj; $i++) {
		//$sql5 = "UPDATE dl_Demos d SET place = (SELECT place FROM dl_Classement c WHERE d.id = c.idDemo)";
		$sql5 = "UPDATE dl_Demos SET place=".$i." WHERE id=(SELECT idDemo FROM dl_Classement WHERE place=".$i.")";
		$req5 = mysqli_query($db, $sql5) or die('Erreur SQL !'.$sql5.'<br/>'.mysqli_error());
	}

	rename("upload/temp/".$_GET['name'],"demos/".$_GET['name']);

	//On met à jour le fichier contenant la derniere date de mise à jour
	$fp = fopen ("maj.txt", "r+");  
	fseek ($fp, 0);  
	fputs ($fp, date("Y-m-d"));  
	fclose ($fp);  

	echo "<br/>La demo à bien été validée.";

}
else {
	$sql = "SELECT id,nom,map,physics,lien FROM dl_Demos WHERE valide=0";
	$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());

	echo "<table cellspacing='0' cellpadding='0' style='border:1px #ffffff solid;width:800px;'><tr><td style='border-right:1px #ffffff solid;border-bottom:1px #ffffff solid;'>Id</td><td style='border-right:1px #ffffff solid;border-bottom:1px #ffffff solid;'>Nom</td><td style='border-right:1px #ffffff solid;border-bottom:1px #ffffff solid;'>Lien</td><td style='border-bottom:1px #ffffff solid;'>Valider</td></tr>";
	
	while ($row = mysqli_fetch_row($req)) {
		echo "<tr>
		<td style='border-right:1px #ffffff solid;'>".$row[0]."</td>
		<td style='border-right:1px #ffffff solid;'>".$row[1]."</td>
		<td style='border-right:1px #ffffff solid;'>".$row[4]."</td>
		<td><a href='valider_demos.php?idt=".$row[0]."&name=".$row[1]."&mapp=".$row[2]."&physs=".$row[3]."'>valider</a></td>
		</tr>";
	}

	echo "</table>";
}

mysqli_close($db);
?>
</div> 
</body>
</html>
