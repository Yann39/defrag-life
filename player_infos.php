<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<title>Player infos</title>
<link media="all" href="styles.css" type="text/css" rel="stylesheet"></link>
<script type="text/javascript" src="scripts.js"></script>
</head>
<body style="margin:10px;background-color:#000000;">
<?php
require("connexion_bdd.php");

if (isset($_GET['player'])) $player = $_GET['player']; else $player = "De4th-crY";
if (isset($_GET['country'])) $country = $_GET['country']; else $country = "france";

$db = mysqli_connect($hostname, $username, $password, $database);
if(mysqli_connect_errno()) {
	echo '<p>Erreur de connexion a la base de donnees: '.mysqli_connect_error().'</p>';
}

$sql2 = "SELECT COUNT(id) FROM dl_Demos WHERE joueur='".$player."' AND valide=1 AND physics='vq3' ORDER BY nom ASC";
$req2 = mysqli_query($db, $sql2) or die('Erreur SQL !'.$sql2.'<br/>'.mysqli_error());
$sql5 = "SELECT COUNT(id) FROM dl_Demos WHERE joueur='".$player."' AND valide=1 AND physics='cpm' ORDER BY nom ASC";
$req5 = mysqli_query($db, $sql5) or die('Erreur SQL !'.$sql5.'<br/>'.mysqli_error());

$sql3 = "SELECT map, ROUND(SUM((SELECT MIN(temps) FROM dl_Demos d2 WHERE d1.map=d2.map)/temps)*10,2) AS TotalPoints FROM dl_Demos d1 WHERE physics='vq3' AND valide=1 AND joueur='".$player."' GROUP BY joueur ORDER BY TotalPoints DESC limit 0,1";
$req3 = mysqli_query($db, $sql3) or die('Erreur SQL !'.$sql3.'<br/>'.mysqli_error());
$sql4 = "SELECT map, ROUND(SUM((SELECT MIN(temps) FROM dl_Demos d2 WHERE d1.map=d2.map)/temps)*10,2) AS TotalPoints FROM dl_Demos d1 WHERE physics='cpm' AND valide=1 AND joueur='".$player."' GROUP BY joueur ORDER BY TotalPoints DESC limit 0,1";
$req4 = mysqli_query($db, $sql4) or die('Erreur SQL !'.$sql4.'<br/>'.mysqli_error());

$nbDemosvq3 = mysqli_fetch_row($req2);
$nbDemoscpm = mysqli_fetch_row($req5);
$row3 = mysqli_fetch_row($req3);
$row4 = mysqli_fetch_row($req4);
?>
<div style="width:450px;height:340px;border-width:1px;border-style:solid;border-color:#0000FF;">
<div class="couleur_blanc" style="text-align:center;margin:5px;background-color:#70809F;width:440px;height:330px;">
<? 
echo "<br/>Player name : ".$player."<br/>Country : <img src='images/drapeaux/".$country.".jpg' alt='".$country."' style='vertical-align:middle;'/> ".$country."<br/>"; 
echo "Number of demos : ".($nbDemosvq3[0]+$nbDemoscpm[0])." (".$nbDemosvq3[0]." vq3 and ".$nbDemoscpm[0]." cpm)<br/>";
if ($nbDemosvq3[0] > 0) echo "Total vq3 points : ".$row3[1]." (efficiency ".round(($row3[1]/$nbDemosvq3[0])*10,2)."%)<br/>";
else echo "Total vq3 points : 0 (efficiency 0%)<br/>";
if ($nbDemoscpm[0] > 0) echo "Total cpm points : ".$row4[1]." (efficiency ".round(($row4[1]/$nbDemoscpm[0])*10,2)."%)";
else echo "Total cpm points : 0 (efficiency 0%)";
?>
<div class='ascenseur_recjoueurs'>
<?
if ($nbDemosvq3[0] > 0) {
	$sql = "SELECT map,temps,place FROM dl_Demos WHERE joueur='".$player."' AND valide=1 AND physics='vq3' ORDER BY nom ASC";
	$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());
	echo "<table style='width:300px;border-width:1px;border-style:solid;border-color:#000000;border-left:none;margin-left:auto;margin-right:auto;' cellpadding='0' cellspacing='0'>
			<tr style='height:16px;background-color:#305297;color:#000000;'><td style='text-align:center;border-left:1px solid #000000' colspan='3'>VQ3</td></tr>
			<tr style='height:16px;'>
			  <td class='couleur_noir' style='width:150px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>Map</td>
			  <td class='couleur_noir' style='width:100px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>Time</td>
			  <td class='couleur_noir' style='width:50px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>Rank</td>
			</tr>";
	
	while ($row = mysqli_fetch_row($req)) {
	
		$tps = $row[1];
		$minute=0;$seconde=0;$milli=0;$min="";$sec="";$mil="";
		if ($tps/60000 >= 1) { $minute = floor($tps/60000); $tps = $tps-($minute*60000); }
		if ($tps/1000 >= 1) { $seconde = floor($tps/1000); $tps = $tps-($seconde*1000); }
		$milli = $tps;
		if ($minute < 10) $min="0".$minute; else $min="".$minute;
		if ($seconde < 10) $sec="0".$seconde; else $sec="".$seconde;
		if ($milli < 10) $mil="00".$milli; elseif ($milli >= 10 && $milli < 100) $mil="0".$milli; else $mil="".$milli;
	
		echo "<tr style='height:16px;'><td style='width:150px;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>".$row[0]."</td>
		<td style='width:100px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>".$min.".".$sec.".".$mil."</td>
		<td style='width:50px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>".$row[2]."</td></tr>";
	}
	echo "</table>";
}
if ($nbDemoscpm[0] > 0) {
	$sql = "SELECT map,temps,place FROM dl_Demos WHERE joueur='".$player."' AND valide=1 AND physics='cpm' ORDER BY nom ASC";
	$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());
	echo "<table style='width:300px;border-width:1px;border-style:solid;border-color:#000000;margin-top:15px;border-left:none;margin-left:auto;margin-right:auto;' cellpadding='0' cellspacing='0'>
			<tr style='height:16px;background-color:#305297;color:#000000;'><td style='text-align:center;border-left:1px solid #000000' colspan='3'>CPM</td></tr>
			<tr style='height:16px;'>
			  <td class='couleur_noir' style='width:150px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>Map</td>
			  <td class='couleur_noir' style='width:100px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>Time</td>
			  <td class='couleur_noir' style='width:50px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>Rank</td>
			</tr>";
	
	while ($row = mysqli_fetch_row($req)) {
	
		$tps = $row[1];
		$minute=0;$seconde=0;$milli=0;$min="";$sec="";$mil="";
		if ($tps/60000 >= 1) { $minute = floor($tps/60000); $tps = $tps-($minute*60000); }
		if ($tps/1000 >= 1) { $seconde = floor($tps/1000); $tps = $tps-($seconde*1000); }
		$milli = $tps;
		if ($minute < 10) $min="0".$minute; else $min="".$minute;
		if ($seconde < 10) $sec="0".$seconde; else $sec="".$seconde;
		if ($milli < 10) $mil="00".$milli; elseif ($milli >= 10 && $milli < 100) $mil="0".$milli; else $mil="".$milli;
	
		echo "<tr style='height:16px;'><td style='width:150px;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>".$row[0]."</td>
		<td style='width:100px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>".$min.".".$sec.".".$mil."</td>
		<td style='width:50px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>".$row[2]."</td></tr>";
	}
	echo "</table>";
}
?>
</div>
</div>
</div> 
</body>
</html>