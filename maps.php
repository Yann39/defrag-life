<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Defrag-life - Maps</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<link media="all" href="styles.css" type="text/css" rel="stylesheet"></link>
<script type="text/javascript" src="scripts.js"></script>
</head>
<body style="margin-left:0px; margin-top:0px; margin-right:0px; margin-bottom:0px; background-color:#000000; color:#FFFFFF;"> 
<?php
require("connexion_bdd.php");
require("configuration.php");

if (isset($_GET['page'])) $numpage = $_GET['page']; else $numpage = 1;
if (isset($_GET['sort'])) $sortby = $_GET['sort']; else $sortby = "date";
if (isset($_GET['sorttype'])) $sortype = $_GET['sorttype']; else $sortype = "DESC";
if (isset($_GET['maptype'])) $maptype = $_GET['maptype']; else $maptype = "vq3";
if (isset($_GET['mapname'])) $mapname = $_GET['mapname']; else $mapname = "all";

$db = mysqli_connect($hostname, $username, $password, $database);
if(mysqli_connect_errno()) {
	echo '<p>Erreur de connexion a la base de donnees: '.mysqli_connect_error().'</p>';
}
if ($mapname != "all")
$sql = "SELECT * FROM dl_Maps WHERE physics='".$maptype."' AND nom='".$mapname."' ORDER BY ".$sortby." ".$sortype;
else
$sql = "SELECT * FROM dl_Maps WHERE physics='".$maptype."' ORDER BY ".$sortby." ".$sortype;

$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());

$nbpages = ceil(mysqli_num_rows($req)/$nbmaps);


