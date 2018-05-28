<?php
	include ('php/_debug.php');
	include ('templates/header-admin.php');
	include ('php/_connexion.php');
	include ('php/controllers/get_data_sketchs.php');

	echo '<tr><td colspan="8" class="table-title"> Sketchs </td></tr';

	while($data = $getOeuvresSketchs->fetch()){



		$id 		= 		$data['oeuvres_id'];
		$titre 		= 		$data['oeuvres_titre'];
		$link 		= 		$data['oeuvres_link'];
		$infos 		= 		$data['oeuvres_informations'];
		$type 		= 		$data['oeuvres_type'];
		$fresque 	= 		$data['oeuvres_fresque'];
		$position 	= 		$data['oeuvres_position'];

		//Limiter le contenu de la cellule à 15 caractères
		$shortInfos = substr($infos ,0 ,15 );

		if($type== 'sketch'){
		echo 		'
					<tr>
					
						<td>' .$position.' </td>
						<td colspan="2">'.$titre.'</td>

						<td class="td-img">
							<img src="ressources/imgs/gallerie/'.$link.'" alt="'.$titre.'">
						</td>

						<td class="td-desc">'.$shortInfos.'...</td>
						<td>'.$fresque.'</td>
						<td><a href="edit.php?id='.$id.'"><i class="far fa-edit"></i></a></td>

						<td  class="editable" data-id="" data->
							<a href="delete.php?id='.$id.'">
								<i class="far fa-trash-alt"></i>
							</a>
						</td>
					</tr>
					
			';
		};

	};


?>