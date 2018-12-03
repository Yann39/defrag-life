<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Defrag-life - Pending demos</title>
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
                      <div class="news_titre">Pending demos</div>
                      <img style="margin-top:4px;margin-bottom:20px;" src="images/Dividers_long.gif" alt=""/>
					</div>
<?php 
require("connexion_bdd.php"); 

$db = mysqli_connect($hostname, $username, $password, $database);
if(mysqli_connect_errno()) {
	echo '<p>Erreur de connexion a la base de donnees: '.mysqli_connect_error().'</p>';
}


$sql = "SELECT nom,date FROM dl_Demos WHERE valide=0";
$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());

echo "<table cellspacing='0' cellpadding='0' style='border:none;width:500px;margin-left:auto;margin-right:auto;'>";

$nb_wait = mysqli_num_rows($req);
if ($nb_wait == 0) {
	echo "<tr><td>No pending demos.</td></tr>";
}
else {
	while ($row = mysqli_fetch_row($req)) {
		echo "<tr>
		<td class='couleur_blanc'>".$row[1]." - <a href='upload/temp/".$row[0]."'>".$row[0]."</a></td>
		</tr>";
	}
}

echo "</table>";

//On le lit le fichier contenant la date de derniere mise à jour  
$fp = fopen ("maj.txt", "r");  
$contenu = fgets ($fp, 255);  
fclose ($fp);  

mysqli_close($db);
?>
				<div class="couleur_blanc" style="text-align:center;margin-top:20px;">Last update : <? echo $contenu; ?><br/></div>
				<div class="couleur_blanc" style="text-align:center;margin-top:20px;">FAQ : <a href="faq.php">When did demos will be updated on the site ?</a><br/></div>
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
