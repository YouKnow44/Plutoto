<?php

require_once __DIR__."/Controleur_Plutoto.php";
class Routeur{

	private $controleur_plutoto;

	function __construct(){
		$this->controleur_plutoto = new Controleur_Plutoto();
	}

	public function router_requete_test(){
		if(isset($_POST["plutoto_name_submit"]) && isset($_POST["plutoto_sentence_submit"]) ){
			$this->controleur_plutoto->ajouter_plutoto($_POST["plutoto_name_submit"], $_POST["plutoto_sentence_submit"]);
			$this->controleur_plutoto->afficher_vue_test_DAO();
		}
		else{
			$this->controleur_plutoto->afficher_vue_test_DAO();
		}
		
	}



}

?>