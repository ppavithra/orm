<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Note</title>
		<link rel="stylesheet" href="style.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="script.js"></script>

	</head>
	<body>
		<h2>Note</h2>
		<form method="post" class="formulaire">
		<div class="return"></div>
		<input type="text" placeholder="votre nom" class="nom"><br>
		<textarea placeholder="votre message" class="message"></textarea><br>
		<input class="submit" type="submit" value="envoyer">
		</form>

		<div class="afficher"></div>
	</body>
	</html>