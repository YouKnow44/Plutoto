<?php

// Traitement des POST
if(!isset($_POST['cle'])) {
	header('Location: ./');
	die('-1');
}
$cle = get_magic_quotes_gpc() ? $_POST['cle'] : addslashes($_POST['cle']);
$vote = isset($_POST['vote']);
$derniere_ip = isset($_SERVER['REMOTE_ADDR']) ? (int)ip2long($_SERVER['REMOTE_ADDR']) : -1;

// Connexion a la DB
$mysqli = new mysqli('localhost', 'E145271D', 'E145271D', 'E145271D');
if($mysqli->connect_error) {
	die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Traitement en DB
$jaime_votes = 0;
if($result = $mysqli->query("SELECT * FROM plutoto WHERE id = '{$cle}' LIMIT 1 ")) {
	if($result->num_rows) {
		// Mise a jour
		$obj = $result->fetch_object();
		$jaime_votes = (int)$obj->voteslike;
		if($vote) {
//		if($vote && $obj->derniere_ip != $derniere_ip) {
			$jaime_votes++;
			$mysqli->query(
				"UPDATE plutoto SET
					voteslike = voteslike + 1 ,
					dernier_vote = NOW() , 
					derniere_ip = {$derniere_ip}
				WHERE id = '{$cle}' "
				);
		}
	} 
}

// Afficher de retour
echo $jaime_votes;

?>