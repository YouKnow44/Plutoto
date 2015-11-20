<?php

require_once __DIR__."/../modele/DAO_Plutoto.php";
require_once __DIR__."/../vue/Vue_Plutoto.php";

class Controleur_Plutoto{
	private $dao_plutoto;
	private $vue_plutoto;


	function __construct(){
		$this->dao_plutoto = new DAO_Plutoto();
		$this->vue_plutoto = new Vue_Plutoto();
	}

	public function afficher_all_plutoto(){
		$this->vue_plutoto->afficher_vue_all_plutoto($this->dao_plutoto->get_all_plutoto());
	}

	public function afficher_vue_test_DAO(){
		$this->vue_plutoto->afficher_vue_test_DAO($this->dao_plutoto->get_all_plutoto(), $this->dao_plutoto->get_plutoto("plutoto"));
	}

	public function ajouter_plutoto($name, $sentence){
		$this->dao_plutoto->set_plutoto($name, $sentence);
	}


}