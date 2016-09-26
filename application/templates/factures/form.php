<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>

<?php	
try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}
	
	$id= 0;

 
	$sql2 = $bdd->query("SELECT MAX(id) as LASTID  FROM factures");
	foreach($sql2 as $row) {
		$id = $id + $row{"LASTID"};
		$_SESSION=$id;
		var_dump($_SESSION);
	}

?>
	<br><br><div id="prestationinscrire">
		Désignation : <input type="text" class="inputtableau" name="designation<?php echo $_SESSION;?>" required><br><br>
		Horaires : <input type="text" class="inputtableau" name="horaires <?php echo $_SESSION['compt'];?>" required><br><br>
		Nombre de jours : <input type="text" class="inputtableau" name="nombre_jours<?php echo $_SESSION['compt'];?>"  required><br><br>
		Nombre de personne : <input type="text" class="inputtableau" name="quantite <?php echo $_SESSION['compt'];?>" required><br><br>
		<!-- rajouter le nombre d'heure -->
		Nombre d'heure : <input type="text" class="inputtableau" name="quantite <?php echo $_SESSION['compt'];?>" required><br><br>
		Tarif unitaire HT : <input type="text" class="inputtableau" name="tarif_unitaire <?php echo $_SESSION['compt'];?>" required><br><br>
		Total HT :<input type="text" class="inputtableau" name="ligne_total_ht <?php echo $_SESSION['compt'];?>" required><br><br>
		Frais de repas : <input type="text" class="inputtableau" name="repas<?php echo $_SESSION['compt'];?>"  required><br><br>
		Frais de taxi (après 22h) : <input type="text" class="inputtableau" name="taxi<?php echo $_SESSION['compt'];?>"  required><br><br>
		Total HT : <input type="text" class="inputtableau" name="colonne_total_ht <?php echo $_SESSION['compt'];?>" required><br><br>
		TVA  en supplément 20% : <input type="text" class="inputtableau" name="tva <?php echo $_SESSION['compt'];?>" required><br><br>
            Total TTC : <input type="text" class="inputtableau" name="total <?php echo $_SESSION['compt'];?>" required><br><br></div>

		<div class="nform"></div>

<?php 
	$bdd = new PDO('mysql:dbname=directlemon_bd;host=olemon.co','root','Wascac33');
	if(isset($_POST['designation'])){
		if((!empty($_POST['designation']))){

			$designation = $_POST['designation'];
			$horaires = $_POST['horaires'];
			$nombre_de_jours = $_POST['nombre_jours'];
			$quantite = $_POST['quantite'];
			$tarif_unitaire=$_POST['tarif_unitaire'];
			$ligne_total_HT = $_POST['ligne_total_ht'];
			$frais_repas = $_POST['repas'];
			$frais_taxi=$_POST['taxi'];
			$total_HT=$_POST['colonne_total_ht'];
			$TVA = $_POST['tva'];
			$total = $_POST['total'];

			$result = $bdd->prepare("INSERT INTO `factures`( `designation`, `horaires`, `nombre_jours`, `quantite`, `tarif_unitaire`, `ligne_total_ht`, `repas`, `taxi`, `colonne_total_ht`, `tva`, `total`) VALUES (:designation,:horaires,:nombre_jours,:quantite,:tarif_unitaire,:ligne_total_ht,:repas,:taxi,:colonne_total_ht,:tva,:total)");
			$result->execute(array(
				'designation'=>$designation,
				'horaires' =>$horaires,
				'nombre_jours' => $nombre_de_jours,
				'quantite' =>$quantite,
				'tarif_unitaire'=>$tarif_unitaire,
				'ligne_total_ht' =>$ligne_total_HT,
				'repas' =>$frais_repas,
				'taxi' =>$frais_taxi,
				'colonne_total_ht' =>$total_HT,
				'tva' =>$TVA,
				'total' =>$total,

				));


			if($result){
				echo 'recapulatif';
			}else{
				echo 'erreur saisies';
			}
		}
	}

            ?></div></body></html>
            <?php
}else{
	 header('Location:../../../index.php');
}
?>