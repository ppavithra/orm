<?php
    defined('__FRAMEWORK3IL__') or die('Acces interdit');
    
    abstract class HTMLHelper {
        /**
         * definit les attribut d'une balise option
         * @param String $texte
         * @param String $valeur
         * @param String $defaut
         */
        public static function option($texte,$valeur=null,$defaut=null){
            $selected = '';
            
            if(is_null($valeur)){
                $valeur = $texte;
            }
            
            if(!is_null($defaut)){
                if($valeur == $defaut){
                    $selected = 'selected';
                }
            }
          
            ?>
            <option value="<?php echo $valeur;?>" <?php echo $selected;?> ><?php echo $texte;?></option>
            <?php 
        }
        /**
         * redirige vers une url
         * @param String $url
         */
        public static function rediriger($url) {            
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
    }
