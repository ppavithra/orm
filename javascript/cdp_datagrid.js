$('table.datagrid button.cmd_editer').click(function(){
    var id=$(this).siblings('input').val();
    var myForm=document.getElementById("commande-form");
    myForm.action= "?controller=coups_de_pouce&action=editer";
    $("#id").val(id);
    myForm.submit();
    
});

$('table.datagrid button.cmd_supprimer').click(function(){
    var id=$(this).siblings('input').val();
    var myForm=document.getElementById("commande-form");
    myForm.action= "?controller=coups_de_pouce&action=supprimer";
    $("#id").val(id);
   
    var texte=$('#cdp'+id).text();
    if (confirm("Voulez vous supprimer "+texte+"?")) { // Clic sur OK
           myForm.submit();
       }
       else{
           
       }
    
    
});