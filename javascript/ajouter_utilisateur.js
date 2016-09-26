$(document).ready(function(){
    $('#nom').blur(function(){
        if(this.value.trim()===""){
            this.estValide=false;
            $('p.erreur-form').html("vous devez fournir un nom");
            $(this).addClass('invalide');
        }else{
            this.estValide=true;
            $(this).removeClass('invalide');
        }
    });
     $('#prenom').blur(function(){
        if(this.value.trim()===""){
            this.estValide=false;
            $('p.erreur-form').html("vous devez fournir un prenom");
            $(this).addClass('invalide');
        }else{
            this.estValide=true;
            $(this).removeClass('invalide');
        }
    });
    $('#login').blur(function(){
        if(this.value.trim()===""){
            this.estValide=false;
            $('p.erreur-form').html("vous devez fournir un login");
            $(this).addClass('invalide');
        }else{
            if(this.value.length<4){
                this.estValide=false;
                $('p.erreur-form').html("le login doit avoir au moins 4 caracteres");
                $(this).addClass('invalide');
            }
            else{
                if(this.value.indexOf(" ")!==-1){
                    this.estValide=false;
                    $('p.erreur-form').html("le login ne doit pas contenir d'espaces");
                    $(this).addClass('invalide');
                }else{
                    this.estValide=true;
                    $(this).removeClass('invalide');
                }
            }
            
        }
    });
    $('#email').blur(function(){
        var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');
        if(this.value.trim()===""){
            this.estValide=false;
            $('p.erreur-form').html("vous devez fournir une adresse email");
            $(this).addClass('invalide');
        }else{
            if(!regEmail.test(this.value)){
                 this.estValide=false;
                 $('p.erreur-form').html("veous devez fournir une adresse email valide");
                 $(this).addClass('invalide');
            }
            else{
                 this.estValide=true;
                 $(this).removeClass('invalide');
            }
                
        }
    });
     $('#mot_de_passe').blur(function(){
        if(this.value.trim()===""){
            this.estValide=false;
            $('p.erreur-form').html("vous devez fournir un mot de passe");
            $(this).addClass('invalide');
        }else{
             if(this.value.length<5){
                this.estValide=false;
                $('p.erreur-form').html("le login doit avoir au moins 5 caracteres");
                $(this).addClass('invalide');
            }else{
                 this.estValide=true;
                 $(this).removeClass('invalide');
            }
           
        }
    });
      $('#verification').blur(function(){
          var mdp=('#mot_de_passe').value;
        if(this.value.trim()===""){
            this.estValide=false;
            $('p.erreur-form').html("veuillez confirmer le mot de passe");
            $(this).addClass('invalide');
        }else{
            if(!this.value===mdp){
                this.estValide=false;
                $('p.erreur-form').html("les deux mots de passe ne coïncident pas");
                $(this).addClass('invalide');
            }
            else{
                 this.estValide=true;
                 $(this).removeClass('invalide');
            }
           
        }
    });
    $('#formation').change(function(){
        if(this.value.trim()===""){
            this.estValide=false;
            $('p.erreur-form').html("vous devez fournir un prenom");
            $(this).addClass('invalide');
        }else{
            if(this.value==="---"){
                this.estValide=false;
                $('p.erreur-form').html("Veullez selectionnez uen formation ");
                $(this).addClass('invalide');
            }
            else{
                 this.estValide=true;
                $(this).removeClass('invalide');
            }
           
        }
    });
    $("#ajouter-utilisateur form input[type=text],"+
       "#ajouter-utilisateur form input[type=password],"+
       "#ajouter-utilisateur form select ").each(function(){
           this.classList.add("web3il");
       });
       
});


