<?php 
session_start();
if($_SESSION['NOMS']){
    require "../navi.php";
 ?>
<h1 id="grostitre">Créer une Factures</h1>

    <script language="JavaScript">
        var intRowIndex = 1;
        function insertRow(tbIndex) {
            if (document.myForm.myCell0.value.length == 0 || document.myForm.myCell1.value.length == 0
                || document.myForm.myCell2.value.length == 0 || document.myForm.myCell3.value.length == 0
                || document.myForm.myCell4.value.length == 0) {
                alert("Please input all information!");
                return;
            }
            var objRow = myTable.insertRow(tbIndex);
            var objCel = objRow.insertCell(0);
            var designation = document.myForm.myCell0.value;
            objCel.innerText = designation;
            objCel.setAttribute("name", "DESIGNATION");
            var objCel = objRow.insertCell(1);
            var horaires = document.myForm.myCell1.value;
            objCel.innerHTML = horaires;
            objCel.setAttribute("name", "HORAIRES");
            var objCel = objRow.insertCell(2);
            var nombre = document.myForm.myCell2.value;
            objCel.innerHTML = nombre;
            objCel.setAttribute("name", "NOMBREDEJOURS");
            var objCel = objRow.insertCell(3);
            var quantite = document.myForm.myCell3.value;
            objCel.innerHTML = quantite;
            objCel.setAttribute("name", "QUANTITE");
            var objCel = objRow.insertCell(4);
            var tarif = document.myForm.myCell4.value;
            objCel.innerHTML = tarif;
            objCel.setAttribute("name", "TARIF");
            var objCel = objRow.insertCell(5);
            var sum = quantite * tarif;
            objCel.innerHTML = "<input id=\"TARIFSUM\" name=\"TARIFSUM\" value=\"" + sum + "\">";
            var objCel = objRow.insertCell(6);
            objCel.setAttribute("class", "noprint");
            objCel.innerHTML = "<input class=\"noprint\" type=\"button\" value=\"Supprimer Ligne\" onclick=\"deleteRow(this)\">";
        }
        function sum(tbIndex) {
            if (!document.getElementById("TARIFSUM")) {
                alert("Please input some item!");
                return;
            }
            
            var objRow = myTable.insertRow(tbIndex);
            objRow.setAttribute("id", "sum");

            var objCel = objRow.insertCell(0);
            objCel.colSpan = "5";
            objCel.innerText = "TOTAL HT";
            var objCel = objRow.insertCell(1);
            var val = 0;
            var sums = document.getElementsByName("TARIFSUM");
            for (var i = 0; i < sums.length; i++) {

                val += Number(sums[i].value);
            }
            if (document.getElementById("TAXI")) {
                val += Number(document.getElementById("TAXI").value);
            }
            if (document.getElementById("REPAS")) {
                val += Number(document.getElementById("REPAS").value);
            }

            objCel.innerHTML = "<input id=\"HT\" name=\"HT\" value=\"" + val + "\">";
            //objCel.innerText = val;
            var objCel = objRow.insertCell(2);
            objCel.setAttribute("class", "noprint");
            objCel.innerHTML = "<input class=\"noprint\" type=\"button\" value=\"Supprimer Ligne\" onclick=\"deleteRow(this)\">";
        }
        function tva(tbIndex) {
            if (!document.getElementById("HT")) {
                alert("Please choose sum first!");
                return;
            }
            var objRow = myTable.insertRow(tbIndex);
            objRow.setAttribute("id", "sum");
            var objCel = objRow.insertCell(0);
            objCel.colSpan = "5";
            objCel.innerText = "TVA";
            var objCel = objRow.insertCell(1);
            var val = Number(document.getElementById("HT").value);
            var tva = val * 0.2
            objCel.innerHTML = "<input id=\"TVA\" name=\"TVA\" value=\"" + tva + "\">";
            //objCel.innerText = val;
            var objCel = objRow.insertCell(2);
            objCel.setAttribute("class", "noprint");
            objCel.innerHTML = "<input class=\"noprint\" type=\"button\" value=\"Supprimer Ligne\" onclick=\"deleteRow(this)\">";
        }
        function ttc(tbIndex) {
            if (!document.getElementById("HT")) {
                alert("Please choose sum first!");
                return;
            }
            if (!document.getElementById("TVA")) {
                alert("Please choose tva first!");
                return;
            }
            var objRow = myTable.insertRow(tbIndex);
            objRow.setAttribute("id", "sum");
            var objCel = objRow.insertCell(0);
            objCel.colSpan = "5";
            objCel.innerText = "TTC";
            var objCel = objRow.insertCell(1);
            var val = Number(document.getElementById("HT").value);
            var tva = val * 0.2;
            var ttc = val + tva;
            objCel.innerHTML = "<input id=\"TTC\" name=\"TTC\" value=\"" + ttc + "\">";
            //objCel.innerText = val;
            var objCel = objRow.insertCell(2);
            objCel.setAttribute("class", "noprint");
            objCel.innerHTML = "<input class=\"noprint\" type=\"button\" value=\"Supprimer Ligne\" onclick=\"deleteRow(this)\">";

        }
        function addRepas(tbIndex) {
            if (document.myForm.repas.value.length == 0) {
                alert("Please input repas!");
                return;
            }
            var objRow = myTable.insertRow(tbIndex);
            var objCel = objRow.insertCell(0);
            objCel.colSpan = "5";
            objCel.innerText = "Repas";
            var objCel = objRow.insertCell(1);
            var repas = document.myForm.repas.value;
            objCel.innerHTML = "<input id=\"REPAS\" name=\"REPAS\" value=\"" + repas + "\">";
            var objCel = objRow.insertCell(2);
            objCel.setAttribute("class", "noprint");
            objCel.innerHTML = "<input class=\"noprint\" type=\"button\" value=\"Supprimer Ligne\" onclick=\"deleteRow(this)\">";
        }
        function addTaxi(tbIndex) {
            if (document.myForm.taxi.value.length == 0) {
                alert("Please input taxi!");
                return;
            }
            var objRow = myTable.insertRow(tbIndex);
            var objCel = objRow.insertCell(0);
            objCel.colSpan = "5";
            objCel.innerText = "Taxi";
            var objCel = objRow.insertCell(1);
            var taxi = document.myForm.taxi.value;
            objCel.innerHTML = "<input id=\"TAXI\" name=\"TAXI\" value=\"" + taxi + "\">";
            var objCel = objRow.insertCell(2);
            objCel.setAttribute("class", "noprint");
            objCel.innerHTML = "<input class=\"noprint\" type=\"button\" value=\"Supprimer Ligne\" onclick=\"deleteRow(this)\">";
        }
        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex
            document.getElementById('myTable').deleteRow(i);
        }
        /*
         function setJSON() {
         var designation
         document.getElementsByName("DESIGNATION")[0].value
         }
         */
    </script>

