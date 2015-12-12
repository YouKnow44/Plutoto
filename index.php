<?php
//NE PAS MODIFIER


require_once __DIR__."/controleur/Routeur.php";

session_start();

$routeur = new Routeur();
//$routeur->router_requete_test();

$routeur->router_requete();

?>
