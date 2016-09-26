<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>Intranet</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../styles/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../styles/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../application/templates/styles/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>       
	</head>
	<body>
        
        <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>-->
                
                <a class="navbar-brand" href="../../../../admin/index.php"><img src="../images/lemonlogo.png" class="nav-image" align="center"/></a> 
            </div>
            
            <div id="servicelemon"><img src="../images/servicelogo.png" alt></div> 
                
            <div id="directlemon"><img src="../images/directlogo.png" alt></div>
        </nav>
         
         <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../images/find_user.png" class="user-image img-responsive"/>
                    <!--<span id="nomutilisateur"><?php //echo $_SESSION['NOMS']?></span><br>-->
					</li>
							
                   <br><br>
            
                </ul>
               <br/><br/>




            </div>
            
        </nav> 
         <nav id="troisiemenav"><div class="navoriginale"><span class="navispan"><a href="/admin/application/templates/fichier/intra.php">Dossier</a></span>
    <span class="navispan"><a href="/admin/application/templates/Contrat/list_hote_model.php">Annuaire</a></span>
    <span class="navispan"><a href="/admin/application/templates/clients/list_client_model.php">Client</a></span>
    <span class="navispan"><a href="/admin/application/templates/event/liste_event.php">SNAP Event</a></span>
    <span class="navispan"><a href="/admin/application/templates/factures/facture.php">Facture</a></span>
    <span class="navispan"><a href="/admin/application/templates/prestation/">Prestation</a></span>
    <span class="navispan"><a href="/admin/application/templates/comptabilite">Comptabilité</a></span>
    <span class="navispan"><a href="../../../../admin/index.php?controller=user&action=deconnecter">Se déconnecter</a></span></div>

<!--<div class="navburger">
    <span class="navispan"><a href="/admin/application/templates/fichier/intra.php">Dossier</a></span>
    <span class="navispan"><a href="/admin/application/templates/Contrat/list_hote_model.php">Annuaire</a></span>
    <span class="navispan"><a href="/admin/application/templates/clients/list_client_model.php">Client</a></span>
    <span class="navispan"><a href="/admin/application/templates/event/liste_event.php">SNAP Event</a></span>
    <span class="navispan"><a href="/admin/application/templates/factures/facture.php">Facture</a></span>
    <span class="navispan"><a href="/admin/application/templates/prestation/">Prestation</a></span>
    <span class="navispan"><a href="/admin/application/templates/comptabilite">Comptabilité</a></span>
    <span class="navispan"><a href="../../../../admin/index.php?controller=user&action=deconnecter">Se déconnecter</a></span>
</div>

<button type="button" id="burger">
    <span></span>
    <span></span>
    <span></span>
</button></nav>
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script></script>
<script>
$(function(){
    $('#burger').on('click', function(){
        if($('.navburger').is(':hidden')){
            $('.navburger').css('display','block');
            $('#troisiemenav').css('height','0px');
        }else{
            $('.navburger').css('display','none');  
        }
    });
});
</script>--></nav>
</div>
        <div id="contenuclients">