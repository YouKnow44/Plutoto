<?php

require_once __DIR__."/Controleur_Admin.php";


class Routeur_Admin{

	private $controleur_Admin;

	function __construct(){
		$this->controleur_Admin = new controleur_Admin();

	}

	
/*****************      LA REQUETE QUI EST REEXECUTEE A CHAQUE ACTUALISATION DE LA PAGE       *************/
	public function router_requete(){
		//connexion
		if(isset($_POST['login']) && isset($_POST['pass'])){
			if($this->controleur_Admin->connexion(htmlspecialchars($_POST['login']),htmlspecialchars($_POST['pass'])) == true)
			{
				$_SESSION['login']= $_POST['login'];
				$this->controleur_Admin->afficher_all_plutoto();	
			}
			else{
				$this->controleur_Admin->genereVueAuthentification();
			}
		}


		// aprés connexion 
		/*elseif(isset($_SESSION['login']))
		{*/
			elseif(isset($_GET["Randoms"])){
			$this->controleur_Admin->afficher_random_plutoto();
			}
			elseif(isset($_GET["lesFlops"])){
				$this->controleur_Admin->afficher_flop_plutoto();
			}
			elseif(isset($_GET["phrase_submit"]) && isset($_GET["plutoto_submit"])){
      			$this->controleur_Admin->ajouter_plutoto($_GET["plutoto_submit"], $_GET["phrase_submit"], $_GET["video_submit"]);
   		 	}
   		 	elseif(isset($_GET["Video"])){
		      $this->controleur_Admin->afficher_plutoto_video();
		    }
			elseif(isset($_GET["soummettre"])){
				$this->controleur_Admin->afficher_soumission_plutoto();
			}//page parametre
			elseif(isset($_GET['param'])){
				$this->controleur_Admin->vue_afficher_parametre();

			}
			elseif(isset($_GET['del']))
				{
				  $i=0;
				  for($i;$i<=sizeof($_GET['options']);$i++)
				  {
				    $this->controleur_Admin->delete_plutoto($_GET['options'][$i]);
				  }
				  $this->controleur_Admin->vue_afficher_parametre();
				  
				}
				elseif(isset($_GET['validation']))
				{
					$i=0;
				  for($i;$i<=sizeof($_GET['options']);$i++)
				  {
				    $this->controleur_Admin->valider_plutoto($_GET['options'][$i]);
				  }
				  $this->controleur_Admin->vue_afficher_parametre();
				}
			//commentaire
			elseif (isset($_GET['id'])) {
				$this->controleur_Admin->afficher_un_plutoto($_GET['id']);
			}
			elseif(isset($_GET['valid']))
			{
				$this->controleur_Admin->vue_afficher_validation();
			}
			elseif(isset($_GET['deconnex']))
			{
				$_SESSION = array();
				session_destroy();
				$this->controleur_Admin->genereVueAuthentification();
			}

			else{
				$this->controleur_Admin->genereVueAuthentification();
			}

		/*}
		
		
		else{
			$this->controleur_Admin->genereVueAuthentification();
		}*/
		

	}



}

?>