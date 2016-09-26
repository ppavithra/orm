var form=document.getElementById('se-connecter-form');
var erreurDom=document.getElementsByClassName('erreur-form')[0];
var login=form.elements['login'];
login.value.trim();
var mdp=form.elements['mot_de_passe'];
mdp.value.trim();
form.onsubmit=function(){
    if(login.value=="" && mdp.value==""){
      
        login.classList.add('invalide');
        mdp.classList.add('invalide');
        erreurDom.innerHTML='Veuillez saisir le login et le mot de passe';
        return false;
    }
    else{
         if(login.value==""){
             
             login.classList.add('invalide');
             erreurDom.innerHTML='Veuillez saisir le login';
             return false;
         }
         else{
             if(mdp.value==""){
                
                login.classList.remove('invalide');
                mdp.classList.add('invalide');
                erreurDom.innerHTML='Veuillez saisir le mot de passe';
                return false;
             }
        
         }
     }
     
    return true;
};