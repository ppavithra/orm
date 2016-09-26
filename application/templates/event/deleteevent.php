<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>
<?php  
$data=$_SESSION['data'];

$ind=$_GET['id'];

echo"Voulez-vous vraiment supprimer l'évènement numéro ".$data[$ind]['numero_event']." ?";


?>
<?php

if(isset($_POST['delete']))

{
try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}

$id=$data[$ind]['id'];
var_dump($id);
$sql = "DELETE FROM snap WHERE id =$id";
$req = $bdd->prepare($sql);	

$req->execute();
}

?>
            <div style="width: 200px; margin: 0 auto;">
<form action="" method="POST"><br>
	<input type="submit" value="supprimer" style="float: left;" class="boutonajoutprestation" name="delete"> </input>

</form>
            <a href="liste_event.php" class="boutonsuppr">Annuler</a></div>
    </body>
<script>
function redirect(){

	window.location.href="liste_event.php";
}
</script>
    </body></html>
<?php
}else{
	 header('Location:../../../index.php');
}
?>