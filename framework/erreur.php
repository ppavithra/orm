<?php
   defined('__FRAMEWORK3IL__') or die('Acces interdit');
    class Erreur extends Exception{
        /**
         * constructeur de Erreur
         * @param type $message
         */
        public function __construct($message) {
            parent::__construct($message);
        }
        /**
         * methode magique
         */
        public function __toString(){
           
            $config=  Configuration::getInstance('application/configuration.ini');
            
            if($config->debug==1){
                require_once 'framework/erreur_debug.php';
            }else{
                require_once 'framework/erreur_production.php';
            }
            die();
        }
    }

