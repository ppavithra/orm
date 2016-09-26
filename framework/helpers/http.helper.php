<?php

    abstract class HTTPHelper
    {
        /**
         * d'obtenir la valeur d'une clé dans un tableau associatif $source
         * @param Stirng $source
         * @param String $cle
         * @param String $defaut
         * @return type
         */
        private static function fetch ($source,$cle,$defaut){
            if(isset($source[$cle])){
                return $source[$cle];
            }
            return $defaut;
        }
        /**
         * retourne la vleur d'une clé $cle contenu dans la supervariable $_GET
         * @param String $cle
         * @param String $defaut
         * @return type
         */
        public static function get($cle,$defaut=null){
            return self::fetch($_GET,$cle,$defaut);
        }
        /**
         * retourne la vleur d'une clé $cle contenue dans la supervariable $_POST
         * @param String $cle
         * @param String $defaut
         * @return type
         */
        public static function post($cle,$defaut=null){
            return self::fetch($_POST,$cle,$defaut);
        }
        /**
         * redirige vers une url avec le message à afficher
         * @param String $url
         * @param String $message
         */
        public static function rediriger($url,$message=null) { 
            if(!is_null($message)){
                Message::deposer($message);
            }
            if(!headers_sent()) {                        
                header('Location:'.$url);  
                die();
            } else {                
                ?>
                <script type="text/javascript">
                    window.location = "<?php echo $url;?>";
                </script>
                <?php
            }
        }
        /**
         * retourne un tabeau contenant les parametres de l'url
         * @return array
         */
        public static function getParametresUrl(){
            $url=array();
             parse_str($_SERVER['QUERY_STRING'],$url);
             
             if(!isset($url['controller'])){
                 $url['controller']=Application::getControlleurCourant();
             }
             if(!isset($url['action'])){
                 $url['action']=Application::getActionCourante();
             }
             return $url;
        }
    }

