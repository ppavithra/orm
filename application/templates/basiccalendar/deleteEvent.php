<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>
<?php 
	$data=$_SESSION['data'];
	$ind=$_GET['id'];

?>
<?php

if(isset($_POST['delete'])){
	$bdd = new PDO('mysql:dbname=directlemon_bd;host=olemon.co','root','Wascac33');
		$id=$data[$ind]['id'];
		$sql = "DELETE FROM eventcalender WHERE id=$id";
$req = $bdd->prepare($sql);	

$req->execute();

echo "vous avez supprimer l'événement";
}


?>

<form action="" method="POST">
	<input type="submit" value="supprimer" name="delete"></input>
</form>
<button type="submit" value="valider" onclick="redirect()">retour</button>

<script>
function redirect(){
	window.location.href="calendar.php";
}
</script>
<?php
}else{
	 header('Location:../../../index.php');
}
?>