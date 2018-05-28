<?php
	include ('php/_debug.php');
	include ('php/_connexion.php');
	include ('php/_debug.php');
	include ('php/controllers/controller-add_request.php');
?>

<main class='container page-oeuvres'>

	<p>Votre oeuvre a bien été ajoutée!</p>
	
</main>



<?php 

header('refresh: 0.01,url=admin.php');

include ('templates/_footer.php'); 


?>