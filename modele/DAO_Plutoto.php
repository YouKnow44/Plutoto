<?php
require_once __DIR__."/Plutoto.php";
require_once __DIR__."/Exceptions/TableAccessException.php";
require_once __DIR__."/Exceptions/ConnexionException.php";

class DAO_Plutoto{
  private $connexion;



public function __construct(){
  try{
      //$chaine="mysql:host=localhost;dbname=E134935T";
      $this->connexion = new PDO('mysql:host=localhost;dbname=test;charset=utf8',"","");
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
  $result_plutoto = array();
  try{
    $sth = $this->connexion->prepare("SELECT  `id`, `name`, `sentence`, `nb_like` FROM `plutoto` WHERE `name` = \"".$name."\"");
    $sth->execute();
    $result = $sth->fetch();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

  array_push($result_plutoto, new Plutoto($result["id"],$result["name"],$result["sentence"],$result["nb_like"]));
   
    return $result_plutoto;
}


public function get_all_plutoto(){
  $result = array();
  $result_plutoto = array();
  try{
    
    $sth = $this->connexion->prepare("SELECT `id`,`name`, `sentence`, `nb_like` FROM `plutoto`");
    $sth->execute();
    $result = $sth->fetchAll();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

  foreach ($result as $elem) {
    array_push($result_plutoto, new Plutoto($elem["id"],$elem["name"],$elem["sentence"],$elem["nb_like"]));
  }
    return $result_plutoto;
}

public function dao_get_N_premiers($n){
  $list_plutoto = array();
  $result = array();
  try{
   
    $sth = $this->connexion->prepare("SELECT `id`,`name`, `sentence`, `nb_like` FROM `plutoto` ORDER BY `id` DESC");
    $sth->execute();
    $result = $sth->fetchAll();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
  if($n < count($result)){
    for($i=0; $i<$n; $i++){
      array_push($list_plutoto, new Plutoto($result[$i]["name"],$result[$i]["sentence"],$result[$i]["nb_like"]));
    }
  }
  else{
    for($i=0; $i<count($result); $i++){
      array_push($list_plutoto, new Plutoto($result[$i]["name"],$result[$i]["sentence"],$result[$i]["nb_like"]));
    }
  }
  
   
    return $list_plutoto;
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

public function like_plutoto($id)
{
  $l=1;
  try{
    $sth = $this->connexion->prepare("update plutoto set nb_like = nb_like +".$l." where id= ".$id.";");
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