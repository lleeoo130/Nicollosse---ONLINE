<?php

	include ('php/_debug.php');
	include ('templates/header-admin.php');
	include ('php/_connexion.php');
	include ('php/controllers/controller-edit.php');






while($data = $retrouverOeuvre->fetch()){



		$id 		= 		$data['oeuvres_id'];
		$titre 		= 		$data['oeuvres_titre'];
		$link 		= 		$data['oeuvres_link'];
		$infos 		= 		$data['oeuvres_informations'];
		$type 		= 		$data['oeuvres_type'];
		$fresque 	= 		$data['oeuvres_fresque'];
		$position 	= 		$data['oeuvres_position'];



		echo 		'<div id="admin-edit-form">
						<form action="set.php?id='.$id.'" method="post">
						<h3>Edites ton oeuvre!</h3>

						<div class="form-group">
							<input name="id" type="text" placeholder="Ton titre" value="'.$id.'" class="form-control display-none">
						</div>

						<div class="form-group">
							<label for="titre">Position :</label><br>
							<input name="position" type="text" placeholder="Position" value="'.$position.'" class="form-control">
						</div>
						
						

						<div class="form-group">
							<label for="titre">Titre :</label><br>
							<input name="titre" type="text" placeholder="Ton titre" value="'.$titre.'" class="form-control">
						</div>
						
						<div class="form-group">
							<label>Oeuvre:</label>
							<input type="text" name="link" class="form-control display-none" value="'.$link.'">
						</div>
						
						<div class="form-group">
							<label>Description :</label> <br>
							<div class="fr-view">
							<textarea name="informations" id="" cols="30" rows="10" class="form-control">'.$infos.'</textarea>
							</div>
						</div>


						<div class="form-group">
							<label>Catégorie:</label>
							<select name="categorie" id=""  class="form-control" value="'.$type.'">
								<option '.(($type=='illustration')?'selected="selected"':"").'value="illustration">Illustration</option>
								<option '.(($type=='gravure')?'selected="selected"':"").' value="gravure">Gravure</option>
								<option '.(($type=='sketch')?'selected="selected"':"").'value="sketch">Sketch</option>
							</select>
						</div>


						<div class="form-group">
							<label>Fresque?</label>
							<select name="fresque" class="form-control" id="" value="'.$fresque.'">
								<option value="non">non</option>
								<option value="fresque">oui</option>
							</select>
						</div>


					<input id="EditButton" class="btn" type="submit" name="edit" value="edit image">

					</form>
	</div>



					
		';

		};


		echo "<br><br><br><a href='admin.php'>Retour sur la page admin</a>";
		?>



<?php include ('templates/footer-admin.php'); ?>	
		