<?php

	declare(strict_types=1);

    require ("include/functions.php");

    $title = "FLM cine";
    $keywords = "flm cine, abcd";
    $content = "Page d'accueil du site flm cine";


    
    $AfficherLesTickets = 1; // par défaut on affiche les tickets du membre
    // si une action à été demandée par le membre
           /* $AfficherFormulaire = 1; // par défaut on affiche le formulaire (si ensuite le ticket est envoyé, on le cache en mettant cette variable à 0)
            if(isset($_POST['ajouter'])){
                // si le bouton "Envoyer" à été cliqué, on vérifie que les champs ne soit pas vide ou incorrect:
                if(empty($_POST['idticket']) OR empty($_POST['nomticket']) OR empty($_POST['dateticket']) OR empty($_POST['tarifticket']) OR empty($_POST['prixticket']) OR empty($_POST['numplaceticket']) OR empty($_POST['idclientpass']) OR empty($_POST['idseance'])){
                    echo "<p>Tous les champs doivent être renseignés.</p>";
                } else {
                
                            // tous les champs sont correctement renseignés, on insère le message dans la bdd et on informe l'administrateur (vous) qu'un nouveau ticket est ouvert:
                            // on sécurise les champs avant de les insérer:
                            $IdTicket = trim(htmlent($_POST['id_ticket']));//trim() permet d'enlever les espaces devant et derrière la chaine de caractères
                            $NomTicket= htmlent($_POST['nom_ticket']);
                            $DateTicket = $_POST['date_ticket'];
                            $TarifTicket = htmlent($_POST['tarif_ticket']);
                            $PrixTicket = htmlent($_POST['prix_ticket']);
                            $NumplaceTicket = htmlent($_POST['numplace_ticket']);
                            $IdClientpass = htmlent($_POST['id_client_pass']);
                            $IdSeance = htmlent($_POST['id_seance']);
                            }
                        }
                    }
                }
*/
    if(isset($_POST["id_ticket"]) && !empty($_POST["id_ticket"]) && isset($_POST["nom_ticket"]) && !empty($_POST["nom_ticket"]) && isset($_POST["tarif_ticket"]) && !empty($_POST["tarif_ticket"]) && isset($_POST["prix_ticket"]) && !empty($_POST["prix_ticket"]) && isset($_POST["numplace_ticket"]) && !empty($_POST["numplace_ticket"]) && isset($_POST["date_ticket"]) && !empty($_POST["date_ticket"]) && isset($_POST["id_client_pass"]) && !empty($_POST["id_client_pass"]) && isset($_POST["id_seance"]) && !empty($_POST["id_seance"])){
		
		
		$IdTicket = $_POST['id_ticket'];//trim() permet d'enlever les espaces devant et derrière la chaine de caractères
		$NomTicket= $_POST['nom_ticket'];
		$DateTicket = $_POST['date_ticket'];
		$TarifTicket = $_POST['tarif_ticket'];
		$PrixTicket = $_POST['prix_ticket'];
		$NumplaceTicket = $_POST['numplace_ticket'];
		$IdClientpass = $_POST['id_client_pass'];
		$IdSeance = $_POST['id_seance'];
		
		$request = "INSERT INTO Ticket(id_ticket, nom_ticket, date_ticket, tarif_ticket, prix_ticket, numplace_ticket, id_client_pass, id_seance) 
		VALUES ('".$IdTicket."', '".$NomTicket."', '".$DateTicket."', '".$TarifTicket."',
         ".$PrixTicket.", ".$NumplaceTicket.", '".$IdClientpass."', '".$IdSeance."');";
         
         
    
      $connect = connect_server_web();
      
      pg_query($connect, $request);
      
    }
   
    require("include/header.inc.php");


?>

<main>
        <section class="section-accueil">
            <h1>Ajouter un nouveau ticket</h1>
            <fieldset style="margin-left: 43%; width: min-content; background-color: antiquewhite; border-radius: 18px;">
                <form action="ticket.php?<?php echo "nom=".$name[0]."&prenom=".$name[1]; ?>" method="post" >
                    <label for="ticket">id_ticket</label>
                    <input type="text" name="id_ticket" id="ticket">
                    <label for="nom">nom_ticket</label>
                    <input type="text" name="nom_ticket" id="nom">
                    <label for="date">date_ticket</label>
                    <input type="date" name="date_ticket" id="date">
                    <label for="prix">prix_ticket</label>
                    <input type="text" name="prix_ticket" id="prix">
                    <label for="tarif">tarif_ticket</label>
                    <input type="text" name="tarif_ticket" id="tarif">
                    <label for="numplace">numplace_ticket</label>
                    <input type="text" name="numplace_ticket" id="numplace">
                    <label for="clientpass">id_client_pass</label>
                    <input type="text" name="id_client_pass" id="clientpass">
                    <label for="seance">id_seance</label>
                    <input type="text" name="id_seance" id="seance">
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