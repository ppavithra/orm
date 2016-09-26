<?php session_start();
if($_SESSION['NOMS']){
	require "../navi.php";?>





	
	<?php
	include('functions.php');
	?>
	<form method="post">
		<h2>rechercher</h2>
		<input type="text" name="search" placeholder="mot clé de recherche">
		<input type="submit" name="submit" value="submit">
	</form>
	<?php
if(isset($_POST['submit']))
{
	$search = htmlspecialchars(trim($_POST['search']));

	if(empty($search))
	{
		echo"<span class='error'>veuillez remplir ce champ</span>";
	}elseif(strlen($search) ==1)
	{
		echo"<span class='error'>votre mots clé de rcherche est trop court</span>";
	}else{
		results($search);
	}
}
	?>

<h1 id="grostitre">Annuaire</h1>

<button class="boutonajoutprestation" onclick="document.location.href='editer_contrat.view.php'" type="button" name="supprimer" value=supprimer>Ajouter à l'annuaire</button><br><br>







<?php

try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}
		$sql='SELECT * from hote ';
		$req = $bdd->query($sql);
		$i=0;
		while($r = $req->fetch()){
			echo '<form method = POST action="action1.php" target="_blank">';
			echo'<div id="clientstableau" width=20% height=1% border=1>';
/*			echo '<tr> id='.$i;
			echo '<td>  width=33%>'.$r['photo_hote'].'<br>'.'</td>';*/
			/*echo '<div><span class="titretable">Titre :</span> <input type="text" id="titre" class="inputtableau" width=33% value ='.$r['titre_hote'].' readOnly="true"></div>';
			echo '<div><span class="titretable">Nom :</span> <input type="text" id="nom" class="inputtableau" width=33% value='.$r['nom_hote'].' readOnly="true"></div>';
			echo '<div><span class="titretable">Prénom :</span> <input type="text" id="prenom" class="inputtableau" width=43% value='.$r['prenom_hote'].' readOnly="true"></div>';
			echo '<div><span class="titretable">Né(e) le :</span> <input type="text" class="inputtableau" id="datenaissance"  width=43% value='.$r['datenaissance_hote'].' readOnly="true"></div>';
			echo '<div><span class="titretable">Lieu :</span> <input type="text" class="inputtableau" id="lieunaissance" width=43% value='.$r['lieunaissance_hote'].' readOnly="true"></div>';
			echo '<div><span class="titretable">Nationalité :</span> <input type="text" class="inputtableau" id="nationalite"  width=43% value='.$r['nationalite_hote'].' readOnly="true"></div>';*/
            
            echo '<span class="prenomclient">'.$r['titre_hote'].'</span><br>';
            echo $r['photo_hote'].'<br>';
			echo '<span class="nomclient">'.$r['nom_hote'].'</span> <span class="prenomclient">'.$r['prenom_hote'].'</span><br><br>';
			echo 'notation : <span class="notation">'.$r['notation'].'</span><br><br>';
			echo '<span class="emailclient">Né le '.$r['datenaissance_hote'].' à '.$r['lieunaissance_hote'].'<br>'.$r['nationalite_hote'].'<br><br>'.$r['adresse_hote'].'</span><br><br>';
            echo '<span class="numeroclient">'.$r['ss_hote'].'</span><br><br>';
            
			 /*?>
			 <tr><td><div class="titretable">Adresse Postale</div><input type="text" id="adresse" width=43% value= <?php echo $r['adresse_hote']?> readOnly="true"></td>

			 <?php
            
            echo '<div><span class="titretable">Adresse :</span> <input class="inputtableau" type="text" id="adresse"  width=43% value='.$r['adresse_hote'].' readOnly="true"></div>';
			echo '<div><span class="titretable">N° SS :</span> <input class="inputtableau" type="text" id="ss"  width=43% value='.$r['ss_hote'].' readOnly="true"></div>';*/
			// id recuperera chaque value d'une ligne

			// hidden champs caché  pour  selectionner la value du bouton click 
/*			echo' <input type=hidden name = id value = '.$r['nom_hote'].$r['prenom_hote'].$r['adresse_hote'].' <br>';
			echo '<input type=hidden name="id" value ='.$i.' >';*/
			echo '<input type="submit" class="boutoneditsupprgene" style="margin-right: -2px;" name="valider" class="boutoneditsupprgene" value=générer>';
			?>
			<button onclick="document.location.href='modif.php?id=<?php  echo $i; ?>'" type="button" name="modifier" class="boutoneditsupprgene" value=modifier>modifier
			<button onclick="document.location.href='delete.php?id=<?php  echo $i; ?>'" type="button" name="supprimer" class="boutoneditsupprgene" value=supprimer>supprimer


			<?php 

			//echo '</tr>';
			echo '</div>';
			echo '</form>';

			$i++;
		}
		?>
		<!-- lors du click sur editer redirection vers la page modif.php -->

		<!-- fin de la redirection -->
		<?php
		
		$req2 = $bdd->query('SELECT * FROM hote');
		$data = $req2 -> fetchAll();
		$_SESSION['data'] = $data;	

		// recuperer dans une autre page 	
/*$data1 =  $_SESSION['data '];*/
/*$data1[$_POST['id']]['nom_hote']['prenom_hote'];*/
		?><br>




</body>
	</html>
<?php
}else{
	 header('Location:../../../index.php');
}
?>