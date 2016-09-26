<?php
    defined('__FRAMEWORK3IL__') or die('Acces interdit');
     class Page{
        private static $_instance=null;
        protected $vue=null;
        protected $template=null;
        protected $CSS=array();
        protected $script=array();
        public $formMessage="";
        private function __construct(){
        }
        /**
         * retourne l'instance de Page
         * @return Page
         */
        public static function getInstance(){
            if(is_null(self::$_instance)){
                self::$_instance=new Page();
            }
            return self::$_instance;
        }
        /**
         * definit la vue 
         * @param string $fichier
         * @throws Erreur
         */
        public function setVue($fichier){
            $fichier='application/views/'.$fichier.'.view.php';
            if (is_readable($fichier)){
                $this->vue=$fichier;
            }else{
                throw new Erreur('fichier de vue inexistant');
            }
        }
        /**
         * definit le template
         * @param string $fichier
         * @throws Erreur
         */
         public function setTemplate($fichier){
            $fichier='application/templates/'.$fichier.'.template.php';
            if (is_readable($fichier)){
                $this->template=$fichier;
            }else{
                throw new Erreur('fichier de template inexistant');
            }
        }
        /**
         * affiche le template 
         * @throws Erreur
         */
        public static function afficher(){
            if(empty(self::$_instance->template)){
                 throw new Erreur('template non renseigné');
            }else{
                require_once self::$_instance->template;
            }
        } 
        /**
         * insere la vue
         */
        private function insererVue(){
            require_once $this->vue;
        }
        /**
         * affiche la vue 
         * @throws Erreur
         */
        public static function afficherVue(){
             if(empty(self::$_instance->vue)){
                 throw new Erreur('vue non renseignée');
            }else{
               self::$_instance->insererVue();
            }
        }
        /**
         * ajoute un fichier css
         * @param string $fichier
         * @throws Erreur
         */
        public function ajouterCSS($fichier=""){
            $fichier="styles/".$fichier.".css";
            if(file_exists($fichier)){
                $this->CSS[]=$fichier;
            }
            else{
                throw new Erreur("fichier ".$fichier."inexistant");
            }
        }
        /**
         * ajoute la balise d'insertion d'un fichier css
         */
        public static function enteteCSS(){
            foreach (self::$_instance->CSS as $fich){
                echo '<link rel="stylesheet" type="text/css" href="'.$fich.'">';
            }
        }
        /**
         * ajoute un script javascript à $script
         * @param string $fichier
         * @throws Erreur
         */
        public function ajouterScript($fichier=""){
            $fichier="javascript/".$fichier.".js";
            if(file_exists($fichier)){
                $this->script[]=$fichier;
            }
            else{
                throw new Erreur("fichier ".$fichier."inexistant");
            }
        }
        /**
         * inclut les scripts javascript cotenus dans $script
         */
         public static function inclureJs(){
            foreach (self::$_instance->script as $fich){
                echo '<script type="text/javascript" src="'.$fich.'"></script>';
            }
        }
    }


