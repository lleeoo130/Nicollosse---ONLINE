<?php 


		$oeuvreTitre 		= $_POST['titre'];
		$oeuvreLink 		= $_POST['image'];
		$oeuvreInfos 		= $_POST['informations'];
		$oeuvreType 		= $_POST['categorie'];
		$oeuvreFresque 		= $_POST['fresque'];
		$oeuvreMiniature	= $_POST['fresque-cover'];

	try {


		global $bdd;


	$addRequest = $bdd->prepare("

		INSERT INTO `oeuvres` 
								(`oeuvres_id`, 
									`oeuvres_titre`, 
										`oeuvres_link`, 
											`oeuvres_informations`, `oeuvres_type`, 
													`oeuvres_fresque`,
														`oeuvres_fresque_cover`) 
		VALUES 					(NULL, 
									:oeuvreTitre, 
										:oeuvreLink, 
											:oeuvreInfos, 
												:oeuvreType, 
													:oeuvreFresque,
														:oeuvreMiniature);

		"
	
	);
		$addRequest->bindParam(':oeuvreTitre', 	$oeuvreTitre);
		$addRequest->bindParam(':oeuvreLink', 	$oeuvreLink);
		$addRequest->bindParam(':oeuvreInfos', 	$oeuvreInfos);
		$addRequest->bindParam(':oeuvreType', 	$oeuvreType);
		$addRequest->bindParam(':oeuvreFresque', $oeuvreFresque);
		$addRequest->bindParam(':oeuvreMiniature', $oeuvreMiniature);
		// définition des variables à passer dans le SQL de manière saine
		

		// Execution du sql
		$addRequest->execute();
		
		// Récupération des données
	}
	catch (PDOException $e) {
		
		echo "Erreur lors de l'éxécution d'une requête SQL :";

		$errorInfo = $addRequest->errorInfo();

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