<?php
require_once __DIR__."/Plutoto.php";
require_once __DIR__."/Exceptions/TableAccessException.php";
require_once __DIR__."/Exceptions/ConnexionException.php";

class DAO_Plutoto{
	private $connexion;



public function __construct(){
  try{
      $chaine="mysql:host=localhost;dbname=E134935T";
      $this->connexion = new PDO($chaine,"E134935T","E134935T");
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

public function get_plutoto($name){
  $result = array();
  try{
    $sth = $this->connexion->prepare("SELECT  `id`, `name`, `sentence`, `nb_like` FROM `plutoto` WHERE `name` = \"".$name."\"");
    $sth->execute();
    $result = $sth->fetch();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
   
    return $result;
}


public function get_all_plutoto(){
  try{
    $result = array();
    $sth = $this->connexion->prepare("SELECT `id`, `name`, `sentence`, `nb_like` FROM `plutoto`");
    $sth->execute();
    $result = $sth->fetchAll();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
   
    return $result;
}

public function set_plutoto($name, $sentence){
  try{
    $sth = $this->connexion->prepare("INSERT INTO `plutoto`(`name`, `sentence`, `nb_like`) VALUES (\"".$name."\",\"".$sentence."\",0)");
    $sth->execute();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
}

public function delete_plutoto($id)
{
  try{
     $sth = $this->connexion->prepare("DELETE  FROM `plutoto` WHERE `id` = \"".$id."\"");
    $sth->execute();
  }
  catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
 catch(PDOException $e){
    $exception=new ConnexionException("problème de connection à la base");
    throw $exception;
  }

}



}


?>