<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>

<h1 id="grostitre">Liste des évènements</h1>

<?php

try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}
		$sql='SELECT * from snap ';
		$req = $bdd->query($sql);
		$i=0;
		while($r = $req->fetch()){
			echo '<form method = POST action="eventpdf.php" target="_blank">';
			echo'<div id="clientstableau" width=20% height=1% border=1>';
/*			echo '<div> id='.$i;
			echo '<td>  width=33%>'.$r['photo_hote'].'<br>'.'</td>';*/
			echo '<div><span class="titretable">Numéro</span> <input class="inputtableau" type="text" id="numero"  width=33% value ='.$r['numero_event'].' readOnly="true"></div>';
			echo '<div><span class="titretable">Date</span> <input class="inputtableau" type="text" id="date_event" width=33% value='.$r['date_event'].' readOnly="true"></div>';
			echo '<div><span class="titretable">Lieu</span> <input class="inputtableau" type="text" id="lieu_event" width=43% value='.$r['lieu_event'].' readOnly="true"></div>';
			// id recuperera chaque value d'une ligne

			// hidden champs caché  pour  selectionner la value du bouton click 
/*			echo' <input type=hidden name = id value = '.$r['nom_hote'].$r['prenom_hote'].$r['adresse_hote'].' <br>';
			echo' <input type=hidden name="id" value ='.$i.' >';*/
			echo '<input class="boutoneditsupprgene" type="submit" name="valider" value=générer>';
            
			?>
<button class="boutoneditsupprgene" onclick="document.location.href='modifevent.php?id=<?php  echo $i; ?>'"type="button" name="editer" value=editer>editer</button>
<button class="boutoneditsupprgene" onclick="document.location.href='deleteevent.php?id=<?php  echo $i; ?>'" type="button" name="supprimer" value=supprimer>supprimer</button>
			<?php 

			//echo '</tr>';
            echo '<br><br>';
			echo '</div>';
			echo '</form>';

			$i++;
		}
		?>
		<!-- lors du click sur editer redirection vers la page modif.php -->

		<!-- fin de la redirection -->
		<?php
		
		$req2 = $bdd->query('SELECT * FROM snap');
		$data = $req2 -> fetchAll();
		$_SESSION['data'] = $data;	

		// recuperer dans une autre page 	
/*$data1 =  $_SESSION['data '];*/
/*$data1[$_POST['id']]['nom_client']['prenom_client'];*/
		?><br><br>
		<button onclick="document.location.href='../prestation/prestation_hotesse.php'" type="submit"  class="boutonajoutprestation" value="valider" onclick="redirect()">ajouter prestation d'hôtesse</button>
		<button onclick="document.location.href='../prestation/prestation_service.php'" type="submit" class="boutonajoutprestation" value="valider" onclick="redirect()">ajouter prestation de service </button>
</div>
</body>
</html>
<?php
}else{
	 header('Location:../../../index.php');
}
?>