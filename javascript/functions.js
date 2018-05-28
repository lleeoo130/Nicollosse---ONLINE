console.log('functions.js');




/*                       M o d a l                         */



var modal = document.getElementById('myModal');
var modalFresque = document.getElementById('myModalFresque');

var modalImg = document.getElementById("img01");
var modalImgFresque = document.getElementById("img02");

var captionText = document.getElementById("caption");
var captionTextFresque = document.getElementById("captionFresque");

var captionInfos = document.getElementById("infos");
var captionInfosFresque = document.getElementById("infosFresque");

var infos = document.getElementById("captionInfos");
var infosFresque = document.getElementById("captionInfosFresque");

var display = document.getElementById('display');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


function activateModal(img){
    modal.style.display = "block";
    modalImg.src = img.src;
    var imagesLoaded = $('.display-loaded');

    	if($(img).attr('data-infos')){
    		infos.style.display = "block";
    		captionInfos.innerHTML = $(img).attr('data-infos');
    		captionText.innerHTML = img.alt;
    	}
    	else{
    		infos.style.display = "none";
    		captionText.innerHTML = img.alt;
    	};
    		$('#flecheGauche').css('display', 'block');
			$('#flecheDroite').css('display', 'block');
			
};

function activateModalFresque(img){

    modalFresque.style.display = "block";
    modalImgFresque.src = 'ressources/imgs/gallerie/' + img.dataset.src;

    if($(img).attr('data-infos')){

		infosFresque.style.display = "block";
		captionInfosFresque.innerHTML = $(img).attr('data-infos');
		captionTextFresque.innerHTML = '';

    	}

    	else{

		infosFresque.style.display = "none";
		captionTextFresque.innerHTML = img.alt;

    	};
};


function getModalSrc(){

	var modalSrc = $('.modal-content').attr('src');

}


function getNextImage(){


	var contentLoaded = $('.display-loaded:not(.fresque)');
	var modalSrc = $('.modal-content').attr('src');

	var contentLoadedLenght = contentLoaded.length;


			//URL généré à supprimer dans le modal. = 32
	//var trash = 'http://localhost/Leo/Nicollosse/';
			//Online = 25
	 var trash =	"http://nicolas-bical.com/";


			//On match les links, si ils sont différents
	if (modalSrc.indexOf(trash)>=0){
		var modalSrcShort = modalSrc.slice(25);
	}
	else{
		var modalSrcShort = modalSrc.slice(0,-1);
	};
			//Supprime l'encodage des URI
	modalSrcShort = decodeURIComponent(modalSrcShort);



	for (var i = 0; i < contentLoaded.length; i++) {

		var contentLoadedSrc = $(contentLoaded[i]).attr('src');
			//On match les links
		var contentLoadedSrcShort = contentLoadedSrc.slice(0,-1);


		if (contentLoadedSrcShort == modalSrcShort){

			var nouvelleImage = $(contentLoaded[i+1]);

			var premiereImage = $(contentLoaded[0]);

				//Revenir au début
			if ( (i == ((contentLoaded.length)-1)) || (i == contentLoaded.lenght)) {

				nouvelleImage = premiereImage;

			}
			
						
				//On récupere le lien de l'image à charger.
			var lienACharger = $(nouvelleImage).attr('src');
				//On l'injecte dans la source du modal.
			var nouveauLien = $('.modal-content').attr('src', lienACharger);
				//On récupère la caption de l'image  charger.
			var captionACharger = $(nouvelleImage).attr('alt');
				//On l'injecte dans le modal.
			var nouvelleCaption = $('#caption').html(captionACharger);
				
				//Si la nouvelle image à des infos; on les display; sinon...
			if($(nouvelleImage).attr('data-infos')){
		    		infos.style.display = "block";
		    		captionInfos.innerHTML = $(nouvelleImage).attr('data-infos');
		    		/*captionText.innerHTML = '';*/
		    	}
		    	else{
		    		infos.style.display = "none";
		    		captionText.innerHTML = $(nouvelleImage).attr('alt');
		    };
		
		};
	};
};


