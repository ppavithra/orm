<?php 
session_start();
if($_SESSION['NOMS']){
  require "../navi.php";
 ?>

<h1 id="grostitre">Supprimer un Client</h1>
        
<?php  
$data=$_SESSION['data'];

$ind=$_GET['id'];
/*print_r($data[$ind]['nom_client']);*/

    echo '<div id="clientstableau2"><span class="entrepriseclient">'.$data[$ind] ['entreprise_client'].'</span><br>';
    echo '<span class="nomclient">'.$data[$ind] ['nom_client'].'</span> <span class="prenomclient">'.$data[$ind] ['prenom_client'].'</span><br><br>';
    echo '<span class="emailclient">'.$data[$ind] ['email_client'].'</span><br><br>';
    echo '<span class="numeroclient">+33'.$data[$ind] ['tel_client'].'</span><br>';


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

$id=$data[$ind]['id_client'];
var_dump($id);
$sql = "DELETE FROM clients WHERE id_client=$id";
$req = $bdd->prepare($sql);	

$req->execute();
}

?>
<form action="" method="POST">
    <br>
	<input type="submit" class="boutoneditsupprgene" style="display: inline-block;" value="supprimer" name="delete"></input>
</form></div>

    <button type="submit" value="valider" class="boutonajoutprestation" onclick="redirect()">Retourner à Liste de Clients</button>

</div>

<script>
function redirect(){

	window.location.href="list_client_model.php";
}
</script>

</body>
</html>
<?php
}else{
   header('Location:../../../index.php');
}
?>