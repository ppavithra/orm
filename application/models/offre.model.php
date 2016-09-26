<?php
    defined('__GEST3IL__') or die('Acces interdit');
    
    class OffreModel extends Model {
        
        public function enregistrer($titre,$mission,$profil,$periode,$conv) {  
            $dateCreation= date('Y-m-d H:i:s');
          
            $sql = "INSERT INTO offre SET titre=:titre,mission = :mission, profil=:profil,periode=:periode, convention=:conv, datePubli=:dateCreation";
            $req = $this->db->prepare($sql);
            $req->bindValue(':titre',$titre);
            $req->bindValue(':mission',$mission);
            $req->bindValue(':profil',$profil);
             $req->bindValue(':periode',$periode);
            $req->bindValue(':conv',$conv);
            $req->bindValue(':dateCreation',$dateCreation);
                       
            try {
                $req->execute();
            } catch (PDOException $ex) {
                throw new Erreur("Erreur SQL ".$ex->getMessage());
            }
            
        }
         public function modifier($id,$titre,$mission,$profil,$periode,$conv){
            
          
            $sql = "update offre SET   titre=:titre,mission = :mission, profil=:profil,periode=:periode, convention=:conv where id_offre=:id";
            $req = $this->db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->bindValue(':titre',$titre);
            $req->bindValue(':mission',$mission);
            $req->bindValue(':profil',$profil);
            $req->bindValue(':periode',$periode);
            $req->bindValue(':conv',$conv);
            
    
            try {
                $req->execute();
            } catch (PDOException $ex) {
                throw new Erreur("Erreur SQL ".$ex->getMessage());
            }
        }
        public function lister($ordre="datePubli",$direction="desc"){
            $colonne=array("titre","datePubli");
            $dir=array("desc","asc");
            if(!in_array($ordre,$colonne)){
                throw new Erreur("Ordre inconnu");
            }
            if(!in_array($direction,$dir)){
                throw new Erreur("Direction inconnue");
            }
            $sql="select * from offre ORDER BY ".$ordre." ".$direction."";
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
        public function detail($id){
            if($id==0){
                throw new Erreur('Mauvais identifiant');
            }
            $req="select id_offre,titre,mission,profil,periode,convention,datePubli from offre where id_offre=:id";
            $req=$this->db->prepare($req);
            $req->bindValue(':id',$id);
            try{
                $req->execute();
            } catch (PDOException $ex) {
                throw new Erreur("Erreur SQL".$ex->getMessage());
            }
            $data=$req->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
         public function delete($id){
            
          
            $sql = "delete from offre where id_offre=:id";
            $req = $this->db->prepare($sql);
            $req->bindValue(':id',$id);
            try {
                $req->execute();
            } catch (PDOException $ex) {
                throw new Erreur("Erreur SQL ".$ex->getMessage());
            }
        }
    }
