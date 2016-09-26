<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 

defined('__GEST3IL__') or die('Acces interdit');
	require "../navi.php";
    require_once 'framework/application.php';

$data= $_SESSION['data'];
$ind = $_GET['id'];

var_dump($ind);

?>
            
        </div></body></html>
        <?php
}else{
	 header('Location:../../../index.php');
}
?>