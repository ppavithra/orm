<?php

    defined('__GEST3IL__') or die('Acces interdit');

    Page::enteteCSS();
  
 ?> 
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
     <div class="panel panel-default">
         <div class="panel-heading">
              Ajouter administrateur
         </div>
        <div class="conteneur">
           
                <form  method="POST" action="?controller=user&action=ajouter">
                    <?php FormHelper::cleCSRF();?>
                    <p class="erreur-form">
                        <?php echo $this->formMessage; ?>
                    </p>        
                    <dl>
                        <dt>
                            <label for="login">Login : </label>
                        </dt>
                        <dd>
                            <input name="login" id="login" type="text" maxlength="256" value="<?php echo $this->login;?>"/>
                        </dd>
                        <dt>
                            <label for="mot_de_passe">Mot de passe : </label>
                        </dt>
                        <dd>
                            <input name="mot_de_passe" id="mot_de_passe" type="password" maxlength="256" value="<?php echo $this->mot_de_passe; ?>"/>
                        </dd>
                        <dt>
                            <label for="verification">Confirmer mot de passe : </label>
                        </dt>
                        <dd>
                            <input name="verification" id="verification" type="password" maxlength="256" value="<?php echo $this->verification; ?>"/>
                        </dd>
                        <dt></dt>
                        <dd>
                            <button  class="btn btn-primary dropdown-toggle" type="submit">Valider</button>
                        </dd>
                    </dl>    
                </form>
          
        </div>
    </div>    
    </div>
  </div>  


