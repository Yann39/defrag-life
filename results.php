<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Defrag-life - Results</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<link media="all" href="styles.css" type="text/css" rel="stylesheet"></link>
<script type="text/javascript" src="scripts.js"></script>
</head>
<body style="margin-left:0px; margin-top:0px; margin-right:0px; margin-bottom:0px; background-color:#000000; color:#FFFFFF;"> 
<div style="text-align:center;">
<table style="margin-left:auto;margin-right:auto;width:1024px;border:none;text-align:center;" cellpadding="0" cellspacing="0"> 
  <tr> 
    <td style="text-align:center;"><? include("titre.php"); ?></td> 
  </tr> 
  <tr> 
    <td><table cellpadding="0" cellspacing="0" style="border:none;width:100%;"> 
        <tr> 
          <td valign="top" style="background-color:#70809F;width:137px;"><? include("menugauche.php"); ?></td> 
          <td valign="top"><table cellspacing="0" cellpadding="0" style="margin-left:auto;margin-right:auto;width:90%;border:none;"> 
              <tr> 
                <td style="margin-left:auto;margin-right:auto;">
                     <div style="margin-left:auto;margin-right:auto;">
					  <img style="margin-top:20px;margin-bottom:3px;" src="images/Dividers_long.gif" alt=""/> 
                      <div class="news_titre">Results</div>
                      <img style="margin-top:4px;margin-bottom:20px;" src="images/Dividers_long.gif" alt=""/>
					</div>
<?php 
require("connexion_bdd.php"); 

$db = mysqli_connect($hostname, $username, $password, $database);
if(mysqli_connect_errno()) {
	echo '<p>Erreur de connexion a la base de donnees: '.mysqli_connect_error().'</p>';
}

$textosearch = $_POST['texteachercher'];
$dansquoi = $_POST['dans'];

if ($dansquoi == "demos") 
$sql = "SELECT nom,lien,physics FROM dl_Demos WHERE nom LIKE '%".$textosearch."%' or joueur LIKE '%".$textosearch."%' or map LIKE '%".$textosearch."%' or temps LIKE '%".$textosearch."%' or pays LIKE '%".$textosearch."%' ORDER BY physics DESC";
else
$sql = "SELECT DISTINCT(nom),createur,lien,physics FROM dl_Maps WHERE nom LIKE '%".$textosearch."%' or createur LIKE '%".$textosearch."%' ORDER BY physics DESC";

$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());

echo "<table cellspacing='0' cellpadding='0' style='border:none;width:500px;margin-left:auto;margin-right:auto;'>";

$nb_enr = mysqli_num_rows($req);
if ($nb_enr == 0) {
	echo "<tr></td><td>No ".$dansquoi." found.</td></tr>";
}
else {
	if (($dansquoi == "demos") && ($nb_enr < 2))
		echo "<tr><td class='couleur_blanc'>".$nb_enr." demo found :</td></tr>";
	elseif (($dansquoi == "demos") && ($nb_enr > 1))
		echo "<tr><td class='couleur_blanc'>".$nb_enr." demos found :</td></tr>";
	elseif (($dansquoi == "maps") && ($nb_enr < 2))
		echo "<tr><td class='couleur_blanc'>".$nb_enr." map found :</td></tr>";
	else
		echo "<tr><td class='couleur_blanc'>".$nb_enr." maps found :</td></tr>";
	echo "<tr style='height:15px;'><td></td></tr>";

	$cptvq3=0;$cptcpm=0;

	while ($row = mysqli_fetch_row($req)) {
		if ($dansquoi == "demos") {
			if ($row[2] == "vq3") {
				if ($cptvq3==0) echo "<tr><td class='couleur_blanc'>vq3 demos :<br/><a href='".$row[1]."'>".$row[0]."</a></td></tr>";
				else echo "<tr><td class='couleur_blanc'><a href='".$row[1]."'>".$row[0]."</a></td></tr>";
				$cptvq3++;
			}
			else {
				if ($cptcpm==0) echo "<tr><td class='couleur_blanc'><br/>cpm demos :<br/><a href='".$row[1]."'>".$row[0]."</a></td></tr>";
				else echo "<tr><td class='couleur_blanc'><a href='".$row[1]."'>".$row[0]."</a></td></tr>";
				$cptcpm++;
			}
		}
		else {
			if ($row[3] == "vq3") {
				if ($cptvq3==0) echo "<tr><td class='couleur_blanc'>vq3 maps :<br/><a href='maps.php?mapname=".$row[0]."&amp;maptype=vq3'>".$row[0]."</a> (by ".$row[1].") <a href='clic.php3?url=".$row[2]."'><img src='images/lienddl.gif' style='border:none;' alt=''/></a></td></tr>";
				else echo "<tr><td class='couleur_blanc'><a href='maps.php?mapname=".$row[0]."&amp;maptype=vq3'>".$row[0]."</a> (by ".$row[1].") <a href='clic.php3?url=".$row[2]."'><img src='images/lienddl.gif' style='border:none;' alt=''/></a></td></tr>";
				$cptvq3++;
			}
			else {
				if ($cptcpm==0)	echo "<tr><td class='couleur_blanc'><br/>cpm maps :<br/><a href='maps.php?mapname=".$row[0]."&amp;maptype=cpm'>".$row[0]."</a> (by ".$row[1].") <a href='clic.php3?url=".$row[2]."'><img src='images/lienddl.gif' style='border:none;' alt=''/></a></td></tr>";
				else echo "<tr><td class='couleur_blanc'><a href='maps.php?mapname=".$row[0]."&amp;maptype=cpm'>".$row[0]."</a> (by ".$row[1].") <a href='clic.php3?url=".$row[2]."'><img src='images/lienddl.gif' style='border:none;' alt=''/></a></td></tr>";
				$cptcpm++;
			}
		}
	}
}

echo "</table>";

mysqli_close($db);
?>
                  <img style="margin-bottom:20px;margin-top:20px;" src="images/Dividers_long.gif" alt=""/></td> 
              </tr> 
            </table></td> 
          <td valign="top" style="background-color:#70809F;width:137px;"><? include("menudroit.php"); ?></td> 
        </tr> 
      </table></td> 
  </tr> 
  <tr style="background-color:#70809F"> 
    <td class="couleur_noir" style="height:13px;text-align:center;">By Yann39 &copy; Defrag-life 2004-<? echo date("Y"); ?></td>
  </tr> 
</table>
</div>
</body>
</html>
