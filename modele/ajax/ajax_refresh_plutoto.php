
<?php
//Ce code va être exécuté à chaque fois que l'utilisateur saisie une lettre 
//Il sert à proposé à l'utilisateur des propositions existant déjà dans la BD 
//L'utilisateur sélectionne ensuite la solution pour que le champs de saisie(<input>) prennent la valeur de la sélection (<li>)
function connect() {
    return new PDO('mysql:host=localhost;dbname=E145271D', 'E145271D', 'E145271D', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT DISTINCT name FROM plutoto WHERE name LIKE (:keyword) ORDER BY name ASC LIMIT 0,10";
$query = $pdo->prepare($sql);
$query ->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
$i=0;
foreach($list as $rs){
	//met le text écrit en gras
	$item = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>',$rs['name']);
	//ajouter nouvelle option
    if($i%2 == 0){
		echo '<li class="li_sombre">'.$item.'</li>';
	}
    else{
		echo '<li class="li_claire">'.$item.'</li>';
	}
	$i++;

}



?>