<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Defrag-life - Country ranking</title>
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

//Pour connaitre le nombre de joueurs class�s
$sql = "SELECT DISTINCT(pays) FROM dl_Demos WHERE valide=1 AND physics='".$phys."'";
$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysql_error());
$nbpays = mysqli_num_rows($req);

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
                      <div class="news_titre">Country ranking</div>
                      <img style="margin-top:4px;margin-bottom:20px;" src="images/Dividers_long.gif" alt=""/>
					</div> 
                    <?
					  echo "<table style='margin-left:auto;margin-right:auto;width:600px;border:none;border-style:solid;border-width:1px;border-color:#0000FF;'> 
                      <tr> 
                        <td style='border-style:solid;border-width:1px;border-color:#000000;'><table style='width:100%;border:none;text-align:center;background-color:#70809F;' cellpadding='0' cellspacing='0'> 
                            <tr> 
                              <td colspan='3' style='text-align:center;'>
							  <table style='margin-left:auto;margin-right:auto;margin-top:3px;margin-bottom:30px;width:300px;border:none;' cellspacing='0' cellpadding='0'> 
                                <tr> 
                                  <td> 
								   <div style='margin-top:15px;margin-bottom:15px;'>";
								   if ($phys=="vq3")
									 echo "<span class='couleur_blanc'>VQ3</span> <a href='country_ranking.php?tri=".$tri."&amp;ordre=".$ordre."&amp;phys=cpm'>CPM</a>";
								   else
									 echo "<a href='country_ranking.php?tri=".$tri."&amp;ordre=".$ordre."&amp;phys=vq3'>VQ3</a> <span class='couleur_blanc'>CPM</span>";							   
								  echo" </div>
								   <table style='width:100%;border-width:1px;border-style:solid;border-color:#000000;border-collapse:collapse;border-bottom:0px;' cellspacing='0' cellpadding='0'> 
                                      <tr style='background-color:#305297;text-align:center;color:#000000;'> 
                                        <td class='couleur_noir' style='height:20px;'>".$nbpays." coutries ranked</td> 
                                      </tr> 
                                    </table></td> 
                                </tr> 
                                <tr> 
                                  <td>
                                      <table style='width:520px;height:168px;border-width:1px;border-style:solid;border-color:#000000;border-top:none;border-left:none;' cellpadding='0' cellspacing='0'> 
                                        <tr style='height:20px;'> 
                                          <td class='couleur_noir' style='width:40px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'><a href='country_ranking.php?tri=pos&amp;phys=".$phys."&amp;ordre="; if ($ordre=="asc") echo "desc"; else echo "asc"; echo "'>Pos</a></td> 
                                          <td class='couleur_noir' style='width:40px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'><a href='country_ranking.php?tri=flag&amp;phys=".$phys."&amp;ordre="; if ($ordre=="asc") echo "desc"; else echo "asc"; echo "'>Flag</a></td> 
                                          <td class='couleur_noir' style='width:140px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'><a href='country_ranking.php?tri=player&amp;phys=".$phys."&amp;ordre="; if ($ordre=="asc") echo "desc"; else echo "asc"; echo "'>Player</a></td> 
                                          <td class='couleur_noir' style='width:56px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'><a href='country_ranking.php?tri=points&amp;phys=".$phys."&amp;ordre="; if ($ordre=="asc") echo "desc"; else echo "asc"; echo "'>Points</a></td> 
                                          <td class='couleur_noir' style='width:56px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'><a href='country_ranking.php?tri=demos&amp;phys=".$phys."&amp;ordre="; if ($ordre=="asc") echo "desc"; else echo "asc"; echo "'>Demos</a></td>
                                          <td class='couleur_noir' style='width:74px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'><a href='country_ranking.php?tri=efficiency&amp;phys=".$phys."&amp;ordre="; if ($ordre=="asc") echo "desc"; else echo "asc"; echo "'>Efficiency</a></td>
                                          <td class='couleur_noir' style='width:38px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'><a href='country_ranking.php?tri=golden&amp;phys=".$phys."&amp;ordre="; if ($ordre=="asc") echo "desc"; else echo "asc"; echo "'><img style='border:none;' src='images/golden.gif' alt=''/></a></td>
                                          <td class='couleur_noir' style='width:38px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'><a href='country_ranking.php?tri=silver&amp;phys=".$phys."&amp;ordre="; if ($ordre=="asc") echo "desc"; else echo "asc"; echo "'><img style='border:none;' src='images/silver.gif' alt=''/></a></td>
                                          <td class='couleur_noir' style='width:38px;text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;'><a href='country_ranking.php?tri=bronze&amp;phys=".$phys."&amp;ordre="; if ($ordre=="asc") echo "desc"; else echo "asc"; echo "'><img style='border:none;' src='images/bronze.gif' alt=''/></a></td>
                                        </tr>";
									$tablo=array();
									$cpt2=1;
									$ok=0;
									$sql2 = "SELECT pays, joueur, map, COUNT(id), ROUND(SUM((SELECT MIN(temps) FROM dl_Demos d2 WHERE d1.map=d2.map)/temps)*10,2) AS TotalPoints FROM dl_Demos d1 WHERE physics='".$phys."' AND valide=1 GROUP BY joueur ORDER BY TotalPoints DESC";
									$req2 = mysqli_query($db, $sql2) or die('Erreur SQL !'.$sql2.'<br/>'.mysqli_error());
									$sql3 = "SELECT joueur, COUNT(id) AS NbOr FROM dl_Demos WHERE place=1 AND physics='".$phys."' AND valide=1 GROUP BY joueur ORDER BY NbOr DESC";
									$req3 = mysqli_query($db, $sql3) or die('Erreur SQL !'.$sql3.'<br/>'.mysqli_error());
									$sql4 = "SELECT joueur, COUNT(id) AS NbArgent FROM dl_Demos WHERE place=2 AND physics='".$phys."' AND valide=1 GROUP BY joueur ORDER BY NbArgent DESC";
									$req4 = mysqli_query($db, $sql4) or die('Erreur SQL !'.$sql4.'<br/>'.mysqli_error());
									$sql5 = "SELECT joueur, COUNT(id) AS NbBronze FROM dl_Demos WHERE place=3 AND physics='".$phys."' AND valide=1 GROUP BY joueur ORDER BY NbBronze DESC";
									$req5 = mysqli_query($db, $sql5) or die('Erreur SQL !'.$sql5.'<br/>'.mysqli_error());

									$tabptspays = array();
									$tabdemospays = array();
									$tabplayerspays = array();
									$taborpays = array();
									$tabargentpays = array();
									$tabbronzepays = array();

									while ($row2 = mysqli_fetch_row($req2)) { //Pour chaque ligne (pays, joueur, map, nbDemos, TotalPoints)
										//On r�cup�re le nombre de m�dailles
										$medailleor=0;$medailleargent=0;$medaillebronze=0;
										while ($row3 = mysqli_fetch_row($req3)) {
											if ($row2[1] == $row3[0]) {
												$medailleor = $row3[1];
												break;
											}
										}
										while ($row4 = mysqli_fetch_row($req4)) {
											if ($row2[1] == $row4[0]) {
												$medailleargent = $row4[1];
												break;
											}
										}
										while ($row5 = mysqli_fetch_row($req5)) {
											if ($row2[1] == $row5[0]) {
												$medaillebronze = $row5[1];
												break;
											}
										}
										//Repositionne les pointeurs � z�ro
										if (mysqli_num_rows($req3) != 0) mysqli_data_seek($req3,0);
										if (mysqli_num_rows($req4) != 0) mysqli_data_seek($req4,0);
										if (mysqli_num_rows($req5) != 0) mysqli_data_seek($req5,0);

										$pays = strtolower($row2[0]);
										$playerString = "<a class='liens_joueurs' href='player_infos.php?player=".$row2[1]."&amp;country=".$pays."' onclick=\"OuvrirInfosJoueur('player_infos.php?player=".$row2[1]."&amp;country=".$pays."'); return false;\">".$row2[1]."</a> (".$row2[4].")<br/>";
										if (!isset($tabptspays[$pays])) { $tabptspays[$pays] = $row2[4] ?? 0; } else { $tabptspays[$pays] += $row2[4]; }
										if (!isset($tabdemospays[$pays])) { $tabdemospays[$pays] = $row2[3] ?? 0; } else { $tabdemospays[$pays] += $row2[3]; }
										if (!isset($tabplayerspays[$pays])) { $tabplayerspays[$pays] = $playerString ?? ''; } else { $tabplayerspays[$pays] .= $playerString; }
										if (!isset($taborpays[$pays])) { $taborpays[$pays] = $medailleor ?? 0; } else { $taborpays[$pays] += $medailleor; }
										if (!isset($tabargentpays[$pays])) { $tabargentpays[$pays] = $medailleargent ?? 0; } else { $tabargentpays[$pays] += $medailleargent; }
										if (!isset($tabbronzepays[$pays])) { $tabbronzepays[$pays] = $medaillebronze ?? 0; } else { $tabbronzepays[$pays] += $medaillebronze; }
									}

									asort($tabplayerspays);

									foreach ($tabptspays as $key => $val) {

										if ($tri=="pos" && $ordre=="asc") { $trier = $val; $croissant=1; $cpt2=$nbpays; }
										elseif ($tri=="pos" && $ordre=="desc") { $trier = $val; $croissant=0; }
										elseif ($tri=="flag" && $ordre=="asc") { $trier = strtolower($key); $croissant=1; }
										elseif ($tri=="flag" && $ordre=="desc") { $trier = strtolower($key); $croissant=0; }
										elseif ($tri=="player" && $ordre=="asc") { $trier = strtolower($tabplayerspays[$key]); $croissant=1; }
										elseif ($tri=="player" && $ordre=="desc") { $trier = strtolower($tabplayerspays[$key]); $croissant=0; }
										elseif ($tri=="points" && $ordre=="asc") { $trier = $val; $croissant=1; }
										elseif ($tri=="points" && $ordre=="desc") { $trier = $val; $croissant=0; }
										elseif ($tri=="demos" && $ordre=="asc") { $trier = $tabdemospays[$key]; $croissant=1; }
										elseif ($tri=="demos" && $ordre=="desc") { $trier = $tabdemospays[$key]; $croissant=0; }
										elseif ($tri=="efficiency" && $ordre=="asc") { $trier = round(($val/$tabdemospays[$key])*10,2); $croissant=1; }
										elseif ($tri=="efficiency" && $ordre=="desc") { $trier = round(($val/$tabdemospays[$key])*10,2); $croissant=0; }
										elseif ($tri=="golden" && $ordre=="asc") { $trier = $taborpays[$key]; $croissant=1; }
										elseif ($tri=="golden" && $ordre=="desc") { $trier = $taborpays[$key]; $croissant=0; }
										elseif ($tri=="silver" && $ordre=="asc") { $trier = $tabargentpays[$key]; $croissant=1; }
										elseif ($tri=="silver" && $ordre=="desc") { $trier = $tabargentpays[$key]; $croissant=0; }
										elseif ($tri=="bronze" && $ordre=="asc") { $trier = $tabbronzepays[$key]; $croissant=1; }
										else { $trier = $tabbronzepays[$key]; $croissant=0; }

										$tablo["<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'><img src='images/drapeaux/".strtolower($key).".jpg' alt='".strtolower($key)."' style='vertical-align:middle;'/></td> 
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>".$tabplayerspays[$key]."</td> 
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>".$val."</td> 
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>".$tabdemospays[$key]."</td>
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>".round(($val/$tabdemospays[$key])*10,2)."%</td> 
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>".$taborpays[$key]."</td> 
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>".$tabargentpays[$key]."</td> 
										<td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>".$tabbronzepays[$key]."</td> 
										</tr>"] = $trier;
									}
									if ($croissant==1)
										asort($tablo);
									else
										arsort($tablo);
									foreach ($tablo as $key => $val) { 
										echo "<tr onmouseover='changeCouleur(this);' onmouseout='remetCouleur(this);' style='height:16px;'>  
											  <td style='text-align:center;border-style:solid;border-width:1px;border-color:#000000;border-bottom:none;border-right:none;' class='couleur_blanc'>".$cpt2."</td>";
										echo $key;
										if ($tri=="pos" && $ordre=="asc") $cpt2--; else $cpt2++;
									}
 							echo "</table> 
									</td> 
									</tr> 
									</table>
									</td> 
								 	</tr> 
									</table></td> 
								  	</tr> 
									</table>";
							mysqli_close($db);
				  ?>
					<div class="couleur_blanc" style="text-align:center;margin-top:20px;">See the <a href="player_ranking.php">player ranking</a><br/>
					FAQ : <a href="faq.php">How are points calculated ?</a></div>
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