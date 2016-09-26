<?php
    defined('__GEST3IL__') or die('Acces interdit');
    Application::useHelper('navigation');
    $bdd = new PDO('mysql:host=localhost;dbname=directlemon_bd','root','Wascac33');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Intranet</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="styles/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="styles/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="styles/custom.css" rel="stylesheet" />
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
                <a class="navbar-brand" href="index.php"><img src="images/lemonlogo.png" class="nav-image" align="center"/></a> 
            </div>
            
            <div id="servicelemon"><img src="images/servicelogo.png" alt></div> 
                
            <div id="directlemon"><img src="images/directlogo.png" alt></div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="images/find_user.png" class="user-image img-responsive"/>
                    <span id="nomutilisateur"><?php echo $_SESSION['NOMS']?></span><br>
					</li>
					
                    <!--<?php //NavigationHelper::afficher();?>-->		
                   <br><br>
                    <div style="font-size: 16px; text-align: center;"> Dernière connexion :<br> <?php  echo $_SESSION['LAST'];?> <br><br> <!--<a href="?controller=user&action=deconnecter" class="btn btn-danger square-btn-adjust">Se deconnecter</a>--> </div>
            
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
</div>--></nav>
        <div id="contenuclients">
        
        <!-- /. NAV SIDE  -->
        <!--<a href ="./application/templates/clients/ajouter_client.php">ajouter un client</a>
                        <a href ="./application/templates/Contrat/list_hote_model.php">contrat  client</a>
                        <a href ="./application/templates/event/liste_event.php">event client</a>
                        <a href ="./application/templates/fichier/intra.php">fichier client</a>
                        <a href ="./application/templates/prestation/prestation_hotesse.php">prestation hotesse</a>
                        <a href ="./application/templates/droit/liste_user.php">droit user</a>-->
        <div id="page-wrapper" >
            <div id="page-inner">
                      
                <h5 id="titrecontrat">Agenda</h5>
                <hr>
                <p>
                    <?php
                   $messages = array();
                $recup_message = $bdd->query("SELECT * FROM eventcalender ORDER BY eventDate ASC");

                while($all = $recup_message->fetch())
                {
                    $messages[]=$all;

                }
                foreach ($messages as $message) {
                    ?>

                    <p><?php echo $_SESSION['NOMS'].' '. $message['title'].' '.$message['detail']; ?></p>
                        <?php
                }
                ?>
                </p>
                <br>
                <a href="/admin/application/templates/basiccalendar/calendar.php">Voir le Calendrier</a>
                 
            </div>
            
            <div id="page-inner">
                      
                <h5 id="titrecontrat">Notes</h5>
                <a href="/admin/application/templates/notes/note.php">Ajouer notes</a>
                <?php
                

                $messages = array();
                $recup_message = $bdd->query("SELECT * FROM notes ORDER BY id DESC");

                while($all = $recup_message->fetch())
                {
                    $messages[]=$all;

                }
                foreach ($messages as $message) {
                    ?>

                    <p><?php echo $_SESSION['NOMS'].' '. $message['commentaires'].' '.$today = date("d.m.y"); ?></p>
                        <?php
                }
                ?>

                

                 
            </div>
             <!-- /. PAGE INNER  -->
        </div></div>
         <!-- /. PAGE WRAPPER  -->
        <div style="clear: both"></div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="javascript/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="javascript/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="javascript/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="javascript/custom.js"></script>
    <!--<?php page::inclureJs();?>-->


</body>

<!-- Mirrored from binarycart.com/bclivedemos/01-05-2014/v1/bs-binary-admin/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jan 2015 19:05:35 GMT -->
</html>


