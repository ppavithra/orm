<?php

defined('__FRAMEWORK3IL__') or die('Acces interdit');

abstract class Controller {

    protected $actionParDefaut = "";
    /**
     * definir une acton par defaut
     * @param String $action
     * @throws Erreur
     */
    public function setActionParDefaut($action) {
        $nomAction = $action .'Action';
        if (!method_exists($this, $nomAction)) {
            throw new Erreur('Methode inexistante ' . $nomAction);
        } else {
            $this->actionParDefaut = $action;
        }
       
    }
    /**
     * retourne l'action par defaut
     * @return String
     */
    public function getActionParDefaut() {
        return $this->actionParDefaut;
    }
    /**
     * execute l'action
     * @param String $action
     * @throws Erreur
     */
    public function executer($action) {
        $nomAction = $action .'Action';
        if (!method_exists($this, $nomAction)) {
            throw new Erreur('Methode inexistante ' .$nomAction);
        } else {
            $this->$nomAction ();
        }
    }

}
