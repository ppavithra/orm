<?php
    defined('__GEST3IL__') or die('Acces interdit');
   
 ?> 
 <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Lemon Service: CONNEXION</h2>
               
                
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Authentifiez vous!</strong> 
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST" action="?controller=user&action=seconnecter">
                                    <p class="erreur-form">
                                        <?php echo $this->formMessage; ?>
                                     </p> 
                                       <br />
                                        
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                           
                                            <input type="text" class="form-control" name="login" placeholder="Votre login " />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  name="mot_de_passe" placeholder="Votre mot de passe" />
                                        </div>
                                  
                                     
                                     <button type="input" class="btn btn-primary ">Validez</button>
                                    <hr />
                                   
                                   
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


    


