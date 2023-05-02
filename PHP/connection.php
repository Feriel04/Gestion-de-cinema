<?php

	declare(strict_types=1);

	require ("include/functions.php");
	
	$title = "Flm cine";
	$keywords = "films, cinema";
	$content = "Page de connexion du site FLMcine ";

    $formulaire = " <h2 class=\"h2-accueil\">Connexion</h2>
                    <fieldset class=\"fieldset-connexion\">
                        <form action=\"\" method=\"post\" class=\"fieldset-form\">
                            <div class=\"form-div\">
                                <label>Identifiant: </label>
                                <input type=\"text\" name=\"identifiant\" size=\"4\" placeholder=\"identifiant, Ex : e001\" autofocus=\"true\" required/>
                            </div>
                            <div class=\"form-div\">
                                <label>Mot de passe : </label>
                                <input type=\"password\" name=\"password\" size=\"10\" placeholder=\"Mot de passe...\" required/>
                            </div>					
                            <input type=\"submit\" value=\"Connexion\"/>
                        </form>
                    </fieldset>";
                    

	if((isset($_POST["identifiant"]) && !empty($_POST["identifiant"])) && (isset($_POST["password"]) && !empty($_POST["password"]))){
		$id_user = $_POST["identifiant"];
		$password = $_POST["password"];

        if(connect_user($id_user, $password)){
        	$name = get_name_user($id_user);
        	$formulaire = "<h2 class=\"h2-accueil\">Connecté</h2>
        					<p class=\"p-details\">Bienvenue ".$name[1]."</p>";
        	include ("include/header.inc.php");
        }
    	else {
	        $error = "<p class=\"p-details\">Mot de passe ou identifiant incorrect !!</p>";
	        $formulaire .= $error;
	        include ("include/header.php");
	    }
    }
    else {
    	include ("include/header.php");
    }
	
?>

		<main>
			<section class="section-accueil">
                <?php echo $formulaire; ?>
			</section>
		</main>
		<?php
		
			include ("include/footer.php");
				
		?>