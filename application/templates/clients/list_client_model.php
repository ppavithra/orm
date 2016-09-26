<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>
<h1 id="grostitre">Liste Clients</h1>

<br><button class="boutonajoutprestation" onclick="document.location.href='ajouter_client.php'" type="button" name="supprimer" value=supprimer>Ajouter un Nouveau Client</button><br><br>

<?php
try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}

		$sql='SELECT * from clients ';
		$req = $bdd->query($sql);
		$i=0;
		while($r = $req->fetch()){
			echo '<form method = POST action="">';
			echo'<div id="clientstableau" width=20% height=1% border=1>';
/*			echo '<tr> id='.$i;
			echo '<td>  width=33%>'.$r['photo_hote'].'<br>'.'</td>';*/
            echo '<span class="entrepriseclient">'.$r['entreprise_client'].'</span><br>';
			echo '<span class="nomclient">'.$r['nom_client'].'</span> <span class="prenomclient">'.$r['prenom_client'].'</span><br><br>';
			echo '<span class="emailclient">'.$r['email_client'].'</span><br><br>';
            echo '<span class="numeroclient">+33'.$r['tel_client'].'</span><br><br>';
			echo '<input class="boutoneditsupprgene" style="margin-right: 3px;" type="submit" name="valider" value=générer>';
			?>
<button class="boutoneditsupprgene" onclick="document.location.href='editer_client.php?id=<?php  echo $i; ?>'"type="button" name="editer" value=editer>editer</button>
<button class="boutoneditsupprgene" onclick="document.location.href='supprimer_client.php?id=<?php  echo $i; ?>'" type="button" name="supprimer" value=supprimer>supprimer</button>
			<?php 
			echo '</div>';
			echo '</form>';

			$i++;
		}
		?>
		<!-- lors du click sur editer redirection vers la page modif.php -->

		<!-- fin de la redirection -->
		<?php
		
		$req2 = $bdd->query('SELECT * FROM clients');
		$data = $req2 -> fetchAll();
		$_SESSION['data'] = $data;	

		// recuperer dans une autre page 	
/*$data1 =  $_SESSION['data '];*/
/*$data1[$_POST['id']]['nom_hote']['prenom_hote'];*/
		?>
            lol
            </div></div>
</body>
</html>
<?php
}else{
	 header('Location:../../../index.php');
}
?>