<?php
require_once __DIR__."/Exceptions/TableAccessException.php";
require_once __DIR__."/Exceptions/ConnexionException.php";


// Traitement des POST
if(!isset($_POST['cle'])) {
	header('Location: ./');
	die('-1');
}
$cle = get_magic_quotes_gpc() ? $_POST['cle'] : addslashes($_POST['cle']);
$vote = isset($_POST['vote']);
$derniere_ip = isset($_SERVER['REMOTE_ADDR']) ? (int)ip2long($_SERVER['REMOTE_ADDR']) : -1;


// Connexion a la DB
$chaine="mysql:host=localhost;dbname=E145271D";
$connexion = new PDO($chaine,"E145271D","E145271D");
// pour la prise en charge des exceptions par PHP
$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
catch(PDOException $e){
  $exception=new ConnexionException("problème de connection à la base");
  throw $exception;
}



// Traitement en DB
try{
$jaime_votes = 0;
if($result = $connexion->query("SELECT * FROM jaimes WHERE cle = '{$cle}' LIMIT 1 ")) {
	if($result->num_rows) {
		// Mise a jour
		$obj = $result->fetch_object();
		$jaime_votes = (int)$obj->votes;
		if($vote) {
//		if($vote && $obj->derniere_ip != $derniere_ip) {
			$jaime_votes++;
			$connexion->query(
				"UPDATE jaimes SET
					votes = votes + 1 ,
					dernier_vote = NOW() , 
					derniere_ip = {$derniere_ip}
				WHERE cle = '{$cle}' "
				);
		}
	} else {
		// Inserer
		if($vote) {
			$jaime_votes++;
			$connexion->query(
				"INSERT INTO jaimes SET
					cle = '{$cle}' ,
					votes = 1 ,
					dernier_vote = NOW() ,
					derniere_ip = {$derniere_ip} "
				);
		}
	}
}



// Afficher de retour
echo $jaime_votes;

}
  catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
?>