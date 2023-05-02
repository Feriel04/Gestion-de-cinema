<?php

	declare(strict_types=1);

    require ("include/functions.php");

    $title = "FLM cine";
    $keywords = "flm cine, abcd";
    $content = "Page d'accueil du site flm cine";


    
    $AfficherLesTickets = 1; 
    if(isset($_POST["id_carte"]) && !empty($_POST["id_carte"]) && isset($_POST["nom_carte"]) && !empty($_POST["nom_carte"]) && isset($_POST["date_delivrance"]) && !empty($_POST["date_delivrance"]) && isset($_POST["date_debut_ab"]) && !empty($_POST["date_debut_ab"]) && isset($_POST["date_fin_ab"]) && !empty($_POST["date_fin_ab"]) && isset($_POST["type_ab"]) && !empty($_POST["type_ab"]) && isset($_POST["nb_seance"]) && !empty($_POST["nb_seance"]) && isset($_POST["prix_carte"]) && !empty($_POST["prix_carte"]) && isset($_POST["id_seance"]) && !empty($_POST["id_seance"]) && isset($_POST["id_client_ab"]) && !empty($_POST["id_client_ab"])){
		
		
		$IdCarte = $_POST['id_carte'];
		$NomCarte= $_POST['nom_carte'];
		$DateDelivrance = $_POST['date_delivrance'];
		$DateDebutAb = $_POST['date_debut_ab'];
        $DateFinAb = $_POST['date_fin_ab'];
        $TypeAb = $_POST['type_ab'];
        $NbSeance = $_POST['nb_seance'];
		$PrixCarte = $_POST['prix_carte'];
		$IdSeance = $_POST['id_seance'];
		$IdClientab = $_POST['id_client_ab'];

		$request = "INSERT INTO carte_abonnement (id_carte, nom_carte, date_delivrance, date_debut_ab, date_fin_ab, type_ab, nb_seance, prix_carte, id_seance, id_client_ab) 
		VALUES ('".$IdCarte."', '".$NomCarte."', '".$DateDelivrance."', '".$DateDebutAb."',
         '".$DateFinAb."', '".$TypeAb."', '".$NbSeance."', '".$PrixCarte."', '".$IdSeance."','".$IdClientab."');";
        $connect = connect_server_web();
      
      pg_query($connect, $request);
      
    }
   
    require("include/header.inc.php");


?>

<main>
        <section class="section-accueil">
            <h1>Ajouter une nouvelle carte d'abonnement</h1>
            <fieldset style="margin-left: 43%; width: min-content; background-color: antiquewhite; border-radius: 18px;">
                <form action="carte.php?<?php echo "nom=".$name[0]."&prenom=".$name[1]; ?>" method="post" >
                    <label for="carte">id_carte</label>
                    <input type="text" name="id_ticket" id="carte">
                    <label for="nom">nom_carte</label>
                    <input type="text" name="nom_carte" id="nom">
                    <label for="date">date_delivrance</label>
                    <input type="date" name="date_delivrance" id="date">
                    <label for="date">date_debut_ab</label>
                    <input type="date" name="date_debut_ab" id="dated">
                    <label for="date">date_fin_ab</label>
                    <input type="date" name="date_fin_ab" id="datef">
                    <label for="typeabon">type_ab</label>
                    <input type="text" name="type_ab" id="type">
                    <label for="nbseances">nb_seance</label>
                    <input type="text" name="nb_seance" id="nombre">
                    <label for="prix">prix_ab</label>
                    <input type="text" name="prix_ab" id="prix">
                    <label for="seance">id_seance</label>
                    <input type="text" name="id_seance" id="seance">
                    <label for="clientab">id_client_ab</label>
                    <input type="text" name="id_client_ab" id="clientab">
                	  	<div>
								<input type="submit" value="ajouter" />
							</div>
                </form>
            </fieldset>
		</section>

</main>

<?php
	include("include/footer.php");
?>