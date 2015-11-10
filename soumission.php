<?php
$mysqli = new mysqli("localhost", "plutoto", "plutotoIUT", "plutoto");
//plutoto est le nom de l'utilisateur et le plutotoIUT est le mdp pour se connecter à la basse de donnée plutoto.
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

$mysqli->query("insert into plutoto values(NULL,\"".$_GET["phrase"]."\",\"".$_GET["plutoto"]."\");");

?>
