<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
	?>

<h1 id="grostitre">Calendrier</h1><br><br>
			
			
		<?php
		
		if(isset($_GET['day'])){
			$day = $_GET['day'];

		}else{

		// /get the today date and put them in dAY MONTH AND YEAR
		$day = date("j");

		}
		if(isset($_GET['month'])){
			$month = $_GET['month'];
		}else{
		$month = date("n");

		}
		if(isset($_GET['year'])){
			$year = $_GET['year'];
		}else{
		$year = date("Y");
		}
		// calendar variable
		$currentTimeStamp = strtotime("$year-$month-$day");
		$monthName = date("F",$currentTimeStamp);
		$numDays = date("t", $currentTimeStamp);
		// conteur pour conter les cellules du tableau
		$counter = 0;


	/*	echo $day."/".$month."/".$year; // afficherae 25/8/2015*/

		?>

		<?php
try
{
       $bdd = new PDO('mysql:dbname=directlemon_bd;host=localhost','root','Wascac33');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}

		
		if(isset($_GET['add'])){
			if((isset($_POST['txttitle']))&&(isset($_POST['txtdetail']))){
				if((!empty($_POST['txttitle']))&&(!empty($_POST['txtdetail']))){


			$title= $_POST['txttitle'];
			$detail = $_POST['txtdetail'];
			$numero_event=$_POST['numero_event'];
			$type_personne=$_POST['type_personne'];
			$adresse_event=$_POST['adresse_event'];
			$horaire_event=$_POST['horaire_event'];
			$nombre_personne=$_POST['nombre_personne'];	
			$deroule_event=$_POST['deroule_event'];
			

			$eventdate = $month."/".$day."/".$year;

		$result = $bdd->exec("INSERT INTO `eventcalender`(`title`, `detail`, `eventDate`,`numero_event`,`type_personne`,`adresse_event`,`horaire_event`,`nombre_personne`,`deroule_event`,`dateAdded`)
		 VALUES ('".$title."','".$detail."','".$eventdate."','".$numero_event."','".$type_personne."','".$adresse_event."','".$horaire_event."','".$nombre_personne."','".$deroule_event."',now())");

			if($result){
				echo "Event was successfully Added ...";
			}
		}else{
				echo "Event Failed to be added";
			}
			}
		}
		?>
		<?php 

		$sql=' SELECT * FROM eventcalender';
				 $result = $bdd->query($sql);
					$data =$result->fetchAll();
					$_SESSION['data']=$data;
					
		?>



		

		<table border='1' id="tableaucalendrier">
			<tr>
				<td><input style='width:50px' type='button' value='<' name='previousbutton' onclick="goLastMonth(<?php echo $month.",".$year?>)"></td>
				<!-- On récupère le mois et l'année  en cours -->
				<td colspan='5' id="moiscalendrier"><?php echo $monthName." ".$year;?></td>
				<td>
					<input style="width:50px" type='button' value='>' name='nextbutton' onclick="goNextMonth(<?php echo $month.",".$year;?>)"></td>
			</tr>
			<tr id="jourscalendrier">
				<td width='150px'>Dim</td>
				<td width='150px'>Lun</td>
				<td width='150px'>Mar</td>
				<td width='150px'>Mer</td>
				<td width='150px'>Jeu</td>
				<td width='150px'>Ven</td>
				<td width='150px'>Sam</td>
			</tr>
			<?php 
			echo "<tr>";
			for($i=1; $i<$numDays+1; $i++, $counter++){

				$timeStamp = strtotime("$year-$month-$i");
				if($i == 1){
					$firstDay = date("w", $timeStamp);
					//mettre du blanc si ce n'est pas le pemier jour 	
					for($j = 0; $j < $firstDay; $j++, $counter++){
						echo"<td>&nbsp</td>";

					}
					
				}

				if($counter % 7 ==0){
					
					echo"</tr><tr>";
				}
				$monthstring = $month;
				$monthlength = strlen($monthstring);

				$daystring = $i;
				$daylength = strlen($daystring);
				if($monthlength <= 1){
					$monthstring = "0".$monthstring;
				}
				if($daylength <= 1){	
					$daystring = "0".$daystring;
				}
				$todaysDate = date("m/d/Y");
				$dateToCompare = $monthstring. '/'.$daystring.'/'.$year;
				$titre="";
				$edit="";
				$delete="";
				$k=0;
				foreach ($data as $donnees ) {
					?>
						<form method="POST" action="editevent.php">
							<?php
					   //var_dump($donnees['eventDate']);
					

					if (strcmp($dateToCompare,$donnees['eventDate']) == 0){
						//echo $donnees['title'];
	                   $titre=$donnees['title'].'<br>'.$donnees['detail'].'<br>'.$donnees['numero_event'].'<br>'.$donnees['type_personne'].'<br>'.$donnees['adresse_event'].'<br>'.$donnees['deroule_event'];
                        
						$edit='<a href="editevent.php?id='.$k.'">editer</a>';
						$delete='<a href="deleteEvent.php?id='.$k.'">supprimer</a>';

					}
					$k++;
				}
					
				echo "<td height = 100px><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a><br>".$titre."".$edit."".$delete."</td>";
			
				
			}

			echo"</tr>";
			?>
		</table>
	</form>
		<?php
			if(isset($_GET['v'])){
				/*si user selectionne une date on crée un liens AddEvent*/
				echo "<a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true'>Add Event</a>";

				if(isset($_GET['f'])){
					include ("eventform.php");
				}
			}

		?>

<script>
			function goLastMonth(month, year){
				if(month == 1){
					-- year;
					month = 13;
				}
				--month
				var monthstring= ""+month+"";
				var monthlength = monthstring.length;
				if(monthlength <= 1){
					monthstring = "0"+monthstring;
				}
				document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;				
			}
			function goNextMonth(month, year){
				if(month == 12){
					++year;
					month = 0
				}
				++month
				var monthstring=""+month+"";
				var monthlength = monthstring.length;
				if(monthlength <= 1){
					monthstring ="0"+monthstring;
				}
				document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
			
			}
		</script>
		
	</body>

</html>
<?php
}else{
	 header('Location:../../../index.php');
}
?>