<br><br>
<form name="myForm" method="post" action="">
    
    <table id="myTable" border=1 class="tableaufacture">
        <thead>
        <tr>
            <th>Designation</th>
            <th>Horaires</th>
            <th>Nombre de jours</th>
            <th>Quantité</th>
            <th>Tarif unitaire HT</th>
            <th>Total HT</th>
        </tr>
        </thead>
    </table>
    <br><br>
    
<div id="gauchefacture"><div class="facstableau">
    <!--<div class="noprint">-->
        <div><span class="titretable">Designation :</span> <input class="noprint inputtableau2" type="text" name="myCell0"></div><br>
       <div><span class="titretable">Horaires :</span> <input class="noprint inputtableau2" type="text" name="myCell1"></div><br>
        <div><span class="titretable">Nombre de jours :</span> <input class="noprint inputtableau2" type="text" name="myCell2"></div><br>
        <div><span class="titretable">Quantité :</span> <input type="text" class="inputtableau2" name="myCell3"></div><br>
        <div><span class="titretable">Tarif unitaire HT :</span> <input type="text" class="inputtableau2" name="myCell4"></div><br>
        <div><span class="titretable">Repas :</span> <input type="text" class="inputtableau2" name="repas"></div><br>
    <div><span class="titretable">Taxi :</span> <input type="text" class="inputtableau2" name="taxi"></div><!--</div>--></div></div>
    <div id="droitefacture"><div class="facstableau"><!--<div class="noprint">-->
        <input type="button" class="boutoneditsupprgene" onclick="insertRow(myTable.rows.length);" value="Ajouter"><br>
        <input type="button" class="boutoneditsupprgene" onclick="addRepas(myTable.rows.length);" value="Ajouter Repas"> 
        <input type="button" class="boutoneditsupprgene" onclick="addTaxi(myTable.rows.length);" value="Ajouter Taxi"><br>
        <input type="button" class="boutoneditsupprgene" onclick="sum(myTable.rows.length);" value="Total HT"><br>
        <input type="button" class="boutoneditsupprgene" onclick="tva(myTable.rows.length);" value="TVA">
        <input type="button" class="boutoneditsupprgene" onclick="ttc(myTable.rows.length);" value="TTC">
        <!-- <input value="Submit" name="submit" type="submit" onclick="setJSON();"> -->
    <!--</div>
    <style type="text/css" media=print>
        .noprint {
            display: none
        }
    </style>-->