function getPreviousImage(){

	var contentLoaded = $('.display-loaded:not(.fresque)');
	var modalSrc = $('.modal-content').attr('src');

			//URL généré à supprimer dans le modal. = 32
	//var trash = 'http://localhost/Leo/Nicollosse/';
			//Online = 25
	 var trash =	"http://nicolas-bical.com/";



			//On match les links, si ils sont différents
	if (modalSrc.indexOf(trash)>=0){

		var modalSrcShort = modalSrc.slice(25);
	}
	else{
		var modalSrcShort = modalSrc.slice(0,-1);
	};

		//Supprime l'encodage des URI
	modalSrcShort = decodeURIComponent(modalSrcShort);

	for (var i = 0; i < contentLoaded.length; i++) {

		var contentLoadedSrc = $(contentLoaded[i]).attr('src');
			//On match les links
		var contentLoadedSrcShort = contentLoadedSrc.slice(0,-1);

		if (contentLoadedSrcShort == modalSrcShort){

			var nouvelleImage = $(contentLoaded[i-1]);

			var derniereImage = $(contentLoaded[contentLoaded.length - 1]);
				
				//Revenir à la fin
				if ((i == 0)) {

					nouvelleImage = derniereImage;

				};
			
			//On récupere le lien de l'image à charger.
			var lienACharger = $(nouvelleImage).attr('src');
			
			
			
				//On l'injecte dans la source du modal.
			var nouveauLien = $('.modal-content').attr('src', lienACharger);
				//On récupère la caption de l'image  charger.
			var captionACharger = $(nouvelleImage).attr('alt');
				//On l'injecte dans le modal.
			var nouvelleCaption = $('#caption').html(captionACharger);

				
				//Si la nouvelle image à des infos; on les display; sinon...
			if($(nouvelleImage).attr('data-infos')){
		    		infos.style.display = "block";
		    		captionInfos.innerHTML = $(nouvelleImage).attr('data-infos');
		    		/*captionText.innerHTML = '';*/
		    	}
		    	else{
		    		infos.style.display = "none";
		    		captionText.innerHTML = $(nouvelleImage).attr('alt');
		    };
		};
	};
};


$( "#photoStock img" ).click(function( event ) { 

    var img = event.target;

    if (img.classList.contains('fresque')==true){
    	activateModalFresque(img);
    	display.style.display = "none";
    }
    else{
		activateModal(img);
    }
});


// When the user clicks on <span> (x), close the modal
$('#myModal').on('click', function(e) {
	
	var target = e.target;
	var modal = ($('#myModal')[0]);

		//Evite d'avoir l'event sur toute la page.
	if (target == modal ){
  		modal.style.display = "none";
  	}
	e.stopPropagation();
});

$('#myModal .close').on('click', function(e) {
	modal.style.display = "none";
});

$('.closeInfos').on('click', function(e) {
	e.stopPropagation();
  	$('#captionInfos').css('display', 'none');
});

$('#myModalFresque').on('click', function(e) {
	e.stopPropagation();
  	modalFresque.style.display = "none";
  	display.style.display = "block";
});

$('#captionInfosFresque').on('click', function(e) {
	
});

$('.closeInfosFresque').on('click', function(e) {
	e.stopPropagation();
  	$('#captionInfosFresque').css('display', 'none');
});


	//Scroll sur le modal fresque.
var mouseWheelEvt = function (event) {
	var y = event.deltaY;
	modalFresque.scrollLeft += y;
    return false;
}
if(modalFresque){
	modalFresque.addEventListener("mousewheel", mouseWheelEvt);
};






/*                       O e u v r e s                    */

function showIllus(){
	$('img.illustration').removeClass('display-none').addClass('display-loaded');
	$('img.gravure').addClass('display-none').removeClass('display-loaded');
	$('img.sketch').addClass('display-none').removeClass('display-loaded');
}


function showGravures(){
	$('img.gravure').removeClass('display-none').addClass('display-loaded');
	$('img.illustration').addClass('display-none').removeClass('display-loaded');
	$('img.sketch').addClass('display-none').removeClass('display-loaded');	
}

function showSketchs(){
	$('img.sketch').removeClass('display-none').addClass('display-loaded');
	$('img.illustration').addClass('display-none').removeClass('display-loaded');
	$('img.gravure').addClass('display-none').removeClass('display-loaded');
}
	
$('#btn-illu').click(loadAndShowIllus);
$('#btn-gravures').click(loadAndShowGravures);
$('#btn-sketchs').click(loadAndShowSketchs);


	//Ouvre la page en displayant les images une a une en cascade.
function ouvrirPage(){

	var collone1 = $('.col-1').find('img');
	var collone2 = $('.col-2').find('img');
	var collone3 = $('.col-3').find('img');
	var collone4 = $('.col-4').find('img');

var tl = new TimelineLite();

tl 	.staggerTo(collone1, 0.8, {alpha:1},  0.2)
	.staggerTo(collone2, 0.8, {alpha:1},  0.2,  	0.6)
	.staggerTo(collone3, 0.8, {alpha:1},  0.2, 		0.8)
	.staggerTo(collone4, 0.8, {alpha:1},  0.2, 		1);


};


	//Ferme la page en retirant les images une à une
