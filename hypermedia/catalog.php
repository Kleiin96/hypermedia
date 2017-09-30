
<!DOCTYPE html>
<html>
	<head>
		<title>Catalog</title>
		<link rel="stylesheet" type="text/css" href="style1.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

		<meta charset="utf-8" />
	</head>
	<body>
		<header>
			<?php
				include_once('header.php');
			?>
			
		</header>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		
		<section class="marge">
			
			
				<?php
				
					require_once 'catalogFunction.php';
					$test = new Catalog();
					if($_SESSION['admin']==FALSE)
					{
						
						$test->createCatalogClient();
					}else{
						$test->createCatalogAdmin();
					}
				?>
				<script>
					function submitForm(){
						$('#ff').submit();
						}
				</script>
		</section>
		

	</body>
</html>