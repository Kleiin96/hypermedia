<!DOCTYPE html>
<html>
	<head>
		<title>Catalog Admin</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<header>
			<img src="Laboratoire1/images/icones/logo.png"/>
			
		</header>
		<section class="marge">
			<!--<div class="article">
				<img class="flotte" src="Laboratoire1/images/services/CoursAccess.png"/>
				<div class="pad">
					Access Debutant<br/>
					<br/>
					Ce cours a pour objectif de vous montrer les bases du access<br/>
					fbgbgdnncbvnvbmv ysigvhvbh i svihbf siv ni ndibndibndbijn bin<br/>
					hecfinvhuenfuhvn hvnefucnefcneunchc   rvefvv  ertbrb rtrtvrtv tg<br/>
					</br>
					<a class="tarif">Tarif : 200$</a> <a class="duree">Duree : 25h</a><br/><br/><br/><br/>
					<a class="titreRabais">Promotion : </a>
					<img  class="rabais nonselect" src="Laboratoire1/images/promotions/10.png" /></br>
					<img  class="panier" src="Laboratoire1/images/icones/media.jpg" /></br>
					</br>
					</br>
				</div>
			</div>-->
			<?php
				
				require_once 'catalogFunction.php';
				
				$test = new Catalog();
				$test->createCatalogAdmin();
			?>
		</section>

	</body>
</html>