function fermerPage(){

	var collone1 = $('.col-1').find('img');
	var collone2 = $('.col-2').find('img');
	var collone3 = $('.col-3').find('img');
	var collone4 = $('.col-4').find('img');

	var tl = new TimelineLite();

	tl.timeScale(2);

	tl	.staggerTo(collone1, 0.8, {alpha:0},  0.2,	0.1)
		.staggerTo(collone2, 0.8, {alpha:0},  0.2,	0.2)
	 	.staggerTo(collone3, 0.8, {alpha:0},  0.2, 	0.3)	 	
	 	.staggerTo(collone4, 0.8, {alpha:0},  0.2, 	0.4);
};

	//Organise les images et les display après une seconde.
function loadPage(){
	organiserImages();
	setTimeout(ouvrirPage,1000);
};




	//Place les images de la bonne catégorie dans les differentes collones

function organiserImages(){

	var photoStock = $('#photoStock');
	var images = photoStock.find('img:not(.display-none)');
	images.addClass('display-loaded');
	var counter;

	for(counter=0; counter<=images.length; counter++){
	

		if (counter%4 == 0){

			$('.col-1').append(images[counter]);
		}
		else if (counter%4 == 1){

			$('.col-2').append(images[counter]);
		}
		else if(counter%4 == 2){

			$('.col-3').append(images[counter]);
		}
		else{
			$('.col-4').append(images[counter]);

		}

	}
};


function loadAndShowIllus(){
	fermerPage();
	setTimeout(showIllus,800);
	setTimeout(organiserImages,850);
	setTimeout(ouvrirPage,900);

};

function loadAndShowGravures(){
	fermerPage();
	setTimeout(showGravures,800);
	setTimeout(organiserImages,850);
	setTimeout(ouvrirPage,900);

};

function loadAndShowSketchs(){
	fermerPage();
	setTimeout(showSketchs,800);
	setTimeout(organiserImages,850);
	setTimeout(ouvrirPage,900);

};



/*                       F r o n t    P a g e                        */

function animation(){
	var block1 = $('#second-page section .submenu:nth-child(1)');
	var block2 = $('#second-page section .submenu:nth-child(2)');
	var block3 = $('#second-page section .submenu:nth-child(3)');

	block1.animate({

			left:0,
			top:0,
			opacity:1

	},500);

	block2.delay(900).animate({

			top:0,
			opacity:1

	},300);

	block3.delay(500).animate({

			left:0,
			top:0,
			opacity:1

	},400);

};

function animerTitre(){

	$('.lettre8').html(' ');

var tl = new TimelineLite();

tl.timeScale(1);

tl	.from('.main-image img',1,{scale:0,alpha:0}, '+=0.8')

/*	.from('.lettre7', 0.5 ,{x:'-1000px', alpha:0, scale:5}, '#1er')
	.from('.lettre13', 0.5 ,{x:'750px', alpha:0, scale:5}, '#1er')

	.from('.lettre6', 0.4 ,{x:'-950px', alpha:0, scale:5}, '#2eme')
	.from('.lettre12', 0.4 ,{x:'800px', alpha:0, scale:5}, '#2eme')

	.from('.lettre5', 0.3 ,{x:'-900px', alpha:0, scale:5}, '#3eme')
	.from('.lettre11', 0.3 ,{x:'850px', alpha:0, scale:5}, '#3eme')

	.from('.lettre4', 0.25 ,{x:'-850px', alpha:0, scale:5}, '#4eme')
	.from('.lettre10', 0.25 ,{x:'900px', alpha:0, scale:5}, '#4eme')

	.from('.lettre3', 0.2 ,{x:'-800px', alpha:0, scale:5}, '#5eme')
	.from('.lettre9', 0.2 ,{x:'950px', alpha:0, scale:5}, '#5eme')

	.from('.lettre2', 0.1 ,{x:'-700px', alpha:0, scale:5}, )
 	.from('.lettre1', 0.1 ,{x:'-750px', alpha:0, scale:5,},  )


	.staggerFrom('header nav ul li',0.3,{y:'45px',alpha:0,scale:5.1},0.15)

	.to('.main-image img',0.2,{scale:1.05}, )
	.to('.main-image img',0.1,{scale:1.0}, )
	.to('.main-image img',0.2,{scale:1.05}, )
	.to('.main-image img',0.8,{scale:1.0}, )
	.to('.main-image img',0.2,{scale:1.05}, )
	.to('.main-image img',0.1,{scale:1.0}, )
	.to('.main-image img',0.2,{scale:1.05}, )
	.to('.main-image img',0.8,{scale:1.0}, )
*/
;
};








function changerImages() {
	$('#myModal #flecheGauche').on('click', getPreviousImage);
	$('#myModal #flecheDroite').on('click', getNextImage);
	$('#myModal .modal-content').on('click', getNextImage);
};

changerImages();
