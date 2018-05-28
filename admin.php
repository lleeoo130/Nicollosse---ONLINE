<?php
	include ('php/_debug.php');
	include ('templates/header-admin.php');
	include ('php/_connexion.php');
?>


<?php

	if(!(isset($_POST['password'])) OR ($_POST['password'] != 'bite' ))
	
	{

?>
		<form action="admin.php" method="post">
			<div class="form-group">
				<label for="titre">Password: </label><br>
				<input name="password" class="form-control" type="password" required>
			</div>
			<div class="form-group">
				<input type="submit" value="Okay">
			
			</div>
		
		</form>

	<?php } else { ?>




<main class="container">

	<div class="admin-top mx-auto">
		<a href="index.php">Retour front-page</a>
		/
		<a href="oeuvres.php?oeuvre=illustrations">Retour Oeuvres</a>
	</div>


	<div class="row">

		<div class="col m-5" id="mesOeuvres">
			<h2 class="h2 text-light bg-info">Gallerie</h2>
			<div class="row">
				<div class="col">
					
					<button class="btn btn-light" 		type="button" 
														data-toggle="collapse"
														data-target="#imgGravures" 
														aria-expanded="false" 
														aria-controls="imgGravures">Gravures
					</button>
				</div>
				<div class="col">

					<button class="btn btn-light" 		data-toggle="collapse" 
														data-target="#imgIllus" 
														aria-expanded="false" 
														aria-controls="imgIllus">Illustrations
					</button>
				</div>
				<div class="col">

					<button class="btn btn-light" 		data-toggle="collapse" 
														data-target="#imgSketchs"
														aria-expanded="false" 
														aria-controls="imgSketchs">Sketchs
					</button>
				</div>
			</div>

			

			<table class="table">
				<thead>
					<tr>
						<th>position</th>
						<th colspan="2">titre</th>
						<th>miniature</th>
						<th>infos</th>
						<th>fresque</th>
						<th>edit</th>
						<th>delete</th>
					</tr>
				</thead>


				<tbody class="collapse" id="imgGravures">
					<?php include ('php/views/view-gravures.php'); ?>
				</tbody>

				<tbody class="collapse" id="imgIllus">
					<?php include ('php/views/view-illustrations.php'); ?>
				</tbody>

				<tbody class="collapse" id="imgSketchs">
					<?php include ('php/views/view-sketchs.php'); ?>
				</tbody>
			</table>
			
		</div>



		<div class="col m-5" id="adminPanel">

			<?php include ('php/views/view-add-form.php'); ?>

		</div>


	</div>
</main>

	<?php } ?>

<?php include ('templates/footer-admin.php'); ?>