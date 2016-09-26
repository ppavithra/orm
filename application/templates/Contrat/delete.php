<?php 
session_start();
if($_SESSION['NOMS']){
    require "../navi.php";
 ?>

<h1 id="grostitre">Supprimer l'Annuaire</h1>
            
<?php  

$data=$_SESSION['data'];

$ind=$_GET['id'];
/*print_r($data[$ind]['nom_hote']);*/

//echo'Voulez-vous vraiment supprimer '.$data[$ind]['nom_hote'].' '.$data[$ind]['prenom_hote'].' ?';

    echo '<div id="clientstableau2"><span class="prenomclient">'.$data[$ind]['titre_hote'].'</span><br>';
    echo '<span class="nomclient">'.$data[$ind]['nom_hote'].'</span> <span class="prenomclient">'.$data[$ind]['prenom_hote'].'</span><br><br>';
    echo '<span class="emailclient">Né le '.$data[$ind]['datenaissance_hote'].' à '.$data[$ind]['lieunaissance_hote'].'<br>'.$data[$ind]['nationalite_hote'].'<br><br>'.$data[$ind]['adresse_hote'].'</span><br><br>';
    echo '<span class="numeroclient">'.$data[$ind]['ss_hote'].'</span><br>';

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
if($_POST['supprimer']){
$id=$data[$ind]['id_hote'];
var_dump($id);
$sql = "DELETE FROM hote WHERE id_hote=$id";
$req = $bdd->prepare($sql);	

$req->execute();
}
echo "Vous avez supprimé";
}
else{
    echo "êtes vous sur se supprimer cette personne?";
}
?>
            <div style="width: 200px; margin: 0 auto;">
<form action="" method="POST"><br>

	<input type="submit" class="boutoneditsupprgene" value="supprimer" name="delete"> </input>
</form></div></div>
        
<button type="submit" value="valider" class="boutonajoutprestation" onclick="redirect()">Retourner à l'Annuaire</button>
        </div>
    </div>
<script>
function redirect(){

	window.location.href="list_hote_model.php";
}
</script>

    </body></html>
    <?php
}else{
     header('Location:../../../index.php');
}
?>