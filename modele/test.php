<?php
require_once __DIR__."/Plutoto.php";
require_once __DIR__."/Exceptions/TableAccessException.php";
require_once __DIR__."/Exceptions/ConnexionException.php";

class DAO_Plutoto{
  private $connexion;



public function __construct(){
  try{
      //$chaine="mysql:host=localhost;dbname=E145271D";
	  $this->connexion = new PDO('mysql:host=localhost;dbname=E145271D;charset=utf8',"E145271D","E145271D");
      // pour la prise en charge des exceptions par PHP
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     }
    catch(PDOException $e){
      $exception=new ConnexionException("problème de connection à la base");
      throw $exception;
    }
}



// méthode qui permet de se deconnecter de la base
public function deconnexion(){
   $this->connexion = null;
}



public function insert($log,$pass,$mail)
{
  $mdp=crypt($pass);
  try{
    $sth = $this->connexion->prepare("INSERT INTO `comptes` (type,motDePasse,mail) VALUES('".$log."','".$mdp."','".$mail."');");
    $sth->execute();
  }
  catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
}

}

$bd = new DAO_Plutoto();

$bd->insert("yass","yass","yasscomoko@gmail.com");

?>