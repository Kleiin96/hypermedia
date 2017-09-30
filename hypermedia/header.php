<?php
	session_start();
?>
<!DOCTYPE html>
<?php
	require_once "connectBd.php";
	if(!empty($_POST)){
	$_SESSION['courriel']= $_POST['courriel'];
	$_SESSION['pwd']=$_POST['pwd'];
	}
	// On récupère nos variables de session
	if (isset($_SESSION['courriel']) && isset($_SESSION['pwd'])) {
	// On teste pour voir si nos variables ont bien été enregistrées
	//echo '<html>';
	//echo '<head>';
	//echo '<title>Page de notre section admin</title>';
	//echo '</head>';
	//echo '<body>';
	//echo 'Votre login est '.$_SESSION['courriel'].' et votre mot de passe est '.$_SESSION['pwd'].'.';
	//echo '<br />';
	// On affiche un lien pour fermer notre session
	//echo '<a href="./logout.php">Déconnection</a>';
	}
	else {
	echo 'Les variables ne sont pas déclarées.';
	}
	echo "
			<html>
				<head>
					<meta charset='utf-8' />
					<link rel='stylesheet' href='style1.css' />
					<link href='https://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet'> 
					<title>Le Site Web</title>
				</head>
	
			<body>";
	$test = new DbConnection();
	$conn= $test->getdbconnect();
	$sql="SELECT * FROM Utilisateur WHERE courriel=\"".$_SESSION['courriel']."\" AND mot_de_passe=\"".$_SESSION['pwd']."\";";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
		//print_r $row;
	if (is_null($row["pk_utilisateur"])){
		echo "<header class='col-12 Degrade'>
			<article class='col-11'>
				<img class='Logo' src='images/icones/logo.png' alt='Logo'/>
			</article>
			<article class='col-1'>
				<a href='profil.php' class='Identification loginNoMarge' target='_self'>S'identifier</a>
			</article>
		</header>
		</body>
		</html>";
	}
	else if ($row['administrateur']==1){
		$_SESSION['admin']=TRUE;
		echo "<header class='col-12 Degrade'>
					<article class='col-3'>
						<img class='Logo' src='images/icones/logo.png' alt='Logo'/>
					</article>
					<article class='col-7'>
						<ul>
							<li class='col-3'></li>
							<li  class='col-3'><a href='catalog.php' class='menu menuItem1'>Service</a></li>
							<li  class='col-3'><a href='facture.php' class='menu menuItem2'>Facture</a></li>
						</ul>
					</article>
					<article class='col-2'>
						<a href='Login.php' class='Identification deco' target='_self'>Se déconnecter</a>
						<input class='searchbar' type='text'>
					</article>
					
				</header>
				</body>
				</html>";
	}
	else if($row['administrateur']==0){
		$_SESSION['admin']=FALSE;
		echo "<header class='col-12 Degrade'>
					<article class='col-3'>
						<img class='Logo' src='images/icones/logo.png' alt='Logo'/>
					</article>
					<article class='col-6'>
						<ul>
							<li class='col-3'></li>
							<li  class='col-3'><a href='catalog.php' class='menu menuItem1'>Catalogue</a></li>
							<li  class='col-3'><a href='profil.php' class='menu menuItem2'>Profil</a></li>
						</ul>
					</article>
					<article class='col-3'>
						<a href='404.php' class='Identification' target='_self'>Mon panier(0)</a>
						<a href='Login.php' class='Identification deco' target='_self'>Se déconnecter</a>
						<input class='searchbar' type='text'>
					</article>
					
				</header>
				</body>
				</html>";
	}
		?>