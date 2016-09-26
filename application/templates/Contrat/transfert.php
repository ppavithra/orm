<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 

function transfert ()
{
...
include ("connexion.php");

$req = "INSERT INTO images (".
"img_nom, img_taille, img_type, img_blob ".
") VALUES (".
"'".$img_nom."', ".
"'".$img_taille."', ".
"'".$img_type."', ".
// N'oublions pas d'échapper le contenu binaire
"'".addslashes ($img_blob)."') ";
$ret = mysql_query ($req) or die (mysql_error ());
return true;
}
}
?>
<?php
}else{
	 header('Location:../../../index.php');
}
?>