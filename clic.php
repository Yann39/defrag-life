<?php

$url = $_GET["url"];

$fichier=str_replace ("/", "_", "$url");
$fichier="data/".$fichier.".dat";

if(!file_exists("data")) {
	mkdir("data",0755);
}

if(!file_exists("$fichier")) {
	$fp=fopen("$fichier","w");
	fputs($fp,"0");
	fclose($fp);
}

$fp=fopen("$fichier","r+");
$nb=fgets($fp,10);
$nb++;

fseek($fp,0);
fputs($fp,$nb);
fclose($fp);

Header("Location:$url");
die();
exit();

?>