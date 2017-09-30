<?php
	require_once "connectBd.php";
	session_start();
?>
<html>

	<head>
	
		<title>
		</title>
		
		<link rel="stylesheet" type="text/css" href="style1.css">
		
		<meta charset= "utf8"/>
		
	</head>
	<body>
		<?php
		 include_once('header.php');
		?>
		<form>
			<fieldset>
				<div class="margin">
					<div class="title1">
						Remplissez ce formulaire pour créer votre profil</br>
					</div>
					<div class="title2">
						Tous les champs sont obligatoires</br></br>
					</div>
					<?php
						$test = new DbConnection();
						$conn = $test->getdbconnect();
						
						$sql = "SELECT u.courriel,u.mot_de_passe,client.prenom,client.nom,client.telephone,client.infolettre,adresse.no_civique,adresse.rue, adresse.code_postal,ville.ville 
								FROM utilisateur AS u
								JOIN client ON u.pk_utilisateur = client.fk_utilisateur
								JOIN adresse ON client.fk_adresse = adresse.pk_adresse
								JOIN ville ON adresse.fk_ville = ville.pk_ville
								WHERE courriel='".$_SESSION['courriel']."'";
						$sql2 = "SELECT ville 
								FROM ville";
						$result = $conn->query($sql);
						$result2 = $conn ->query($sql2);
						if ($result->num_rows > 0) {
							// output data of each row
							$row = $result->fetch_assoc();
								echo "<input type='text' name='nom' id='nom' value='".$row["nom"]."' required/>
									<input type='text' name='prenom' id='prenom' value='".$row["prenom"]."' required/></br>
									<input class='noCiv' type='text' name='civ' id='civ' value='".$row["no_civique"]."' required/>
									<input class='rue' type='text' name='rue' id='rue' value='".$row["rue"]."' required/>
									<select>
										<option value='ville'>".$row["ville"]."</option>";
										while($row2 = $result2->fetch_assoc()){
											echo "<option>".$row2["ville"]."</option>";
										}
									echo "
									</select></br>
									<input type='text' name='codePostal' id='codePostal' value='".$row["code_postal"]."' required/>
									<input type='text' name='telephone' id='telephone' value='".$row["telephone"]."' required/></br></br>
									<div class='title1'>
										Votre courriel servira à vous identifier lors de votre prochaine visite </br>
									</div>
									<div class='title2'>
										Le mot de passe doit avoir au moins 1 chiffre, 1 lettre et 8 caractères minimum</br>
									</div>
									<input type='text' name='courriel' id='courriel' value='".$row["courriel"]."' required/>
									<input type='text' name='confCourriel' id='confCourriel' value='".$row["courriel"]."' required/></br>
									<input type='text' name='password' id='password' value='".$row["mot_de_passe"]."' required/>
									<input type='text' name='confPassword' id='confPassword' value='".$row["mot_de_passe"]."' required/></br>";

								if($row["infolettre"]==1){
									echo "<div class='checkboxText'>
									<input class='checkbox' type='checkbox' name='promotions' id='promotions' checked>
									Souhaitez-vous recevoir les promotions et les nouveautés
									</div>";
								}
								else{
									echo "<div class='checkboxText'>
									<input class='checkbox' type='checkbox' name='promotions' id='promotions'>
									Souhaitez-vous recevoir les promotions et les nouveautés
									</div>";
								}
						}
						else {
							$test = new DbConnection();
							$conn = $test->getdbconnect();
							$sql = "SELECT ville 
								FROM ville";
							$result = $conn ->query($sql);
							echo "<input type='text' name='nom' id='nom' value='Nom' required/>
									<input type='text' name='prenom' id='prenom' value='Prenom' required/></br>
									<input class='noCiv' type='text' name='civ' id='civ' value='No Civic' required/>
									<input class='rue' type='text' name='rue' id='rue' value='Rue' required/>
									<select>
										<option value='ville'>Ville</option>";
										while($row = $result->fetch_assoc()){
											echo "<option>".$row["ville"]."</option>";
										}
									echo "
									</select></br>
									<input type='text' name='codePostal' id='codePostal' value='Code Postal' required/>
									<input type='text' name='telephone' id='telephone' value='Numéro de téléphone' required/></br></br>
									<div class='title1'>
										Votre courriel servira à vous identifier lors de votre prochaine visite </br>
									</div>
									<div class='title2'>
										Le mot de passe doit avoir au moins 1 chiffre, 1 lettre et 8 caractères minimum</br>
									</div>
									<input type='text' name='courriel' id='courriel' value='Courriel' required/>
									<input type='text' name='confCourriel' id='confCourriel' value='Confirmation du courriel' required/></br>
									<input type='text' name='password' id='password' value='Mot de passe' required/>
									<input type='text' name='confPassword' id='confPassword' value='Confirmation du mot de passe' required/></br>
									<div class='checkboxText'>
									<input class='checkbox' type='checkbox' name='promotions' id='promotions' checked>
									Souhaitez-vous recevoir les promotions et les nouveautés
									</div>";
						}
						$conn->close();
					?>
					
					
				</div>
				</br><button class="marginButton" type="submit">Confirmer</button>
			</fieldset>
		</form>
		
	</body>
</html>
