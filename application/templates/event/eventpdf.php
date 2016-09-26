<?php 
session_start();
ob_start();
if($_SESSION['NOMS']){
	
 
require('html2pdf/html2pdf.class.php');


?>
<style type="text/css">
.align{
	text-align: justify;

}
.last{
	text-align: center;
	margin-left: 230px;
	margin-top: 10px;
	font-size: 10px;
}
</style>


<page backleft="5mm" backright="5mm" margin-right:"5px;">
	<img src="./image/unnamed.jpg" style="width:120px;height:120px;"/><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LEMON <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;services 
		<h1 style=" text-align:center; font-size:15px;font-weight:bold;">CONTRAT À DURÉE DETERMINÉE</h1>
	 	Entre <strong>LEMON SERVICE</strong>, SARL au capital de 2000,00 €, sise 4, rue Paul Baudry 75008 PARIS- RCS PARIS 801 622 010, 
	 	représente par son gérant Monsieur Aloïs Bazin de Jessey, domiciliée au dit siège et habilité aux fins des présents.<br><br>
 		
 		Et,<br>
			<table>
				<tr>
					<!-- Gauche -->
					<td>
						<?php 
							if(isset($_POST['valider'])){
							$data=$_SESSION['data'];
							$ind=$_POST['id'];
							?>
							<strong><?php echo ucfirst($data[$ind]['numero_event']);?></strong>
							<?php
							echo ' ';
							?>
							<strong><?php echo ucfirst($data[$ind]['date_event']);?></strong>
							<?php
							echo ' ';
							?>
							<strong><?php echo  ucfirst($data[$ind]['lieu_event']); ?></Strong>
							<?php
							echo '<br>';
							?>
							
							<?php 
							echo'<br>';
							} 
						?>
					</td>
					<!-- Droite -->

				</tr>
			</table>
			<!-- Deuxième table -->
			<div class="align">
			<table >
				<tr>
					<td>

						 <strong>OBJET ET DUREE DU CONTRAT </strong> <br><br>

						
						Le présent contrat est conclu dans le cadre de la manifestation définie ci-après en raison d’un surcroit de travail lié au contrat de 
						représentation conclu avec notre client. Le présent contrat est soumis à la condition résolutoire de l’annulation 
						par le client de la manifestation prévue au contrat. Cet engagement deviendra définitif à l’issue de la période d’essai de un jour, 
						calculée en fonction de la durée du contrat conformément aux dispositions légales et conventionnelles. Les rapports entre les 
						parties seront régis par la convention collective nationale 3301 du personnel des prestataires de services dans le domaine du 
						secteur tertiaire.<br><br>



						<strong>MANIFESTATION</strong><br><br>

						<strong>MANIFESTATION : </strong><br>
						<strong>DATE : du  </strong><br>
						<strong>LIEU : </strong><br>
						<strong>HORAIRES : </strong><br>
						<strong>CONVOCATION :</strong> <i>15 minutes avant sur le site</i><br>

						Pause repas :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pause supplémentaire :<br>
						Les pauses, s’il y en a, sont à prendre en accord avec le Responsable de l’opération.<br><br>
						<strong>RÉMUNÉRATION</strong><br><br>
						L’hôtesse/ l’hôte percevra une rémunération horaire brute de   €, qui comprend la rémunération horaire net de   €, à laquelle
						s’ajoutent les indemnités de précarité de fin de contrat à hauteur de 10% sur la base du salaire net et les indemnités de congés 
						payées à hauteur de 10% sur la base de salaire net additionné des indemnités de précarité de fin de contrat. <br><br>

						Frais annexes : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Forfait repas :<br>
						Indemnité forfaitaire de transport :<br><br>

						L’employé(e) devra assurer les dépassements d’horaires prévus dans le présent contrat lorsque ceux-ci lui seront demandés par 
						le représentant de l’agence ou le client, selon les impératifs de la manifestation. Toutes les heures complémentaires doivent être 
						signalées à l’agence le lendemain de la manifestation ou au plus tard le 1er jour ouvré suivant. Au-delà, elles ne pourront être 
						prises en compte. Aux termes du présent contrat, la salariée autorise à ce que son image soit utilisée par LEMON SERVICE ou son 
						client           sur tout type de support média et hors média, pour des actions de publicités commerciales ou de ressources 
						humaines.
						Cette autorisation est valable 5 ans à compter de ce jour.<br><br>

						La caisse de retraite complémentaire à laquelle <strong>  </strong>   est affiliée est (A REMPLIR PAR WALID)  . Il bénéficiera du régime de 
						prévoyance souscrit par l’entreprise et géré par Médéric… (indiquer nom et adresse complémentaire et celle gérant la 
						prévoyance)<br><br><br>
					</td>
				</tr>
			</table>
		</div>
			<table>
				<tr>
					<td>
					 <strong>UNIFORME</strong><br><br>
					L’agence ne fournira pas d’uniforme.<br><br>
	
					SIGNATURE DU SALARIE <br>                                  

					Qui reconnaît avoir pris connaissance du règlement <br>    
					Stipulé au verso du présent document et précise :<br>
					« lu et approuvé » avant la signature<br>
					</td>

					<td style="text-align: top-right; padding-left : 230px;">
						<br><br>
					SIGNATURE DE L’EMPLOYEUR<br>
					A Paris, le
					</td>
				</tr>
			</table>
			<div class="last">
			<table>
				<tr>
					<td>
				Siège social : 4 rue Paul Baudry – 75008 PARIS<br>
				SARL au capital de 2 000.00 €<br>
				RCS en cours<br>
					</td>
				</tr>
			</table>
		</div>

</page>

<?php
$content = ob_get_clean();
require("html2pdf/html2pdf.class.php");
try{
$pdf = new HTML2PDF('P','A4','fr');
$pdf->writeHTML($content);
$pdf->Output('event.pdf');

}catch(HTML2PDF_exception $e){
	die($e);
}
session_destroy() 
?>
<?php
}else{
	 header('Location:../../../index.php');
}
?>