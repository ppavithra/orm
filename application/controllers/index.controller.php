<?php
    defined('__GEST3IL__') or die('Acces interdit');
   class IndexController extends Controller{
       /**
        * constructeur
        */
       public function __construct() {
           $this->setActionParDefaut("index");
       }
       /**
        * affiche la page d'accueil
        */
       public function indexAction(){
           $page=Application::getPage();
           $page->setTemplate('application');
           $page->setVue('index');
           //$page->ajouterCSS("index");
           
       }
   }

