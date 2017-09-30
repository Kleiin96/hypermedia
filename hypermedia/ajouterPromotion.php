<!DOCTYPE html>
<html>
	<head>
		<title>Catalog</title>
		<link rel="stylesheet" type="text/css" href="style1.css">
		<meta charset="utf-8" />
	</head>
	<body>
		<header>
			<?php
				include_once('header.php');
			?>
			
		</header>
		
		
		<section class="marge">
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
			<?php
			echo '<div class="article">';
			echo 'Ajouter la période et un code pour appliquer la promotion choisie<br/>
				<a>Le code n est pas obligatoire et ne seras pas exigée si le champs est vide.</a>';
				require_once 'catalogFunction.php';
				$test = new Catalog();
				$test->ajouterPromForm();
			echo '</div>';
			?>
			
		</section>

	</body>
</html>