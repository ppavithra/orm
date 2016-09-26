<?php 
session_start();
if($_SESSION['NOMS']){
    require "../navi.php";
 ?>

<h1 id="grostitre">Comptabilité</h1><br><br>

<button class="boutonajoutprestation" type="submit" value="valider" onclick="redirect()">Ajouter à la Comptabilité</button><br><br>

 <!--     <script language="javascript">

    function conf()
    {
        var oui = confirm('choisissez ok ou annuler');

        if(oui == true)
        {
            document.getElementById("change_confirm").style.color='#000000';
            document.getElementById("change_confirm").style.background='red';
        }
        if(oui == false){
            document.getElementById("change_confirm").style.color='#000000';
            document.getElementById("change_confirm").style.background='#ffffff';

        }
    }
    function conf1()
    {
        var oui = confirm('choisissez ok ou annuler');
12
        if(oui == true)
        {
            document.getElementById("change_confirm1").style.color='#000000';
            document.getElementById("change_confirm1").style.background='green';
        }
        if(oui == false){
            document.getElementById("change_confirm1").style.color='#000000';
            document.getElementById("change_confirm1").style.background='#ffffff';

        }
    }
    function conf2()
    {
        var oui = confirm('choisissez ok ou annuler');

        if(oui == true)
        {
            document.getElementById("change_confirm2").style.color='#000000';
            document.getElementById("change_confirm2").style.background='orange';
        }
        if(oui == false){
            document.getElementById("change_confirm2").style.color='#000000';
            document.getElementById("change_confirm2").style.background='#ffffff';

        }
    }
    </script> -->

    </head>
        <body>
            <?php
            $bdd = new PDO('mysql:dbname=directlemon_bd;host=olemon.co','root','Wascac33');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'SELECT * FROM compta';
            $req = $bdd->query($sql);
            $i = 0;
            while ($r = $req ->fetch()){      
            echo'<form method = "POST" action="">';
            echo'<div id="clientstableau" width=20% height=1% border=1>';
			//echo '<span class="nomclient">Facture N°'.'000'.'</span><br><br>';
            echo '<span class="nomclient">Facture N°'.$r['Client'].'</span><br>';
            echo '<span class="nomclient">'.'Client'.'</span><br><br>';
            echo '<span class="emailclient">HT : '.'00,00'.'€</span><br>';
            echo '<span class="emailclient">TVA : '.'00,00'.'€</span><br>';
            echo '<span class="emailclient">TTC : '.'00,00'.'€</span><br><br>';
			echo '<span class="emailclient">'.$r['Date'].'</span><br><br>';
			?>
			<?php 
            //echo'<table border="1" style="width:100%">';
            // id de la ligne de chaque données
            /*echo '<tr> id='.$i;*/
            /*echo'<tr>';
            echo'<th>';                 
            echo'date';
            echo'</th>';
            echo'<th>';
            echo'Client';
            echo'</th>';
            echo'<th>';
            echo'HT';
            echo'</th>';
            echo'<th>';
            echo'TVA';
            echo'</th>';
            echo'<th>';
            echo'TTC';
            echo'</th>';
            echo'<th>';
            echo'No Facture';
            echo'</th>';
            echo'<th colspan =2>';
            echo'Etat';
            echo'</th>';
            echo'</tr>';
            echo'<tr>';  
            $row = date_create($r['Date']);
            $date =date_format($row, 'd/m/Y');    
            echo'<td>   <input type="text" id="date" width=33% value='.$date.' readOnly="true"></td>';
            echo'<td>  <input type="text" id="client" width=33% value='.$r['Client'].' readOnly="true"></td>';      
            echo'<td>';
            echo'ligne1';
            echo'</td>';
            echo'<td>';                        
            echo'</td>';
            echo'<td>';
            echo'ligne 1';
            echo'</td>';
            echo'<td>';
            echo'ligne 1';
            echo'</td>';           
            echo '<input type=hidden name="id" value ='.$i.' >'; 
            echo '<td><input  type="hidden" id="etat"name="etat" width=33% value='.$r['etat'].' readOnly="true">';  */                 
    ?>
    <?php
        //echo '<input class="boutoneditsupprgene" type="hidden" id="etat" name="etat" width=33% value='.$r['etat'].' readOnly="true">';
        change($r['etat']);
    ?> 
    <button  onclick="document.location.href='etat.php?id=<?php  echo $i; ?>'"type="button" name="etat" class="boutoneditsupprgene" value="en attente">modifier</button>


               <?php
                 echo '</div>';
			     echo '</form>';
               //echo'</td>';
        /*                    echo '<input type=hidden name="id" value ='.$i.' >';
                            echo '<td><input type="submit" name="encaisse"  readOnly="true" value="encaissé">';
                            var_dump($i);
                            echo'</td>';*/
                                           
            //echo '<input type=hidden name="id" value ='.$i.' >'; 
            /*var_dump($i);*/
            /*echo'</td>';                       
            echo'</tr>';
            echo'</table>';
            echo'</form>'; 
            echo'<br>'; */ 
            $i++;
            }
    ?>

            <?php
          function change($r){
                       if($r == ('paye')){
                echo'<b><font color="green">'.$r.'</font></b>';
            }
            elseif($r ==('attente')){
                echo'<b><font color="red">'.$r.'</font></b>';

            }
            elseif($r == ('partielle')){
                echo'<b><font color="orange">'.$r.'</font></b>';
            }

          }
 
            ?>

</form>
        </div>

<script>
function redirect()
{
    window.location.href="edit.compte.php";
}
</script>
        <?php        
        $req2 = $bdd->query('SELECT * FROM compta');
        $data = $req2 -> fetchAll();
        $_SESSION['data'] = $data; 


        // recuperer dans une autre page     
/*$data1 =  $_SESSION['data '];*/
/*$data1[$_POST['id']]['nom_hote']['prenom_hote'];*/
        ?>
       
        </body>
    </html>

            
<?php
}else{
     header('Location:../../../index.php');
}
?>