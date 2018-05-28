<?php
	include ('php/_debug.php');
	include ('templates/_header.php');
?>

	<main class="container">

		<div id="front-page">
			
			<div class="main-image">
				<img src="ressources/imgs/Avatar" alt="Nicolas Bical - Esprit">
			</div>
			

		</div>

		<div id="second-page" class='container '>
			
			<section class="menu">


				<div class="submenu leftblock">
					<a href="oeuvres.php?oeuvre=gravures">
						<div>
							<h3>Gravures</h3>
							<img src="ressources/imgs/gravures.png" alt="">
						</div>
					</a>
					
				</div>

				<div class="submenu centerblock">
					<a href="oeuvres.php?oeuvre=illustrations">
						<div>
							<h3>Illustrations</h3>
							<img src="ressources/imgs/illus.png" alt="">
						</div>
					</a>
					
				</div>
				<div class="submenu rightblock">
					<a href="oeuvres.php?oeuvre=sketchs">
						<div>
							<h3>Sketchs</h3>
							<img src="ressources/imgs/sketchs.png" alt="">
						</div>
					</a>
				</div>

			<div class="clear"></div>
			</section>
		</div>


		<div id="third-page">
			

			<section id="contact">
				
				<div class="contact-item presentation">

					<img src="ressources/imgs/Nicolas Bical.jpg" alt="">

					<p class='artiste'>Nicolas Bical</p>

					<p class='travail'>Graveur / Illustrateur</p>

					<p class='description'>Diplômé de l’École supérieure des arts et industries graphiques Estienne; DMA Gravure en 2012.</p>


					
				</div>

				<div></div>

				<div class="contact-item contact-form">

					<h3>Contactez moi.</h3>

					<form action="contact.php" method="post">
						<input type="text" placeholder="Nom" name='nom'>
						<input type="text" placeholder="Prénom" name="prenom">
						<input type="email" placeholder="Adresse mail" name='email'>
						<textarea name="commentaire" id="" cols="30" rows="10" placeholder="Votre message"></textarea>
						<button type='submit' name='send'>Envoyer</button>
						
					</form>
					
				</div>


			</section>
			<div class="clear"></div>


		</div>




	</main>

	<script>
        window.sr = ScrollReveal();

        sr.reveal('.leftblock', {
	        duration: 2000,
	        scale: 0.2,
	        origin:'left',
	        distance:'500px',
	        mobile: false
        });
        sr.reveal('.centerblock', {
	        duration: 1500,
	        delay:500,
	        scale: 0.2,
	        origin:'bottom',
	        distance:'500px',
	        mobile: false
        });
        sr.reveal('.rightblock', {
	        duration: 1000,
	        delay:1000,
	        scale: 0.2,
	        origin:'right',
	        distance:'500px',
	        mobile: false
        });

        sr.reveal('.presentation', {
        	duration: 1500,
        	scale:0.2,
        	origin:'bottom',
        	distance: '1000px',
        	mobile: false
        });

        sr.reveal('.contact-form', {
        	duration: 2000,
        	scale:0.2,
        	origin:'right',
        	distance: '1000px',
        	mobile: false
        });

        
       
    </script>




<?php include ('templates/second-footer.php'); ?>

