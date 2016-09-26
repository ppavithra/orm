<?php
 defined('__FRAMEWORK3IL__') or die('Acces interdit');
 class Configuration {
        private static $_instance=null;
        private $data=null;
        /**
         * constructeur
         * @param String $fichierIni
         */
        private function __construct($fichierIni){
            if(!is_readable($fichierIni)){
                die("Fichier de configuration manquant");
            }
            $this->data= parse_ini_file($fichierIni);
            if(! $this->data){
                die("Fichier de configuration invalide.");
            }
        }
        /**
         * retourne l'instance de configuration
         * @param String $fichierIni
         * @return Configuration
         */
        public static function getInstance($fichierIni=""){
            if(is_null(self::$_instance)){
                self::$_instance=new Configuration($fichierIni);
            }
            return self::$_instance;
        }
        /**
         * methode magique
         * @param String $propriete
         * @return type
         * @throws Erreur
         */
        public function __get($propriete) {
            if(!isset($this->data[$propriete])){
                throw new Erreur("Propriété de configuration inconnue :".$propriete);
            }
            return $this->data[$propriete];
        }
    }

