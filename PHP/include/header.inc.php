<?php
if((isset($_GET["nom"]) && !empty($_GET["nom"])) && (isset($_GET["prenom"]) && !empty($_GET["prenom"]))){
	$name = array();
	$name[0] = $_GET["nom"];
	$name[1] = $_GET["prenom"];
}	


?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<!-- métadonnées de la page -->
		<meta charset="utf-8" />
		<meta name="author" content="L3-G14" />
		<meta name="date" content="2022-12-02T19:43:07+0100" />
		<meta name="contenu" content="<?php echo $content; ?>" />
		<meta name="keywords" content="<?php echo $keywords; ?>" />
		<title><?php echo $title; ?></title>
		<!-- Liaison avec la feuille de style -->
		<link rel="stylesheet" href="style/styles.css" />
		<link rel="icon" href="image/logo-removebg-preview.png" />
	</head>
	<body class="body">
		<header>
			<a href="index.php"><img src="image/logo-removebg-preview.png" alt="Logo du site" /></a>
			<h3><a href="apropos.php">Ouvert tous les jours de 9h00 - 20h30</a></h3>
			<nav>
				<ul>
				<li><a href="index.php">Accueil</a></li>
				<li><?php echo $name[1]; ?></li>
				</ul>
			</nav>
		</header>
		<aside>
			<ul>
				<li><a href="index.php"><img src="image/69524.png" alt="accueil" /></a></li>
				<li><a href="connection.php"><img src="image/deconnexion.png" alt="Déconnexion" /></a></li>
				<li><a href="dashboard.php?<?php echo "nom=".$name[0]."&prenom=".$name[1]; ?>"><img src="image/info.png" alt="interface employé" /></a></li>
				<li><a href="ticket.php?<?php echo "nom=".$name[0]."&prenom=".$name[1]; ?>"> Gestion de ticket </a></li>
				<li><a href="carte.php?<?php echo "nom=".$name[0]."&prenom=".$name[1]; ?>"> Gestion de carte </a></li>
				

			</ul>
		</aside>
		
