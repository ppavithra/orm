<?php
    defined('__GEST3IL__') or die('Acces interdit');
  class ErreurController extends Controller{
      /**
       * constructeur 
       */
        public function __construct() {
            $this->setActionParDefaut("erreur");
        }
        /**
         * definit la configuration de l'affichage d'une  page erreur
         */
        public function erreurAction(){
           $page=Application::getPage();
            $page->setTemplate('application');
            $page->setVue('erreur'); 
            $page->message=Message::retirer();
         }
    
  }

