<?php

	try {
		global $bdd;

		$getOeuvresIllustrations = $bdd->prepare("

		SELECT * FROM `oeuvres`
		ORDER BY `oeuvres`.`oeuvres_position` DESC

		"
	
	);

		// Execution du sql
		$getOeuvresIllustrations->execute();
		
		// Récupération des données
	}
	catch (PDOException $e) {
		
		echo "Erreur lors de l'éxécution d'une requête SQL :";

		$errorInfo = $getOeuvresIllustrations->errorInfo();

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


