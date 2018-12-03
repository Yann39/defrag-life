<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Defrag-life - FAQ</title>
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
                      <div class="news_titre">FAQ</div>
                      <img style="margin-top:4px;margin-bottom:20px;" src="images/Dividers_long.gif" alt=""/>
					</div>
				  <div id="Q1" style="text-align:left;" class="couleur_blanc_souligne_gros">
					<img style="margin-right:5px;" src="images/fleche_dotted.gif" alt=""/>How can i upload a demo ?
				  </div>
				  <br/>
				  <div style="text-align:left;" class="couleur_bleu">
					In order to upload a demo on the site, you need to go to the upload page, and fill the listed fields.<br/>
					You just need to indicate your demo and your email address, so if there is a problem, we can contact you.<br/>
					Don't forget to read the rules before to upload, if one of them is not respected, your demo will not be validated.
				  </div><br/>
				  <div id="Q2" style="text-align:left;" class="couleur_blanc_souligne_gros">
					<img style="margin-right:5px;" src="images/fleche_dotted.gif" alt=""/>Why did my demo was not validated ?
				  </div>
				  <br/>
				  <div style="text-align:left;" class="couleur_bleu">
					Maybe your demo don't respect the rules, check them in the <a href="upload.php">upload page</a>. And realize that we may have refused your demo because of any overbounces that we estimate it harms the gameplay of the map.<br/>
					Nevertheless, if you're sure you have respected the rules, or if you have any complaints, please <a href="mailto:admin@defrag-life.tk">contact us</a>.
				  </div><br/>
				  <div id="Q3" style="text-align:left;" class="couleur_blanc_souligne_gros">
					<img style="margin-right:5px;" src="images/fleche_dotted.gif" alt=""/>Why can't i upload my demo ?
				  </div>
				  <br/>
				  <div style="text-align:left;" class="couleur_bleu">
					If your demo can't be uploaded, a message should normally warn you about the error you committed, just read the rules again and correct your error, your demo should be accepted, if it is not, please <a href="mailto:admin@defrag-life.tk">contact us</a>.
				  </div><br/>
				  <div id="Q4" style="text-align:left;" class="couleur_blanc_souligne_gros">
					<img style="margin-right:5px;" src="images/fleche_dotted.gif" alt=""/>When did demos will be updated on the site ?
				  </div>
				  <br/>
				  <div style="text-align:left;" class="couleur_bleu">
					We update demos when we find time :p, but it should not be longer than a week, depending of the number of demos.<br/>
					And you can of course see pending demos in the <a href="pending_demos.php">pending demos</a> page.
				  </div><br/>
				  <div id="Q5" style="text-align:left;" class="couleur_blanc_souligne_gros">
					<img style="margin-right:5px;" src="images/fleche_dotted.gif" alt=""/>How are points calculated ?
				  </div>
				  <br/>
				  <div style="text-align:left;" class="couleur_bleu">
					We tried a system that award points based on the difference between the first time and other ones, so if you are 2nd with a nice time, you will get more points than if you would be 2nd with a worse time.<br/>
					Here is the algorithm :<br/>
						&nbsp;&nbsp;&nbsp;- We take the best time on the map<br/>
						&nbsp;&nbsp;&nbsp;- We divide all time by it to obtain a value &lt;= 1<br/>
						&nbsp;&nbsp;&nbsp;- We multiply this number by 10<br/>
					So the best player will get 10 points, and other players less than 10 points depending on the difference between there time and the first time.<br/>
					Then efficiency is calculated by the following operation : (Total points / total demos) * 10
				  </div><br/>
				  <div id="Q6" style="text-align:left;" class="couleur_blanc_souligne_gros">
					<img style="margin-right:5px;" src="images/fleche_dotted.gif" alt=""/>How to use skies ?
				  </div>
				  <br/>
				  <div style="text-align:left;" class="couleur_bleu">
					Open the .zip file, you should see three folders: 'Scrips', 'env' and 'Textures'. Now, just take the folder in the 'textures' folder and put it into baseq3/textures. Then, take the folder in the 'env' folder and put it into baseq3/env.<br/>
					To finish, take the .shader file in the 'scripts' folder and put it in baseq3/scripts; and don't forget to add the name of the shader file in your shaderlist.txt to see the texture in the editor.
				  </div><br/>
				  <div id="Q7" style="text-align:left;" class="couleur_blanc_souligne_gros">
					<img style="margin-right:5px;" src="images/fleche_dotted.gif" alt=""/>How to use textures ?
				  </div>
				  <br/>
				  <div style="text-align:left;" class="couleur_bleu">
					Open the .zip file, you should see two folders, 'Scrips' and 'Textures'. Now, just take all the folders in the 'textures' folder and put them into baseq3/textures. Then, take the .shader file in the 'scripts' folder and  put it in baseq3/scripts; and don't forget to add the name of the shader file in your shaderlist.txt to see the textures in the editor.
				  </div><br/>
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
