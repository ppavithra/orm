<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>
<h1 id="grostitre">Ajouter à la Comptabilité</h1><br><br>

		<form name='compta' method="post" action=""><div id="clientstableau2">
<div><span class="titretable">N° Facture :</span> <input type="text" name="NoFacture" required class="inputtableau"></div><br>
            <div><span class="titretable">Client :</span> <input type="text" name="client" required class="inputtableau"></div><br>
                <div><span class="titretable">Date :</span> <input type="text" id="Date" name="date" required class="inputtableau"></div><br>
                <div><span class="titretable">HT :</span> <input type="text" name="HT" required class="inputtableau"></div><br>
                <div><span class="titretable">TVA :</span> <input type="text" name="TVA" required class="inputtableau"></div><br>
                <div><span class="titretable">TTC :</span> <input type="text" name="TTC" required class="inputtableau"></div><br>
                <div><span class="titretable">Etat :</span> <select required class="inputtableau" name="etat">
    	                <option selected value="0">Faites un choix </option>
                        <option value="paye">Payé</option>
                        <option value="attente">Attente</option>
                        <option value="partielle">Paiement Partiel</option>
                </select></div><br><br>

                <input type="submit" class="boutoneditsupprgene" name="editer" value="Ajouter"></div>
	</form>

	<button  id="add" class="boutonajoutprestation" value="compta" name="editer" onclick="redirect()">Retourner à la Comptabilité</button>
	<script>
	function redirect(){
		window.location.href="index.php";
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
	$id = 0;

	if(isset($_POST['client'])){
		if((!empty($_POST['client']))){

			$date = date('Y-m-d',strtotime($_POST['date']));
			$client = $_POST['client'];
			$ht = $_POST['HT'];
			$TVA = $_POST['TVA'];
			$TTC=$_POST['TTC'];
			$No_Facture = $_POST['NoFacture'];
			$etat = $_POST['etat'];
 
	$result = $bdd->prepare("INSERT INTO `compta`(`Date`, `Client`, `HT`, ` TVA`, ` TTC`, `NoFacture`,`etat`)
	 VALUES (:date,:client,:HT,:TVA,:TTC,:NoFacture, :etat)");
	$result->execute(array(
		'date' => $date,
		'client' =>$client,
		'HT' => $ht,
		'TVA' =>$TVA,
		'TTC' => $TTC,
		'NoFacture' => $No_Facture,
		'etat' =>$etat
		));

	if($result){
		echo'recapulatif';
	}
	else{
		echo 'erreur saisie';
	}
}
}
	?>
            
        </div></body></html>
        <?php
}else{
	 header('Location:../../../index.php');
}
?>