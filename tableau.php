<!DOCTYPE html>
<HTML>
<HEAD>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="js.js"></script>
	<link rel="stylesheet" type="text/css" href="css.css" />
	</style>
</HEAD>
<BODY>
<!-- Création du tableau-->
<table cellspacing=0>
<tr>
	<td>Nom</td><td>Age</td>
</tr>
<!-- Début du code php -->
<?php
	// ouverture et stockage du xml dans une var
	$xml = simplexml_load_file('classe-simploniens.xml');
	// création d'un tableau vide pour stocker les données pour ensuite pouvoir les 'sort'
	$tableau = [];
	foreach($xml as $simplonien){
		// récupération de la date de naissance
		$date = $simplonien->date_naissance;
		// transformation en âge avec un calcul
		$age = floor((time() - strtotime($date)) / 3600 / 24 / 365);
		// fusion des valeurs nom et prenom du xml pour faire une variable str du genre "Nom Prénom"
		$a = '<b>'.$simplonien->nom.'</b> '.$simplonien->prenom;
		// transformation de la variable age en str avec ajout du ' ans'
		$b = $age.' ans';
		// ajout des informations dans le tableau
		$tableau[$a] = $b;
	};
	// on 'sort' selon l'age, du plus jeune au plus vieux
	asort($tableau);
	// on affiche le tableau final
	foreach($tableau as $key => $value){
		
echo '<tr><td>'.$key.'</td><td>'.$tableau[$key].'</td></tr>';
	};
?>
<!-- Fin du code php -->
</table>
</BODY>
</HTML>
