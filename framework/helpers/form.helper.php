<?php
    defined('__FRAMEWORK3IL__') or die('Acces interdit');
    
    abstract class FormHelper {
        const SESSION_KEY = 'framework3il.csrfToken';
        
        private static $cle = null;        
        /**
         * retourne une clé 
         * @return String
         */
        private static function getCle() {    
            if(!isset($_SESSION['SESSION_KEY'])){
                self::$cle=  uniqid();
                self::$cle=  hash("sha256", self::$cle);
                $_SESSION['SESSION_KEY']=self::$cle;
            }
            return self::$cle;
        }
        /**
         * insere la clé CSRF
         */
        public static function cleCSRF() {   
            $cle=  self::getCle();
            echo '<input type="hidden" name="'.$cle.'" value="0" />';
            
        }
        /**
         * teste si la clé CSRF est valide
         * @return boolean
         */
        public static function validerCleCSRF() {   
             if(!isset($_SESSION['SESSION_KEY'])){
                 
                return false;
            }
            else{
                $cle=  HTTPHelper::post(self::getCle(),"");
                if($cle!=0){
                   
                    return false;
                }
                 return true;
            }
           
        }
        
    }

