<?php
      defined('__GEST3IL__') or die('Acces interdit');
    Application::useModele('user');
 
    class UserController extends Controller{
        /**
         * constructeur
         */
         public function __construct() {
            $this->setActionParDefaut("seconnecter");
        }
        /**
         * ajoute un utilisateur si toutes les conditions sont respectées
         * @return type
         * @throws Erreur
         */
             
        public function seconnecterAction() {
            
           //if(Authentification::estConnecte()){
                //HTMLHelper::rediriger('index.php');
            //}
            $page=  Page::getInstance();
            $page->setTemplate('index');
            $page->setVue('seconnecter');
            $page->login=filter_var(HTTPHelper::post("login", ""),FILTER_SANITIZE_STRING);
            $page->login=trim($page->login);
            $page->mot_de_passe=filter_var(HTTPHelper::post("mot_de_passe", ""),FILTER_UNSAFE_RAW);
            $page->mode=filter_var(HTTPHelper::post("mode", ""),FILTER_SANITIZE_STRING);
            if($_SERVER['REQUEST_METHOD']=='GET'){
               return;
           }
            if(empty($page->login)){
               $page->formMessage="Veuillez entrer un login";
               return;
            }
            if(empty($page->mot_de_passe)){
               $page->formMessage="Veuillez entrer un mot de passe";
               return;
           }
       
                
            if(Authentification::authentifier($page->login,$page->mot_de_passe)){
               
                     HTTPHelper::rediriger('index.php');
               
            }else{
                     $page->formMessage="Login et mot de passe incorrects";
           }
            
           
          
           
        }     
        public function ajouterAction(){
            $page=  Page::getInstance();
            $page->setTemplate('application');
            $page->setVue('ajouter_admin');
            $page->ajouterCSS("ajouter_utilisateur");
            $page->ajouterCSS("form");
            $page->ajouterScript("ajouter_utilisateur");
           
            $page->login=filter_var(HTTPHelper::post("login", ""),FILTER_SANITIZE_STRING);
            $page->login=trim($page->login);
      
            $page->mot_de_passe=filter_var(HTTPHelper::post("mot_de_passe", ""),FILTER_UNSAFE_RAW);
            $page->verification=filter_var(HTTPHelper::post("verification", ""),FILTER_UNSAFE_RAW);
         
            
           if($_SERVER['REQUEST_METHOD']=='GET'){
               return;
           }
           if(!FormHelper::validerCleCSRF()){
               throw new Erreur("Session invalide");
           }
         
           if(empty($page->login)){
               $page->formMessage="Veuillez entrer un login";
               return;
           }
           if(strlen($page->login)<4){
               $page->formMessage="le login doit avoir au moins 4 caractères";
               return;
           }
           else{
               if(strlen($page->login)>32){
                   $page->formMessage="le login doit avoir maximum 32 caractères";
               return;
               }
           }
     
            if(empty($page->mot_de_passe)){
               $page->formMessage="Veuillez entrer un mot de passe";
               return;
           }
            if(strlen($page->mot_de_passe)<5){
               $page->formMessage="le mot de passe doit avoir au moins 5 caractères";
               return;
           }
            if(!($page->verification==$page->mot_de_passe)){
               $page->formMessage="les mots de  passe ne concordent pas";
               return;
           }
           $modele=new UserModel();
           if(!($modele->loginExiste($page->login))){
                $page->formMessage="Ce login est déja utilisé";
                return;
           }
        
           $modele->enregistrer($page->login,$page->mot_de_passe);
           $this->listerAction();
        }
 
        /**
         * deconnecte l'utilisateur
         */
        public function deconnecterAction() {
            Authentification::deconnecter();
            HTMLHelper::rediriger('index.php');
        }
        /**
         * affiche la page prouvant l'enregitrement du nouvel utilisateur
         */
       
          public function listerAction(){
            $page=Application::getPage();
            $page->setTemplate('application');
            $page->setVue('lister_admin');
            $page->ajouterCSS("datagrid");
            $page->ajouterScript("user_datagrid");
            $modele=new UserModel();
            $page->data=$modele->lister(HTTPHelper::get("ordre", "login"),HTTPHelper::get("direction","desc"));
            
        }
        public function editerAction(){
            $page=Application::getPage();
            $page->setTemplate('application');
            $page->setVue('editer_admin');
            $page->ajouterCSS("ajouter_utilisateur");
            $page->ajouterCSS("form");
            $page->ajouterScript("ajouter_utilisateur");
           
            $page->mot_de_passe_act=filter_var(HTTPHelper::post("mot_de_passe_act", ""),FILTER_UNSAFE_RAW);
            $page->mot_de_passe_nouv=filter_var(HTTPHelper::post("mot_de_passe_nouv", ""),FILTER_UNSAFE_RAW);
            $page->verification=filter_var(HTTPHelper::post("verification", ""),FILTER_UNSAFE_RAW);
            $modele=new UserModel();
            
           if($_SERVER['REQUEST_METHOD']=='GET'){
               return;
           }
           if(!FormHelper::validerCleCSRF()){
               throw new Erreur("Session invalide");
           }
         
        
     
            if(empty($page->mot_de_passe_act)){
               $page->formMessage="Veuillez entrer un mot de passe";
               return;
           }
            if(strlen($page->mot_de_passe_act)<5){
               $page->formMessage="le mot de passe doit avoir au moins 5 caractères";
               return;
           }
             $login=Authentification::getUtilisateurId();
             if(!$modele->verifMdp($login,$page->mot_de_passe_act)){
                  $page->formMessage="Erreur sur le mode passe actuel";
                 return;
             }
              if(empty($page->mot_de_passe_nouv)){
               $page->formMessage="Veuillez entrer un mot de passe";
               return;
           }
            if(strlen($page->mot_de_passe_nouv)<5){
               $page->formMessage="le mot de passe doit avoir au moins 5 caractères";
               return;
           }
            if(!($page->verification==$page->mot_de_passe_nouv)){
               $page->formMessage="les mots de  passe ne concordent pas";
               return;
           }
            
            $page->data=$modele->modifier($page->mot_de_passe_nouv);
            $this->listerAction();
        }
       
    }
