<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 
$bdd = new PDO('mysql:host=localhost;dbname=directlemo','root','Wascac33');

$messages = array();
$recup_message = $bdd->query("SELECT * FROM note ORDER BY id DESC");

while($all = $recup_message->fetch())
{
	$messages[]=$all;

}
foreach ($messages as $message) {
	?>
	<h4><?php echo $message['pseudo'] ?></h4>
	<p><?php echo $message['commentaires']?><p>
		<?php
}
?>
<?php
}else{
	 header('Location:../../../index.php');
}
?>