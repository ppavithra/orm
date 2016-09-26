<?php

    defined('__GEST3IL__') or die('Acces interdit');

    Page::enteteCSS();
  
 ?> 

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
     <div class="panel panel-default">
         <div class="panel-heading">
              Ajouter une offre
         </div>
        <div class="conteneur" id="ajouter-utilisateur">
           
                <form  method="POST" >
                    <?php FormHelper::cleCSRF();?>
                    <p class="erreur-form">
                        <?php echo $this->formMessage; ?>
                    </p>        
                    <dl>
                        <dt>
                            <label for="titre">Titre : </label>
                        </dt>
                        <dd>
                            <input name="titre" id="titre" type="text" maxlength="256" value="<?php echo $this->titre;?>"/>
                        </dd>
                        <dt>
                            <label for="mission">Mission : </label>
                        </dt>
                        <dd>
                            <textarea name="mission" id="mission" cols="30" rows="5" maxlength="1024" value="<?php echo $this->mission;?>"><?php echo $this->mission;?></textarea>
                        </dd>
                        <dt>
                            <label for="Profil">Profil : </label>
                        </dt>
                        <dd>
                            <textarea name="profil" id="profil" cols="30" rows="10" maxlength="2048" value="<?php echo $this->profil; ?>"></textarea>
                        </dd>
                        <dt>
                            <label for="periode">Periode : </label>
                        </dt>
                        <dd>
                            <input name="periode" id="periode" type="text" maxlength="256" value="<?php echo $this->periode; ?>"/>
                        </dd>
                        <dt
                           <label for="conv">Convention : </label>
                    </dt>
                     <dd>
                         <select  name="conv" id="conv">
                             <option>Oui</option>
                             <option>Non</option>
                         </select>
                    </dd>
                    </dl>    
                        <dt></dt>
                        <dd>
                            <button  class="btn btn-primary dropdown-toggle" type="submit">Valider</button>
                        </dd>
                         <dt>
                     
                </form>
          
        </div>
    </div>    
    </div>
  </div>  


