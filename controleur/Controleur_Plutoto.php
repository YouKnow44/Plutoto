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

	public function afficher_random_plutoto(){
		$array_random = $this->dao_plutoto->get_all_plutoto();
		shuffle($array_random);
		$this->vue_plutoto->afficher_vue_all_plutoto($array_random);
	}

	public function ajouter_plutoto($name, $sentence){
		$this->dao_plutoto->set_plutoto($name, $sentence);
	}

	public function delete_plutoto($id){
		$this->dao_plutoto->delete_plutoto($id);
		$this->vue_plutoto->afficher_vue_test_DAO($this->dao_plutoto->get_all_plutoto(), $this->dao_plutoto->get_plutoto("plutoto"));
	}

	public function like(){
		$this->dao_plutoto->like();
		$this->vue_plutoto->afficher_vue_test_DAO($this->dao_plutoto->get_all_plutoto(), $this->dao_plutoto->get_plutoto("plutoto"));
		//$this->vue_plutoto->afficher_vue_test_DAO($this->dao_plutoto->get_all_plutoto(), $this->dao_plutoto->get_plutoto("plutoto"));
	}

	public function afficher_soumission_plutoto(){
		$this->vue_plutoto->vue_afficher_soumission_plutoto();
	}


}