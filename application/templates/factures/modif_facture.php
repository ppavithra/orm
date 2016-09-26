<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>

<h1 id="grostitre">Modifier une Facture</h1><br><br>

<?php  
$data=$_SESSION['data'];

$ind=$_GET['id'];

?>
<?php
if(isset($_POST['editer']))
{
try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$id=$data[$ind]['id'];

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


	$sql = "UPDATE factures SET designation= :designation, horaires= :horaires, nombre_jours= :nombre_jours, quantite= :quantite, tarif_unitaire= :tarif_unitaire, 
	ligne_total_ht= :ligne_total_ht , repas= :repas, taxi= :taxi, colonne_total_ht= :colonne_total_ht, tva= :tva,total= :total   WHERE id = :id";

			$req = $bdd->prepare($sql);	
			$req->bindValue(':id', $id);		
			$req->bindValue(':designation', $designation);
			$req->bindValue(':horaires', $horaires);
			$req->bindValue(':nombre_jours', $nombre_de_jours);
			$req->bindValue(':quantite', $quantite);
			$req->bindValue(':tarif_unitaire', $tarif_unitaire);
			$req->bindValue(':ligne_total_ht', $ligne_total_HT);
			$req->bindValue(':repas', $frais_repas);
			$req->bindValue(':taxi', $frais_taxi);
			$req->bindValue(':colonne_total_ht', $total_HT);
			$req->bindValue(':tva', $TVA);
			$req->bindValue(':total', $total);

			$req->execute();
		
}

?>

<form action="" method="post">
    
<?php 
    echo'<div id="clientstableau2" width=20% height=1% border=1>';
    echo '<span class="nomclient">'.$data[$ind]['designation'].'</span><br>';
    echo '<span class="emailclient">'.$data[$ind]['horaires'].'</span><br><br>';
    echo '<span class="emailclient">Nombre de Jours : '.$data[$ind]['nombre_jours'].'.</span><br>';
    echo '<span class="emailclient">Quantité : '.$data[$ind]['quantite'].'.</span><br><br>';
    echo '<span class="emailclient">Tarif Unitaire HT : '.$data[$ind]['tarif_unitaire'].'€.</span><br>';
    echo '<span class="emailclient">Frais Repas : '.$data[$ind]['repas'].'€.</span><br>';
    echo '<span class="emailclient">Frais Taxi : '.$data[$ind]['taxi'].'€.</span><br>';
    echo '<span class="emailclient">Total HT : '.$data[$ind]['colonne_total_ht'].'€.</span><br>';
    echo '<span class="emailclient">TVA : '.$data[$ind]['tva'].'€.</span><br>';
    echo '<span class="emailclient">TTC : '.$data[$ind]['total'].'€.</span><br>';

    echo '<div class="ligneedit"></div><br>';
?>
<?php 
    echo'<br><div><span class="titretable">Désignation :</span> <input type="text" id="designation" name="designation" class="inputtableau" value="'.$data[$ind]['designation'].'" readOnly="true"></div>';?>
    <?php echo'<div><span class="titretable">Horaires :</span> <input type="text" class="inputtableau" id="horaires" name="horaires" value="'.$data[$ind]['horaires'].'" readOnly="true"></div>';?>
    <?php echo'<div><span class="titretable">Nombre Jours :</span> <input type="text" id="nombre_jours" name="nombre_jours" class="inputtableau" value="'.$data[$ind]['nombre_jours'].'" readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">Quantité :</span> <input class="inputtableau" type="text" id="quantite" name="quantite" value="'.$data[$ind]['quantite'].'" readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">Tarif Unitaire :</span> <input type="text" id="tarif_unitaire" name="tarif_unitaire" class="inputtableau" value ="'.$data[$ind]['tarif_unitaire'].'" readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">Total HT :</span> <input type="text" id="ligne_total_ht" name="ligne_total_ht" class="inputtableau" value ="'.$data[$ind]['ligne_total_ht'].'" readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">Repas :</span> <input type="text" class="inputtableau" id="repas" name = "repas"    value="'.$data[$ind]['repas'].'" readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">Taxi :</span> <input type="text" class="inputtableau" id="taxi" name= "taxi"   value="'.$data[$ind]['taxi'].'" readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">Total HT :</span> <input class="inputtableau" type="text" id="colonne_total_ht" name= "colonne_total_ht"   value ="'.$data[$ind]['colonne_total_ht'].'"readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">TVA :</span> <input type="text" class="inputtableau" id="tva" name= "tva"   value="'.$data[$ind]['tva'].'" readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">TTC :</span> <input type="text" class="inputtableau" id="total" name = "total"    value ="'.$data[$ind]['total'].'" readOnly="true"></div>';?><br>
        <input type="submit" value="valider" id="bouttoninscrire" name="editer"></input>
    </div>
</form>
<br>
<button type="submit" value="valider" class="boutonajoutprestation" onclick="redirect()">Liste Facture</button>

<script>
document.getElementById("designation").readOnly = false;
document.getElementById("horaires").readOnly = false;
document.getElementById("nombre_jours").readOnly = false;
document.getElementById("quantite").readOnly = false;
document.getElementById("tarif_unitaire").readOnly = false;
document.getElementById("ligne_total_ht").readOnly = false;
document.getElementById("repas").readOnly = false;
document.getElementById("taxi").readOnly = false;
document.getElementById("colonne_total_ht").readOnly = false;
document.getElementById("tva").readOnly = false;
document.getElementById("total").readOnly = false;
document.getElementById("colonne_total_ht").readOnly = false;

function redirect(){

	window.location.href="liste_facture.php";
}
	</script>

	</div>
</body>
</html>
<?php
}else{
	 header('Location:../../../index.php');
}
?>