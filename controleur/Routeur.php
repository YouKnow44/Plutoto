<?php

require_once __DIR__."/Controleur_Plutoto.php";
class Routeur{

	private $controleur_plutoto;

	function __construct(){
		$this->controleur_plutoto = new Controleur_Plutoto();
	}

	public function router_requete_test(){
		/*if(!isset($_POST['cle'])) {
	header('Location: ./');
	die('-1');
}*/
/*
		$cle = get_magic_quotes_gpc() ? $_POST['cle'] : addslashes($_POST['cle']);
		$vote = isset($_POST['vote']);	
		$derniere_ip = isset($_SERVER['REMOTE_ADDR']) ? (int)ip2long($_SERVER['REMOTE_ADDR']) : -1;*/




		if(isset($_POST["plutoto_name_submit"]) && isset($_POST["plutoto_sentence_submit"]) ){
			$this->controleur_plutoto->ajouter_plutoto($_POST["plutoto_name_submit"], $_POST["plutoto_sentence_submit"]);
			$this->controleur_plutoto->afficher_all_plutoto();
		}
		else if(isset($_POST["plutoto_delete"])){
			$this->controleur_plutoto->delete_plutoto($_POST["plutoto_delete"]);
		}
		else if(isset($_POST["plutoto"])){ // PROBLEME
			echo $_POST["plutoto"];
			foreach ($_POST["plutoto"] as $value) {
				var_dump($value);
			}
			
			$this->controleur_plutoto->like_plutoto($_POST["plutoto"]);
		}

		
		/*else if(isset($_POST['cle']))
		{
			$this->controleur_plutoto->like();
		}*/
		

		else{
			$this->controleur_plutoto->afficher_all_plutoto();
		}
	
		
	}

	public function router_requete(){
		if(isset($_GET["Randoms"])){
			$this->controleur_plutoto->afficher_random_plutoto();
		}
		elseif(isset($_GET["soummettre"])){
			$this->controleur_plutoto->afficher_soumission_plutoto();
		}
		else{
			$this->controleur_plutoto->afficher_all_plutoto();
		}
		

	}



}

?>