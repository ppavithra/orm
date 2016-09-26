$('table button.cmd_editer').click(function(){
    var id=$(this).siblings('input').val();
    var myForm=document.getElementById("commande-form");
    myForm.action= "?controller=offre&action=editer";
    $("#id").val(id);
    myForm.submit();
    
});

$('table button.cmd_supprimer').click(function(){
    var id=$(this).siblings('input').val();
    var myForm=document.getElementById("commande-form");
    myForm.action= "?controller=offre&action=delete";
    $("#id").val(id);

    if (confirm("Voulez vous supprimer cette offre?")) { // Clic sur OK
           myForm.submit();
       }
       else{
           
       }
    
    
});