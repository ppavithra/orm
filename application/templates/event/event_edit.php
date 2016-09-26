<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>		<form name='my-form1' method='post' action="">
            <div class="formulaireajout">Numéro : <input type="text" name="numero" class="inputtableau" required></div><br>
            <div class="formulaireajout">Date : <input type="text" name="date_event" class="inputtableau" required></div><br>
            <div class="formulaireajout">Lieu : <input type='text' name="lieu" class="inputtableau" required></div><br>
			<input type="submit" value="valider" id="bouttoninscrire">
		</form>


		<?php
try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}
	if((isset($_POST['numero']))&&(isset($_POST['date_event']))&&(isset($_POST['lieu']))){
		if((!empty($_POST['numero']))&&(!empty($_POST['date_event']))&&(!empty($_POST['lieu']))){

			$numero = $_POST['numero'];
			$date_event =date('Y-m-d', strtotime($_POST['date_event'])); 
			$lieu = $_POST['lieu'];

			$sql = ('SELECT id FROM snap WHERE numero_event = :numero');
			$req = $bdd->prepare($sql);
			$req->execute(array(
				'numero' => $numero,
				));

			$count = $req->rowCount($sql);

			if($count == 0){
				$req = $bdd->prepare('INSERT INTO `snap`(`numero_event`,`date_event`,`lieu_event`) VALUES (:numero, :date_event,:lieu)');
				$req->execute(array(
					'numero' =>$numero,
					'date_event'=>$date_event,
					'lieu' =>$lieu,
					));
				echo 'Le numéro '.$numero.' est inscrit.';

			}
			else{
				echo 'Le numéro existe déjà.';
			}

		}
	else{
		echo 'Remplissez tous les champs.';
	}
	}

		?>
        </div></body>
</html>
<?php
}else{
	 header('Location:../../../index.php');
}
?>