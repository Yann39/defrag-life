<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Defrag-life - Upload</title>
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
                      <div class="news_titre">Upload</div>
                      <img style="margin-top:4px;margin-bottom:20px;" src="images/Dividers_long.gif" alt=""/>
					</div>
					<table style="margin-left:auto;margin-right:auto;border-style:solid;border-width:1px;border-color:#bed4ff;width:600px;"> 
                    <tr> 
                      <td style="text-align:center;"><form action='traitement_upload.php' method='post' enctype='multipart/form-data'> 
                          <table class="menu" cellspacing="0" cellpadding="2" style="width:95%;"> 
                            <tr> 
                              <td>&nbsp;</td> 
                            </tr> 
                            <tr> 
                              <td style="text-align:center;">Select your demo :</td> 
                            </tr>
							<tr> 
                              <td style="text-align:center;"><input name='upfile' type='file' size='50' style="border-color:#888888; border-style:solid; border-width:1px; background:#687A9B"/></td> 
                            </tr> 
                            <tr> 
                              <td style="text-align:center;">Enter your e-mail :</td> 
                            </tr> 
                            <tr> 
                              <td style="text-align:center;"><input name="email" type="text" id="email" style=" border-color:#888888; border-style:solid; border-width:1px; background:#687A9B" onblur="MM_validateForm('email','','RisEmail');return document.MM_returnValue"/></td> 
                            </tr> 
                          </table> 
                          <div style="text-align:center;margin-top:20px;"> 
                              <input type='hidden' name='boolform' value='0'/> 
                              <input name="submit" type='submit' onclick='boolform.value=1' value='Upload'/>
                          </div> 
                        </form><br/></td> 
                    </tr> 
                  </table>
				  <div class="couleur_rouge" style="margin-top:30px;margin-bottom:10px;">Read the rules below before upload !</div>
				  <div style="text-align:left;" class="couleur_blanc">
					Here are the rules about the file format :
				  </div><br/>
				  <div style="text-align:left;margin-left:50px;" class="couleur_bleu">
					- Demos must have the format : Map[df.physics]time(name.country).dm_68<br/>
					- Please don't use caracters '(',')','[',']' or '.' in your name<br/>
					- The country must be set in english<br/> 
                    - You must zip your demos before upload<br/> 
                    - Max File size : 1 Mb
				  </div><br/>
				  <div style="text-align:left;" class="couleur_blanc">
					And here are the rules you have to respect in Quake3. If one of them is not respected, your demo won't be validated !
				  </div><br/>
				  <div style="text-align:left;margin-left:50px;" class="couleur_bleu">
					- g_synchronousClients "1"<br/>
					- com_maxfps "125"<br/>
					- pmove_fixed "0"<br/>
					- sv_fps "125"<br/>
					- timescale "1"<br/>
					- sv_cheats "0"<br/>
					- pmove_msec "8"<br/>
					- No changing during the run<br/>
					- Multiplayer demos not allowed<br/>
					- Use Defrag Version 1.9 and more<br/>
					- You need Q3A release 1.32<br/>
					- No time reset</div><br/>
				  <div style="text-align:left;" class="couleur_blanc">
					Overbounces are allowed, but we can possibly take the liberty of refusing a demo if we estimate that it harms the gameplay of the map.
				  </div>
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
