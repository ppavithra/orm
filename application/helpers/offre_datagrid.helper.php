<?php
defined('__GEST3IL__') or die('Acces interdit');

class Offre_DataGridHelper extends Datagrid {
public function commandesRenderer($data) {
        ?>


       
            <button type="button" class="btn btn-default cmd_editer" aria-label="left Align" title="editer" 
                    data-toggle="tooltip" data-placement="top" >
                <span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>

                <input type="hidden" name="id" value="<?php echo $data['id_offre']; ?>">
            </button>
        </a>
        <button type="button" class="btn btn-default cmd_supprimer" aria-label="Left Align" title="supprimer">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
        <input   type="hidden" name="id" value="<?php echo $data['id_offre']; ?>">
        <?php
    }

   

   
  
    public function titreRenderer($data){
        return $data['titre'];
    }
    public function missionRenderer($data){
        return $data['mission'];
    }
    public function profilRenderer($data){
        return $data['profil'];
    }
    public function periodeRenderer($data){
        return $data['periode'];
    }
    public function conventionRenderer($data){
        return $data['convention'];
    }
    public function datepubRenderer($data){
        return $data['datePubli'];
    }
}
