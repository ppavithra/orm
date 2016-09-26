<?php
   defined('__GEST3IL__') or die('Acces interdit');
    
    abstract Class NavigationHelper{

    

        const VISIBILITE_ADMIN=0;
        const VISIBILITE_COORD=1;
        const VISIBILITE_ENS=2;
        static $menu=array();
        /**
         * affiche le bloc de naviation
         */
       public static function afficher(){
           $subnav1=array("titre"=>"Liste des offres","controller"=>"offre","action"=>"lister");
           $subnav2=array("titre"=>"Ajouter une offre","controller"=>"offre","action"=>"ajouter");
           $submenu1=array($subnav1,$subnav2);
           $nav1=array("titre"=>"Comptes","controller"=>"user","action"=>"lister","visibilite"=>self::VISIBILITE_ADMIN);
           $nav2=array("titre"=>"Stages","controller"=>"enseignement","action"=>"lister","sub"=>$submenu1,"visibilite"=>self::VISIBILITE_ADMIN);
          
         
          
             //$nav4=array("titre"=>"Se deconnecter","controller"=>"utilisateurs","action"=>"deconnecter","visibilite"=>self::VISIBILITE_CONNECTE );
            self::$menu=array($nav1,$nav2);
          
          
           foreach(self::$menu as $li){
               switch($li['visibilite']){
                   case self::VISIBILITE_ADMIN: 
                       
                          self::menuItem($li, HTTPHelper::get('controller'),  HTTPHelper::get('action'));
                     
                       break;
                   /*case self::VISIBILITE_COORD:
                        if(strcmp(Authentification::getUtilisateurType(), "Coordonnateur")==0){
                          self::menuItem($li, HTTPHelper::get('controller'),  HTTPHelper::get('action'));
                       }
                       break;
                   case self::VISIBILITE_ENS:
                       if(strcmp(Authentification::getUtilisateurType(), "Administrateur")!=0){
                        self::menuItem($li, HTTPHelper::get('controller'),  HTTPHelper::get('action'));
                       }
                        break;*/
               }
           }
           
       }
       /**
        * affiche un element du bloc navigation
        * @param array $m
        * @param String $controleur
        * @param String $action
        */
       public static function menuItem($m,$controleur,$action){
                
                if(  (is_null($controleur) && is_null($action)) or (($m['controller']==$controleur ) && ($m['action']==$action)) ){
                   
                   echo '<li class="active-menu"  >';
                   
               }
               else{
                 echo '<li>';
               }
               
                if (isset($m['sub'])){
                    echo '<a href="#">'.$m['titre'].'<span class="fa arrow"></span></a>';
                        echo '<ul class="nav nav-second-level">';
                        foreach ($m['sub'] as $lien){
                            echo '<li>';
                            echo '<a href="?controller='.$lien['controller'].'&action='.$lien['action'].'">'.$lien['titre'].'</a></li>';
                        }
                        echo '</ul>';
                }
                else{
                     echo '<a href="?controller='.$m['controller'].'&action='.$m['action'].'">'.$m['titre'].'</a></li>';
                }
           }

    }

