
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style1.css" />
        <title>Le Site Web</title>
    </head>
	
	<body>
		<?php
			$_SESSION['courriel']="";
			$_SESSION['pwd']="";
			include_once('header.php');
		?>
		
		<article class="col-12">
			<div class="msgCo">
				Veuillez vous identifier pour avoir <br/>
				la possibilité d'acheter des formations
			</div>
			<form action="catalog.php" method="post">
			<fieldset class="loginForm">
			<input type="text" name="courriel" value="Courriel"/><br/><br/>
			<input type="text" name="pwd" value="Mot de passe"/><br/><br/>
			<a href="Login.php"  class="noPass" target="_self">Mot de passe oublié </a></br><br/>
			<div class="col-5">
			<button type="submit" >Connexion</button>
			<input type="button" class="button" onclick="location.href='profil.php';" value="S'inscrire"/>
			</div>
			<br/>
			
			</fieldset>
			<div class="centerStuff">
			</div>
			<img src="images/icones/facebook.png" class="facebook col-3" alt="Login Facebook"/>
			</form>
			
		</article>
	</body>
</html>