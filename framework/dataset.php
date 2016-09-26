<?php
    defined('__FRAMEWORK3IL__') or die('Acces interdit');
    
    class Dataset implements Iterator{
        
        protected $data=null;
        protected  $ordre=null;
        protected  $direction=null;
        /**
         * Constructeur 
         * @param array $data
         * @param String $ordre
         * @param String $direction
         */
        public function __construct($data,$ordre,$direction) {
            $this->data=$data;
            $this->ordre=$ordre;
            $this->direction=$direction;
        }
        /**
         * getter de la propriete $ordre
         * @return String
         */
        public function getOrdre(){
            return $this->ordre;
        }
        /**
         * getter de la propriete $direction
         * @return String
         */
        public function getDirection(){
            return $this->direction;
        }
        /**
         * element courant
         * @return mixed
         */
        public function current() {
            return current($this->data);
        }
        /**
         * retourne la clé de l'elemet du tableau
         * @return mixed
         */

        public function key() {
            return key($this->data);
        }
        /**
         * 
         * @return mixed
         */
        public function next() {
            return next($this->data);
        }
        /**
         * 
         * @return mixed
         */
        public function rewind() {
            return reset($this->data);
        }
        /**
         * 
         * @return boolean
         */
        public function valid() {
            return key($this->data)!==null;
        }

}
    

