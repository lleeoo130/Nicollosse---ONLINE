



$(document).ready(function(){

	var formFreque 		= document.getElementById("fresque");
	var fresqueReveal 	= document.getElementById("fresque-reveal");
	var fresqueCover 	= document.getElementById("fresque-cover");

		//quand l'utilisateur veut ajouter une fresque.
	$(formFreque).change(function(){

	var fValue = formFreque.options[formFreque.selectedIndex].value;
		//si la valeur est fresque
	if(fValue=='fresque'){
		//on fait apparaitre l'option de miniature
		$(fresqueReveal).css("display", 'block');
		//et on ajoute un required a la miniature 
		//pour eviter qu'elle ne soit sautée
/*		$(fresqueCover).prop('required',true);

*/
	};



});

	$('.btn-light').on('click', function(){
		$(this).toggleClass("active")
	})

});
	