<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>

<h1 id="grostitre">Ajouter une Prestation Hôtesse</h1><br><br>
        
        <form name="my-form" method='post' action="" ><div id="clientstableau2">
<div><span class="titretable">Titre : </span> <input class="inputtableau" type="text" name="titre" id="titre" required></div><br>
<div><span class="titretable">Dates :</span><br>
    Du : <input type="text" class="inputtableau" name="date_debut" id="date_debut" required><br><br>
    Au : <input type="text" name="date_fin" class="inputtableau" id="date_fin" required><br></div>
<div><span class="titretable">Horaires :</span><br>
    Du : <input type="text" class="inputtableau" name="heure_debut" id="heure_debut" required><br><br>
    Au : <input type="text" class="inputtableau" name="heure_fin" id="heure_fin" required><br></div>
<div><span class="titretable">Durée :</span> <input type="text" class="inputtableau" name="duree" id="duree" required></div><br>
<div><span class="titretable">Personnel :</span> 
	<select name="nom" size="1">
<?php

$response = ('SELECT * FROM clients');
while($donnees =$response->fetch())
{
?>
<option value="<?php echo $donnees['nom_client']?>"><?php echo $donnees['nom_client']; ?>
	<?php
}
?>

</select></div><br>

<div><span class="titretable">Pause Repas :</span> <input type="text" class="inputtableau" name="pause" id="pause" required></div><br>
<div><span class="titretable">Pause :</span> <input type="text" class="inputtableau" name="pausesupp" id="pausesupp" required></div><br>
<div><span class="titretable">Frais Annexes :</span> 10€</div><br>
<div><span class="titretable">Forfait Repas :</span> <input type="text" class="inputtableau" name="repas" id="repas"></div><br>
<div><span class="titretable">Transport :</span> <input class="inputtableau" type="text" name="transport" id="transport" required></div><br>
    <div><span class="titretable">Rémunération :</span> <input class="inputtableau" type="text" name="remuneration" id="remuneration" required></div><br>
<div><span class="titretable">Signature :</span> <input type="text" class="inputtableau" name="datesignature" id="datesignature" required></div><br>
            
	<br>
	<input type="submit" class="boutoneditsupprgene" value="valider">
            </div>
</form>

	<input type="submit" class="boutonajoutprestation" value="Liste Prestation Hotesse" onclick="redirect()">
<script>
function redirect(){
	window.location.href="liste_prestation_hotesse.php";
}
</script>

	<?php
try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}
	if(isset($_POST['titre']) && isset($_POST['date_debut']) && isset($_POST['date_fin'])){
			if(!empty($_POST['titre']) && !empty($_POST['date_debut']) && !empty($_POST['date_fin'])){


	$titre = $_POST['titre'];
	$date_debut = date('Y-m-d', strtotime($_POST['date_debut']));
	$date_fin=date('Y-m-d', strtotime($_POST['date_fin']));
	$horaire_debut = date('h-i-s, j-m-y, it is w Day',strtotime($_POST['heure_debut']));
	$horaire_fin = date('h-i-s, j-m-y, it is w Day',strtotime($_POST['heure_fin']));
	$duree = $_POST['duree'];
	$personnel = 'coucou';
	$pause_repas=$_POST['pause'];
	$pause_supp=$_POST['pausesupp'];
	$forfait_repas=$_POST['repas'];
	$forfait_transport = $_POST['transport'];
	$remuneration = $_POST['remuneration'];
	$date_signature = $_POST['datesignature'];



	$sql= ('SELECT id_prestation FROM prestationhotesse WHERE titre_prestation= :titre');
	$req = $bdd->prepare($sql);
	$req->execute(array(
		'titre' => $titre
		));
	$count = $req->rowCount($sql);

	if($count == 0){
		$req = $bdd->prepare('INSERT INTO `prestationhotesse` (`titre_prestation`, `date_debut_prestation`, `date_fin_prestation`, `horaire_debut_prestation`, `horaire_fin_prestation`, `duree_prestation`, `pause_repas`, `pause_supp`, `personnel`, `frais_annexes`, `indemnite_transport`, `remuneration`, `date_signature`) VALUES (:titre,:date_debut,:date_fin,:heure_debut,:heure_fin,:duree,"lol",:pause,:pausesupp,:repas,:transport,:remuneration,:datesignature)');
		$req->execute(array(
			'titre'=>$titre,
			'date_debut' =>$date_debut,
			'date_fin'=>$date_fin,
			'heure_debut'=>$horaire_debut,
			'heure_fin'=>$horaire_fin,
			'duree' =>$duree,
			'pause' =>$pause_repas,
			'pausesupp'=>$pause_supp,
			'repas' => $forfait_repas,
			'transport' =>$forfait_transport,
			'remuneration' =>$remuneration,
			'datesignature' =>$date_signature,

			));
		echo " le titre est".$titre."est inscrit";
		var_dump($titre);
	}
	else{
		echo 'le numéro existe déjà';
	}
}
else{
	echo ' replissez tous les champs';
}
}
	?>
</body>
</html>


<?php
}else{
	 header('Location:../../../index.php');
}
?>