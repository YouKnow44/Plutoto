<?php 
require_once ("../controleur/Controleur_Plutoto.php");
if((isset($_POST["name"])) & (isset($_POST["comment"]))){
	$controleur = new Controleur_Plutoto();
	$controleur->ajoutCommentaire($_POST["id"],addslashes(htmlspecialchars($_POST["name"])),addslashes(htmlspecialchars($_POST["comment"])));
	$_GET["id"] = $_POST["id"];
}
require_once ("commentaireTest.php");
?> 