</div>
    
    <input id="btnPrint" class="boutonajoutprestation" style="display: inline-block;" type="button" value="Imprimer" onclick="javascript:window.print();"></div>
    
</form>
</body>
</html>

<!-- < ? php

$action = $_POST["submit"];
$HT = $_POST["HT"];
$TVA = $_POST["TVA"];
$TTC = $_POST["TTC"];
$TAXI = $_POST["TAXI"];
$REPAS = $_POST["REPAS"];

if ($action == "Submit") {
    //CREATE NEW BID FOR AN INVOICE(facture) with a function
    $bid = 99; //DEFAULT VALUE
    $bdd = new PDO('mysql:dbname=facture;host=localhost', 'root', '123456');
    $result = $bdd->prepare(
        'INSERT INTO facture_total(bid, HT, TVA, TTC, TAXI, REPAS) VALUES (:bid , :HT, :TVA, :TTC, :TAXI, :REPAS)'<html>
<head>
    <title>DEMO</title>
    <script language="JavaScript">
        var intRowIndex = 1;
        function insertRow(tbIndex) {
            if (document.myForm.myCell0.value.length == 0 || document.myForm.myCell1.value.length == 0
                || document.myForm.myCell2.value.length == 0 || document.myForm.myCell3.value.length == 0
                || document.myForm.myCell4.value.length == 0) {
                alert("Please input all information!");
                return;
            }
            var objRow = myTable.insertRow(tbIndex);
            var objCel = objRow.insertCell(0);
            var designation = document.myForm.myCell0.value;
            objCel.innerText = designation;
            objCel.setAttribute("name", "DESIGNATION");
            var objCel = objRow.insertCell(1);
            var horaires = document.myForm.myCell1.value;
            objCel.innerHTML = horaires;
            objCel.setAttribute("name", "HORAIRES");
            var objCel = objRow.insertCell(2);
            var nombre = document.myForm.myCell2.value;
            objCel.innerHTML = nombre;
            objCel.setAttribute("name", "NOMBREDEJOURS");
            var objCel = objRow.insertCell(3);
            var quantite = document.myForm.myCell3.value;
            objCel.innerHTML = quantite;
            objCel.setAttribute("name", "QUANTITE");
            var objCel = objRow.insertCell(4);
            var tarif = document.myForm.myCell4.value;
            objCel.innerHTML = tarif;
            objCel.setAttribute("name", "TARIF");
            var objCel = objRow.insertCell(5);
            var sum = quantite * tarif;
            objCel.innerHTML = "<input id=\"TARIFSUM\" name=\"TARIFSUM\" value=\"" + sum + "\">";
            var objCel = objRow.insertCell(6);
            objCel.setAttribute("class", "noprint");
            objCel.innerHTML = "<input class=\"noprint\" type=\"button\" value=\"DEL\" onclick=\"deleteRow(this)\">";
        }
        function sum(tbIndex) {
            if (!document.getElementById("TARIFSUM")) {
                alert("Please input some item!");
                return;
            }
            var objRow = myTable.insertRow(tbIndex);
            objRow.setAttribute("id", "sum");

            var objCel = objRow.insertCell(0);
            objCel.colSpan = "5";
            objCel.innerText = "TOTAL HT";
            var objCel = objRow.insertCell(1);
            var val = 0;
            var sums = document.getElementsByName("TARIFSUM");
            for (var i = 0; i < sums.length; i++) {

                val += Number(sums[i].value);
            }
            if (document.getElementById("TAXI")) {
                val += Number(document.getElementById("TAXI").value);
            }
            if (document.getElementById("REPAS")) {
                val += Number(document.getElementById("REPAS").value);
            }

            objCel.innerHTML = "<input id=\"HT\" name=\"HT\" value=\"" + val + "\">";
            //objCel.innerText = val;
            var objCel = objRow.insertCell(2);
            objCel.setAttribute("class", "noprint");
            objCel.innerHTML = "<input class=\"noprint\" type=\"button\" value=\"DEL\" onclick=\"deleteRow(this)\">";
        }
        function tva(tbIndex) {
            if (!document.getElementById("HT")) {
                alert("Please choose sum first!");
                return;
            }
            var objRow = myTable.insertRow(tbIndex);
            objRow.setAttribute("id", "sum");
            var objCel = objRow.insertCell(0);
            objCel.colSpan = "5";
            objCel.innerText = "TVA";
            var objCel = objRow.insertCell(1);
            var val = Number(document.getElementById("HT").value);
            var tva = val * 0.2
            objCel.innerHTML = "<input id=\"TVA\" name=\"TVA\" value=\"" + tva + "\">";
            //objCel.innerText = val;
            var objCel = objRow.insertCell(2);
            objCel.setAttribute("class", "noprint");
            objCel.innerHTML = "<input class=\"noprint\" type=\"button\" value=\"DEL\" onclick=\"deleteRow(this)\">";
        }
        function ttc(tbIndex) {
            if (!document.getElementById("HT")) {
                alert("Please choose sum first!");
                return;
            }
            if (!document.getElementById("TVA")) {
                alert("Please choose tva first!");
                return;
            }
            var objRow = myTable.insertRow(tbIndex);
            objRow.setAttribute("id", "sum");
            var objCel = objRow.insertCell(0);
            objCel.colSpan = "5";
            objCel.innerText = "TTC";
            var objCel = objRow.insertCell(1);
            var val = Number(document.getElementById("HT").value);
            var tva = val * 0.2;
            var ttc = val + tva;
            objCel.innerHTML = "<input id=\"TTC\" name=\"TTC\" value=\"" + ttc + "\">";
            //objCel.innerText = val;
            var objCel = objRow.insertCell(2);
            objCel.setAttribute("class", "noprint");
            objCel.innerHTML = "<input class=\"noprint\" type=\"button\" value=\"DEL\" onclick=\"deleteRow(this)\">";

        }
        function addRepas(tbIndex) {
            if (document.myForm.repas.value.length == 0) {
                alert("Please input repas!");
                return;
            }
            var objRow = myTable.insertRow(tbIndex);
            var objCel = objRow.insertCell(0);
            objCel.colSpan = "5";
            objCel.innerText = "Repas";
            var objCel = objRow.insertCell(1);
            var repas = document.myForm.repas.value;
            objCel.innerHTML = "<input id=\"REPAS\" name=\"REPAS\" value=\"" + repas + "\">";
            var objCel = objRow.insertCell(2);
            objCel.setAttribute("class", "noprint");
            objCel.innerHTML = "<input class=\"noprint\" type=\"button\" value=\"DEL\" onclick=\"deleteRow(this)\">";
        }
        function addTaxi(tbIndex) {
            if (document.myForm.taxi.value.length == 0) {
                alert("Please input taxi!");
                return;
            }
            var objRow = myTable.insertRow(tbIndex);
            var objCel = objRow.insertCell(0);
            objCel.colSpan = "5";
            objCel.innerText = "Taxi";
            var objCel = objRow.insertCell(1);
            var taxi = document.myForm.taxi.value;
            objCel.innerHTML = "<input id=\"TAXI\" name=\"TAXI\" value=\"" + taxi + "\">";
            var objCel = objRow.insertCell(2);
            objCel.setAttribute("class", "noprint");
            objCel.innerHTML = "<input class=\"noprint\" type=\"button\" value=\"DEL\" onclick=\"deleteRow(this)\">";
        }
        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex
            document.getElementById('myTable').deleteRow(i);
        }
        /*
         function setJSON() {
         var designation
         document.getElementsByName("DESIGNATION")[0].value
         }
         */
    </script>
</head>
<body>
<h2>DEMO</h2>
<hr>

<form name="myForm" method="post" action="">
    <table id="myTable" border=1>
        <thead>
        <tr>
            <th>Designation</th>
            <th>Horaires</th>
            <th>Nombre de jours</th>
            <th>Quantité</th>
            <th>Tarif unitaire HT</th>
            <th>Total HT</th>
        </tr>
        </thead>
    </table>
    <div class="noprint">
        Designation : <input class="noprint" type="text" name="myCell0"><br>
        Horaires : <input class="noprint" type="text" name="myCell1"><br>
        Nombre de jours : <input class="noprint" type="text" name="myCell2"><br>
        Quantité : <input type="text" name="myCell3"><br>
        Tarif unitaire HT : <input type="text" name="myCell4"><br>
        Repas : <input type="text" name="repas"><br>
        Taxi : <input type="text" name="taxi"><br>
        <input type="button" onclick="insertRow(myTable.rows.length);" value="Add new">
        <input type="button" onclick="sum(myTable.rows.length);" value="Sum">
        <input type="button" onclick="tva(myTable.rows.length);" value="TVA">
        <input type="button" onclick="ttc(myTable.rows.length);" value="TTC">
        <input type="button" onclick="addRepas(myTable.rows.length);" value="Add repas">
        <input type="button" onclick="addTaxi(myTable.rows.length);" value="Add taxi">
        <!-- <input value="Submit" name="submit" type="submit" onclick="setJSON();"> 
        <input id="btnPrint" type="button" value="Imprimer" onclick="javascript:window.print();">
    </div>
    <style type="text/css" media=print>
        .noprint {
            display: none
        }
    </style>
</form>
</body>
</html>-->

<!-- < ? php

$action = $_POST["submit"];
$HT = $_POST["HT"];
$TVA = $_POST["TVA"];
$TTC = $_POST["TTC"];
$TAXI = $_POST["TAXI"];
$REPAS = $_POST["REPAS"];

if ($action == "Submit") {
    //CREATE NEW BID FOR AN INVOICE(facture) with a function
    $bid = 99; //DEFAULT VALUE
    $bdd = new PDO('mysql:dbname=facture;host=localhost', 'root', '123456');
    $result = $bdd->prepare(
        'INSERT INTO facture_total(bid, HT, TVA, TTC, TAXI, REPAS) VALUES (:bid , :HT, :TVA, :TTC, :TAXI, :REPAS)'
    );
    $result->execute(
        array(
            'bid' => $bid,
            'HT' => $HT,
            'TVA' => $TVA,
            'TTC' => $TTC,
            'TAXI' => $TAXI,
            'REPAS' => $REPAS
        )
    );

    ?>
  <script type="text/javascript">
        /*var designations = new Array();
         var temp = document.getElementsByName("DESIGNATION");
         for(var i = 0; i < temp.length; i++){
         designations[i] = temp[i].value;

         }*/
        var str = designations.length/*designations.join('|')*/;
        location.href = 'test2.php?str=' + str;
    </script>
< ? php

}

? > -->
    <!-- );
    $result->execute(
        array(
            'bid' => $bid,
            'HT' => $HT,
            'TVA' => $TVA,
            'TTC' => $TTC,
            'TAXI' => $TAXI,
            'REPAS' => $REPAS
        )
    );

    ?> -->
  <script type="text/javascript">
        /*var designations = new Array();
         var temp = document.getElementsByName("DESIGNATION");
         for(var i = 0; i < temp.length; i++){
         designations[i] = temp[i].value;

         }*/
        var str = designations.length/*designations.join('|')*/;
        location.href = 'test2.php?str=' + str;
    </script>
<!-- < ? php

}

? > --> 
<?php
}else{
     header('Location:../../../index.php');
}
?>