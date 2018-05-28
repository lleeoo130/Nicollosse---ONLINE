<?php

	include ('php/_debug.php');
	include ('templates/header-admin.php');
	include ('php/_connexion.php');

	$id = $_GET['id'];

	try {
		global $bdd;

		$retrouverOeuvre = $bdd->prepare("

		SELECT * FROM `oeuvres`

		WHERE `oeuvres`.`oeuvres_id` = :id

		"
	);

		$retrouverOeuvre->bindParam(':id', 	$id);

		// Execution du sql
		$retrouverOeuvre->execute();
		
		// Récupération des données
	}
	catch (PDOException $e) {
		
		echo "Erreur lors de l'éxécution d'une requête SQL :";

		$errorInfo = $retrouverOeuvre->errorInfo();

			// Affiche du message d'erreur uniquement
		echo "	<div class=\"sqlError\">
					<fieldset>
						<legend>Erreur sql ¯\_(ツ)_/¯</legend>
						<div class=\"content\">" . $errorInfo[2] . "</div>
					</fieldset>
				</div>
		";

	}

	?>