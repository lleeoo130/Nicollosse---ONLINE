<?php
	include ('php/_debug.php');
	include ('templates/_header.php');

	if (isset($_POST['send'])) {

			//On stock les infos dans des variables;
		$nom 			= $_POST['nom'];
		$prenom 		= $_POST['prenom'];
		$email 			= $_POST['email'];
		$commentaire 	= $_POST['commentaire'];


			//On enleve les potentiels tags html;
		$nom 			= strip_tags($nom);
		$prenom 		= strip_tags($prenom);
		$email 			= strip_tags($email);
		$commentaire 	= strip_tags($commentaire);


		$destinataire = 'nico.bical@gmail.com';

		$sujet = 'Contact de la part de:' .$nom. ' ' .$prenom;

		$message  = 	'<em>De:</em> ' . $nom . ' ' . $prenom . "\r\n";
		$message .= '<em>Adresse mail:</em> ' .$email. "\r\n\r\n";
		$message .= '<em>Message:</em> '. $commentaire ;

			//On filtre l'adresse mail; source d'emmerdes.
		$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);



		$headers = "De: webmaster@nicolas-bical.fr\r\n";
		$headers .= 'Content-Type: text/plain; charset=utf-8';

		if ($email) {
			$headers .= '\r\nReply-To: $email';
		}

		
		$success = mail($destinataire, 
						$sujet, 
						$message, 
						$headers, 
						'-fnico.bical@gmail.com'
					);


	};
?>


<body>

	<?php if (isset($success) && $success) { ?>
		
		<h2>Merci!</h2>
		<p>Votre message a bien été envoyé.</p>

	<?php } else { ?>

		<h2>Oups!</h2>
		<p>Il y a eu un problème pendant l'envoi du message.</p>

	<?php } ?>

</body>


	
	<a href="index.php">Page d'acceuil</a>







<?php include ('templates/second-footer.php'); ?>