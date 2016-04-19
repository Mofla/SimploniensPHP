<!DOCTYPE html>
<HTML>
<HEAD>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="js.js"></script>
</HEAD>
<BODY>
<table border=1 cellspacing=0>
<tr>
	<td><b>Nom -
<?php
	// 
	$xml = simplexml_load_file('classe-simploniens.xml');
	//print_r($xml); 
	$tableau = [];
	foreach($xml as $simplonien){
		$date = $simplonien->date_naissance;
		$age = floor((time() - strtotime($date)) / 3600 / 24 / 365);
		//echo '<tr><td>'.$simplonien->nom.' '.$simplonien->prenom.'</td><td>'.$age.' ans</td></tr>';
		$a = $simplonien->nom.' '.$simplonien->prenom;
		$b = $age.' ans';
		$tableau[$a] = $b;
	};
	asort($tableau);
	foreach($tableau as $key => $value){
		echo '<tr><td>'.$key.'</td><td>'.$tableau[$key].'</td></tr>';
	};
?>
</table>
</BODY>
</HTML>
