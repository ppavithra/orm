<?php
defined('__GEST3IL__') or die('Acces interdit');

class Admin_DataGridHelper extends Datagrid {

    

   

    public function commandesRenderer($data) {
        ?>


       
            <button type="button" class="btn btn-default cmd_editer" aria-label="left Align" title="editer" 
                    data-toggle="tooltip" data-placement="top" >
                <span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>

                <input type="hidden" name="login" value="<?php echo $data['login']; ?>">
            </button>
        </a>
        <button type="button" class="btn btn-default cmd_supprimer" aria-label="Left Align" title="supprimer">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
        <input   type="hidden" name="login" value="<?php echo $data['login']; ?>">
        <?php
    }

   

   
  
    public function lastConRenderer($data){
        return $data['last_connect'];
    }
    public function dateCreRenderer($data){
        return $data['creation'];
    }
    public function loginRenderer($data){
        return $data['login'];
    }

}
