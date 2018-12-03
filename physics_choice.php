<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Defrag-life - Physics choice</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<link media="all" href="styles.css" type="text/css" rel="stylesheet"></link>
<script type="text/javascript" src="scripts.js"></script>
</head>
<body style="margin-left:0px; margin-top:0px; margin-right:0px; margin-bottom:0px; background-color:#000000; color:#FFFFFF;"> 
<?php
require("connexion_bdd.php");

if (isset($_GET['tri'])) $tri=$_GET['tri']; else $tri="pos";
if (isset($_GET['ordre'])) $ordre=$_GET['ordre']; else $ordre="desc";
if (isset($_GET['phys'])) $phys=$_GET['phys']; else $phys="vq3";

$db = mysqli_connect($hostname, $username, $password, $database);
if(mysqli_connect_errno()) {
	echo '<p>Erreur de connexion a la base de donnees: '.mysqli_connect_error().'</p>';
}

$sql = "SELECT DISTINCT(joueur) FROM dl_Demos WHERE valide=1 AND nom LIKE '%[df.".$phys."]%'";
$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());
$nbjou = mysqli_num_rows($req);

$sql3 = "SELECT DISTINCT(UPPER(nom)) FROM dl_Maps WHERE physics='".$phys."'";
?> 
<div style="text-align:center;"> 
  <table style="margin-left:auto;margin-right:auto;width:1024px;border:none;text-align:center;" cellpadding="0" cellspacing="0"> 
    <tr> 
      <td style="text-align:center;"><? include("titre.php"); ?></td> 
    </tr> 
    <tr> 
      <td><table cellpadding="0" cellspacing="0" style="margin-left:auto;margin-right:auto;border:none;width:100%;"> 
          <tr> 
            <td valign="top" style="background-color:#70809F;width:137px;"><? include("menugauche.php"); ?></td> 
            <td valign="top"><table cellspacing="0" cellpadding="0" style="margin-left:auto;margin-right:auto;width:90%;border:none;"> 
                <tr> 
                  <td style="margin-left:auto;margin-right:auto;">
                     <div style="margin-left:auto;margin-right:auto;">
					  <img style="margin-top:20px;margin-bottom:3px;" src="images/Dividers_long.gif" alt=""/> 
                      <div class="news_titre">Physics choice</div>
                      <img style="margin-top:4px;margin-bottom:20px;" src="images/Dividers_long.gif" alt=""/>
					</div> 
					<div class="couleur_blanc" style="text-align:center;margin-top:15px;margin-bottom:15px;">
					<a href="maps.php?maptype=vq3">VQ3</a><br/><a href="maps.php?maptype=cpm">CPM</a>
					</div>
                    <img style="margin-bottom:20px;margin-top:20px;" src="images/Dividers_long.gif" alt=""/>  
                    </td> 
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