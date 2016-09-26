<html><?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>
	<head>
		<meta charset="utf-8" />
	<title>Liste prestation</title>
	</head>
	<body>

<?php
session_start();

if(isset($_POST['valider'])){
	$data=$_SESSION['data'];
	$ind=$_POST['id'];

}

?>
Titre de la prestation : <strong><?php echo  $data[$ind]['titre_prestation'];?></Strong><br>
Date : Du<strong><?php echo  $data[$ind]['date_debut_prestation'];?></Strong><br>
Au : <strong><?php echo  $data[$ind]['date_fin_prestation'];?></Strong><br>
De : <strong><?php echo  $data[$ind]['horaire_debut_prestation'];?></Strong><br>
A : <strong><?php echo  $data[$ind]['horaire_fin_prestation'];?></Strong>
durée de la prestation : <strong><?php echo  $data[$ind]['duree_prestation'];?></Strong><br>
pause repas : <strong><?php echo  $data[$ind]['pause_repas'];?></Strong><br>
pause supplémentaire : <strong><?php echo  $data[$ind]['pause_supp'];?></Strong><br>
personnel : <strong><?php echo  $data[$ind]['personnel'];?></Strong><br>
Frais annexes <strong><?php echo  $data[$ind]['frais_annexes'];?></Strong><br>
indemnite transport :<strong><?php echo  $data[$ind]['indemnite_transport'];?></Strong><br>
rémuneration : <strong><?php echo  $data[$ind]['remuneration'];?></Strong><br>
date du signature <strong><?php echo  $data[$ind]['date_signature'];?></Strong><br>
</body>
</html>
<?php
}else{
	 header('Location:../../../index.php');
}
?>