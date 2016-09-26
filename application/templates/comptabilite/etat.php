<?php 
session_start();
if($_SESSION['NOMS']){
    require "../navi.php";
 ?>

<h1 id="grostitre">Modifier l'état</h1><br><br>

 <?php 
 $data = $_SESSION['data'];
 $ind = $_GET['id'];
 


 ?>

<?php
if (isset($_POST['submit'])){
 
 echo'etat de la facture modifié en '.$_POST['test']; 
       
}
?>
<form method="POST" action="">
    
    <?php
        echo'<div id="clientstableau2" width=20% height=1% border=1>';
        echo '<span class="nomclient">Facture N°'.$data[$ind] ['Client'].'</span><br>';
        echo '<span class="nomclient">'.'Client'.'</span><br><br>';
        echo '<span class="emailclient">HT : '.'00,00'.'€</span><br>';
        echo '<span class="emailclient">TVA : '.'00,00'.'€</span><br>';
        echo '<span class="emailclient">TTC : '.'00,00'.'€</span><br><br>';
        echo '<span class="emailclient">'.$data[$ind] ['Date'].'</span><br><br>';
        echo '<div class="ligneedit"></div><br><br>';
    ?>
    
    <select class="inputtableau" style="float: none;" required name="test">
    	<option selected value="0">Faites un choix </option>
        <option value="paye">Payé</option>
        <option value="attente">Attente</option>
        <option value="partielle">Paiement Partiel</option>
    </select><br><br>
    <input value="Modifier" class="boutoneditsupprgene" name="submit" type="submit"></div>
</form>
<?php
if(isset($_POST['submit'])&&isset($_POST['test'])){

$id=$data[$ind]['id'];

$action = $_POST["submit"];
$opt = $_POST["test"];
if($action == "Valider"){
try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}
    $result = $bdd->prepare('UPDATE compta SET etat = :d WHERE id = :id');
    $result->execute(
        array(
        	'id' => $id,
            'd' => $opt
            
        )
    );
}
}

?>
 <button type="submit" value="valider" class="boutonajoutprestation" onclick="redirect()">Retourner à la Comptabilité</button>
        </div>
<script>
	function redirect(){
		window.location.href="index.php";
	}
</script>
</body>
</html>
 



 <?php
}else{
     header('Location:../../../index.php');
}
?>