<?php

require_once __DIR__."/../modele/DAO_Plutoto.php";
require_once __DIR__."/../vue/Vue_Plutoto.php";
require_once __DIR__."/../vue/Vue_Admin.php";


class Controleur_Plutoto{
	private $dao_plutoto;
	private $vue_plutoto;
	private $vue_admin;


	function __construct(){
		$this->dao_plutoto = new DAO_Plutoto();
		$this->vue_plutoto = new Vue_Plutoto();
		$this->vue_admin = new Vue_Admin();
	}
public function afficher_all_plutoto(){
		$this->vue_plutoto->afficher_vue_all_plutoto($this->dao_plutoto->get_all_plutoto());
	}


	public function afficher_vue_test_DAO(){
		$this->vue_plutoto->afficher_vue_test_DAO($this->dao_plutoto->get_all_plutoto(), $this->dao_plutoto->get_plutoto("plutoto"));
	}

	public function afficher_random_plutoto(){
		$this->vue_plutoto->afficher_vue_randoms($this->dao_plutoto->get_all_plutoto());
	}

	public function ajouter_plutoto($name, $sentence, $video){
		$this->dao_plutoto->set_plutoto($name, $sentence, $video);
		$array_plutoto = $this->dao_plutoto->get_all_plutoto();
		$this->vue_plutoto->afficher_vue_all_plutoto($array_plutoto);
	}

	public function afficher_flop_plutoto(){
		$this->vue_plutoto->afficher_vue_all_plutoto($this->dao_plutoto->get_flop_plutoto());
	}

	public function afficher_un_plutoto_from_id($id){
		$plutoto = $this->dao_plutoto->get_un_plutoto_from_id($id);
		echo $plutoto->get_sentence();
		echo "</br>";
		echo $plutoto->get_name();
		echo "</br>";
	}

	public function delete_plutoto($id){
		$this->dao_plutoto->delete_plutoto($id);
		$this->vue_plutoto->afficher_vue_test_DAO($this->dao_plutoto->get_all_plutoto(), $this->dao_plutoto->get_plutoto("plutoto"));
	}


	public function afficher_soumission_plutoto(){
		$this->vue_plutoto->vue_afficher_soumission_plutoto();
	}

	//partie commentaire
	public function ajoutCommentaire($id, $name, $comment){
		$this->dao_plutoto->ajoutCommentaire($id, $name, $comment);
	}

	public function afficher_plutoto_video(){
		$plutotos = $this->dao_plutoto->get_plutoto_video();
		foreach ($plutotos as $p){
			$video = str_replace("watch?v=", "embed/",$p->getVideo());
			
			echo $p->get_sentence();
			echo ("</br>");
			echo $p->get_name();
			echo ("</br>");
			echo ('<iframe width="560" height="315" src="'.$video.'" frameborder="0" allowfullscreen></iframe>');
			echo ("</br>");
		}
	}

	public function afficherCommentaire($id){
		$comments = $this->dao_plutoto->getCommentaire($id);
		if ($comments != null){
			foreach ($comments as $comment){
				echo $comment["name"];
				echo "</br>";
				echo $comment["comment"]; 
				echo "</br>";
			}
		}
		else{
			echo "Toujours pas de commentaire !!! ajoutez le votre";
		}
	}


	// partie admin
	public function afficher_all_plutoto_admin(){
		$this->vue_admin->afficher_vue_all_plutoto($this->dao_plutoto->get_all_plutoto());
	}

	public function vue_afficher_parametre(){
		$this->vue_admin->vue_afficher_parametre();
		
	}

	public function vue_afficher_validation()
	{
		$this->vue_admin->vue_afficher_validation();
	}

	public function valider_plutoto($id)
	{
		$this->dao_plutoto->valider_plutoto($id);
	}

		public function afficher_all_plutoto_valide_nonValide()
	{
		$this->vue_admin->afficher_vue_all_plutoto($this->dao_plutoto->get_all_plutoto_valide_nonValide());
	}

		public function genereVueAuthentification()
	{
		$this->vue_admin->genereVueAuthentification();
	}


	public function connexion($log,$pass)
	{
		return $this->dao_plutoto->verif_password($log,$pass) ;
		
	}



}
