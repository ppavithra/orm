<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>

<h1 id="grostitre">Liste Factures</h1>

<br><br>
<button onclick="document.location.href='edit_facture.php'" type="submit" name="accueil" class="boutonajoutprestation" value=accueil>Ajouter une Facture</button><br><br>

<button onclick="document.location.href='facture.php'" type="submit" name="accueil" class="boutonajoutprestation" value=accueil>Imprimer une Facture</button><br><br>

<?php

try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT * FROM factures';
$req=$bdd->query($sql);
$i = 0;

while ($r = $req->fetch()) {
	
	echo'<form method ="POST" action="facture.php">';
			
	/*echo'<table id="prestationtableau" width=20% height=1% border=1>';
			
	echo '<tr> id='.$i;

	echo '<td><div class="titretable">nom</div><input type="text" class="inputtableau" id="designation" width=33% value='.$r['designation'].' readOnly="true"></td>';
	echo '<td><div class="titretable">horaires</div><input type="text" class="inputtableau" id="horaires" width=33% value='.$r['horaires'].' readOnly="true"></td>';
	echo '<td><div class="titretable">nombre de jours</div><input type="text" class="inputtableau" id="nombre_jours" width=33% value='.$r['nombre_jours'].' readOnly="true"></td></tr>';
	echo '<tr><td><div class="titretable">quantité</div><input type="text" class="inputtableau" id="quantite" width=33% value='.$r['quantite'].' readOnly="true"></td>';
	echo '<td><div class="titretable">tarif unitaire</div><input type="text" class="inputtableau" id="tarif_unitaire" width=33% value='.$r['tarif_unitaire'].' readOnly="true"></td>';
	echo '<td><div class="titretable">ligne total hT</div><input type="text" class="inputtableau" id="ligne_total_ht" width=33% value='.$r['ligne_total_ht'].' readOnly="true"></td></tr>';
	echo '<tr><td><div class="titretable">repas</div><input type="text" class="inputtableau" id="repas" width=33% value='.$r['repas'].' readOnly="true"></td>';
		echo '<td><div class="titretable">taxi</div><input type="text" class="inputtableau" id="taxi" width=33% value='.$r['taxi'].' readOnly="true"></td>';
	echo '<td><div class="titretable">colonne total hT</div><input type="text" class="inputtableau" id="colonne_total_ht" width=33% value='.$r['colonne_total_ht'].' readOnly="true"></td></tr>';
	echo '<tr><td><div class="titretable">tva</div><input type="text" class="inputtableau" id="tva" width=33% value='.$r['tva'].' readOnly="true"></td>';
	echo '<td><div class="titretable">total</div><input type="text" class="inputtableau" id="total" width=33% value='.$r['total'].' readOnly="true"></td>';

	echo '<input type=hidden name="id" class="inputtableau" value ='.$i.' ></tr>';
	echo '<tr><td><input type="submit" class="boutoneditsupprgene" name="valider" value=générer>';*/
    
    echo'<div id="clientstableau" width=20% height=1% border=1>';
    echo '<span class="nomclient">'.$r['designation'].'</span><br>';
    echo '<span class="emailclient">'.$r['horaires'].'</span><br><br>';
    echo '<span class="emailclient">Nombre de Jours : '.$r['nombre_jours'].'.</span><br>';
    echo '<span class="emailclient">Quantité : '.$r['quantite'].'.</span><br><br>';
    echo '<span class="emailclient">heures : '.$r['heures'].'Heures.</span><br>';
    echo '<span class="emailclient">Tarif Unitaire HT : '.$r['tarif_unitaire'].'€.</span><br>';
    echo '<span class="emailclient">Frais Repas : '.$r['repas'].'€.</span><br>';
    echo '<span class="emailclient">Frais Taxi : '.$r['taxi'].'€.</span><br>';
    echo '<span class="emailclient">Total HT : '.$r['colonne_total_ht'].'€.</span><br>';
    echo '<span class="emailclient">TVA : '.$r['tva'].'€.</span><br>';
    echo '<span class="emailclient">TTC : '.$r['total'].'€.</span><br>';
    
    echo '<input type="submit" class="boutoneditsupprgene" name="valider" value=générer>';
			?>
<button onclick="document.location.href='modif_facture.php?id=<?php  echo $i; ?>'" type="button" class="boutoneditsupprgene" name="editer" value=editer>modifier</button>

	<?php
			echo '</div>';
			echo '</form>';

	$i++;
}
?>
		<?php 		
		$req2 = $bdd->query('SELECT * FROM factures');
		$data = $req2 -> fetchAll();
		$_SESSION['data'] = $data;	
					
		?>
            </div></body>
</html>
<?php
}else{
	 header('Location:../../../index.php');
}
?>