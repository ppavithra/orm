<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>
<h1 id="grostitre">Editer un Client</h1>

<?php  
$data=$_SESSION['data'];

$ind=$_GET['id'];

?>
<?php
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
			$id=$data[$ind]['id_client'];
			var_dump($id);
		$nom =$_POST['nom'];
		$prenom =$_POST['prenom'];
		$entreprise=$_POST['entreprise'];
		$tel=$_POST['tel'];
			$sql = "UPDATE clients SET nom_client= :nom, prenom_client= :prenom, entreprise_client = :entreprise, tel_client =:tel WHERE id_client= :id";
			$req = $bdd->prepare($sql);			
			$req->bindValue(':id', $id);
			$req->bindValue(':nom', $nom);
			$req->bindValue(':prenom', $prenom);
			$req->bindValue(':entreprise', $entreprise);
			$req->bindValue(':tel', $tel);

			$req->execute();
		
	
		

}

?>
 <form action="" method="post"><div id="clientstableau2">
    
<?php 
    echo '<span class="entrepriseclient">'.$data[$ind] ['entreprise_client'].'</span><br>';
    echo '<span class="nomclient">'.$data[$ind] ['nom_client'].'</span> <span class="prenomclient">'.$data[$ind] ['prenom_client'].'</span><br><br>';
    echo '<span class="emailclient">'.$data[$ind] ['email_client'].'</span><br><br>';
    echo '<span class="numeroclient">+33'.$data[$ind] ['tel_client'].'</span><br>';

    echo '<div class="ligneedit"></div><br>';
?>
    
<?php echo'<br><div><span class="titretable">Nom :</span> <input type="text" id="nom" class="inputtableau" name="nom"   width=33% value ='. $data[$ind]['nom_client'].' readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">Prénom :</span> <input type="text" id="prenom" name="prenom" class="inputtableau" width=33% value ='.  $data[$ind]['prenom_client'].' readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">Entreprise :</span> <input type="text" id="entreprise" name="entreprise" class="inputtableau" width=33% value ='.  $data[$ind]['entreprise_client'].' readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">e-mail :</span> <input class="inputtableau" type="text" id="tel" name="tel"  width=33% value ='.  $data[$ind]['email_client'].' readOnly="true"></div>';?><br>
<?php echo'<div><span class="titretable">Tél :</span> <input class="inputtableau" type="text" id="tel" name="tel"  width=33% value ='.  $data[$ind]['tel_client'].' readOnly="true"></div>';?><br>

<input type="submit" class="boutoneditsupprgene" value="valider" name="modifier"></input>

    </div>
    
</form>
<button type="submit" class="boutonajoutprestation" value="valider" onclick="redirect()">Retourner à Liste de Clients</button>

<script>
document.getElementById("nom").readOnly = false;
document.getElementById("prenom").readOnly = false;
document.getElementById("entreprise").readOnly = false;
document.getElementById("tel").readOnly = false;

function redirect(){

	window.location.href="list_client_model.php";
}
</script>
            
            </div></div>
</body>
</html>
<?php
}else{
	 header('Location:../../../index.php');
}
?>