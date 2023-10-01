<?
require("connexion_bdd.php");

$db = mysqli_connect($hostname, $username, $password, $database);
if(mysqli_connect_errno()) {
	echo '<p>Erreur de connexion a la base de donnees: '.mysqli_connect_error().'</p>';
}
?>
 <table style="border:none; background-color:#70809F;width:137px;" cellpadding="0" cellspacing="0"> 
  <tr> 
     <td><img src="images/5lastmaps.gif" alt=""/></td> 
   </tr> 
  <tr> 
     <td><table style="border:none;width:100%;margin-bottom:16px;margin-top:16px;"> 
         <?
			$sql = "SELECT DISTINCT(nom),lien FROM dl_Maps ORDER BY date DESC LIMIT 0,5";
			$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());
			
			while ($row = mysqli_fetch_row($req)) {
				echo "<tr> 
          			<td style='width:18%;text-align:center;'><img src='images/fleche.gif' alt=''/></td> 
          			<td style='width:82%;text-align:left;'><a href='clic.php?url=".$row[1]."' title='".$row[0]."'>".substr($row[0],0,14)."</a></td>
       				</tr>";
			}
		?> 
       </table></td> 
   </tr> 
  <tr> 
     <td><img src="images/5lastdemos.gif" alt=""/></td> 
   </tr> 
  <tr> 
     <td><table style="border:none;width:100%;margin-bottom:16px;margin-top:16px;"> 
         <?			
			$sql = "SELECT nom,lien FROM dl_Demos WHERE valide=1 ORDER BY id DESC LIMIT 0,5";
			$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());
			
			while ($row = mysqli_fetch_row($req)) {
				echo "<tr> 
					<td style='width:18%;text-align:center;'><img src='images/fleche.gif' alt=''/></td> 
					<td style='width:82%;text-align:left;'><a href='".$row[1]."' title='".$row[0]."'>".substr($row[0],0,14)."</a></td> 
					</tr>";
			}

			//Nombre de demos
			$sql = "SELECT id FROM dl_Demos WHERE valide=1";
			$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());
			$nbdemos = mysqli_num_rows($req);

			//Nombre de maps
			$sql = "SELECT DISTINCT(nom) FROM dl_Maps";
			$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());
			$nbmaps = mysqli_num_rows($req);

			//Nombre de joueurs différents
			$sql = "SELECT DISTINCT(UPPER(joueur)) FROM dl_Demos WHERE valide=1";
			$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());
			$nbjoueurs = mysqli_num_rows($req);
			
			//On le lit le fichier contenant la date de derniere mise à jour  
			$fp = fopen ("maj.txt", "r");  
			$contenu = fgets ($fp, 255);  
			fclose ($fp);  
			
			mysqli_close($db);
		?> 
       </table></td> 
   </tr> 
  <tr> 
     <td><img src="images/Stats.gif" alt=""/></td> 
   </tr> 
  <tr> 
     <td><table style="border:none;margin-top:16px;margin-bottom:16px;"> 
         <tr> 
          <td style="width:18%;"><img src="images/fleche.gif" alt=""/></td> 
          <td style="width:82%;text-align:left;"><img src="http://perso0.free.fr/cgi-bin/wwwcount.cgi?df=[yann39].dat&amp;dd=sbluein" alt=""/></td>
        </tr> 
         <tr> 
          <td style="height:10px;"></td> 
          <td></td> 
        </tr> 
         <tr> 
          <td><img src="images/fleche.gif" alt=""/></td> 
          <td style="text-align:left;" class="couleur_blanc">Last Update : <? echo $contenu; ?></td> 
        </tr>
         <tr> 
          <td style="height:10px;"></td> 
          <td></td> 
        </tr> 
         <tr> 
          <td><img src="images/fleche.gif" alt=""/></td> 
          <td style="text-align:left;" class="couleur_blanc">Actually :</td> 
        </tr>
         <tr> 
          <td></td> 
          <td style="text-align:left;" class="couleur_blanc"> - <? echo $nbmaps; ?> maps</td> 
        </tr>
		<tr> 
          <td></td> 
          <td style="text-align:left;" class="couleur_blanc"> - <? echo $nbdemos; ?> demos</td> 
        </tr>
		<tr> 
          <td></td> 
          <td style="text-align:left;" class="couleur_blanc"> - <? echo $nbjoueurs; ?> players</td> 
        </tr>
         <tr> 
          <td style="height:20px;"></td> 
          <td></td> 
        </tr> 
		<tr> 
          <td><img src="images/fleche.gif" alt=""/></td> 
          <td style="text-align:left;"><a href="pending_demos.php">pending demos</a></td> 
        </tr>
       </table></td> 
   </tr> 
   <tr> 
     <td><img src="images/Search.gif" alt=""/></td> 
   </tr> 
  <tr> 
     <td><form action="results.php" method='post'> 
        <table style="border:none;text-align:center;margin-top:16px;margin-bottom:16px;margin-left:auto;margin-right:auto;"> 
          <tr> 
            <td class="couleur_blanc">Search :</td> 
            <td><input name="texteachercher" type="text" size="8" maxlength="250" style="border-color:#000000;border-style:solid;border-width:1px;background-color:#687A9B;"/></td> 
          </tr> 
          <tr> 
            <td class="couleur_blanc">In :</td> 
            <td><select name="dans"  size="1" style="width:72px;border-color:#000000;border-style:solid;border-width:0px;background-color:#687A9B;"><option value="maps" style="border-color:#000000;border-style:solid;border-width:1px;background-color:#687A9B;">maps</option><option value="demos" style="border-color:#000000;border-style:solid;border-width:1px;background-color:#687A9B;">demos</option></select></td> 
          </tr> 
          <tr>
            <td colspan="2" style="text-align:center;"><input type="submit" value="search" style="border-color:#000000;border-style:solid;border-width:1px;background-color:#687A9B;"/></td> 
          </tr> 
        </table> 
      </form></td> 
   </tr>
</table> 
