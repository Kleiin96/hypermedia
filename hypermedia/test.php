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
		<script>
			function myFunction() {
				document.getElementById("myDropdown").classList.toggle("show");
			}

			// Close the dropdown menu if the user clicks outside of it
			window.onclick = function(event) {
			  if (!event.target.matches('.dropbtn')) {

				var dropdowns = document.getElementsByClassName("dropdown-content");
				var i;
				for (i = 0; i < dropdowns.length; i++) {
				  var openDropdown = dropdowns[i];
				  if (openDropdown.classList.contains('show')) {
					openDropdown.classList.remove('show');
				  }
				}
			  }
			}
		</script>
		
		<section class="marge">
			<div class="dropdown">
			  <button onclick="myFunction()" class="dropbtn">Dropdown</button>
			  <div id="myDropdown" class="dropdown-content">
				<a href="#">Link 1</a>
				<a href="#">Link 2</a>
				<a href="#">Link 3</a>
			  </div>
			</div>
			
				
		</section>
		

	</body>
</html>