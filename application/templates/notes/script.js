$(document).ready(function(){
	recupMessages();

	//verifions si le formulaire et soumis et on demarre une fonction
	$('.formulaire').submit(function(){
		// je recupère la valeur de nom
		var nom = $('.nom').val();
		// je recupere la valeur de message
		var message = $('.message').val();
// on va appeler le fichier send.php le fichier qui va inserer  les données dans la bdd 
		//variable nom et mesage ensuite on demarre yune fonctione qui va récupérer les données envoyés 
		$.post('send.php',{nom:nom,message:message}, function(donnees){
			// il va afficher le texte du fichier send.php dans la div afficher voir html
			$('.return').html(donnees).slideDown();

			//on met val vide pour vider le champs apès avir remplis la bdd
			$('.nom').val('');
			$('.message').val('');
			// etape deux pour afficher en tmps réelles
			recupMessages();

			});
		return false;

		});
	function recupMessages()
	{
		$.post('recup.php',function(data){

			$('.afficher').html(data);
		});
	}
	// etape une pour afficher en temps réelles
	setInterval(recupMessages,1000);

});