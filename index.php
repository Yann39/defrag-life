<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Defrag-life - News</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<link media="all" href="styles.css" type="text/css" rel="stylesheet"></link>
<script type="text/javascript" src="scripts.js"></script>
</head>
<body style="margin-left:0px; margin-top:0px; margin-right:0px; margin-bottom:0px; background-color:#000000; color:#FFFFFF;"> 
<?php
require("connexion_bdd.php");
require("configuration.php");

if (isset($_GET['page']))
	$numpage = $_GET['page'];
else
	$numpage = 1;

$db = mysqli_connect($hostname, $username, $password, $database);
if(mysqli_connect_errno()) {
	echo '<p>Erreur de connexion a la base de donnees: '.mysqli_connect_error().'</p>';
}

$sql = "SELECT * FROM dl_News ORDER BY date DESC";
$req = mysqli_query($db, $sql) or die('Erreur SQL ! '.$sql.'<br/>'.mysqli_error());

$nbpages = ceil(mysqli_num_rows($req)/$nbnews);

mysqli_close($db);
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
                <td style="text-align:center;margin-left:auto;margin-right:auto;">
                    <div style="margin-left:auto;margin-right:auto;">
					  <img style="margin-top:20px;margin-bottom:3px;" src="images/Dividers_long.gif" alt=""/> 
                      <div class="news_titre">News</div>
                      <img style="margin-top:4px;margin-bottom:2px;" src="images/Dividers_long.gif" alt=""/>
					</div>
                  <table cellpadding="0" cellspacing="0" style="text-align:center;margin-left:auto;margin-right:auto;border:none;"> 
                    <tr> 
                      <td><a href="index.php?page=<? if ($numpage==1) echo "1"; else echo $numpage-1; ?>"><img src="images/Bulletl.gif" style="border:none;" alt=""/></a></td> 
                      <td style="width:300px;" class="petit_nombre">
						<? $i=0; for ($i=1;$i<=$nbpages;$i++) {
							if ($numpage==$i) echo $numpage;
							else echo "<a href='index.php?page=".($i)."'>".$i."</a>"; 
							echo " ";
						}?>
					  </td> 
                      <td><a href="index.php?page=<? if ($numpage==$nbpages) echo $numpage; else echo $numpage+1; ?>"><img src="images/Bulletr.gif" style="border:none;" alt=""/></a></td> 
                    </tr> 
                  </table>
                  <img style="margin-top:5px;margin-bottom:20px;" src="images/Dividers_long.gif" alt=""/>
				  <?
					$cpt=0;
					$nbrows = mysqli_num_rows($req);
					while ($row = mysqli_fetch_row($req)) {
						if (($cpt >= ($numpage*$nbnews)-$nbnews) && ($cpt < $numpage*$nbnews)) {
							echo "<div class='couleur_blanc_souligne_border' style='height:16px;width:100%;text-align:left;margin-bottom:10px;'><img src='images/news.gif' style='margin-right:5px;vertical-align:middle;' alt=''/>".$row[3]." by ".$row[1]."</div>
								<div class='couleur_bleu' style='width:100%;text-align:left;margin-bottom:36px;'>".$row[2]."</div>";
								//echo "<div class='couleur_blanc' style='width:100%;text-align:right;'>".$row[1]."</div>";
					  		//if ($cpt != $nbrows) 
								//echo "<img style='margin-bottom:12px;' src='images/Dividers2.gif' alt=''/>";
						}
						$cpt++;
					}
				  ?>
                  <img style="margin-top:5px;margin-bottom:2px;" src="images/Dividers_long.gif" alt=""/>
                  <table cellpadding="0" cellspacing="0" style="text-align:center;margin-left:auto;margin-right:auto;border:none;"> 
                    <tr> 
                      <td><a href="index.php?page=<? if ($numpage==1) echo "1"; else echo $numpage-1; ?>"><img src="images/Bulletl.gif" style="border:none;" alt=""/></a></td> 
                      <td style="width:300px;" class="petit_nombre">
						<? $i=0; for ($i=1;$i<=$nbpages;$i++) {
							if ($numpage==$i) echo $numpage;
							else echo "<a href='index.php?page=".($i)."'>".$i."</a>"; 
							echo " ";
						}?>
					  </td> 
                      <td><a href="index.php?page=<? if ($numpage==$nbpages) echo $numpage; else echo $numpage+1; ?>"><img src="images/Bulletr.gif" style="border:none;" alt=""/></a></td> 
                    </tr> 
                  </table> 
                  <img style="margin-top:4px;margin-bottom:20px;" src="images/Dividers_long.gif" alt=""/></td> 
              </tr> 
            </table></td> 
          <td valign="top" style="background-color:#70809F;width:137px;"><? include("menudroit.php"); ?></td> 
        </tr> 
      </table></td> 
  </tr> 
  <tr style="background-color:#70809F;"> 
    <td class="couleur_noir">By Yann39 &copy; Defrag-life 2004-<? echo date("Y"); ?></td>
  </tr> 
</table>
</div>
</body>
</html>
