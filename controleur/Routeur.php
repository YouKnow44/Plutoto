<?php

require_once __DIR__."/Controleur_Plutoto.php";
class Routeur{

	private $controleur_plutoto;

	function __construct(){
		$this->controleur_plutoto = new Controleur_Plutoto();
		echo $mdp= crypt('passwd1');
		echo crypt('passwd1',$mdp);

	}


/*****************      LA REQUETE QUI EST REEXECUTEE A CHAQUE ACTUALISATION DE LA PAGE       *************/
	public function router_requete(){

		
		if(isset($_GET["Randoms"])){
			$this->controleur_plutoto->afficher_random_plutoto();
		}
		elseif(isset($_GET["lesFlops"])){
			$this->controleur_plutoto->afficher_flop_plutoto();
		}
		elseif(isset($_GET["phrase_submit"]) && isset($_GET["plutoto_submit"])){
			$this->controleur_plutoto->ajouter_plutoto($_GET["plutoto_submit"], $_GET["phrase_submit"], $_GET["video_submit"]);
		}
		elseif(isset($_GET["soummettre"])){
			$this->controleur_plutoto->afficher_soumission_plutoto();
		}
		elseif(isset($_GET["Video"])){
			$this->controleur_plutoto->afficher_plutoto_video();
		}
		elseif(isset($_GET['lesNouveaux'])){
			$this->controleur_plutoto->afficher_all_plutoto();
		}

		elseif(isset($_GET['lesTops'])){
			$this->controleur_plutoto->afficher_top_plutoto();
		}

		/*****************      PARTIE ADMIN       *************/
				//connexion admin
		elseif(isset($_GET['moderation']))
		{
			$this->controleur_plutoto->genereVueAuthentification();
		}
		elseif(isset($_POST['login']) && isset($_POST['pass'])){
			if($this->controleur_plutoto->connexion(htmlspecialchars($_POST['login']),htmlspecialchars($_POST['pass'])) != null)
			{
				$_SESSION['login']= $_POST['login'];
				$this->controleur_plutoto->afficher_all_plutoto_admin();	
			}
			else{
				$this->controleur_plutoto->genereVueAuthentification();
			}
		}

		//page parametre
		elseif(isset($_GET['param']) & isset($_SESSION['login']) ){
			$this->controleur_plutoto->vue_afficher_parametre();
		}//suppression plutoto
		elseif(isset($_GET['del']) && $_SESSION['login'])
			{
			  $i=0;
			  for($i;$i<=sizeof($_GET['options']);$i++)
			  {
			    $this->controleur_plutoto->delete_plutoto($_GET['options'][$i]);
			  }
			  $this->controleur_plutoto->vue_afficher_parametre();
			  
			}
		//validation plutoto
		elseif(isset($_GET['validation']) && $_SESSION['login'])
		{
			$i=0;
		  for($i;$i<=sizeof($_GET['options']);$i++)
		  {
		    $this->controleur_plutoto->valider_plutoto($_GET['options'][$i]);
		  }
		  $this->controleur_plutoto->vue_afficher_parametre();
		}
		elseif(isset($_GET['valid']) && $_SESSION['login'])
		{
			$this->controleur_plutoto->vue_afficher_validation();
		}

		elseif (isset($_GET['relogin']) && $_SESSION['login']) {
			$this->controleur_plutoto->genereVueReinitMotDePasse();
		}
		elseif (isset($_POST['loginRecup']) & isset($_POST['mailRecup']) && $_SESSION['login']) {
			if($this->controleur_plutoto->verif_login_mail(htmlspecialchars($_POST['loginRecup']),htmlspecialchars($_POST['mailRecup'])) == true)
			{
					$this->controleur_plutoto->envoie_mail($_POST['mailRecup']);
			}
			else{
				$this->controleur_plutoto->genereVueReinitMotDePasse();
			}
		}



		//deconnexion
		elseif(isset($_GET['deconnex']))
		{
			$_SESSION = array();
			session_destroy();
			$this->controleur_plutoto->genereVueAuthentification();
		}

		else{
			$this->controleur_plutoto->afficher_all_plutoto();
		}
		

	}



}

?>
