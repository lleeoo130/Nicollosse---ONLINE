<?php

	include ('php/_debug.php');
	include ('php/_connexion.php');

	//Recuperation de l'ID transmise par le form.
	$id = $_GET['id'];

	//requete try/catch pour supprimer l'element portant cet ID.
	try {
		/*global $bdd;*/

		$deleteOeuvres = $bdd->prepare("

		DELETE FROM `oeuvres` 
		WHERE `oeuvres`.`oeuvres_id` = :id

		"
	
	);

		$deleteOeuvres->bindParam(':id', 	$id);

		// Execution du sql
		$deleteOeuvres->execute();
		
		// Récupération des données
	}
	catch (PDOException $e) {
		
		echo "Erreur lors de l'éxécution d'une requête SQL :";

		$errorInfo = $deleteOeuvres->errorInfo();

			// Affiche du message d'erreur uniquement
		echo "	<div class=\"sqlError\">
					<fieldset>
						<legend>Erreur sql ¯\_(ツ)_/¯</legend>
						<div class=\"content\">" . $errorInfo[2] . "</div>
					</fieldset>
				</div>
		";

	}


	header('refresh: 0.5,url=admin.php');

?>