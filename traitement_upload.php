<html>
<head>
<title>Upload de Fichiers</title>
</head>
<link href='styles.css' type='text/css' rel='stylesheet'>
<body style="margin-left:0px; margin-top:0px; margin-right:0px; margin-bottom:0px; background-color:#000000; color:#FFFFFF;">
<div style="text-align:center;">
<?php
require("connexion_bdd.php");
//vérifie si l'adresse email est valide
function VerifierAdresseMail($adresse)
{
   $Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';
   if(preg_match($Syntaxe,$adresse))
      return true;
   else
     return false;
}
//extraction de n caractères d'une chaine en partant de la droite
function right($str,$nbr)
{ 
	return substr($str,-$nbr); 
}
//extraction de n caractères d'une chaine en partant de la gauche
function left($str,$nbr)
{ 
	return substr($str,0,$nbr); 
}
$maxsize=1000000; //Taille maximale des fichiers qui seront uploadés (en octet)
$url_site='http://hostname/defrag-life/'; // Chemin vers le fichier upload.php et upload_ok.php avec le '/'
$regles=""; //Mettez ici les règles que doivent respecter vos visiteurs (pas de Warez...) et pour faire un retour à la ligne, il faut mettre <br/>
$message="";
$dossier_up="upload/";
$savefile="";
$ajoutadresse=false;

if (VerifierAdresseMail($email)==true) {
	if ($boolform==1) {
		//vérifie que l'upload s'est bien passé
		if (is_uploaded_file($upfile)) {
			//vérifie que le fichier est non vide
			if ($upfile_size>0) {	
				//vérifie si la taille du fichier ne dépasse pas la limite
				if ($upfile_size>$maxsize) {
					//fichier trop grand
					$message="File size is too big (>1Mb) !";
				}
				else {
					//taille correcte, vérification du type de fichier
					$type=right($upfile_name,3);
					$typee=right($upfile_name,5);
	
					if ($type=="zip" || $type=="rar" || $typee=="dm_68"  || $type=="pk3") {
						//on va chercher la date de la journée sous la forme annéemoisjourheureminuteseconde (ex : 200361015159)
						$tmp=getdate();
						$jour=$tmp['mday'];
						$mois=$tmp['mon'];
						$annee=$tmp['year'];
						$h=$tmp['hours'];
						$m=$tmp['minutes'];
						$s=$tmp['seconds'];
						$tout=$annee."_".$mois."_".$jour."_".$h."_".$m."_".$s; 
						//on calcule le nombre de lettres avant le premier point
						$res = strpos("$upfile_name",".");
						//on extrait le nombre de lettre avant le point
						$type2=left($upfile_name,$res);
						//sauvegarde du fichier uploadé
						$savefile=$type2.".".$tout.".".$type;
						move_uploaded_file($upfile, $dossier_up.$savefile);
						copy($dossier_up.$savefile, $dossier_up."temp/".$upfile_name);
						$message="Upload OK<br/><br/>This is the link to your file :<br/><a href='".$url_site.$dossier_up.$savefile."'>".$savefile."</a><br/>Your file name has changed for our needs, it's normal.";
						$ajoutadresse=true;
					}
					else {
						$message="This file type is not authorized !";
					}
				}
			}
		}
		else {
			$message="Upload failed";
		}
	}
	
	if ($message!="") {
		echo "$message";
	}
	else {
		echo "Erreur";
	}

	if ($ajoutadresse==true)	{
		$fichier="upload/stockmail.txt"; 
		
		if(file_exists($fichier)) { 
			$fsize = filesize($fichier); 
		} 
		else { 
			$fp = fopen("$fichier","a"); 
			fputs($fp,"[STOCK MAIL]\n\r"); 
			fclose($fp); 
			$fsize = filesize($fichier); 
		} 
		
		$fp  = fopen($fichier,"a+"); 
		//$old = fgets($fp,$fsize); 
		$new = $email." > ".$savefile."\n\r"; 
		//fseek($fp,0); 
		fputs($fp,$new); 
		fclose($fp);


		$db = mysqli_connect($hostname, $username, $password, $database);
		if(mysqli_connect_errno()) {
			echo '<p>Erreur de connexion a la base de donnees: '.mysqli_connect_error().'</p>';
		}
		
		//Format de fichier : Map[df.physics]time(name.country).dm_68
		//nom de la map
		$poscrochet = strpos($upfile_name,"[");
		$mapname = substr($upfile_name,0,$poscrochet);
		//nom du joueur
		$posparenthese = strpos($upfile_name,"(");
		$finparenthese = substr($upfile_name,$posparenthese);
		$pospoint = strpos($finparenthese,".");
		$playername = substr($finparenthese,1,$pospoint-1);
		//temps
		$poscrochetfermant = strpos($upfile_name,"]");
		$tempstmp = substr($upfile_name,$poscrochetfermant+1,9);
		$temps = str_replace(".", ":", $tempstmp);
		$temps = "00:".$temps.":";
		//physics
		$poscrochetouvrant = strpos($upfile_name,"[");
		$phys = substr($upfile_name,$poscrochetouvrant+4,3);
		//conversion millisecondes
		$posdeuxpoint = strpos($temps,":");
		$heure = substr($temps,0,$posdeuxpoint);
		$suite = substr($temps,$posdeuxpoint+1);

		$posdeuxpoint = strpos($suite,":");
		$minute = substr($suite,0,$posdeuxpoint);
		$suite = substr($suite,$posdeuxpoint+1);

		$posdeuxpoint = strpos($suite,":");
		$seconde = substr($suite,0,$posdeuxpoint);
		$suite = substr($suite,$posdeuxpoint+1);

		$posdeuxpoint = strpos($suite,":");
		$millisec = substr($suite,0,$posdeuxpoint);

		$tempsmilli = ($minute*60000)+($seconde*1000)+$millisec;

		//country
		$finpoint = substr($finparenthese,$pospoint);
		$posparenthesefermante = strpos($finpoint,")");
		$pays = substr($finpoint,1,$posparenthesefermante-1);
		
		//on enlève l'ancienne demos de la base si il y en avait une
		$verifsql = "SELECT id FROM dl_Demos WHERE joueur='".$playername."' AND map='".$mapname."' AND physics='".$phys."'";
		$verifreq = mysqli_query($db, $verifsql) or die('Erreur SQL !'.$verifsql.'<br/>'.mysqli_error());
		if(mysqli_num_rows($verifreq) != 0) {
			$deletesql = "DELETE FROM dl_Demos WHERE joueur='".$playername."' AND map='".$mapname."' AND physics='".$phys."'";
			$deletereq = mysqli_query($db, $deletesql) or die('Erreur SQL !'.$deletesql.'<br/>'.mysqli_error());
		}
		
		$sql = "INSERT INTO dl_Demos(nom,joueur,map,physics,temps,pays,taille,date,lien,valide,place) VALUES('".$upfile_name."','".$playername."','".$mapname."','".$phys."','".$tempsmilli."','".$pays."','".$upfile_size."','".date('Y')."-".date('m')."-".date('d')."','demos/".$upfile_name."',0,NULL)"; 
		$req = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error());
		
		mysqli_close($db);
	}
}
else {
	echo "Unvalid email address !";
}
?>
<br/><br/><a href="upload.php">BACK</a>
</div> 
</body>
</html>