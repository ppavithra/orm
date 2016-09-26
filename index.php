<?php
    define('__GEST3IL__','');
    require_once 'framework/application.php';
    
    $application=Application::getInstance('application/configuration.ini');
    $application->utiliserAuthentification();
    
    if(Authentification::estConnecte()){
        $application->setControleurParDefaut('index');
    }
    else{
        $application->setControleurParDefaut('user');
    }     
   
    $application->executer();
?>
<?php

//echo "lol";
