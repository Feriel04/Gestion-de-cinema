<?php

	declare(strict_types=1);

	
	$ip = $_SERVER['REMOTE_ADDR'];
	$title = "FLM Cine";
	$keywords = "FLM Cine, films, abonnements, recherche";
	$content = "Page d'accueil du site FLM Cine";
	
	include ("include/header.php");
	
?>

		<main class="section-accueil">
			
				<h2 id="title">FLM Ciné</h2>
				<p class="p-details">Besoin de détente ? d'un moment en famille ou entre amis ? Flm ciné vous propose des films de tous genre a bas prix pour le bien être de tous . Afin que la détente soit au rendez-vous dès le moment de la réservation. soyez les bienvenue </p>
			
		
		</main>
		<?php
		
			include ("include/footer.php");
				
		?>