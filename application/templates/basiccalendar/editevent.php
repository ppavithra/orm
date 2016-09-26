<?php

	$data=$_SESSION['data'];
	$ind=$_GET['id'];
	var_dump($ind);

?>

 
		<?php
			if(isset($_POST['editer'])){


				$bdd = new PDO('mysql:dbname=directlemon_bd;host=olemon.co','root','Wascac33');

				$id=$data[$ind]['id'];

			$title= $_POST['txttitle'];
			$detail = $_POST['txtdetail'];
			$numero_event=$_POST['numero_event'];
			$type_personne=$_POST['type_personne'];
			$adresse_event=$_POST['adresse_event'];
			$horaire_event=$_POST['horaire_event'];
			$nombre_personne=$_POST['nombre_personne'];	
			$deroule_event=$_POST['deroule_event'];

			$sql = "UPDATE eventcalender SET title= :txttitle, detail = :txtdetail, 
			numero_event= :numero_event, type_personne= :type_personne, adresse_event= :adresse_event,
			horaire_event= :horaire_event, nombre_personne= :nombre_personne, deroule_event= :deroule_event WHERE id=:id";

			 $req = $bdd->prepare($sql);	

			$req->bindValue(':id', $id);
			$req->bindValue(':txttitle', $title);
			$req->bindValue(':txtdetail', $detail);
			$req->bindValue(':numero_event', $numero_event);
			$req->bindValue(':type_personne', $type_personne);
			$req->bindValue(':adresse_event', $adresse_event);
			$req->bindValue(':horaire_event', $horaire_event);
			$req->bindValue(':nombre_personne', $nombre_personne);
			$req->bindValue(':deroule_event', $deroule_event);

			$req->execute();
			
			}
		?>
		<form action="" method="post">
			<td> <input type="text" id="txttitle" name="txttitle" value ="<?php echo $data[$ind]['title']?>" readOnly="true"></td><br><br>
			<td> <input type="text" id="txtdetail" name="txtdetail" value ="<?php echo  $data[$ind]['detail']?>" readOnly="true"></td><br><br>
			<td> <input type="text" id="numero_event" name="numero_event" value ="<?php echo  $data[$ind]['numero_event']?>" readOnly="true"></td><br><br>
			<td> <input type="text" id="type_personne" name="type_personne" value ="<?php echo  $data[$ind]['type_personne']?>" readOnly="true"></td><br><br>
			<td> <input type="text" id="adresse_event" name="adresse_event" value ="<?php echo  $data[$ind]['adresse_event']?>" readOnly="true"></td><br><br>
			<td> <input type="text" id="horaire_event" name="horaire_event" value ="<?php echo  $data[$ind]['horaire_event']?>" readOnly="true"></td><br><br>
			<td> <input type="text" id="nombre_personne" name="nombre_personne" value ="<?php echo  $data[$ind]['nombre_personne']?>" readOnly="true"></td><br><br>
			<td> <input type="text" id="deroule_event" name="deroule_event" value ="<?php echo  $data[$ind]['deroule_event']?>" readOnly="true"></td><br><br>
		<input type="submit" value="valider" name="editer">modifier</input>


		</form>
		<button type="submit" value="liste" onclick="redirect()">liste</button>
		<script>
document.getElementById("txttitle").readOnly = false;
document.getElementById("txtdetail").readOnly = false;
document.getElementById("numero_event").readOnly = false;
document.getElementById("type_personne").readOnly = false;
document.getElementById("adresse_event").readOnly = false;
document.getElementById("horaire_event").readOnly = false;
document.getElementById("nombre_personne").readOnly = false;
document.getElementById("deroule_event").readOnly = false;

function redirect(){

	window.location.href="calendar.php";
}
</script>
		</form>
	</body>
</html>