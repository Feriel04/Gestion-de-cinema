<?php

require "include/util.php";

    /**
	* Fonction qui se connecte au serveur Web
	*/

	
	function connect_user(string $id_user, string $password) : bool {
		$connect = connect_server_web();
		$tmp = pg_query($connect, "SELECT * FROM employe WHERE employe.id_emp='".$id_user."';");
		//On récupère la première ligne car on aura un seul tuple après la sélection		
		$result = pg_fetch_all($tmp);
		$array=$result[0];
		if(password_verify($password, $array["mot_de_passe"])){
			return true;			
		}
		return false;
}
	
		

	/***********************Récuperation des infos de la BD*********************/	
	
	# Dans cette fonction il faudra modifier le fichier
	# header_connected.inc.php
	# index.php
	/**
	* Fonction qui retourne le nom et le prénom d'un manager
	* @param $id_user le nom d'utilisateur
	* @return $nom_prenom un tableau de deux élements qui contient le nom et le prénom	
	*/
	
	
	function get_name_user(string $id_user) : array {
		$connect = connect_server_web();
		if($connect === 0){
			echo "<p>Error : Unable to open database</p>\n";
			return array("", "");
		}
		
		$tmp = pg_query($connect, "SELECT * FROM employe WHERE employe.id_emp='".$id_user."';");
		//On récupère la première ligne car on aura un seul tuple après la sélection		
		$result = pg_fetch_row($tmp);
		if($result == NULL){
			$result = array();		
		}
		return $result;
	}
	
	/**
	* Fonction qui convertit un tableau de stock en tableau html
	* @param $table tableau du stock
	* @return $output tableau html qui représente le stock	
	* */
	
	function str_table(array $table) : string {
	
		$output = "<div id=\"stocklist\">";
		
		// Affichage du heading
		$table2 = $table[0];	
		$output .= "<div class=\"div-stock-title\">
							<ul>";
		foreach($table2 as $key => $value) {				
			$output .="						<li>".$key."</li>\n";
		}
		$output .=		"</ul>
						</div>";

		for($i = 0; $i <count($table); $i++) {
			$table2 = $table[$i];
			
			// Affichage du heading
			
			//Affichage du contenu			
			$output .= "<div class=\"div-stock\">
								<ul>";
			foreach($table2 as $key => $value) {
				if($value == NULL){
					$output .="		<li>null</li>\n";
				}				
				else {
					$output .="		<li>".$value."</li>\n";
				}			
			}
			$output .=		"</ul>
							</div>";
		}
		$output .="</div>";
		return $output;
	}
	
		

	function encrypt(string $encrypted_password) :string {

		$string = "emp01";

		$encrypted_password = crypt($string, '$1$');

		return $encrypted_password;

	}
	
?>