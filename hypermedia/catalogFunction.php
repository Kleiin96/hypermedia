<?php
	require_once 'connectBd.php';
	
	class Catalog{
		
		public function createCatalogClient(){
			
			$test1= new DbConnection();
			$conn = $test1->getdbconnect();
			
			$sql = "SELECT * FROM service";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo '<br/> <br/>';
					echo '<div class="article">';
					echo '<img class="flotte" src="' . $row["image"] . '"/>';
					echo '<div class="pad">';
					echo '<a class="titre">' . $row["service_titre"] . '</a><br/><br/>';
					echo '<a class="text">' . $row["service_description"] . '</a><br/><br/>';
					echo ' <a class="tarif"> tarif : ' . $row["tarif"] . ' <a class="duree"> duree : ' . $row["duree"] . ' </a>';
					echo '<img  class="panier" src="images/icones/panier.png" /></br>';
					echo '<br/> <br/>';
					echo '</div>';
					echo '</div>';
					
					
				}
			}
			$conn->close();
		}
		
		public function createCatalogAdmin(){
			
			$test1= new DbConnection();
			$conn = $test1->getdbconnect();
			
			$sql = "SELECT * FROM service s LEFT JOIN ta_promotion_service t ON s.pk_service = t.fk_service Left JOIN promotion p on p.pk_promotion = t.fk_promotion";
			$result = $conn->query($sql);
			
			$t=time();
			
			
			
			
			echo '<a href=ajouterService.php>Ajouter Service</a>';
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo '<br/> <br/>';
					echo '<div class="article">';
					echo '<img class="flotte" src="' . $row["image"] . '"/>';
					echo '<div class="pad">';
					//echo '<div class="dropdown">';
					//echo '<button class="dropbtn">Dropdown</button>';
					//echo '<div class="dropdown-content">';
					echo '<form action="ajouterService.php" method="post">';
					echo '<input type="hidden" name="pk" value="' . $row["pk_service"] . '"/>';
					echo '<input type="hidden" name="courriel" value="' . $_SESSION["courriel"] . '"/>';
					echo '<input type="hidden" name="pwd" value="' . $_SESSION["pwd"] . '"/>';
					echo '<input type="submit" value="Modifier" name="submit">';
					echo '<a href="ajouterService.php">supprimer</a>';
					//echo '</div>';
					//echo '</div>';
					echo '</form>';
					echo '<a class="titre">' . $row["service_titre"] . '</a><br/><br/>';
					echo '<a class="text">' . $row["service_description"] . '</a><br/><br/>';
					echo '<a class="tarif"> tarif : ' . $row["tarif"] . ' <a class="duree"> duree : ' . $row["duree"] . ' h</a><br/><br/>';
					echo '<a class="titreRabais">Promotion : </a>';
					if ($row["fk_service"] == $row["pk_service"])
					{
						$phot = $row['rabais'];
						
						$rabais = $phot * 100;
						
						
						//if ( strtotime(time()) >= $row['date_debut'] && strtotime(time())<= $row['date_fin'])
						//{
							echo '<img  class="rabais select" src="images/promotions/' . $rabais . '.png" />';
						//}else{
						//	echo '<img  class="rabais nonselect" src="Laboratoire1/images/promotions/10.png" />';
						//}
					}
					echo '<form id="myForm" action="ajouterPromotion.php" method="post">';
					echo '<input type="hidden" name="pk" value="' . $row["pk_service"] . '"/>';
					echo '<input type="hidden" name="courriel" value="' . $_SESSION["courriel"] . '"/>';
					echo '<input type="hidden" name="pwd" value="' . $_SESSION["pwd"] . '"/>';
					//<input type="submit" value="lul"/>
					//////////**********ici l'utilisation du jquery**********//////////
					echo '<a href="#"  onclick="$(this).closest(\'form\').submit()" class="plusbleu">+</a>';
					echo '</form>';
					echo '<img  class="media" src="images/icones/media.jpeg" /></br>';
					echo '<br/> <br/>  ';
					echo '</div>';
					
					echo '</div>';
					
					
				}
			}
			$conn->close();
		}
		
		public function ajouterService($titre, $description, $tarif ,$duree, $image){
			$test1= new DbConnection();
			$conn = $test1->getdbconnect();
			
			$sql = "INSERT into service(service_titre, service_description, duree, tarif , actif , image)
			VALUES ( '" . $titre . "', '" . $description . "' , " . $duree . " , " . $tarif . ", 1 , 'images/services/". $image . "')";
			
			//echo $sql;
			
			$db_insert = mysqli_query($conn, $sql);

			// Send an error message if the query failed.
			if (!$db_insert) {
			  die("Database insert failed: " . mysqli_error($conn));
			}
			
			$conn->close();
		}
		
		public function modifierServiceTitre($titre, $id){
			$test1= new DbConnection();
			$conn = $test1->getdbconnect();
			
			$query = "UPDATE service SET service_titre = '" . $titre . "' WHERE pk_service = " . $id . "";
			
			//echo $query;
			
			$db_insert = mysqli_query($conn, $query);

			// Send an error message if the query failed.
			if (!$db_insert) {
			  die("Database insert failed: " . mysqli_error($conn));
			}
			
			$conn->close();
		}
		
		public function modifierServiceDescription($description, $id){
			$test1= new DbConnection();
			$conn = $test1->getdbconnect();
			
			$query = "UPDATE service SET service_description = '" . $description . "' WHERE pk_service = " . $id . "";
			
			//echo $query;
			
			$db_insert = mysqli_query($conn, $query);

			// Send an error message if the query failed.
			if (!$db_insert) {
			  die("Database insert failed: " . mysqli_error($conn));
			}
			
			$conn->close();
		}
		
		public function modifierServiceDuree($duree, $id){
			$test1= new DbConnection();
			$conn = $test1->getdbconnect();
			
			$query = "UPDATE service SET duree = '" . $duree . "' WHERE pk_service = " . $id . "";
			
			//echo $query;
			
			$db_insert = mysqli_query($conn, $query);

			// Send an error message if the query failed.
			if (!$db_insert) {
			  die("Database insert failed: " . mysqli_error($conn));
			}
			
			$conn->close();
		}
		
		public function modifierServiceTarif($tarif, $id){
			$test1= new DbConnection();
			$conn = $test1->getdbconnect();
			
			$query = "UPDATE service SET tarif = '" . $tarif . "' WHERE pk_service = " . $id . "";
			
			//echo $query;
			
			$db_insert = mysqli_query($conn, $query);

			// Send an error message if the query failed.
			if (!$db_insert) {
			  die("Database insert failed: " . mysqli_error($conn));
			}
			
			$conn->close();
		}
		
		public function modifierServiceImage($photo, $id){
			$test1= new DbConnection();
			$conn = $test1->getdbconnect();
			
			$query = "UPDATE service SET image = 'images/services/" . $photo . "' WHERE pk_service = " . $id . "";
			
			//echo $query;
			
			$db_insert = mysqli_query($conn, $query);

			// Send an error message if the query failed.
			if (!$db_insert) {
			  die("Database insert failed: " . mysqli_error($conn));
			}
			
			$conn->close();
		}
		
		public function modifierServiceForm($pk){
			
			$test1= new DbConnection();
			$conn = $test1->getdbconnect();
			
			$sql = "SELECT * FROM service where pk_service= " . $pk . "";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
			
					echo '<form action="upload.php" method="post" enctype="multipart/form-data">
						Select image to upload:
						<div>
							<img id="image" class="flotte"/>
							<input type="file" name="fileToUpload" id="fileToUpload" value="images/services/' . $row["image"] . '">
						</div>
						<script>
							document.getElementById("fileToUpload").onchange = function () {
							var reader = new FileReader();

							reader.onload = function (e) {
								// get loaded data and render thumbnail.
								document.getElementById("image").src = e.target.result;
							};

							// read the image file as a data URL.
							reader.readAsDataURL(this.files[0]);
							};
						</script>
						<input type="text" name="titre" value="' . $row["service_titre"] . '"/><br/>
						<input type="text" name="description" value="' . $row["service_description"] . '"/><br/>
						<input type="text" name="tarif" value="' . $row["tarif"] . '"/>
						<input type="text" name="duree" value="' . $row["duree"] . '"/><br/>
						<input type="hidden" name="pk" value="' . $row["pk_service"] . '"/>
						<input type="hidden" name="courriel" value="' . $_SESSION["courriel"] . '"/>
						<input type="hidden" name="pwd" value="' . $_SESSION["pwd"] . '"/>
						<input type="submit" value="Modifier" name="submit">
					</form>';
				}
			}
			$conn->close();
		}
		
		public function ajouterPromForm(){
			
			$test1= new DbConnection();
			$conn = $test1->getdbconnect();
			
			$sql = "SELECT * FROM promotion";
			$result = $conn->query($sql);
			$promo = array();
			
			echo '<form>';
			echo '<select>';
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo '<option value="' . $row['pk_promotion'] . '">' . $row['promotion_titre'] . '</option>';
					//$promo[]= $row['pk_promotion'];
					
				}
			}
			echo '</select><br/>';
			echo 'Période de temps de la promotion
				<input type="date" name="début">
				 à  
				<input type="date" name="fin" ><br/><br/>';
			echo "Entrer un code s'il est requis pour appliquer<br/>
			la promotion lors de la création de la facture<br/><br/>";
			
			echo '<input type="text" name="code" ><br/><br/>';
			
			echo '<input type="submit" value="Confirmer"> ';
			
			echo '</form>';	
			
			$conn->close();
			
		}
		
		/*public function ajouterPromotion($pkP,$pkS, $dd, $df, code){
			
			$test1= new DbConnection();
			$conn = $test1->getdbconnect();
			
			$sql = "INSERT into ta_promotion(fk_promotion, fk_service, date_début, date_fin, code)";
			
			$conn->close();
		}*/

	}

	//$test = new Catalog();
	//$test->createCatalog();

?>

