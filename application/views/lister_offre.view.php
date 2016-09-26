
<body>

<div class="col-md-1"></div>
    <div class="col-md-10">
     <div class="panel panel-default">
         <div class="panel-heading">
             Liste des Offres
         </div>
        
      
        <?php
        defined('__GEST3IL__') or die('Acces interdit');
        Application::useHelper('offre_datagrid');
        $cdp = new Offre_DataGridHelper($this->data, array(array("titre" => "titre", "data" => "titre", "rendu" => "titreRenderer", "triable" => true),
            array("titre" => "Mission", "data" => "mission", "rendu" => "missionRenderer", "triable" => false),
            array("titre" => "profil", "data" => "prof", "rendu" => "profilRenderer", "triable" => false),
            array("titre" => "periode", "data" => "periode", "rendu" => "periodeRenderer", "triable" => false),
             array("titre" => "Convention", "data" => "convention", "rendu" => "conventionRenderer", "triable" => false),
             array("titre" => "date d'ajout", "data" => "datePubli", "rendu" => "datepubRenderer", "triable" => true),
            array("titre" => "Modifier/supprimer", "data" => "Modifier/supprimer", "rendu" => "commandesRenderer")));
        ?>
        
        <?php $cdp->afficher(); ?>
        <form  id="commande-form" method="post">
            <input type="hidden" name="id" id="id">
        </form>
        <?php if (Message::hasMessage()): ?>
            <div class="message">
                <p><?php echo Message::retirer(); ?></p>
            </div>
            <?php
        endif;
        ?>

       <a href="?controller=offre&action=ajouter"><button class="btn" title='Ajouter'>Ajouter une offre</button></a>  
    </div>
    </div>
</body>