<?php
      defined('__GEST3IL__') or die('Acces interdit');
    Application::useModele('offre');
 
    class OffreController extends Controller{
        /**
         * constructeur
         */
         public function __construct() {
            $this->setActionParDefaut("ajouter");
        }
        /**
         * ajoute un utilisateur si toutes les conditions sont respectées
         * @return type
         * @throws Erreur
         */
             
     
        public function ajouterAction(){
            $page=  Page::getInstance();
            $page->setTemplate('application');
            $page->setVue('ajouter_offre');
            $page->ajouterCSS("ajouter_utilisateur");
            $page->ajouterCSS("form");
            $page->ajouterScript("ajouter_utilisateur");
            
            $page->titre=filter_var(HTTPHelper::post("titre", ""),FILTER_SANITIZE_STRING);
            $page->titre=trim($page->titre);
            $page->mission=filter_var(HTTPHelper::post("mission", ""),FILTER_SANITIZE_STRING);
            $page->mission=trim($page->mission);
            $page->profil=filter_var(HTTPHelper::post("profil", ""),FILTER_SANITIZE_STRING);
            $page->profil=trim($page->profil);
            $page->periode=filter_var(HTTPHelper::post("periode", ""),FILTER_SANITIZE_STRING);
            $page->periode=trim($page->periode);
            $page->conv=HTTPHelper::post("conv", "");
           
           if($_SERVER['REQUEST_METHOD']=='GET'){
               return;
           }
           if(!FormHelper::validerCleCSRF()){
               throw new Erreur("Session invalide");
           }
            if(empty($page->titre)){
               $page->formMessage="Veuillez entrer un titre";
               return;
           }
           if(strlen($page->titre)>256){
               $page->formMessage="le mission doit avoir au plus 256 caracteres";
               return;
           }
           if(empty($page->mission)){
               $page->formMessage="Veuillez entrer une mission";
               return;
           }
           if(strlen($page->mission)>1024){
               $page->formMessage="le mission doit avoir au plus 1024 caracteres";
               return;
           }
           if(empty($page->profil)){
               $page->formMessage="Veuillez entrer un profil";
               return;
           }
           if(strlen($page->profil)>2048){
               $page->formMessage="le profil doit avoir au plus 2048 caracteres";
               return;
           }
          
           $modele=new offreModel();
           
        
           $modele->enregistrer($page->titre,$page->mission,$page->profil,$page->periode,$page->conv);
           $this->listerAction();
        }
 
     
       
          public function listerAction(){
            $page=Application::getPage();
            $page->setTemplate('application');
            $page->setVue('lister_offre');
            $page->ajouterCSS("datagrid");
            $page->ajouterScript("offre_datagrid");
            $modele=new OffreModel();
            $page->data=$modele->lister(HTTPHelper::get("ordre", "datePubli"),HTTPHelper::get("direction","desc"));
            
        }
        public function editerAction(){
            
            $page=Application::getPage(); 
            $page->setTemplate('application');
            
            $page->setVue('editer_offre');
            $page->ajouterCSS("ajouter_utilisateur");
            $page->ajouterCSS("form");
            $page->ajouterScript("ajouter_utilisateur");
             $page->id=  HTTPHelper::post('id', 0);
             
            if($page->id==0){
                HTTPHelper::rediriger("?controller=erreur", "Erreur de modification d'offre");
            }
             $modele= new OffreModel();
             $offre=$modele->detail($page->id);
             if(is_null($offre)){
                      HTTPHelper::rediriger("?controller=erreur", "Erreur edition coup de pouce");
              }
              if(is_null(HTTPHelper::post('envoyer'))){
                     
                      $page->id=$offre['id_offre'];
                      $page->titre=$offre['titre'];
                      $page->profil=$offre['profil'];
                      $page->periode=$offre['periode'];
                      $page->mission=$offre['mission'];
                      $page->conv=$offre['convention'];
                     
                  }else{
                        $page->titre=filter_var(HTTPHelper::post("titre", ""),FILTER_SANITIZE_STRING);
                        $page->titre=trim($page->titre);
                        $page->mission=filter_var(HTTPHelper::post("mission", ""),FILTER_SANITIZE_STRING);
                        $page->mission=trim($page->mission);
                        $page->profil=filter_var(HTTPHelper::post("profil", ""),FILTER_SANITIZE_STRING);
                        $page->profil=trim($page->profil);
                        $page->periode=filter_var(HTTPHelper::post("periode", ""),FILTER_SANITIZE_STRING);
                        $page->periode=trim($page->periode);
                        $page->conv=HTTPHelper::post("conv", "");
                    
                        if($_SERVER['REQUEST_METHOD']=='GET'){
                            return;
                        }
                        if(!FormHelper::validerCleCSRF()){
                            throw new Erreur("Session invalide");
                        }
                        if(empty($page->titre)){
                            $page->formMessage="Veuillez entrer un titre";
                            return;
                        }
                        if(strlen($page->titre)>256){
                            $page->formMessage="le mission doit avoir au plus 256 caracteres";
                            return;
                        }
                        if(empty($page->mission)){
                            $page->formMessage="Veuillez entrer une mission";
                            return;
                        }
                        if(strlen($page->mission)>1024){
                            $page->formMessage="le mission doit avoir au plus 1024 caracteres";
                            return;
                        }
                        if(empty($page->profil)){
                            $page->formMessage="Veuillez entrer un profil";
                            return;
                        }
                        if(strlen($page->profil)>2048){
                            $page->formMessage="le profil doit avoir au plus 2048 caracteres";
                            return;
                        }
                        
                         $modele->modifier($page->id,$page->titre,$page->mission,$page->profil,$page->periode,$page->conv);
                        $this->listerAction();
                         
                       }

         
        }
        public function deleteAction(){
           
            
            if($_SERVER['REQUEST_METHOD']=="GET") {
                HTTPHelper::rediriger('?controller=erreur','Action non autorisée');
            }

            $id = filter_var(HTTPHelper::post('id',0),FILTER_SANITIZE_NUMBER_INT);
            if($id==0 || empty($id)){
                HTTPHelper::rediriger('?controller=erreur','Suppression impossible');
            }
            
            $model = new offreModel();
            
          
            $model->delete($id);
            HTTPHelper::rediriger('?controller=offre&action=lister','Offre supprimé');
        }
        
       
    }
