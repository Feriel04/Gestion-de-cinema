<?php

	declare(strict_types=1);

	
	$ip = $_SERVER['REMOTE_ADDR'];
	$title = "FLM Cine";
	$keywords = "FLM Cine, films, abonnements, recherche";
	$content = "Page d'accueil du site FLM Cine";
	
	include ("include/header.php");
	
?>

		<main>
            <section>
                    <h2>Infos pratique</h2>
                    <div class="item">
                        <ul>
                            <h3>Notre emplacement</h3>
                        <p>Métro Station Chatelet les Halles : Sortie Place Carrée (Forum des Halles) - Lignes 1, 4, 7, 11, 14</p>
                        <p>RER Station Chatelet les Halles : Sortie Place Carrée (Forum des Halles) : Lignes A, B, D</p>
                        <p>Parking du Forum des Halles : Accès unique rue de Turbigo. Forfait cinéphile : 1 place UGC achetée = votre place de parking à 5€ (*de 18h à 2h du lun au sam et de 9h à 2h dim et vacances scolaires)</p>
                        <p> Piéton : Accès par la Place Carrée (Forum des Halles, niveau -4).</p>
                        <img src="image/localisation.webp" alt="Localisation " width="150px" height="100px"/>
                        </ul>
                    </div>
                    <div class="item">
                        <ul>
                            <h3>Horaire d'ouverture</h3>
                            <p>lundi        10:00 à 20:30</p>
                            <p>mardi        10:00 à 20:30</p>
                            <p>mercredi     10:00 à 20:30</p>
                            <p>jeudi        10:00 à 20:30</p>
                            <p>vendredi     10:00 à 20:30</p>
                            <p>samedi       10:00 à 20:30</p>
                            <p>dimanche     11:00 à 19:00</p>
                        </ul>
                    </div>
            </section>
		</main>
		<?php
		
			include ("include/footer.php");
				
		?>

