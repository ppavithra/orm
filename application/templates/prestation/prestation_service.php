<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>

<h1 id="grostitre">Ajouter une Prestation de Service</h1><br><br>
        
<form name="form2" method="POST" action=''><div id="clientstableau2">
<div><span class="titretable">Prestation : </span> <input type="text" class="inputtableau" name="titre" id="titre" required><br></div><br>
<div><span class="titretable">Horaires :</span><br>
    Du : <input type="text" class="inputtableau" name="heure_debut" id="heure_debut" required><br><br>
    Au : <input type="text" class="inputtableau" name="heure_fin" id="heure_fin" required><br></div>
<div><span class="titretable">Quantité :</span> <input type="text" class="inputtableau" name="quantite" id="quantite" required></div><br>
<div><span class="titretable">Prix Unitaire :</span> <input type="text" class="inputtableau" name="prixunitaire" id="prixunitaire" required></div><br>
<div><span class="titretable">Commentaire :</span> <input class="inputtableau" type="textarea" name="commentaire" id="commentaire" required></div><br>
            
	<br>
	<input type="submit" class="boutoneditsupprgene" value="valider">
            </div>
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
	if(isset($_POST['titre'])){
			if(!empty($_POST['titre'])){


	$titre = $_POST['titre'];

	$horaire_debut = date('h-i-s, j-m-y, it is w Day',strtotime($_POST['heure_debut']));
	$horaire_fin = date('h-i-s, j-m-y, it is w Day',strtotime($_POST['heure_fin']));
	$commentaire = $_POST['commentaire'];
	$quantite=$_POST['quantite'];
	$prixunitaire=$_POST['prixunitaire'];




/*	$sql= ('SELECT id_prestation FROM prestationhotesse WHERE titre_prestation= :titre');
	$req = $bdd->prepare($sql);
	$req->execute(array(
		'titre' => $titre
		));
	$count = $req->rowCount($sql);*/

/*	if($count == 0){*/
		$req = $bdd->prepare('INSERT INTO `prestationhotesse` (`titre_prestation`, `horaire_debut_prestation`, `horaire_fin_prestation`, `commentaire`, `quantite`, `prixunitaire`) VALUES (:titre,:heure_debut,:heure_fin,:duree,:commentaire,:quantite,:prixunitaire)');
		$req->execute(array(
			'titre'=>$titre,
			'heure_debut'=>$horaire_debut,
			'heure_fin'=>$horaire_fin,
			'commentaire' =>$duree,
			'quantite' =>$pause_repas,
			'prixunitaire'=>$pause_supp,

			));
		echo " la prestation ".$titre."est inscrit";
		var_dump($titre);
/*	}
	else{
		echo 'le numéro existe déjà';
	}*/
}
else{
	echo ' remplissez tous les champs';
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