?> 
<div style="text-align:center;"> 
  <table style="margin-left:auto;margin-right:auto;width:1024px;border:none;" cellpadding="0" cellspacing="0"> 
    <tr> 
      <td style="text-align:center;"><? include("titre.php"); ?></td> 
    </tr> 
    <tr> 
      <td><table cellpadding="0" cellspacing="0" style="margin-left:auto;margin-right:auto;border:none;width:100%;"> 
          <tr> 
            <td valign="top" style="background-color:#70809F;width:137px;"><? include("menugauche.php"); ?></td> 
            <td valign="top"><table cellspacing="0" cellpadding="0" style="width:90%;border:none;margin-left:auto;margin-right:auto;"> 
                <tr style="text-align:center;"> 
                  <td style="text-align:center;margin-left:auto;margin-right:auto;">
                    <div style="margin-left:auto;margin-right:auto;">
					  <img style="margin-top:20px;margin-bottom:3px;" src="images/Dividers_long.gif" alt=""/> 
                      <div class="news_titre">Maps</div>
                      <img style="margin-top:4px;margin-bottom:2px;" src="images/Dividers_long.gif" alt=""/>
					</div> 
                      <table cellpadding="0" cellspacing="0" style="text-align:center;margin-left:auto;margin-right:auto;border:none;"> 
                        <tr> 
                          <td><a href="maps.php?page=<? if ($numpage==1) echo "1"; else echo $numpage-1; ?>&amp;sort=<? echo $sortby; ?>&amp;sorttype=<? echo $sortype; ?>&amp;maptype=<? echo $maptype; ?>&amp;mapname=<? echo $mapname; ?>"><img src="images/Bulletl.gif" style="border:none;" alt=""/></a></td> 
                          <td style="width:300px" class="petit_nombre"> <? $i=0; for ($i=1;$i<=$nbpages;$i++) {
							if ($numpage==$i) echo $numpage;
							else echo "<a href='maps.php?page=".($i)."&amp;sort=".$sortby."&amp;sorttype=".$sortype."&amp;maptype=".$maptype."&amp;mapname=".$mapname."'>".$i."</a>"; 
							echo " ";
						}?> 
                            </td> 
                          <td><a href="maps.php?page=<? if ($numpage==$nbpages) echo $numpage; else echo $numpage+1; ?>&amp;sort=<? echo $sortby; ?>&amp;sorttype=<? echo $sortype; ?>&amp;maptype=<? echo $maptype; ?>&amp;mapname=<? echo $mapname; ?>"><img src="images/Bulletr.gif" style="border:none;" alt=""/></a></td> 
                        </tr> 
                      </table> 
                    <img style="margin-top:5px;margin-bottom:10px;" src="images/Dividers_long.gif" alt=""/>
					<div class="couleur_blanc" style="margin-left:auto;margin-right:auto;margin-bottom:10px;">Order by : 
						<? if ($sortby=="nom") echo "name "; else echo '<a href="maps.php?page='.$numpage.'&amp;sort=nom&amp;sorttype='.$sortype.'&amp;maptype='.$maptype.'&amp;mapname='.$mapname.'">name</a> ';
						   if ($sortby=="date") echo "date "; else echo '<a href="maps.php?page='.$numpage.'&amp;sort=date&amp;sorttype='.$sortype.'&amp;maptype='.$maptype.'&amp;mapname='.$mapname.'">date</a> ';
						   if ($sortby=="taille") echo "size "; else echo '<a href="maps.php?page='.$numpage.'&amp;sort=taille&amp;sorttype='.$sortype.'&amp;maptype='.$maptype.'&amp;mapname='.$mapname.'">size</a> '; ?> &nbsp;&nbsp; Sort type : 
						<? if ($sortype=="ASC") echo "ASC "; else echo '<a href="maps.php?page='.$numpage.'&amp;sort='.$sortby.'&amp;sorttype=ASC&amp;maptype='.$maptype.'&amp;mapname='.$mapname.'">ASC</a> '; 
						   if ($sortype=="DESC") echo "DSC "; else echo '<a href="maps.php?page='.$numpage.'&amp;sort='.$sortby.'&amp;sorttype=DESC&amp;maptype='.$maptype.'&amp;mapname='.$mapname.'">DSC</a> '; ?>
					</div>
                    <?
					$cpt=0;
					$nbrows = mysqli_num_rows($req);
					while ($row = mysqli_fetch_row($req)) {
						if (($cpt >= ($numpage*$nbmaps)-$nbmaps) && ($cpt < $numpage*$nbmaps)) {  
                   
							echo "<table style='width:480px;border:none;text-align:center;margin-left:auto;margin-right:auto;border-style:solid;border-width:1px;border-color:#0000FF;'> 
                      <tr> 
                        <td style='border-style:solid;border-width:1px;border-color:#000000;'><table id='".$row[1]."' style='width:100%;border:none;text-align:center;margin-left:auto;margin-right:auto;background-color:#70809F;' cellpadding='0' cellspacing='0'> 
                            <tr> 
                              <td style='text-align:center;' colspan='3'>".$row[1]."</td> 
                            </tr> 
                            <tr> 
                              <td style='text-align:center;margin-left:auto;margin-right:auto;' colspan='3'> 
                                  <table style='width=:465px;border:none;margin-left:auto;margin-right:auto;'> 
                                    <tr> 
                                      <td style='height:170px;text-align:center;'><img src='".$row[7]."' style='width:210px;height:158px;border-style:solid;border-width:1px;border-color:#000000;' alt=''/> <img src='".$row[8]."' style='width:210px;height:158px;border-style:solid;border-width:1px;border-color:#000000;' alt=''/></td> 
                                    </tr> 
                                  </table> 
                                </td> 
                            </tr> 
                            <tr> 
                              <td class='couleur_bleu_souligne' style='text-align:right;width:213px;text-decoration:underline;'>Download</td> 
                              <td class='couleur_bleu' style='text-align:center;width:40px;'>:</td> 
                              <td class='couleur_bleu' style='text-align:left;width:213px;'><a href='clic.php?url=".$row[6]."'><img src='images/lienddl.gif' style='border:none;' alt=''/></a> (<span class='couleur_blanc'>";
								$underscored = str_replace ("/", "_", $row[6]);
								$underscored2 = "data/".$underscored.".dat";
								include($underscored2);
								echo "</span> clics)</td> 
                            </tr> 
                            <tr>
                              <td class='couleur_bleu_souligne' style='text-align:right;text-decoration:underline;'>File Size</td> 
                              <td class='couleur_bleu' style='text-align:center;'>:</td> 
                              <td class='couleur_bleu' style='text-align:left;'>".$row[4]." Kb</td> 
                            </tr> 
                            <tr> 
                              <td class='couleur_bleu_souligne' style='text-align:right;text-decoration:underline;'>Physics</td> 
                              <td class='couleur_bleu' style='text-align:center;'>:</td> 
                              <td class='couleur_bleu' style='text-align:left;'>".$row[3]."</td> 
                            </tr> 
                            <tr> 
                              <td class='couleur_bleu_souligne' style='text-align:right;text-decoration:underline;'>Author</td> 
                              <td class='couleur_bleu' style='text-align:center;'>:</td> 
                              <td class='couleur_bleu' style='text-align:left;'>".$row[2]."</td> 
                            </tr>
							<tr> 
                              <td class='couleur_bleu_souligne' style='text-align:right;text-decoration:underline;'>Panorama</td> 
                              <td class='couleur_bleu' style='text-align:center;'>:</td> 
                              <td class='couleur_bleu' style='text-align:left;'><a href='panoramas/".$row[1].".html' onclick=\"OuvrirPanorama('panoramas/".$row[1].".html'); return false;\">360° view</a></td> 
                            </tr> 
                            <tr> 
                              <td colspan='3' style='text-align:center;margin-left:auto;margin-right:auto;'>
							  <table style='background-color:#70809F;margin-left:auto;margin-right:auto;margin-top:30px;margin-bottom:30px;width:300px;border:none;' cellspacing='0' cellpadding='0'> 
                                <tr> 
                                  <td><table style='width:100%;border-width:1px;border-style:solid;border-color:#000000;border-collapse:collapse;border-bottom:0px;' cellspacing='0' cellpadding='0'> 
                                      <tr style='background-color:#305297;text-align:center;margin-left:auto;margin-right:auto;color:#000000;'> 
                                        <td>Top 10</td> 
                                      </tr> 
                                    </table></td> 
                                </tr> 
                                <tr> 
                                  <td style='text-align:center;margin-left:auto;margin-right:auto;'>
                                      <table style='width:380px;height:168px;border-width:1px;border-style:solid;border-color:#000000;border-top:none;border-left:none;' cellpadding='0' cellspacing='0'> 
                                        <tr style='height:20px;'> 
                                          <td class='couleur_noir' style='width:50px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>Pos</td> 
                                          <td class='couleur_noir' style='width:50px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>Flag</td> 
                                          <td class='couleur_noir' style='width:125px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>Player</td> 
                                          <td class='couleur_noir' style='width:100px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>Time</td> 
                                          <td class='couleur_noir' style='width:55px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'>Demo</td> 
                                        </tr>";

								$sqldemo = "SELECT joueur,temps,pays,lien FROM dl_Demos WHERE map='".$row[1]."' AND valide=1 AND physics='".$maptype."' ORDER BY temps ASC LIMIT 0,10";
								$reqdemo = mysqli_query($db, $sqldemo) or die('Erreur SQL !'.$sqldemo.'<br/>'.mysqli_error());
								$cpt2=0;
								while ($rowd = mysqli_fetch_row($reqdemo)) {
										$cpt2++;
										$tps = $rowd[1];
										$minute=0;$seconde=0;$milli=0;$min="";$sec="";$mil="";
										if ($tps/60000 >= 1) { $minute = floor($tps/60000); $tps = $tps-($minute*60000); }
										if ($tps/1000 >= 1) { $seconde = floor($tps/1000); $tps = $tps-($seconde*1000); }
										$milli = $tps;
										if ($minute < 10) $min="0".$minute; else $min="".$minute;
										if ($seconde < 10) $sec="0".$seconde; else $sec="".$seconde;
										if ($milli < 10) $mil="00".$milli; elseif ($milli >= 10 && $milli < 100) $mil="0".$milli; else $mil="".$milli;
										echo "<tr style='height:16px;' onmouseover='changeCouleur(this);' onmouseout='remetCouleur(this);'>  
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>".$cpt2."</td> 
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'><img src='images/drapeaux/".strtolower($rowd[2]).".jpg' alt='".strtolower($rowd[2])."' style='vertical-align:middle;'/></td>
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'><a class='liens_joueurs' href='player_infos.php?player=".$rowd[0]."&amp;country=".strtolower($rowd[2])."' onclick=\"OuvrirInfosJoueur('player_infos.php?player=".$rowd[0]."&amp;country=".strtolower($rowd[2])."'); return false;\">".$rowd[0]."</a></td> 
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>".$min.".".$sec.".".$mil."</td> 
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'><a href='".$rowd[3]."'><img style='border:none;' src='images/lienddl.gif' alt=''/></a></td> 
										</tr>";   
								}
								if ($cpt2 < 10) {
									for($j=$cpt2+1;$j<=10;$j++) {
										echo "<tr style='height:16px;' onmouseover='changeCouleur(this);' onmouseout='remetCouleur(this);'>  
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>".$j."</td> 
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>&nbsp;</td> 
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>&nbsp;</td> 
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>&nbsp;</td> 
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>&nbsp;</td> 
										</tr>";
									}
								}
 							echo "</table></td> 
									</tr> 
									</table>
									</td> 
								 	</tr> 
									</table></td> 
								  	</tr> 
									</table>";
                      		if ($cpt != $nbrows) 
								echo "<img src='images/Dividers2.gif' style='margin-top:16px;margin-bottom:16px;' alt=''/>";
						}
						$cpt++;
					}
				  ?> 
                    <img style="margin-top:5px;margin-bottom:2px;" src="images/Dividers_long.gif" alt=""/> 
                      <table cellpadding="0" cellspacing="0" style="text-align:center;margin-left:auto;margin-right:auto;border:none;"> 
                        <tr> 
                          <td><a href="maps.php?page=<? if ($numpage==1) echo "1"; else echo $numpage-1; ?>&amp;sort=<? echo $sortby; ?>&amp;sorttype=<? echo $sortype; ?>&amp;maptype=<? echo $maptype; ?>&amp;mapname=<? echo $mapname; ?>"><img src="images/Bulletl.gif" style="border:none;" alt=""/></a></td> 
                          <td style="width:300px" class="petit_nombre"> <? $i=0; for ($i=1;$i<=$nbpages;$i++) {
							if ($numpage==$i) echo $numpage;
							else echo "<a href='maps.php?page=".($i)."&amp;sort=".$sortby."&amp;sorttype=".$sortype."&amp;maptype=".$maptype."&amp;mapname=".$mapname."'>".$i."</a>"; 
							echo " ";
						}?> 
                            </td> 
                          <td><a href="maps.php?page=<? if ($numpage==$nbpages) echo $numpage; else echo $numpage+1; ?>&amp;sort=<? echo $sortby; ?>&amp;sorttype=<? echo $sortype; ?>&amp;maptype=<? echo $maptype; ?>&amp;mapname=<? echo $mapname; ?>"><img src="images/Bulletr.gif" style="border:none;" alt=""/></a></td> 
                        </tr> 
                      </table> 
                    <img style="margin-top:4px;margin-bottom:20px;" src="images/Dividers_long.gif" alt=""/>
                    </td> 
                </tr> 
              </table></td> 
            <td valign="top" style="background-color:#70809F;width:137px;"><? include("menudroit.php"); ?></td> 
          </tr> 
        </table></td> 
    </tr> 
    <tr style="background-color:#70809F"> 
      <td class="couleur_noir" style="text-align:center;margin-left:auto;margin-right:auto;height:13px">By Yann39 &copy; Defrag-life 2004-<? echo date("Y"); ?></td>
    </tr> 

  </table> 
</div> 
</body>
</html>