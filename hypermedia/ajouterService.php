
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
			<?php
			if (empty($_POST)){
			echo '<form action="upload.php" method="post" enctype="multipart/form-data">
				Select image to upload:
				<div>
					<img id="image" class="flotte"/>
					<input type="file" name="fileToUpload" id="fileToUpload">
				</div>
				
				<input type="text" name="titre"/><br/>
				<input type="text" name="description"/><br/>
				<input type="text" name="tarif"/>
				<input type="text" name="duree"/><br/>
				<input type="hidden" name="courriel" value="' . $_SESSION["courriel"] . '"/>
				<input type="hidden" name="pwd" value="' . $_SESSION["pwd"] . '"/>
				<input type="submit" value="Ajouter Service" name="submit">
			
			</form>';
			}else{
				require_once 'catalogFunction.php';
				$test = new Catalog();
				$test->modifierServiceForm($_POST['pk']);
			}
			?>
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
		</section>

	</body>
</html>