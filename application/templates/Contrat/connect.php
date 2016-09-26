<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>
 <?php

$bdd = new PDO('mysql:host=localhost;dbname=directlemon_bd','root','Wascac33');

?>
<?php
}else{
	 header('Location:../../../index.php');
}
?>