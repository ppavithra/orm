<?php

    defined('__GEST3IL__') or die('Acces interdit');

    Page::enteteCSS();
  
 ?> 
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
     <div class="panel panel-default">
         <div class="panel-heading">
              Modifier une offre de stage
         </div>
        <div class="conteneur">
           
                <form  method="POST" action="?controller=offre&action=editer">
                    <?php FormHelper::cleCSRF();?>
                    <p class="erreur-form">
                        <?php echo $this->formMessage; ?>
                    </p>     
                    <input type="hidden" name="id" value="<?php echo $this->id;?>" />
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
                            <textarea name="mission" id="mission" cols="30" rows="5" maxlength="1024" ><?php echo $this->mission;?></textarea>
                        </dd>
                        <dt>
                            <label for="Profil">Profil : </label>
                        </dt>
                        <dd>
                            <textarea name="profil" id="profil" cols="30" rows="15" maxlength="2048" ><?php echo $this->profil; ?></textarea>
                        </dd>
                        <dt>
                            <label for="periode">Periode : </label>
                        </dt>
                        <dd>
                            <input name="periode" id="periode" type="text" maxlength="256" value="<?php echo $this->periode; ?>"/>
                        </dd>
                        <dt>
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
                            <button id="envoyer"class="btn" name="envoyer" type="submit" value="1">Envoyer</button>
                        </dd>
                         <dt>
                     
                </form>
          
        </div>
    </div>    
    </div>
  </div>  


