<?php
    session_start();
    define('__FRAMEWORK3IL__','');
    require_once 'framework/configuration.php';
    require_once 'framework/helpers/http.helper.php';
    require_once 'framework/helpers/html.helper.php';
    require_once 'framework/helpers/form.helper.php';
    require_once 'framework/authentification.php';
    require_once 'framework/controller.php';
    require_once 'framework/erreur.php';
    require_once 'framework/page.php';
    require_once 'framework/model.php';
    require_once 'framework/message.php';
    require_once 'framework/datagrid.php';
    require_once 'framework/dataset.php';
    
    class Application {
        private static $_instance=null;
        private  $configuration=null;
        private $base=null;
        protected $controleurParDefaut="";
        private $controlleurCourant="";
        private $actionCourante="";
        private $cheminAbsolu;
        /**
         * Constructeur
         * @param String $fichierIni
         * @throws Erreur
         */
        private function __construct($fichierIni){
            $this->configuration=Configuration::getInstance($fichierIni);
             try{
                 $this->base=new PDO('mysql:host='.$this->configuration->db_hostname.';dbname='.$this->configuration->db_database.'',$this->configuration->db_username , $this->configuration->db_password);
            } catch (PDOException $ex) {
                 throw new Erreur("Erreur connexion BD");
            }
            $this->base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->cheminAbsolu=realpath('.');
        }
        /**
         * definit le controlleur par defaut
         * @param String $controleur
         * @throws Erreur
         */
        public function setControleurParDefaut($controleur){
             
              $fich='application/controllers/'.$controleur.'.controller.php';
            if(!is_readable($fich)){
               throw new Erreur('Fichier de controleur introuvable '.$controleur);
            }else{
                require_once $fich;
                $nomClass=  ucfirst($controleur.'Controller');
                if(!class_exists($nomClass)){
                    throw new Erreur('Classe introuvable '.$nomClass.'Controller');
                }
                else{
                    $this->controleurParDefaut = $controleur;
                }
            }
        }
        /**
         * Retourne l'instance de l'application
         * @param String $fichierIni
         * @return Application
         */
        public static function getInstance($fichierIni){
            if(is_null(self::$_instance)){
                self::$_instance=new Application($fichierIni);
            }
            return self::$_instance;
        }
        /**
         * retourne la configuration de l'application
         * @return Configuration
         */
        public static function getConfig(){
            return self::$_instance->configuration;
        }
        /**
         * retourne le chemin absolu
         * @return String
         */
        public static function getCheminAbsolu(){
            return self::$_instance->cheminAbsolu;
        }
        /**
         * retourne le controlleur courant
         * @return String
         */
         public static function getControlleurCourant(){
            return self::$_instance->controlleurCourant;
        }
        /**
         * retourne l'action courante
         * @return String
         */
         public static function getActionCourante(){
            return self::$_instance->actionCourante;
        }
        /**
         * appelle le helper sollicité
         * @param Sring $helper
         * @throws Erreur
         */
        public static function useHelper($helper){
             $fich='application/helpers/'.$helper.'.helper.php';
              if(!is_readable($fich)){
               throw new Erreur('Fichier de helper introuvable '.$helper);
               }else{
                require_once $fich;
               }
        }
        /**
         * executer 
         * @throws Erreur
         */
        public function executer() {
            $controleur= HTTPHelper::get('controller',$this->controleurParDefaut);
            $this->controlleurCourant=$controleur;
            
            $fich='application/controllers/'.$controleur.'.controller.php';
            if(!is_readable($fich)){
               throw new Erreur('Fichier de controleur introuvable '.$controleur);
            }else{
                require_once $fich;
                $nomClass=  $controleur.'Controller';
                if(!class_exists($nomClass)){
                    throw new Erreur('Classe introuvable '.$nomClass.'Controller');
                }
                else{
                    $obj=new $nomClass;
                    $action=  HTTPHelper::get('action',$obj->getActionParDefaut());
                    $this->actionCourante= $action;
                    $obj->executer($action);
                }
            }
            Page::afficher();
       
        }
        /**
         * 
         * @return Page
         */
        public static function getPage(){
            return Page::getInstance();
        }
        /**
         * retourner la connection de la base de données
         * @return PDO
         */
        public static function getBD(){
            return self::$_instance->base;
        }
        /**
         * appelle le modele sollicité
         * @param string $modele
         * @throws Erreur
         */
        public static function useModele($modele){
            $modele='application/models/'.$modele.'.model.php';
            if(!is_readable($modele)){
                throw new Erreur("Fichier de modele introuvable");
            }
            else{
                require_once $modele;
            }
        }
        /**
         * on verifie si l'authentification est bonne
         * @throws Erreur
         */
        public function utiliserAuthentification(){
            try{
                 $aut=  Authentification::getInstance($this->configuration->auth_table,$this->configuration->auth_col_id,$this->configuration->auth_col_login,$this->configuration->auth_col_mot_de_passe,$this->configuration->auth_col_sel);
            } catch (Exception $ex) {
                   throw new Erreur("authentification non configurée");
            }
            
        }
    }
