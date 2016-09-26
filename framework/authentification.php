<?php

defined('__FRAMEWORK3IL__') or die('Acces interdit');


class Authentification {

    protected $authTable;
    protected $authColId;
    protected $authColLogin;
    protected $authColMotDePasse;
    protected $authColSel;
    protected $utilisateur = null;
    private static $_instance = null;

    const SESSION_KEY = 'framework3il.authentification';
    const SESSION_TYPE = 'framework3il.type';
    

    /**
     * 
     * @param String $authTable
     * @param String $authColId
     * @param String $authColLogin
     * @param String $authColMotDePasse
     * @param String $authColSel
     */
    private function __construct($authTable, $authColId, $authColLogin, $authColMotDePasse, $authColSel) {
        $this->authTable = $authTable;
        $this->authColId = $authColId;
        $this->authColLogin = $authColLogin;
        $this->authColMotDePasse = $authColMotDePasse;
        $this->authColSel = $authColSel;
    }

    /**
     * retourne l'instance d'authentification
     * @param String $authTable
     * @param String $authColId
     * @param String $authColLogin
     * @param String $authColMotDePasse
     * @param String $authColSel
     * @return Authentification
     */
    public static function getInstance($authTable = null, $authColId = null, $authColLogin = null, $authColMotDePasse = null, $authColSel = null) {
        if (is_null(self::$_instance)) {
            self::$_instance = new Authentification($authTable, $authColId, $authColLogin, $authColMotDePasse, $authColSel);
        }
        return self::$_instance;
    }

    /**
     * verifie le login et mot de passe saisi correponde à un utilisateur
     * @param String $login
     * @param String $motDePasse
     * @return boolean
     * @throws Erreur
     */

    public static function authentifier($login, $motDePasse) {
        $base = Application::getBD();

        $req = "select login,pwd,creation,last_connect from user where login=:login";

        $req = $base->prepare($req);
        $req->bindValue(':login', $login);
        try {
            $req->execute();
        } catch (PDOException $ex) {
            throw new Erreur("Erreur SQL" . $ex->getMessage());
        }
        $data = $req->fetch(PDO::FETCH_ASSOC);
        if (!$data) {
            return false;
        } else {
          
           if (strcmp($data['pwd'], self::encoder($motDePasse, $data['creation'])) == 0) {
               
                $_SESSION[self::SESSION_KEY] = $data['login'];
                //$_SESSION[self::SESSION_TYPE]="Administrateur";
                $_SESSION['LAST']=$data['last_connect'];
                $_SESSION['NOMS']=$data['login'];
                 $_SESSION['date_crea']=$data['creation'];
                //$dateFormat=DateTime::createFromFormat("Y-m-d H:i:s",$data['creation']);
                //$_SESSION['LAST']=$dateFormat->format($dateFormat,'Y-m-d');
                
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Recupere les les infos d'un utilisateur
     * @throws Erreur
     */
    public function chargerUtilisateur() {
        if (!isset($_SESSION[self::SESSION_KEY])) {
            throw new Erreur("Utilisateur non connecté");
        } else {
            $base = Application::getBD();
            $req = "select login,creation,last_connect from " . self::$_instance->authTable . " where " . self::$_instance->authColId . "= :id";
            $req = $base->prepare($req);
            $req->bindValue(':id', $_SESSION[self::SESSION_KEY]);
            try {
                $req->execute();
            } catch (PDOException $ex) {
                throw new Erreur("Erreur SQL" . $ex->getMessage());
            }
            $this->utilisateur = $req->fetch(PDO::FETCH_ASSOC);
            unset($this->utilisateur['pwd']);
        }
    }

    /**
     * deconnecter l'utilisateur
     */
    public static function deconnecter() {
        $base = Application::getBD();
        self::$_instance->utilisateur = null;
          $dateCon= date('Y-m-d H:i:s');
         
              $sql = "update  user set last_connect=:datecon where login=:login";
            $req = $base->prepare($sql);
            
            $req->bindValue(':login',$_SESSION[self::SESSION_KEY]); 
            $req->bindValue(':datecon',$dateCon);
            try {
                $req->execute();
            } catch (PDOException $ex) {
                throw new Erreur("Erreur SQL ".$ex->getMessage());
            }
          
          
       // unset($_SESSION[self::SESSION_KEY]);
        //unset($_SESSION[self::SESSION_TYPE]);
        //unset($_SESSION['LAST']);
        session_destroy();
    }
    /**
     * permet de savoir si l'utilsateur est connecté
     * et renvoit sn id contenu dans une variable de session
     * @return int
     */
    public static function estConnecte() {
        return isset($_SESSION[self::SESSION_KEY]);
    }
    /**
     * retourne un tableau associatif contenant les infos sur un utilisateur
     * @return string[][]
     */
    public static function getUtilisateur() {
        if (is_null(self::$_instance->utilisateur)) {
            self::$_instance->chargerUtilisateur();
        }
        return self::$_instance->utilisateur;
    }
    /**
     * retourn l'identifiant de l'utilisateur
     * @return int
     * @throws Erreur
     */
    public static function getUtilisateurId() {
        if (!isset($_SESSION[self::SESSION_KEY])) {
            throw new Erreur("Utilisateur non connecté");
        } else {
            return $_SESSION[self::SESSION_KEY];
        }
    }
 
    /*public static function getUtilisateurType() {
       
            return $_SESSION[self::SESSION_TYPE];
      
    }
    public static function setUtilisateurType($type) {
            
            $_SESSION[self::SESSION_TYPE]=$type;
      
    }*/
    /**
     * retourne le mot de passe "salé"
     * @param string $motDePasse
     * @param String $sel
     * @return string
     */
    public static function encoder($motDePasse, $sel) {
        $sel = hash("sha256", $sel);
        $motDePasse = $motDePasse . $sel;
        $motDepasse = hash("sha256", "" . $motDePasse);

        return $motDePasse;
    }

}
