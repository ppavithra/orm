
<body>

<div class="col-md-1"></div>
    <div class="col-md-10">
     <div class="panel panel-default">
         <div class="panel-heading">
             Liste des Adminstrateurs
         </div>
        
      
        <?php
        defined('__GEST3IL__') or die('Acces interdit');
        Application::useHelper('admin_datagrid');
        $cdp = new Admin_DataGridHelper($this->data, array(array("titre" => "Login", "data" => "login", "rendu" => "loginRenderer", "triable" => true),
            array("titre" => "Creation", "data" => "creation", "rendu" => "dateCreRenderer", "triable" => true),
            array("titre" => "Derniere connexion", "data" => "last_connect", "rendu" => "lastConRenderer", "triable" => true),
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

       <a href="?controller=user&action=ajouter"><button class="btn" title='Ajouter'>Ajouter un compte</button></a>  
    </div>
    </div>
</body>