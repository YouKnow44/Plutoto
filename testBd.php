<?php
$mysqli = new mysqli("localhost", "plutoto", "plutotoIUT", "plutoto");
//plutoto est le nom de l'utilisateur et le plutotoIUT est le mdp pour se connecter à la basse de donnée plutoto.
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

$res = $mysqli->query("SELECT * from plutoto;");
for ($row_no = $res->num_rows - 1; $row_no >= 0; $row_no--){
	$res->data_seek($row_no);
	$row = $res->fetch_assoc();
	echo " id = ".$row['id'];
	echo " phrase = ".$row['phrase'];
	echo " plutoto = ".$row['plutoto'];
}

?>
