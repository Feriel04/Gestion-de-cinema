<?php


	include ("include/functions.php");
	
	$title = "flm cine";
	$keywords = "flm cine, abcd";
	$content = "Page de connexion du site flm cine ";


	//Affichage des tables
	
	$output = $output = "	<div id=\"deliverylist\">
								<p>Pas d'élements trouvés</p>									
							</div>";
	
	if(isset($_POST["user"]) && !empty($_POST["user"])) {	
		$user = $_POST["user"];
		switch($user) {
		
			case "client abonne":
				$request = "SELECT id_client_ab, nom_client, adress_client, mail_client, tel_client FROM client_abonne;";
				$request_type = "Tous les clients abonnes";
				break;
			case "employe":
				$request = "SELECT id_emp, nom_emp, mail_emp, salaire_emp, statut_emp, tel_emp  FROM employe;";
				$request_type = "Tous les employes";
				break;
			case "ticket":
				$request = "SELECT id_ticket, nom_ticket, date_ticket, prix_ticket, id_seance, id_client_pass, tarif_ticket, numplace_ticket  FROM ticket;";
				$request_type = "Tous les tickets";
				break;
			case "client passager":
				$request = "SELECT (COUNT(id_ticket)) FROM ticket t, seance s WHERE s.id_seance=t.id_seance;";
				$request_type = "Le nombre de clients passagers par jour ";
				break;
			case "carte abonnement":
				$request = "SELECT id_carte, nom_carte,	date_delivrance, date_debut_ab, date_fin_ab, type_ab, nb_seance, prix_ab, id_seance, id_client_ab FROM carte_abonnement;";
				$request_type = "Les cartes d'abonnements ";
				break;
			case "film":
				$request = "SELECT 	f.id_film, f.nom_film, f.date_film, f.lang_film, f.auteur_film, f.id_genre, g.nom_genre FROM film f, genre g WHERE g.id_genre=f.id_genre;";
				$request_type = "Les films ";
				break;
			case "salle":
				$request = "SELECT id_salle, nom_salle, num_salle, capacite_salle, id_site FROM salle;";
				$request_type = "Les salles du cinema ";
				break;
			case "sites":
				$request ="SELECT 	id_site, nom_site,	adresse	codePostal_site, ville_site, pays_site FROM sites;";
				$request_type = "Les sites du cinema ";
				break;	
			case "seance":
				$request ="SELECT s.id_seance, sa.nom_salle, f.nom_film, e.nom_emp, s.horaire_seance FROM seance s, salle sa, film f, employe e WHERE s.id_salle=sa.id_salle AND f.id_film=s.id_film AND s.id_emp=e.id_emp; ";
				$request_type = "La liste des seances ";
				break;
		}

		$array = get_request_result($request);
		
		if(empty($array)){
			$output = "	<div id=\"deliverylist\">
								<p>Pas d'élements trouvés</p>									
							</div>";
		}
		else {
			$output = str_table($array);
		}
	}
	//Modification des tables

	include ("include/header.inc.php");
?>

		<main>
			<section class="section-accueil">
				<h2 class="h2-accueil"><?php echo $request_type ?></h2>
				<fieldset class="fieldset-connexion">
					<form action="#" method="post" class="fieldset-form">
						<div>
							<select name="user" id="user">
							    <option value="" disabled>Choisissez un filtre</option>
							    <option value="client abonne">Tous les clients abonnes</option>
								<option value="employe">Tous les employes</option>
								<option value="client passager">Le nombre de clients passagers par jour </option>
								<option value="carte abonnement">Tous les cartes d'abonnements</option>
								<option value="ticket">Tous les tickets</option>
								<option value="film">La liste des films</option>
								<option value="salle">La liste des salles</option>
								<option value="sites">La liste des sites</option>
								<option value="seance">La liste des seances</option>
							</select>
						</div>
						<div>
							<input type="submit"/>
						</div>
					</form>
				</fieldset>
				<?php echo $output; ?>
			</section>
		</main>

<?php
	include("include/footer.php");
?>