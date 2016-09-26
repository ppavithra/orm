<?php 
session_start();
if($_SESSION['NOMS']){

 


function results($search)
{
	$where ="";
	$search = preg_split('/[\s\-]/', $search);

	$count_keywords = count($search);
	foreach ($search as $key =>$searches) {
		$where = "nom_hote LIKE '%$searches%'";

		if($key != ($count_keywords-1))
		{
			//where tel chose and tel chose
			$where.=" AND ";
		}
	}
	
include('connect.php');

	$res = $bdd->query("SELECT * FROM hote WHERE $where");
	$etat = $res->rowCount();
	
	


	if($etat)
	{
		while($all = $res->fetch())
		{

		$naissance = date_create($all['datenaissance_hote']);			
		/*echo "$etat\n";*/
		echo($all['nom_hote'].'<br> '.$all['prenom_hote']).' <br>'.$all['email_hote'].'<br> '.$all['adresse_hote']
		.'<br> '.$all['titre_hote'];
		echo '<br>'.date_format($naissance,'d/m/Y');
		echo '<br> '.$all['lieunaissance_hote']
		.' <br>'.$all['nationalite_hote'].'<br> '.$all['ss_hote'].'<br> '.$all['photo_hote'].'<br> '.$all['tel_hote'];
		}

	}else{
		echo"pas de resultats trouvé";
	}



}
?>

<?php
}else{
	 header('Location:../../../index.php');
}
?>