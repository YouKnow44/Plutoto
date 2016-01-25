<?php
require_once ("../controleur/Controleur_Plutoto.php");
$controleur = new Controleur_Plutoto();
$controleur->afficher_un_plutoto_from_id($_GET["id"]);
?>
<html>
<form action="commentaire.php" method="POST">
name<input type="text" name="name" value=""/>
</br>
comment<input style="lenght:250px" type="text" name="comment" value=""/>
</br>
<input type="hidden" name="id" value=<?php echo $_GET["id"];?>>
</br>
<button type="submit" value ="">soummetre</button>
</form>
</html>
<?php
$controleur = new Controleur_Plutoto();
$controleur->afficherCommentaire($_GET["id"]);
?>
