<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 

try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}

	$sql= 'SELECT * FROM user';
	$req=$bdd->query($sql);

	$i = 0;

	while($r = $req->fetch()){
		echo '<form method = POST action="">'; 
		echo'<div id="clientstableau" width=20% height=1% border=1>';
/*		echo '<tr> id='.$i;
		echo '<td>  width=33%>'.$r['photo_hote'].'<br>'.'</td>';*/
		echo '<div><span class="titretable">Nom</span><input type="text" class="inputtableau" id="nom" width=33% value='.$r['login'].' readOnly="true"></div>';
		//echo' <input type=hidden name="id" value ='.$i.' >';
		echo '<div><input type="submit" name="valider" class="boutoneditsupprgene" value=générer></div>';
			
	
?>
			<div><button  onclick="document.location.href='edit_droit.php?id=<?php  echo $i; ?>'"type="button" name="editer" class="boutoneditsupprgene" value=editer>editer</div>
			
			<?php
			//echo '</tr>';
			echo '</div>';
			echo '</form>';

			$i++;
		}
		?>
		<?php

		$req2 = $bdd->query('SELECT * FROM user');
		$data = $req2->fetchAll();
		$_SESSION['data'] = $data;
		?>
</div>
	</body>
	</html>
	<?php
}else{
	 header('Location:../../../index.php');
}
?>