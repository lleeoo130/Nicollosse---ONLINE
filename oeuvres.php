<?php
	include ('php/_debug.php');
	include ('templates/second-header.php');
	include ('php/_connexion.php');
	include ('php/controllers/get_data_gravures.php');
?>

<main class='container page-oeuvres'>

	<div id="side-menu">
		<a href="index.php"><h2>Nicolas Bical</h2></a>

		<nav>
			<ul>
				<li><a href="#" id='btn-gravures'>Gravures</a></li><div class="clear"></div>
				<li><a href="#" id='btn-illu'>Illustrations</a></li><div class="clear"></div>
				<li class='taLeft'><a href="#" id='btn-sketchs'>Sketchs</a></li><div class="clear"></div>
			</ul>
		</nav>

	</div>
	
	<div id='display'>

		<div class="column col-1">
			
		</div>

		<div class="column col-2">

		</div>

		<div class="column col-3">

		</div>

		<div class="column col-4">

		</div>

		<div class="clear"></div>

	</div>


		<!-- Photo Stock -->
		<div id="photoStock">

		<?php 
			while($data = $getOeuvresGravures->fetch()){



		$id 		= 		$data['oeuvres_id'];
		$titre 		= 		$data['oeuvres_titre'];
		$link 		= 		$data['oeuvres_link'];
		$infos 		= 		$data['oeuvres_informations'];
		$type 		= 		$data['oeuvres_type'];
		$fresque 	= 		$data['oeuvres_fresque'];
		$fresqueMini= 		$data['oeuvres_fresque_cover'];


		$titre = htmlspecialchars($titre, ENT_QUOTES);

		if (($fresqueMini !='') && ($fresqueMini!=null )){
			echo "

					<img class='".$type." ".$fresque."' src='ressources/imgs/miniatures-fresques/".$fresqueMini." ' alt='".$titre."' data-infos='".$infos."' data-src='".$link."'>

				";

			
		}
		else{
			echo "

					<img class='".$type." ".$fresque."' src='ressources/imgs/gallerie/".$link." ' alt='".$titre."' data-infos='".$infos."'>

				";
		}


		};


		?>
					
		</div>


		<!-- The Modal -->
		<div id="myModal" class="modal">
			<span class="close">&times;</span>
			<img class="modal-content" id="img01">
			<div id="flecheGauche" class='fleche'>
				<img src="ressources/icons/back" alt="">
			</div>
			<div id="flecheDroite" class='fleche'>
				<img src="ressources/icons/next" alt="">
			</div>
			<div id="caption"></div>
			<section id="captionInfos">
		  		<div class="closeInfos">
		  			<i class="far fa-times-circle"></i>
		  		</div>
		  		<div id="infos"></div>
		  </section>
		</div>
	
		<div id="myModalFresque" class="modal modalFresque">
		  <span class="close">&times;</span>
		  <img class="modalFresque-content" id="img02">
		  <div id="captionFresque"></div>
		  <section id="captionInfosFresque">
		  		<div class="closeInfosFresque">
		  			<i class="far fa-times-circle"></i>
		  		</div>
		  		<div id="infosFresque"></div>
		  </section>
		 
		</div>
		
		
		


</main>



<?php include ('templates/_footer.php'); ?>

<?php

	echo '<script>';
	
	/*Ici on run une fonction differente en fonction du link d'arrivée*/

		if($_GET['oeuvre'] == 'illustrations'){

			echo 'loadAndShowIllus();';
		}

		else if($_GET['oeuvre'] == 'gravures' ){

			echo 'loadAndShowGravures();';
		}

		else {
			echo 'loadAndShowSketchs();';
		};

	echo '</script>';

?>