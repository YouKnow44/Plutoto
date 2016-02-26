<?php

require_once __DIR__."/Controleur_Plutoto.php";
class Routeur{

	private $controleur_plutoto;

	function __construct(){
		$this->controleur_plutoto = new Controleur_Plutoto();


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
		
		elseif(isset($_GET["name"]) && isset($_GET["comment"]) && isset($_GET["id"])){
			$this->controleur_plutoto->ajoutCommentaire($_GET["id"],$_GET["name"],$_GET["comment"]);
		}
		elseif(isset($_GET['lesCommentaires'])){
			$this->controleur_plutoto->afficher_commentaires_plutoto($_GET['id']);
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
				$this->controleur_plutoto->vue_afficher_parametre();	
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
		  $this->controleur_plutoto->vue_afficher_validation();
		}
		elseif(isset($_GET['valid']) && $_SESSION['login'])
		{
			$this->controleur_plutoto->vue_afficher_validation();
		}

		elseif (isset($_GET['relogin'])) {
			$this->controleur_plutoto->genereVueReinitMotDePasse();
		}
		elseif (isset($_POST['loginRecup']) && isset($_POST['mailRecup'])) {
			if($this->controleur_plutoto->verif_login_mail(htmlspecialchars($_POST['loginRecup']),htmlspecialchars($_POST['mailRecup'])))
			{
					$this->controleur_plutoto->genere_token($_POST['loginRecup']);
					$token = $this->controleur_plutoto->get_token($_POST['loginRecup']);
					$this->controleur_plutoto->envoie_mail($_POST['mailRecup'], $token, $_POST['loginRecup']);
					echo'un mail vous a été envoyé';
			}
			else{
				$this->controleur_plutoto->genereVueReinitMotDePasse();
				echo'rentrer un mail/login valide';
			}
		}
		elseif(isset($_GET['token']) && isset($_GET['login']) && (($_GET['token']) == ($this->controleur_plutoto->get_token($_GET['login']))))
				{
					$this->controleur_plutoto->genereVueModifMotDePasse();
				}
		elseif((isset($_POST['mdpReinit1']) && (isset($_POST['mdpReinit2']))))
				{					
					if(($_POST['mdpReinit1'] == $_POST['mdpReinit2']))
					{
						$this->controleur_plutoto->reinit_mot_de_passe($_POST['login'],$_POST['mail'],$_POST['mdpReinit1']);
						$this->controleur_plutoto->sup_token($_POST['login']);
					}
					else
					{

						echo "<script> window.alert(\"les mots de passes doivent être les mêmes\")</script>";
						
						$this->controleur_plutoto->genereVueModifMotDePasse();
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
