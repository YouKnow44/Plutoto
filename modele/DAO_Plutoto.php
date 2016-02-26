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


public function get_plutoto($name){
  $result = array();
  $result_plutoto = array();
  try{
    $sth = $this->connexion->prepare("SELECT * FROM `plutoto` WHERE `name` = \"".$name."\" and valide = 1");
    $sth->execute();
    $result = $sth->fetch();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

  array_push($result_plutoto, new Plutoto($result["id"],$result["name"],$result["sentence"], $result["video"]));
   
    return $result_plutoto;
}


public function get_all_plutoto(){
  $result = array();
  $result_plutoto = array();
  try{
    $sth = $this->connexion->prepare("select * from plutoto where valide = 1;");
    $sth->execute();
    $result = $sth->fetchAll();
    foreach ($result as $elem) {
	if (!(strpos($elem["video"],"youtube.com") !== false)){
	    array_push($result_plutoto, new Plutoto($elem["id"],$elem["name"],$elem["sentence"],$elem["video"]));
	}
  }
    return $result_plutoto;
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }


}

// methode qui retourne tous les plutotos ( nécessaire pour l'admin)
public function get_all_plutoto_valide_nonValide(){
  $result = array();
  $result_plutoto = array();
  try{
    
    $sth = $this->connexion->prepare("SELECT *  FROM `plutoto` ");
    $sth->execute();
    $result = $sth->fetchAll();
    foreach ($result as $elem) {
  if (!(strpos($elem["video"],"youtube.com") !== false)){
      array_push($result_plutoto, new Plutoto($elem["id"],$elem["name"],$elem["sentence"],$elem["video"]));
  }
  }
    return $result_plutoto;
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

}

// methode qui retourne  les plutotos non valides( nécessaire pour l'admin)
public function get_all_plutoto_nonValide(){
  $result = array();
  $result_plutoto = array();
  try{
    
    $sth = $this->connexion->prepare("SELECT *  FROM `plutoto` WHERE valide = 0");
    $sth->execute();
    $result = $sth->fetchAll();
    foreach ($result as $elem) {
  if (!(strpos($elem["video"],"youtube.com") !== false)){
      array_push($result_plutoto, new Plutoto($elem["id"],$elem["name"],$elem["sentence"],$elem["video"]));
  }
  }
    return $result_plutoto;
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

}


public function dao_get_N_premiers($n){
  $list_plutoto = array();
  $result = array();
  try{
   
    $sth = $this->connexion->prepare("SELECT  where valide = 1 ORDER BY `id` DESC");
    $sth->execute();
    $result = $sth->fetchAll();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
  if($n < count($result)){
    for($i=0; $i<$n; $i++){
	if (!(strpos($elem["video"],"youtube.com") !== false)){
      array_push($list_plutoto, new Plutoto($result[$i]["name"],$result[$i]["sentence"],$result[$i]["video"]));
	}
    }
  }
  else{
    for($i=0; $i<count($result); $i++){
	if (!(strpos($elem["video"],"youtube.com") !== false)){
      array_push($list_plutoto, new Plutoto($result[$i]["name"],$result[$i]["sentence"],$result[$i]["video"]));
	}
    }
  }
  
   
    return $list_plutoto;
}


public function set_plutoto($name, $sentence, $video){
  try{
    $sth = $this->connexion->prepare("INSERT INTO plutoto(name, sentence, video) VALUES ('".$name."','".$sentence."','".$video."')");
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


public function get_un_plutoto_from_id($id){
	try{
		$statement = $this->connexion->prepare("select * from plutoto where valide=1 and id=".$id);
		$statement->execute();
		$elem = $statement->fetch();
		return new Plutoto($elem["id"],$elem["name"],$elem["sentence"],$elem["video"]);
	}
	catch (TableAccesException $e){
		$exception = new ConnexionException("problème d'accés à la base");
		throw $exception;
	}
}

public function get_plutoto_video(){
	try{
		$statement = $this->connexion->prepare("select * from plutoto where  valide =1 ORDER BY id DESC");
		$statement->execute();
		$result = $statement->fetchAll();
		$list_plutoto = array();
		foreach ($result as $elem) {
			if ((strpos($elem["video"],"youtube.com") !== false)){
			      array_push($list_plutoto, new Plutoto($elem["id"],$elem["name"],$elem["sentence"],$elem["video"]));
			}
		}
		return $list_plutoto;
	}
	catch(TableAccesException $e){
		echo ("exception acces a la table".$e->getMessage());

	}
}


//la partie commentaire (damien)
public function ajoutCommentaire($id, $name, $comment){
  try{
	 if($this->commentaire_present($id, $name , $comment) == false){ 
	    $sth = $this->connexion->prepare("INSERT INTO comment(id, name, comment) VALUES (".$id.",'".$name."','".$comment."')");
	    $sth->execute();
	 } 
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
}

public function commentaire_present($id , $name , $comment){
	$statement = $this->connexion->prepare('select * from comment where id='.$id.' AND name="'.$name.'" AND comment="'.$comment.'"');
	$statement->execute();
	$result = $statement->fetch();
	if ($result == null){
		return false;
	}
	else{
		return true;
	}
}


public function getCommentaire($id){
 	try{
		$statement = $this->connexion->prepare("select * from comment where id=".$id);
		$statement->execute();
		$comments = $statement->fetchAll();
		return $comments;
	}
	catch (TableAccesException $e) {
	    echo 'Exception reçue : ',  $e->getMessage(), "\n";
	}
}

public function valider_plutoto($id)
{
  $l=1;
  try{
    $sth = $this->connexion->prepare("UPDATE `plutoto` SET valide = 1 WHERE `id` = \"".$id."\"");
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



public function get_top_plutoto()
{
    $result = array();
  $result_plutoto = array();
  try{
    
    $sth = $this->connexion->prepare("SELECT * FROM `plutoto`, jaimes WHERE valide=1 and jaimes.id = plutoto.id order by jaimes.voteslike DESC");
    $sth->execute();
    $result = $sth->fetchAll();
    foreach ($result as $elem) {
  if (!(strpos($elem["video"],"youtube.com") !== false)){
      array_push($result_plutoto, new Plutoto($elem["id"],$elem["name"],$elem["sentence"],$elem["video"]));
  }
  }
    return $result_plutoto;
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
}

public function get_flop_plutoto()
{
    $result = array();
  $result_plutoto = array();
  try{
    
    $sth = $this->connexion->prepare("SELECT * FROM `plutoto`, jaimes WHERE valide=1 and jaimes.id = plutoto.id order by jaimes.votesdislike DESC");
    $sth->execute();
    $result = $sth->fetchAll();
    foreach ($result as $elem) {
  if (!(strpos($elem["video"],"youtube.com") !== false)){
      array_push($result_plutoto, new Plutoto($elem["id"],$elem["name"],$elem["sentence"],$elem["video"]));
  }
  }
    return $result_plutoto;
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
}


//methode pour verifier le login et le mot de passe entré
public function verif_password($login,$pass)
{
  $bdMdp = $this->getMotDePasse($login);
  $encMdp = crypt($pass,$bdMdp);
  var_dump($bdMdp);
  var_dump($encMdp);
  return ( $bdMdp != null && $encMdp == $bdMdp);
}

public function getMotDePasse($login)  
  {
    try
    {
      $requete = $this->connexion->prepare("SELECT motDePasse FROM comptes where type= :type;");
      $requete->execute(array(':type' => $login));
      $reponse = $requete->fetch();
      $this->deconnexion();
      return $reponse[0];
    }catch(PDOException $e)
    {
      throw new AccesTableException("problème de connexion à la base");
    }
  }



public function reinit_mot_de_passe($login,$mail,$mdp)
{
  try{
    $sth = $this->connexion->query("UPDATE `comptes` SET `motDePasse`='".$mdp."' WHERE `type` = '".$login."' and `mail` = '".$mail."';");
  }
    catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
 catch(PDOException $e){
    $exception=new ConnexionException("problème de connection à la base");
    throw $exception;
  }
}

public function generer_token($login){

$char = 'abcdefghijklmnopqrstuvwxyz0123456789';
$token = str_shuffle($char);
$token = substr($token, 1, 13);
try{
    $sth = $this->connexion->query("UPDATE `comptes` SET `token`= '".$token."' WHERE type = '".$login."';");
  }
    catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
 catch(PDOException $e){
    $exception=new ConnexionException("problème de connection à la base");
    throw $exception;
  }
  return $token;
}

public function get_token($login){
try{
    $sth = $this->connexion->query("select token from comptes where type='".$login."';");
    $result = $sth->fetch();
    return $result['token'];
  }
    catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
 catch(PDOException $e){
    $exception=new ConnexionException("problème de connection à la base");
    throw $exception;
  }
}

public function sup_token($login){
try{
    $sth = $this->connexion->prepare("UPDATE `comptes` SET `token`='' WHERE type='".$login."';");
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


public function verif_login_mail($login,$mail)
{
  try{
    $sth = $this->connexion->query("select * from comptes where type='".$login."' and mail = '".$mail."';");
    $result = $sth->fetch();
    
    return (($result['type'] == $login && isset($result['type'])) && ($result['mail'] == $mail && isset($result['mail']))) ;
  }
  catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
 catch(PDOException $e){
    $exception=new ConnexionException("problème de connection à la base");
    throw $exception;
  }
}

public function verif_token($token,$login)
{
  try{
    $sth = $this->connexion->query("select * from comptes where type='".$login."' and token = '".$token."';");
    $result = $sth->fetch();
    
    return (($result['token'] == $token && isset($result['token'])) && ($result['login'] == $login && isset($result['login']))) ;
  }
  catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
 catch(PDOException $e){
    $exception=new ConnexionException("problème de connection à la base");
    throw $exception;
  }
}
public function get_mail($login){
  try{
    $sth = $this->connexion->query("select mail from comptes where type='".$login."';");
    $result = $sth->fetch();
    
    return $result['mail'];
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
