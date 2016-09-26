<?php
    defined('__GEST3IL__') or die('Acces interdit');
    
    class UserModel extends Model {
        
        public function enregistrer($login, $pwd) {  
            $dateCreation= date('Y-m-d H:i:s');
            $pwd=Authentification::encoder($pwd, $dateCreation);
            $sql = "INSERT INTO user SET login = :login, pwd=:pwd, last_connect=:dateCreation, creation=:dateCreation";
            $req = $this->db->prepare($sql);
            $req->bindValue(':login',$login);
            $req->bindValue(':pwd',$pwd);
            $req->bindValue(':dateCreation',$dateCreation);
                       
            try {
                $req->execute();
            } catch (PDOException $ex) {
                throw new Erreur("Erreur SQL ".$ex->getMessage());
            }
            
        }
        
        public function modifier($pwd){
            $iduser=  Authentification::getUtilisateurId();
            //$datecreation= date_format($_SESSION['date_crea'],'Y-m-d H:i:s');
             $pwd=Authentification::encoder($pwd, $_SESSION['date_crea']);
            $sql = "update user SET   pwd=:pwd where login=:login";
            
            $req = $this->db->prepare($sql);
            $req->bindValue(':login',$iduser);
            $req->bindValue(':pwd',$pwd);
    
            try {
                $req->execute();
            } catch (PDOException $ex) {
                throw new Erreur("Erreur SQL ".$ex->getMessage());
            }
        }
          
               
        public function lister($ordre="login",$direction="desc"){
            $colonne=array("login","creation","last_connect");
            $dir=array("desc","asc");
            if(!in_array($ordre,$colonne)){
                throw new Erreur("Ordre inconnu");
            }
            if(!in_array($direction,$dir)){
                throw new Erreur("Direction inconnue");
            }
            $sql="select login, creation, last_connect from user ORDER BY ".$ordre." ".$direction."";
            $req = $this->db->prepare($sql);
            try {
                $req->execute();
            } catch (PDOException $ex) {
                throw new Erreur("Erreur SQL ".$ex->getMessage());
            }
            $data=$req->fetchAll();
             $dataset=new Dataset($data,$ordre,$direction);
            return $dataset;
        }
        
        public function supprimer($login){
            $sql = "DELETE FROM user WHERE login = :id";

            $req = $this->db->prepare($sql);
            $req->bindValue(':id',$login);
            try {
                $req->execute();
            } catch (PDOException $ex) {
                throw new Erreur('Erreur SQL '.$ex->getMessage());
            }
        }
            public function loginExiste($login){
            $sql = "SELECT COUNT(*) FROM user where login=:login";
            $req = $this->db->prepare($sql);
            $req->bindValue(':login',$login); 
            try {
                $req->execute();
            } catch (PDOException $ex) {
                throw new Erreur("Erreur SQL ".$ex->getMessage());
            }
            $result=$req->fetchColumn();
            if(!$result){
                return true;
            }
            else{
                return false;
            }
        }
        public function verifMdp($login,$mdpActu){
            $sql = "select pwd,creation from user where login=:login";
            $req = $this->db->prepare($sql);
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
                return (strcmp($data['pwd'], Authentification::encoder($mdpActu, $data['creation'])) == 0);

            }
        }
        public function majMotDePasse(){
            
        }
    }
