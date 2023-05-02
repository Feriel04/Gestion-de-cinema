<?php
/**
	* Fonction qui se connecte à la BD
	* @return une ressource de type PgSql\Connection
	* */
	
	function connect_server_web() {
		$username = "user=rouas";
		$password = "password=lila123lila";
		$host = "host=postgresql-rouas.alwaysdata.net";
		$database = "dbname=rouas_projet_cinema";
		$port = "port=5432";
		
		$con_string = $host." ".$port." ".$database." ".$username." ".$password;
		$connect = pg_connect($con_string);
		return $connect;
	}
	
	/**
	* Fonction qui récupère le resultat d'une requête SQL avec les fonction de PgSql
	* @param $request une requête SQL dans la syntaxe de Postgres SQL
	* @return $result un tableau associatif contenant le résultat de la requête
	* */
	
	function get_request_result(string $request) : array {
		$connect = connect_server_web();
		if($connect== 0){
			echo "<p>Error : Unable to open database</p>\n";
			return array("");
		}
		$tmp = pg_query($connect, $request);
		$result = pg_fetch_all($tmp);
		if($result == false){
			$result = array();
		}
		return $result;
	}	
	
	/**
	* Fonction qui récupère le flux JSON à l'aide de la fonction file_get_contents
	*
	* @param $url l'url du flux JSON
	* @return $array qui contient les données brutes du flux JSON
	*
	* */
	
	function get_JSON_array(string $url) : array {
		//On transforme la chaine de caractères récuperée en un tableau associatif
		
		ini_set("allow_url_fopen", true);
		
		$json = file_get_contents($url, true);
		
		$array = json_decode($json, true);
		
		return $array;
	}
	
	/**
	* Fonction qui écrit dans un fichier txt
	* @param $filepath le chemin du fichier
	* @param $write texte à ajouter au fichier
	* */
	
	function write_JSON_file(string $filepath, string $write) : void {
		// Le @ permet de ne pas afficher l'erreur et renvoie le statut que nous définisons en dessous
		if($fichier=@fopen($filepath,"c+b")){
			fwrite($fichier ,$write);
			fclose($fichier);		
		}
		else {
			echo "Erreur d'ouverture de fichier";
		}
	}
	
	/**
	* Fonction qui lit un fichier txt
	* @param $filepath le chemin du fichier
	* @return $output contenu du fichier
	* */
	
	function read_file(string $filepath) : string {
		// Le @ permet de ne pas afficher l'erreur et renvoie le statut que nous définissons en dessous
		$output = "";		
		if($fichier=@fopen($filepath,"c+b")){
			$output = fread($fichier);
			fclose($fichier);
		}
		else {
			echo "Erreur d'ouverture de fichier";
		}
		return $output;
	}

?>