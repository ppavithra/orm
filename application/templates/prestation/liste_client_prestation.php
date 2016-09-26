<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>


<?php

try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}

?>
	<form method="POST" action="generer_contrat.php">
		<?php	
		$sql='SELECT * from prestationhotesse ';
		$req = $bdd->query($sql);
		$i=0;
		$req2 = $bdd->query('SELECT * FROM prestationhotesse');
		$data = $req2 -> fetchAll();
		$_SESSION['data'] = $data;
		while($r = $req->fetch()){
			
			echo'<div id="clientstableau" width=20% height=1% border=1>';
			//echo '<tr> id='.$i;
/*			echo '<td>  width=33%>'.$r['photo_hote'].'<br>'.'</td>';*/		
			echo '<div><span class="titretable">Titre</span><input type="text" id="titre"   width=33% value ='.$r['titre_prestation'].' readOnly="true"></div>';
			
			?><td><input type="checkbox" name ="checkbox[]" value ="<?php echo $i; ?>"></td>
			<?php
			// id recuperera chaque value d'une ligne

			// hidden champs caché  pour  selectionner la value du bouton click 
/*			echo' <input type=hidden name = id value = '.$r['nom_hote'].$r['prenom_hote'].$r['adresse_hote'].' <br>';*/
/*			echo' <input type=hidden name="id" value ='.$i.' >';
			echo '<td><input type="submit" name="valider" value=générer></td>';*/
			?>
			
			<?php 

			//echo '</tr>';
			echo '</div>';

			$i++;
		}

/*		<!-- lors du click sur editer redirection vers la page modif.php -->

		<!-- fin de la redirection -->*/
		// recuperer dans une autre page 	
/*$data1 =  $_SESSION['data '];*/
/*$data1[$_POST['id']]['nom_hote']['prenom_hote'];*/

		$sql='SELECT * from hote ';
		$req = $bdd->query($sql);
		$i=0;
		$req2 = $bdd->query('SELECT * FROM hote');
		$data = $req2 -> fetchAll();
		$_SESSION['data'] = $data;
		while($r = $req->fetch()){
			echo'<div id="clientstableau" width=20% height=1% border=1>';
			//echo '<tr> id='.$i;
/*			echo '<td>  width=33%>'.$r['photo_hote'].'<br>'.'</td>';*/
			echo '<div><span class="titretable">Titre</span><input type="text" id="titre"  width=33% value ='.$r['titre_hote'].' readOnly="true"></div>';
			echo '<div><span class="titretable">Nom</span><input type="text" id="nom" width=33% value='.$r['nom_hote'].' readOnly="true"></div>';
			echo '<div><span class="titretable">Prénom</span><input type="text" id="prenom" width=43% value='.$r['prenom_hote'].' readOnly="true"></div>';
			
			?><div><input type="checkbox"  name ="checkbox[]"  value ="<?php echo $i; ?>"></div>
			<?php
			
			// id recuperera chaque value d'une ligne

			// hidden champs caché  pour  selectionner la value du bouton click 
/*			echo' <input type=hidden name = id value = '.$r['nom_hote'].$r['prenom_hote'].$r['adresse_hote'].' <br>';*/
			?>
			<?php 

			//echo '</tr>';
			echo '</div>';
			

			$i++;
		}
		?>
		<?php
			echo' <input type=hidden name="id" value ='.$i.' >';
			echo '<br><input class="boutonsuppr" type="submit" name="valider" value="générer le contrat">';
		?>
			</form>

		<!-- lors du click sur editer redirection vers la page modif.php -->

		<!-- fin de la redirection -->
		<?php
		


		// recuperer dans une autre page 	
/*$data1 =  $_SESSION['data '];*/
/*$data1[$_POST['id']]['nom_hote']['prenom_hote'];*/
		?>
        </div>
</body>
	</html>

<?php
}else{
	 header('Location:../../../index.php');
}
?>
