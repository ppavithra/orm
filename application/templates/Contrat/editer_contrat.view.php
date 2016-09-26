<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>

<h1 id="grostitre">Ajouter à l'Annuaire</h1>

<form name="my-form" method='post' action="">
<div id="clientstableau2">
    <div><span class="titretable">Photo :</span> 
    	<input type="hidden" name="MAX_FILE_SIZE" value="125000">
    	<input type="file" class="inputtableau"name="fichier"></div><br>
<div><span class="titretable">Sexe :</span>  <div style="float: right; margin-right: -110px;">Madame <input type="radio" name="sexe" style="float: none;" value="Madame" required> Monsieur <input style="float: none;" type="radio" name="sexe" value="Monsieur" required></div></div><br>
<div><span class="titretable">Notation :</span>  <div style="float: right; margin-right: -110px;">C+<input type="radio" name="notation" style="float: none;" value="C+" required>C-<input type="radio" name="notation" style="float: none;" value="C-" required></div></div><br>
<div><span class="titretable">Nom:</span> <input type="text" class="inputtableau" name="nom" required></div><br>
<div><span class="titretable">Prénom:</span> <input type="text" class="inputtableau" name="prenom" required></div><br>
<div><span class="titretable">Né(e) le:</span> <input class="inputtableau" type="text" name="datenaissance" required></div><br>
<div><span class="titretable">Lieu :</span> <input class="inputtableau" type="text" name="lieunaissance"required></div><br>
<div><span class="titretable">Nationalité :</span>   <input class="inputtableau" type="text" name="nationalite"required></div><br>
<div><span class="titretable">N°SS :</span><input type="text" class="inputtableau" name="ss"required></div><br>
<div><span class="titretable">E-mail:</span><input type="text" class="inputtableau" name="email" required> </div><br>
<div><span class="titretable">Adresse:</span><input type="text" class="inputtableau" name="adresse" required></div><br>
<div><span class="titretable">Téléphone :</span> <input type="text" class="inputtableau" name="tel" required></div><br>

<br>
<input type="submit" class="boutoneditsupprgene" value="inscrire"></div>
</form>




<?php
//connexion a la bdd

try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}
if((isset($_POST['nom']))&&(isset($_POST['prenom']))&&(isset($_POST['email']))&&(isset($_POST['adresse']))){
	if((!empty($_POST['nom']))&&(!empty($_POST['prenom']))&&(!empty($_POST['email']))&&(!empty($_POST['adresse']))){

	


		$nom =$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$adresse=$_POST['adresse'];
		$sexe=$_POST['sexe'];
		$notation=$_POST['notation'];
		$datenaissance=$_POST['datenaissance'];
		$datenaissance = date('Y-m-d', strtotime($_POST['datenaissance']));
		$lieunaissance=$_POST['lieunaissance'];
		$nationalite=$_POST['nationalite'];
		
		$SS = $_POST['ss'];

		$photo = $_POST['fichier'];
		$tel=$_POST['tel'];

		//hôtesse et hôte
		$sql=('SELECT id_hote FROM hote WHERE email_hote =:email' );
		$req = $bdd->prepare($sql);
		$req->execute(array(
			'email'=>$email,


		));
		 $count = $req->rowCount($sql);


		if($count == 0){
			$req= $bdd->prepare('INSERT INTO `hote`(`nom_hote`, `prenom_hote`, `email_hote`, `adresse_hote`, `titre_hote`, `datenaissance_hote`, `lieunaissance_hote`, `nationalite_hote`, `ss_hote`, `photo_hote`,`tel_hote`,`notation`) 
				VALUES (:nom, :prenom, :email, :adresse, :sexe, :datenaissance, :lieunaissance, :nationalite, :ss, :photo, :tel,:notation)');
			$req->execute(array(
			'nom'=>$nom,
			'prenom'=>$prenom,
			'email'=>$email,
			'adresse'=>$adresse,
			'sexe'=>$sexe,
			'datenaissance'=>$datenaissance,
			'lieunaissance'=>$lieunaissance,
			'nationalite'=>$nationalite,
			'ss'=>$SS,
			'photo'=>$photo,
			'tel'=>$tel,
			'notation'=>$notation,

				 ));

			echo "Bonjour ".$nom."vous êtes inscrit";

		}
	
		else{
			echo'users existant';
		}
	}
	else{
		echo 'remplissez les champs';
	}
}
?><br>
<button type="submit" value="valider"  class="boutonajoutprestation" onclick="redirect()">annuaire hôtes et hôtesses</button>
    </div>
        <br style="clear: both; margin-bottom: 50px;">
<script>
function redirect(){

	window.location.href="list_hote_model.php";
}
</script>

</body>
</html>
<?php
}else{
	 header('Location:../../../index.php');
}
?>