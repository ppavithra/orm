<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";?>
        
        <?php

$data=$_SESSION['data'];
$ind=$_POST['id'];
var_dump($ind);
$totalht =($data[$ind]['tarif_unitaire'])*($data[$ind]['quantite']);
$tva = $totalht * (0.2);
$ttc = (1.2) * $totalht;
$designation = $_POST['designation'];
$horaires = $_POST['horaires'];
$nombre_jours = $_POST['nombre_jours'];
$nombre_personnes = $_POST['nombres_personnes'];
$tarif__unitaire = $_POST['tarif_unitaires'];



?>
<TABLE BORDER>
	<TR>
		<TH>Désignation<br>
		<input type="text" name="designation"></input></TH><br>


		<TH>Horaires
		<input type="text" name="horaires" ></input></TH>
		<TH>Nombre de jours
		<input type="text" name="nombre_jours"></input></TH>
		<TH>Nombre de personnes
		<input type="text" name="nombres_personnes" ></input></TH>
		<TH>Tarif Unitaire HT
		<input type="text" name="tarif_unitaires" ></input></TH>
		<TH>Total HT

	</TR>
		<TR>
		<TD><?php echo ucfirst($data[$ind]['designation']);?></TD> 
		<TD><?php echo ucfirst($data[$ind]['horaires']);?></TD> 
		<TD><?php echo ucfirst($data[$ind]['nombre_jours']);?></TD>
		<TD><?php echo ucfirst($data[$ind]['quantite']);?></TD>
		<TD><?php echo ucfirst($data[$ind]['tarif_unitaire']);?></TD>
		<TD><?php echo ucfirst($data[$ind]['ligne_total_ht']);?></TD>
	</TR>
	<TR>
		<TH COLSPAN=2>Frais de repas</TH>
	    	<TD colspan=3 ALIGN=center>-</TD>
	    	<TD><?php echo ucfirst($data[$ind]['repas']);?></TD>
	</TR>
	<TR>
		<TH COLSPAN=2>Frais de taxi</TH>
	    	<TD colspan=3 ALIGN=center>-</TD>
	    	<TD><?php echo ucfirst($data[$ind]['taxi']);?></TD>
	</TR>
	<TR>
		<TH COLSPAN=5>Total HT</TH>
	    	<TD><?php echo $totalht;?></TD>
	</TR>
	<TR>
		<TH COLSPAN=5>TVA en supplément : 20%</TH>
	    	<TD><?php echo  $tva;?></TD>
	</TR>
	<TR>
		<TH COLSPAN=5>Total TTC</TH>
	    	<TD><?php echo $ttc; ?></TD>
	</TR>

</TABLE>

<td><button onclick="document.location.href='liste_facture.php'" type="submit" name="accueil" value=accueil>liste  facture</td>
	</body>
</html>	
<?php
}else{
	 header('Location:../../../index.php');
}
?>