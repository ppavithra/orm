<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>


<h1 id="grostitre">Ajouter un Nouveau Client</h1>

<form name="my-form" method='post' action="" ><div id="clientstableau2">
<div><span class="titretable">Entreprise:</span> <input type="text" class="inputtableau" name="entreprise" required></div><br>
<div><span class="titretable">Nom :</span> <input type="text" class="inputtableau" name="nom" required></div><br>
<div><span class="titretable">Prénom :</span> <input type="text" class="inputtableau" name="prenom" required></div><br>
<div><span class="titretable">E-mail :</span> <input type="text" class="inputtableau" name="email" required></div><br>
<div><span class="titretable">Téléphone :</span> <input type="text" class="inputtableau" name="tel" required></div><br>

    <input type="submit" class="boutoneditsupprgene" value="inscrire"></div>
</form>


<?php

//connexion a la bdd

try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}
$i=0;
if((isset($_POST['nom']))&&(isset($_POST['prenom']))&&(isset($_POST['email']))){
	if((!empty($_POST['nom']))&&(!empty($_POST['prenom']))&&(!empty($_POST['email']))){

		$nom =$_POST['nom'];
		$prenom=$_POST['prenom'];
		$entreprise =$_POST['entreprise'];
		$email=$_POST['email'];
		$tel=$_POST['tel'];


		//hôtesse et hôte
		$sql=('SELECT id_client FROM clients WHERE email_client =:email' );
		$req = $bdd->prepare($sql);
		$req->execute(array(
			'email'=>$email,


		));
		 $count = $req->rowCount($sql);


/*		if($count == 0)*/
			$req= $bdd->prepare('INSERT INTO `clients`(`nom_client`, `prenom_client`, `entreprise_client`,`email_client`,`tel_client`) 
				VALUES (:nom, :prenom,:entreprise, :email,  :tel)');
			$req->execute(array(
			'nom'=>$nom,
			'prenom'=>$prenom,
			'entreprise'=>$entreprise,
			'email'=>$email,
			'tel'=>$tel,
				 ));

			echo "Bonjour ".$nom."vous êtes inscrit";
			echo "<br>";
			?>
			<td><button onclick="document.location.href='prestation_service.php?id=<?php  echo $i; ?>'" type="button" name="ajouter" class="boutonajoutprestation" value=ajouter>ajouter une prestation </td>
						

			<?php

	}
	else{
		echo 'remplissez les champs';
	}
}
?>
<br>
<button type="submit" value="valider" class="boutonajoutprestation" onclick="redirect()">Retourner à Liste de Clients</button>
        </div>



<script>
function redirect(){

	window.location.href="list_client_model.php";
}
</script>

</body>
</html>
<?php
}else{
	 header('Location:../../../index.php');
}
?>