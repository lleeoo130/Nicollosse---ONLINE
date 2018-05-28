<h2 class="h2 text-light bg-info">Nouvelle oeuvre:</h2>

			<form action="admin-ajouter-une-oeuvre.php" method="post">

				<div class="form-group">
					<label for="titre">Titre :</label><br>
					<input name="titre" class="form-control" id="titre" type="text" placeholder="Ton titre" required>
				</div>

				<div class="form-group">
					<label for="image">Oeuvre:</label>
					<small class="form-text text-muted"> Nom et extension de l'image (ex: Lion.jpg )</small>
					<input type="text" class="form-control" name="image" required>
				</div>

				<div class="form-group">
					<label for="informations">Description :</label> 
					<div class="fr-view">
						<textarea name="informations"  class="form-control" id="informations" cols="" rows="10"></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="categorie">Catégorie:</label>
					<select name="categorie" id="categorie" class="form-control">
						<option value="illustration">Illustration</option>
						<option value="gravure">Gravure</option>
						<option value="sketch">Sketch</option>
					</select>
					<hr>
				</div>

				<div class="form-group">
					<label for="fresque">Fresque?</label>
					<select name="fresque" id="fresque" class="form-control">
						<option value="non">non</option>
						<option value="fresque">oui</option>
					</select>
				</div>
				

				<div id="fresque-reveal" class="form-group">
					<label>Image de couverture de la fresque?</label>
					<small class="form-text text-muted"> Chercher l'image dans: Nicollosse/ressources/imgs/miniatures-fresques</small>
					<input type="file" name="fresque-cover" class="form-control" id="fresque-cover">
				</div>


				<input id='UploadButton' type="submit"  class="btn btn-info mb-2" name='upload' value='upload image'>
		
			</form>