<?php require "../navi.php"; ?>

<h1 id="grostitre">Ajouter ou Supprimer des Fichiers</h1>

<form method="POST" action="" enctype="multipart/form-data">
<div id="clientstableau"><br><span class="titretable" style="float: none;">Ajouter un Nouveau Fichier :</span><br><br>
<!-- On limite le fichier Ã  100Ko -->
  <input type="hidden" name="MAX_FILE_SIZE" value="125000">
  <input type="file" name="fichier" class="inputtableau" style="float: none; margin: 0 auto"><br><div style="width: 260px;">
 <input type="submit" name="envoyer" class="boutoneditsupprgene" style="float: left;" value="envoyer">
  <input type="submit" name="supprimer" class="boutoneditsupprgene" style="float: left;" value="supprimer"></div>
  <?php
if(isset($_POST['envoyer'])){
    // destination du fichier qu'on tÃ©lÃ©charge
    $dossier = 'images/';
    //nom de base des fichiers
    /*$fichier = $_FILES['fichier']['name']. '     '." / ".date('d.m.Y_H\hi');*/
    $date = date ("d/m/Y-H:i:s");
    $fichier = $_FILES['fichier']['name'].'_'.$date;

    $fichier=mt_rand(1,10).$fichier;
    //taille maximum autorisÃ©
    $taille_maxi = 125000;
    //taille du fichier
    $taille = filesize($_FILES['fichier']['tmp_name']);
    //extension du fichier autorisÃ©
    /*$extensions = array('.png', '.gif', '.jpg', '.jpeg','.odt','.pdf','.txt');*/
    //modification de l'extension du fichier
    /*$extension = strrchr($_FILES['fichier']['name'], '.'); */
    //DÃ©but des vÃ©rifications de sÃ©curitÃ©...

    /*if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
    {
    echo'<br>';
    echo 'veuillez t&eacutel&eacutecharger sun fichier';
    }*/
    if($taille>$taille_maxi)
        {
        echo  'Le fichier est trop gros...';
        }
            if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
            {
            //On formate le nom du fichier ici...
             $fichier = strtr($fichier, 
            'Ã€Ã?Ã‚ÃƒÃ„Ã…Ã‡ÃˆÃ‰ÃŠÃ‹ÃŒÃ?ÃŽÃ?Ã’Ã“Ã”Ã•Ã–Ã™ÃšÃ›ÃœÃ?Ã Ã¡Ã¢Ã£Ã¤Ã¥Ã§Ã¨Ã©ÃªÃ«Ã¬Ã­Ã®Ã¯Ã°Ã²Ã³Ã´ÃµÃ¶Ã¹ÃºÃ»Ã¼Ã½Ã¿', 
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier. $fichier)) //Si la fonction renvoie TRUE, c'est que Ã§a a fonctionnÃ©...
                {
                /*echo ' <a href="./images/'.$fichier.'">voir le dernier chargement</a>';*/
                echo '<br>';
                echo 'Listes des fichiers :<br>';
				echo 'Cochez pour supprimer.';
                echo '<br><br>';
                $dirname = 'images'; 
                $dir = opendir($dirname); 
                     if($dir){
                        while($file = readdir($dir)) { 
                            if($file != '.' && $file != '..' && !is_dir($dirname.$file)) 
                                    /*$folder= '<a href="'.$dirname.'/'.$file.'">'.$file.'</a>';*/
                                {
                                echo '<a href='. $dossier. $file.'>'.$file.'</a> <input type="checkbox" name="fichier[]" value="'.$dossier.$file.'" class="fichier" />'.'<br />';
                                } 
                        }
                    } 
                closedir($dir);	

                }
                else //Sinon (la fonction renvoie FALSE).
                {
                echo '<br>';
                echo 'Choissisez  un fichier Ã  Ajouter';
                }											     
            }
            unset($_POST['envoyer']);//localhost/intranet/images/3Sujet-1-.pdf-23-07-2015-18-00-09
}

//////////////////////////////////////////////////////////////////SUPRESSION//////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['supprimer'])){
$dossier = 'images/';
//nom de base des fichiers
/*$fichier = $_FILES['fichier']['name']. '     '." / ".date('d.m.Y_H\hi');*/
$date = date ("d/m/Y-H:i:s");
$fichier = $dossier.$_FILES['fichier']['name'].'_'.$date;

$fichier=mt_rand(1,10).$fichier;
//taille maximum autorisÃ©
$taille_maxi = 125000;
//taille du fichier
$taille = filesize($_FILES['fichier']['tmp_name']);
//extension du fichier autorisÃ©
$extensions = array('.png', '.gif', '.jpg', '.jpeg','.odt','.pdf','.txt');
//modification de l'extension du fichier
$extension = strrchr($_FILES['fichier']['name'], '.'); 

$dir = opendir($dossier); // On dÃ©finit le rÃ©pertoire dans lequel on souhaite travailler.
/*$chemin = $dossier."/".$fichier;*/ // On dÃ©finit le chemin du fichier Ã  effacer.
// Si le fichier n'est pas un rÃ©pertoireâ€¦
    if (!empty($_POST['fichier'])) {
        foreach ($_POST['fichier'] as $check) {
            unlink($check);
        }
        echo '<br>Fichier(s) supprimé(s)';
    }else{
    echo '<br>';
    echo 'Selectionner un fichier à Supprimer';
    }
    closedir($dir);
}
?></div>
</form>
<br>

<button type="submit" class="boutonajoutprestation" value="valider" onclick="redirect()">Liste des Fichiers</button>

<script>
function redirect(){

	window.location.href="fichier.php";
}
</script>

</div></body></html>