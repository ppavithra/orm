$('table button.cmd_editer').click(function(){
    var id=$(this).siblings('input').val();
    var myForm=document.getElementById("commande-form");
    myForm.action= "?controller=user&action=editer";
    $("#id").val(id);
    myForm.submit();
    
});

$('table button.cmd_supprimer').click(function(){
    var id=$(this).siblings('input').val();
    var myForm=document.getElementById("commande-form");
    myForm.action= "?controller=user&action=supprimer";
    $("#id").val(id);
   
    var texte=$('#cdp'+id).text();
    if (confirm("Voulez vous supprimer "+texte+"?")) { // Clic sur OK
           myForm.submit();
       }
       else{
           
       }
    
    
});