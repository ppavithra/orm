<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 

$bdd = new PDO('mysql:host=localhost;dbname=directlemon_bd','root','Wascac33');

if(isset($_POST['nom'],$_POST['message']) && !empty($_POST['nom']) && !empty($_POST['message']))
{
	$nom = $_POST['nom'];
	$message = $_POST['message'];

	$bdd->exec("INSERT INTO note(pseudo,commentaires) VALUES('$nom','$message')");
	echo"<span class='success'>votre message a été enregistrer</span>";

}else{
	echo"<span class='error'>Veuillez compléter tous les champs</span>";
}
?>
<?php
}else{
	 header('Location:../../../index.php');
}
?>