<?php
    defined('__FRAMEWORK3IL__') or die('Acess interdit');
    abstract class Model
    {
        protected $db=null;
        /**
         * cnstructeur
         */
        public function __construct(){
            $this->db=Application::getBD();
        }
    }

