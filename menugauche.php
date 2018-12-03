<?php 
function url_actuelle() {
     return str_replace("&","&amp;","http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
}
?>
<table style="width:137px;border:none;background-color:#70809F;" cellpadding="0" cellspacing="0"> 
  <tr style="height:25px;"> 
    <td colspan="2"><img src="images/Menu.gif" style="margin-bottom:16px;" alt=""/></td> 
  </tr> 
  <tr style="height:16px;"> 
    <td style="text-align:center;width:18%;"><img src="images/fleche.gif" alt=""/></td> 
    <td style="text-align:left;width:82%;"><a href="index.php">News</a></td> 
  </tr>
  <tr style="height:16px;"> 
    <td style="text-align:center;"><img src="images/fleche.gif" alt=""/></td> 
    <td style="text-align:left;"><a href="physics_choice.php">Maps</a></td> 
  </tr>
  <tr style="height:16px;"> 
    <td style="text-align:center;"><img src="images/fleche.gif" alt=""/></td> 
    <td style="text-align:left;"><a href="player_ranking.php">Player Ranking</a></td> 
  </tr>
  <tr style="height:16px;"> 
    <td style="text-align:center;"><img src="images/fleche.gif" alt=""/></td> 
    <td style="text-align:left;"><a href="country_ranking.php">Country Ranking</a></td> 
  </tr> 
  <tr style="height:16px;"> 
    <td style="text-align:center;"><img src="images/fleche.gif" alt=""/></td> 
    <td style="text-align:left;"><a href="upload.php">Upload</a></td> 
  </tr> 
  <tr style="height:16px;"> 
    <td style="text-align:center;"><img src="images/fleche.gif" alt=""/></td> 
    <td style="text-align:left;"><a href="downloads.php">Downloads</a></td> 
  </tr> 
  <tr style="height:16px;"> 
    <td style="text-align:center;"><img src="images/fleche.gif" alt=""/></td> 
    <td style="text-align:left;"><a href="mapping.php">Mapping</a></td> 
  </tr> 
  <tr style="height:16px;"> 
    <td style="text-align:center;"><img src="images/fleche.gif" alt=""/></td> 
    <td style="text-align:left;"><a href="wallpapers.php">Wallpapers</a></td> 
  </tr> 
  <tr> 
    <td colspan="2"><img src="images/Login.gif" style="margin-top:16px;" alt=""/></td> 
  </tr> 
  <tr> 
    <td colspan="2" style="text-align:center;"> <form action="err.php" method='post'> 
        <table style="border:none;text-align:center;margin-top:16px;margin-bottom:16px;margin-left:auto;margin-right:auto;"> 
          <tr> 
            <td class="couleur_blanc">Login :</td> 
            <td><input name="login" type="text" size="8" maxlength="250" style="border-color:#000000;border-style:solid;border-width:1px;background-color:#687A9B;"/></td> 
          </tr> 
          <tr> 
            <td class="couleur_blanc">Pwd :</td> 
            <td><input name="pass" type="password" size="8" maxlength="10" style="border-color:#000000;border-style:solid;border-width:1px;background-color:#687A9B;"/></td> 
          </tr> 
          <tr> 
            <td colspan="2" style="text-align:center;"><input type="submit" value="log in" style="border-color:#000000;border-style:solid;border-width:1px;background-color:#687A9B;"/></td> 
          </tr> 
        </table> 
      </form></td> 
  </tr> 
  <tr> 
    <td colspan="2"><img src="images/Links.gif" style="margin-bottom:16px;" alt=""/></td> 
  </tr> 
  <tr> 
    <td colspan="2" style="text-align:center;"><a href="http://admdefrag.narod.ru" onclick="window.open(this.href); return false;"><img src="images/links/admAgressor.jpg" alt="http://admdefrag.narod.ru" style="border:none;margin-bottom:5px;"/></a></td> 
  </tr> 
  <tr> 
    <td colspan="2" style="text-align:center;"><a href="http://www.alternatemappingteam.de.vu" onclick="window.open(this.href); return false;"><img src="images/links/amtsmall.jpg" alt="http://www.alternatemappingteam.de.vu" style="border:none;margin-bottom:5px;"/></a></td> 
  </tr> 
  <tr> 
    <td colspan="2" style="text-align:center;"><a href="http://www.breakdown-hq.com" onclick="window.open(this.href); return false;"><img src="images/links/breakdown.jpg" alt="http://www.breakdown-hq.com" style="border:none;margin-bottom:5px;"/></a></td> 
  </tr> 
  <tr> 
    <td colspan="2" style="text-align:center;"><a href="http://www.quake.cz/defrag/" onclick="window.open(this.href); return false;"><img src="images/links/czech.jpg" alt="http://www.quake.cz/defrag/" style="border:none;margin-bottom:5px;"/></a></td> 
  </tr> 
  <tr> 
    <td colspan="2" style="text-align:center;"><a href="http://www.defrag.fr" onclick="window.open(this.href); return false;"><img src="images/links/defrag-fr.png" alt="http://www.defrag.fr" style="border:none;margin-bottom:5px;"/></a></td> 
  </tr> 
  <tr> 
    <td colspan="2" style="text-align:center;"><a href="http://www.defrag.ru" onclick="window.open(this.href); return false;"><img src="images/links/defrag-ru.jpg" alt="http://www.defrag.ru" style="border:none;margin-bottom:5px;"/></a></td> 
  </tr> 
  <tr> 
    <td colspan="2" style="text-align:center;"><a href="http://defrag.lanparty-nrw.de" onclick="window.open(this.href); return false;"><img src="images/links/mdd.png" alt="http://defrag.lanparty-nrw.de" style="border:none;margin-bottom:5px;"/></a></td> 
  </tr> 
  <tr> 
    <td colspan="2" style="text-align:center;"><a href="http://q3a.ath.cx" onclick="window.open(this.href); return false;"><img src="images/links/q3a.jpg" alt="http://q3a.ath.cx" style="border:none;margin-bottom:5px;"/></a></td> 
  </tr> 
  <tr> 
    <td colspan="2" style="text-align:center;"><a href="http://www.qeradiant.com" onclick="window.open(this.href); return false;"><img src="images/links/radiant.gif" alt="http://www.qeradiant.com" style="border:none;margin-bottom:5px;"/></a></td> 
  </tr> 
  <tr> 
    <td colspan="2" style="text-align:center;"><a href="http://www.velocitymicro.com/forum" onclick="window.open(this.href); return false;"><img src="images/links/velocity-micro-opc.png" alt="http://www.velocitymicro.com/forum" style="border:none;margin-bottom:5px;"/></a></td> 
  </tr> 
  <tr> 
	<td style="text-align:center;" valign="middle"><img src="images/fleche.gif" alt=""/></td> 
    <td style="text-align:left;height:50px;"><a href="mailto:admin@defrag-life.tk">Have your button here?</a></td> 
  </tr> 
  <tr> 
    <td colspan="2" style="height:20px;" class="couleur_blanc">And... link us !</td> 
  </tr> 
  <tr> 
    <td colspan="2" style="text-align:center;"><a href="links.php" onclick="window.open(this.href); return false;"><img src="images/links/LienDefrag-life.jpg" alt="http://www.defrag-life.tk" style="border:none;width:88px;height:31px;"/></a></td>
  </tr>
  <tr> 
    <td colspan="2" style="text-align:center;height:100px;"><a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10-blue" alt="Valid XHTML 1.0 Strict !" style="border:none;width:88px;height:31px;"/></a><br/><a href="http://jigsaw.w3.org/css-validator/validator?uri=<? echo url_actuelle(); ?>"><img src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS 2.1 !" style="border:none;width:88px;height:31px;"/></a></td> 
  </tr>
</table> 
