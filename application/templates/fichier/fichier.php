<?php require "../navi.php"; ?>

<h1 id="grostitre">Les Fichiers</h1>

<div id="clientstableau">
<?php

	$dirname = 'images'; 
	$dir = opendir($dirname); 
	if($dir){
		while($file = readdir($dir)) { 
			if($file != '.' && $file != '..' && !is_dir($dirname.$file)) 
											/*$folder= '<a href="'.$dirname.'/'.$file.'">'.$file.'</a>';*/
				{
				echo $folder  = $dirname.'/'.$file;
				//echo '<input type="checkbox" name="fichier[]" value="'.$folder.'" class="fichier" /><br><br>';
                echo '<br><br>';
				} 
		}


	} 
	closedir($dir);	
	?>

            </div>
<br>
<button type="submit" class="boutonajoutprestation" value="valider" onclick="redirect()">Gérer les Fichiers</button>

<script>
function redirect(){

	window.location.href="intra.php";
}
</script>
        
        </div></body></html>