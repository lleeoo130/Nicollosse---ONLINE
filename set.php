<?php

	include ('php/_debug.php');
	include ('php/_connexion.php');

	$id = $_POST['id'];
	$titre = $_POST['titre'];
	$link = $_POST['link'];
	$infos = $_POST['informations'];
	$categorie = $_POST['categorie'];
	$fresque = $_POST['fresque'];
	$position = $_POST['position'];


	try {
		global $bdd;

		$updateOeuvre = $bdd->prepare("



			UPDATE `oeuvres` 

			SET `oeuvres_position` = :position,
					`oeuvres_titre` = :titre,
						`oeuvres_link` = :link, 
							`oeuvres_informations` = :infos,
								`oeuvres_type` = :categorie, 
									`oeuvres_fresque` = :fresque 


			WHERE `oeuvres`.`oeuvres_id` = :id

	
	");

		$updateOeuvre->bindParam( ':id'			, 	$id 		);
		$updateOeuvre->bindParam( ':titre'		, 	$titre 		);
		$updateOeuvre->bindParam( ':link'		, 	$link 		);
		$updateOeuvre->bindParam( ':infos'		, 	$infos  	);
		$updateOeuvre->bindParam( ':categorie'	, 	$categorie 	);
		$updateOeuvre->bindParam( ':fresque'	, 	$fresque 	);
		$updateOeuvre->bindParam( ':position'	, 	$position 	);
		
		

		// Execution du sql
		$updateOeuvre->execute();
		
		// Récupération des données
	}
	catch (PDOException $e) {
		
		echo "Erreur lors de l'éxécution d'une requête SQL :";

		$errorInfo = $updateOeuvre->errorInfo();

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