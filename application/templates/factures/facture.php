<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>
<h1 id="grostitre">Ajouter une Facture</h1><br><br>
        
<form name="form2" method="POST" action=''><div id="clientstableau2">
<div><span class="titretable">Désignation : </span> <input type="text" class="inputtableau" id="test" name="designation" required><br></div><br>
<div><span class="titretable">Horaires :</span> <input type="text" class="inputtableau" name="horaires" required></div><br>
<div><span class="titretable">Nombres de Jours :</span> <input type="text" class="inputtableau" name="nombre_jours" required><br><br>
    Personnes : <input type="text" class="inputtableau" name="quantite" required><br><br>
    Heures : <input type="text" class="inputtableau" name="heures" required><br>
    </div><br>
<div><span class="titretable">Tarif U. HT :</span> <input type="text" class="inputtableau" name="tarif_unitaire" required></div><br>
<div><span class="titretable"><!-- Total HT  -->:</span> <input type="hidden" class="inputtableau" name="ligne_total_ht" required></div><br>
<div><span class="titretable">Repas :</span> <input type="text" class="inputtableau" name="repas" ></div><br>
<div><span class="titretable">Taxi :</span> <input type="text" class="inputtableau" name="taxi"></div><br>
<div><span class="titretable"><!-- Total HT : --></span> <input type="hidden" class="inputtableau" name="colonne_total_ht" required></div><br>
<div><span class="titretable"><!-- TVA 20% :</ --><span> <input class="inputtableau" type="hidden" name="tva" required></div><br>
<div><span class="titretable"><!-- Total TTC : --></span> <input type="hidden" class="inputtableau" name="total"disabled="disabled"></div><br>
            
	<br>
	<input type="submit" class="boutoneditsupprgene" name="editer" value="Valider">
            </div>
</form>
	
	<!--<button  id="add" value="editer" class="boutonajoutprestation" name="editer">add</button>-->
		<?php 
try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}
	
	$id= 0;

 
	$sql2 = $bdd->query("SELECT MAX(id) as LASTID  FROM factures");
	foreach($sql2 as $row) {
		$id = $id + $row{"LASTID"};
		$_SESSION=$id;
		var_dump($_SESSION);
	}


	if(isset($_POST['designation'])){
		if((!empty($_POST['designation']))){

			$designation = $_POST['designation'];
			$horaires = $_POST['horaires'];
			$nombre_de_jours = $_POST['nombre_jours'];
			$quantite = $_POST['quantite']; 
			$tarif_unitaire=$_POST['tarif_unitaire'];
			$ligne_total_HT = $_POST['ligne_total_ht'];
			$frais_repas = $_POST['repas'];
			$frais_taxi=$_POST['taxi'];
			$total_HT=$tarif_unitaire * $quantite;
			$TVA = $total_HT * (0.2);;
			$total = $total_HT * (1.2);
			$heures = $_POST['heures'];

			$result = $bdd->prepare("INSERT INTO `factures`( `designation`, `horaires`, `nombre_jours`, `quantite`, `tarif_unitaire`, `ligne_total_ht`, `repas`, `taxi`, `colonne_total_ht`, `tva`, `total`,`heures`) VALUES (:designation,:horaires,:nombre_jours,:quantite,:tarif_unitaire,:ligne_total_ht,:repas,:taxi,:colonne_total_ht,:tva,:total, :heures)");
			$result->execute(array(
				'designation'=>$designation,
				'horaires' =>$horaires,
				'nombre_jours' => $nombre_de_jours,
				'quantite' =>$quantite,
				'tarif_unitaire'=>$tarif_unitaire,
				'ligne_total_ht' =>$ligne_total_HT,
				'repas' =>$frais_repas,
				'taxi' =>$frais_taxi,
				'colonne_total_ht' =>$total_HT,
				'tva' =>$TVA,
				'total' =>$total,
				'heures' =>$heures,
				));


			if($result){
				echo 'recapulatif';
			}else{
				echo 'erreur saisies';
			}
		}
	}



	?>

	
<button type="submit" class="boutonajoutprestation" value="valider" onclick="redirect()">Liste des Factures</button>

<script>
function redirect(){

	window.location.href="liste_facture.php";
}
</script>
 <script type="text/javascript">
           
            $('#add').click( function(){
           
            //$('#nform').html(''); // on vide les resultats
            

        //on envoie la valeur recherché en GET au fichier de traitement
              $.ajax({
                type : 'GET', // envoi des données en GET ou POST
                url : 'form.php' , // url du fichier de traitement
                data : 'q='+1 , // données à envoyer en  GET ou POST
                beforeSend : function() { // traitements JS à faire AVANT l'envoi

                },
                success : function(data){ // traitements JS à faire APRES

                        $('.nform').html(data); // affichage des résultats dans le bloc
                }
              });

            });
 
   
    </script>
	</body>
</html>	
<?php
}else{
	 header('Location:../../../index.php');
}
?>