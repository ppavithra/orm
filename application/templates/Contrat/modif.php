<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>

<h1 id="grostitre">Modifier l'Annuaire</h1>

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
			$id=$data[$ind]['id_hote'];

		$nom =$_POST['nom'];
		$prenom =$_POST['prenom'];
		$naissance = date('d-m-Y', strtotime($_POST['datenaissance']));
		$nationalite =$_POST['nationalite'];
		$adresse =$_POST['adresse'];
		$ss =$_POST['ss'];
			$sql = "UPDATE hote SET nom_hote= :nom, prenom_hote= :prenom,datenaissance_hote= :naissance, nationalite_hote= :nationalite, adresse_hote= :adresse, ss_hote= :ss    WHERE id_hote= :id";
			$req = $bdd->prepare($sql);			
			$req->bindValue(':id', $id);
			$req->bindValue(':nom', $nom);
			$req->bindValue(':prenom', $prenom);
			$req->bindValue(':naissance', $naissance);
			$req->bindValue(':nationalite', $nationalite);
			$req->bindValue(':adresse', $adresse);
			$req->bindValue(':ss', $ss);

			$req->execute();
		
}

?>
<form action="" method="post"><div id="clientstableau2">
    
    <?php
        echo '<span class="prenomclient">'.$data[$ind]['titre_hote'].'</span><br>';
        echo '<span class="nomclient">'.$data[$ind]['nom_hote'].'</span> <span class="prenomclient">'.$data[$ind]['prenom_hote'].'</span><br><br>';
        echo '<span class="emailclient">Né le '.$data[$ind]['datenaissance_hote'].' à '.$data[$ind]['lieunaissance_hote'].'<br>'.$data[$ind]['nationalite_hote'].'<br><br>'.$data[$ind]['adresse_hote'].'</span><br><br>';
        echo '<span class="numeroclient">'.$data[$ind]['ss_hote'].'</span><br><br>';

        echo '<div class="ligneedit"></div><br>';
    ?>
    
<?php echo'<div><span class="titretable">Nom :</span> <input class="inputtableau" type="text" id="nom"  name="nom"   width=33% value ='. $data[$ind]['nom_hote'].' readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">Prénom :</span> <input class="inputtableau" type="text" id="prenom" name="prenom"  width=33% value ='.  $data[$ind]['prenom_hote'].' readOnly="true"></div>';?><br>
<?php echo '<div><span class="titretable">Naissance :</span> <input class="inputtableau" type="text" id="datenaissance" name="datenaissance" width=33% value ='. $data[$ind]['datenaissance_hote'].' readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">Nationalité :</span> <input class="inputtableau" type="text" id="nationalite" name = "nationalite"  width=33% value ='.  $data[$ind]['nationalite_hote'].' readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">Adresse :</span> <input class="inputtableau" type="text" id="adresse" name= "adresse" width=33% value ='.  $data[$ind]['adresse_hote'].' readOnly="true"></div>';?><br>
<?php echo '<div><span class="titretable">N° SS :</span> <input class="inputtableau" type="text" id="ss" name= "ss" width=33% value ='. $data[$ind]['ss_hote'].' readOnly="true"></div>';?><br>
<?php echo '<div><span class="titretable">Notation :</span> <input class="inputtableau" type="text" id="notation" name= "notation" width=33% value ='. $data[$ind]['notation'].' readOnly="true"></div>';?><br>
<input type="submit" value="valider" class="boutoneditsupprgene" name="modifier">
    </div></form><br>
<button type="submit" value="valider" class="boutonajoutprestation" onclick="redirect()">Annuaire</button>
        </div>
<script>
document.getElementById("nom").readOnly = false;
document.getElementById("prenom").readOnly = false;
document.getElementById("datenaissance").readOnly = false;
document.getElementById("nationalite").readOnly = false;
document.getElementById("adresse").readOnly = false;
document.getElementById("ss").readOnly = false;

function redirect(){

	window.location.href="list_hote_model.php";
}
</script>
    </body></html>
    <?php
}else{
	 header('Location:../../../index.php');
}
?>