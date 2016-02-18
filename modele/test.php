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

public function generate_hash($password, $cost=11){
        /* To generate the salt, first generate enough random bytes. Because
         * base64 returns one character for each 6 bits, the we should generate
         * at least 22*6/8=16.5 bytes, so we generate 17. Then we get the first
         * 22 base64 characters
         */
        $salt=substr(base64_encode(openssl_random_pseudo_bytes(17)),0,22);
        /* As blowfish takes a salt with the alphabet ./A-Za-z0-9 we have to
         * replace any '+' in the base64 string with '.'. We don't have to do
         * anything about the '=', as this only occurs when the b64 string is
         * padded, which is always after the first 22 characters.
         */
        $salt=str_replace("+",".",$salt);
        /* Next, create a string that will be passed to crypt, containing all
         * of the settings, separated by dollar signs
         */
        $param='$'.implode('$',array(
                "2y", //select the most secure version of blowfish (>=PHP 5.3.7)
                str_pad($cost,2,"0",STR_PAD_LEFT), //add the cost in two digits
                $salt //add the salt
        ));
      
        //now do the actual hashing
        return crypt($password,$param);
}

public function insert($log,$pass)
{
  $mdp=crypt($pass, "salut");
  try{
    $sth = $this->connexion->prepare("INSERT INTO `comptes` (type,motDePasse) VALUES('".$log."','".$mdp."'); ");
    $sth->execute();
  }
  catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
}

}

$bd = new DAO_Plutoto();

$bd->insert("ok","ok");

?>