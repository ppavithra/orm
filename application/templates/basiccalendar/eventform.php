<?php 
session_start();
if($_SESSION['NOMS']){
	
 ?><!-- formulaire pour créer un événement -->
<form name='eventform' method='post' action="<?php $_SERVER['PHP_SELF']; ?>?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year; ?>&v=true&add=true"> 
<table width='400px'>
	<tr>
		<td width='150px'>Title</td>
		<td width='250px'><input type='text' name='txttitle'></td>

	</tr>
	<tr>
		<td width='150px'>Detail</td>
		<td width='250px'><textarea name='txtdetail'></textarea></td>
		
	</tr>
		<tr>
		<td width='150px'>Numéro de l'événement</td>
		<td width='250px'><input type='text' name='numero_event'></input></td>
		
	</tr>
			<tr>
		<td width='150px'>Type de personne</td>
		<td width='250px'><input type='text' name='type_personne'></input></td>
		
	</tr>
			<tr>
		<td width='150px'>adresse de l'événement</td>
		<td width='250px'><input type='text' name='adresse_event'></input></td>
		
	</tr>
				<tr>
		<td width='150px'>horaire de l'événement</td>
		<td width='250px'><input type='text' name='horaire_event'></input></td>
		
	</tr>
				<tr>
		<td width='150px'>nombre de personne</td>
		<td width='250px'><input type='text' name='nombre_personne'></input></td>
		
	</tr>
					<tr>
		<td width='150px'>déroulée reçu par mail (OUI /NON)</td>
		<td width='250px'><input type='text' name='deroule_event'></input></td>
		
	</tr>
	<tr>
		<td colspan='2' align='center'><input type='submit' name='btnadd' value='Add Event'></td>		

</table>



</form>
<?php
}else{
	 header('Location:../../../index.php');
}
?>