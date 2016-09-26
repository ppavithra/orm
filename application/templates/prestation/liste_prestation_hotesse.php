<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>

<h1 id="grostitre">Prestations Hôtesses</h1>
<br><br>

<?php

try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}
		$sql='SELECT * from prestationhotesse ';
		$req = $bdd->query($sql);
		$i=0;
		while($r = $req->fetch()){
			echo '<form method = POST action="generer_contrat.php">';
			echo'<div id="clientstableau" width=20% height=1% border=1>';
			/*echo '<tr> id='.$i;*/
/*			echo '<td>  width=33%>'.$r['photo_hote'].'<br>'.'</td>';*/
			/*echo '<td><div class="titretable">Titre</div><input type="text" id="titre" class="inputtableau" value ='.$r['titre_prestation'].' readOnly="true"></td>';
			echo '<td><div class="titretable">Date Début</div><input type="text" class="inputtableau" id="date_debut" class="inputtableau" value='.$r['date_debut_prestation'].' readOnly="true"></td>';
			echo '<td><div class="titretable">Date Fin</div><input type="text" id="date_fin" class="inputtableau" value='.$r['date_fin_prestation'].' readOnly="true"></td>';
			echo '<td><div class="titretable">Horaire Début</div><input type="text" class="inputtableau" id="heure_debut" value='.$r['horaire_debut_prestation'].' readOnly="true"></td>';
			echo '<td><div class="titretable">Horaire Fin</div><input type="text" class="inputtableau" id="heure_fin" value='.$r['horaire_fin_prestation'].' readOnly="true"></td>';
			echo '<td><div class="titretable">Durée</div><input type="text" id="duree" class="inputtableau" value='.$r['duree_prestation'].' readOnly="true"></td>';
			echo '<td><div class="titretable">Repas</div><input type="text" id="pause" class="inputtableau" value='.$r['pause_repas'].' readOnly="true"></td>';
			echo '<td><div class="titretable">Pauses</div><input type="text" class="inputtableau" id="pausesupp" value='.$r['pause_supp'].' readOnly="true"></td></tr>';
			echo '<tr><td><div class="titretable">Frais Annexes</div><input type="text" id="repas" class="inputtableau" value='.$r['frais_annexes'].' readOnly="true"></td>';
			echo '<td><div class="titretable">Indemnités</div><input type="text" class="inputtableau" id="transport" value='.$r['indemnite_transport'].' readOnly="true"></td>';
			echo '<td><div class="titretable">Rémunération</div><input type="text" class="inputtableau" id="remuneration" value='.$r['remuneration'].' readOnly="true"></td>';
			echo '<td><div class="titretable">Date Signature</div><input type="text" class="inputtableau" id="datesignature" value='.$r['date_signature'].' readOnly="true"></td>';*/
            echo '<div id="clientstableau" width=20% height=1% border=1>';
            echo '<span class="nomclient">'.$r['titre_prestation'].'</span><br>';
			echo '<span class="emailclient">'.$r['date_debut_prestation'].'</span> - <span class="emailclient">'.$r['date_fin_prestation'].'</span><br><br>';
			echo '<span class="emailclient">'.$r['duree_prestation'].'</span><br><br>';
            
            echo '<span class="emailclient">'.$r['pause_supp'].'</span><br><br>';
            echo '<span class="emailclient">Frais Annexes : '.$r['frais_annexes'].'€</span><br><br>';
            echo '<span class="emailclient">Indemnités Transport : '.$r['indemnite_transport'].'€</span><br><br>';
            echo '<span class="emailclient">Rémunération : '.$r['remuneration'].'€</span><br><br>';
            echo '<span class="emailclient">Date Signature : '.$r['date_signature'].'</span><br><br>';
			// id recuperera chaque value d'une ligne

			// hidden champs caché  pour  selectionner la value du bouton click 
/*			echo' <input type=hidden name = id value = '.$r['nom_hote'].$r['prenom_hote'].$r['adresse_hote'].' <br>';*/
			echo' <input type=hidden name="id" value ='.$i.' >';
			echo '<input type="submit" class="boutoneditsupprgene" style="margin-right: -3px;" name="valider" value="Générer">'
			?>
            <button  onclick="document.location.href='modif.php?id=<?php  echo $i; ?>'"type="button" name="editer" class="boutoneditsupprgene" style="margin-right: 1px;" value=editer>editer
			<button onclick="document.location.href='delete.php?id=<?php  echo $i; ?>'" type="button" name="supprimer" class="boutoneditsupprgene" style="margin-right: 0px;" value=supprimer>supprimer
			<?php 

			echo '</div>';
            echo '</div>';
			echo '</form>';

			$i++;
		}
		?>
		<!-- lors du click sur editer redirection vers la page modif.php -->

		<!-- fin de la redirection -->
		<?php
		
		$req2 = $bdd->query('SELECT * FROM prestationhotesse');
		$data = $req2 -> fetchAll();
		$_SESSION['data'] = $data;	

		// recuperer dans une autre page 	
/*$data1 =  $_SESSION['data '];*/
/*$data1[$_POST['id']]['nom_hote']['prenom_hote'];*/
		?>
</body>
	</html>

<?php
}else{
	 header('Location:../../../index.php');
}
?>