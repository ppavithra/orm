<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>

<?php  
$data=$_SESSION['data'];

$ind=$_GET['id'];
if(isset($_POST['modifier']))
{
try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}
/*

		$nom =$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$adresse=$_POST['adresse'];
		$sexe=$_POST['sexe'];
		$datenaissance=$_POST['datenaissance'];
		$lieunaissance=$_POST['lieunaissance'];
		$nationalite=$_POST['nationalite'];
		$SS = $_POST['ss'];
		$photo = $_POST['fichier'];
		$tel=$_POST['tel'];
		$id=$_GET['id'];

*/
			$id=$data[$ind]['id'];
			var_dump($id);
			$numero = $_POST['numero'];
			$date_event =date('Y-m-d', strtotime($_POST['date_event'])); 
			$lieu = $_POST['lieu'];
			$sql = "UPDATE snap SET numero_event= :numero, date_event= :date_event,lieu_event= :lieu  WHERE id= :id";
			$req = $bdd->prepare($sql);			
			$req->bindValue(':id', $id);
			$req->bindValue(':numero', $numero);
			$req->bindValue(':date_event', $date_event);
			$req->bindValue(':lieu', $lieu);
			$req->execute();
}

?>
<form action="" method="post">
<?php echo'<div class="formulaireajout"> Numéro : <input type="text" id="numero"  name="numero" class="inputtableau"  width=33% value ='. $data[$ind]['numero_event'].' readOnly="true"></div>';?><br>
<?php echo'<div class="formulaireajout"> Date : <input type="text" id="date_event" name="date_event" class="inputtableau" width=33% value ='.  $data[$ind]['date_event'].' readOnly="true"></div>';?><br>
<?php echo '<div class="formulaireajout"> Lieu : <input type="text" id="lieu" name="lieu" class="inputtableau" width=33% value ='. $data[$ind]['lieu_event'].' readOnly="true"></div>';?><br>
<input type="submit" id="bouttoninscrire" value="modifier" name="modifier">  </input>
<?php
if(isset($_POST['modifer'])){
	if($_POST['modifier']){
		echo'modifier';
	}
}
?>

</form><br>
<button type="submit" class="boutonajoutprestation" value="valider" onclick="redirect()">Annuaire évènements</button>
</div>
<script>
document.getElementById("numero").readOnly = false;
document.getElementById("date_event").readOnly = false;
document.getElementById("lieu").readOnly = false;


function redirect(){

	window.location.href="liste_event.php";
}
</script>

</body>
</html>
<?php
}else{
	 header('Location:../../../index.php');
}
?>