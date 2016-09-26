<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>
 <?php
}else{
	 header('Location:../../../index.php');
}
?>