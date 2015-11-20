<?php

require_once __DIR__."/Util_html.php";

class Vue_Plutoto{



	function __construct(){

	}

	public function afficher_vue_all_plutoto($array_all_plutoto){
		echo Util_html::headerGen();
		echo Util_html::navbarGen();
		echo '<!--pour gérer facebook-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>';
		echo '<div style="background-image: url(images/background.jpg); background-attachment: fixed;  width : 100%;">
<div class="row">
	<div class="col-md-3 text-center pagination-centered" style="background-attachment: fixed;">
            <a class="twitter-timeline"  href="https://twitter.com/hashtag/Plutoto" data-width="300" data-widget-id="654351090713018368">#Plutoto Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
<div class="col-md-6" style="padding-top: 10%; height: 1500px">
	<div class="text-center pagination-centered">
<form action="soumission.php" method="GET">
  <div class="form-group">
    <label for="exampleInputPassword1">Phrase</label>
    <input type="text" class="form-control" name="phrase" placeholder="Phrase">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Plutoto</label>
    <input type="text" class="form-control" name="plutoto" placeholder="Plutoto">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Lien de la video</label>
    <input type="text" class="form-control" value="#" name="video" placeholder="Lien de la video">
  </div>
  <button type="submit" class="btn btn-default">Soumettre</button>
</form>
</div>
</div>
	<div class="col-md-3 text-center pagination-centered">
<div class="fb-page" data-href="https://www.facebook.com/Plutoto-596447807049170/" data-width="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="true"></div>
</div>';
  echo Util_html::bottomGen();
	}

  public function afficher_vue_test_DAO($array_all_plutoto, $premier_plutoto){
    echo Util_html::headerGen();
    echo Util_html::navbarGen();
    echo '<h1> Ci-dessous, les test de connexion et interaction avec la base de données</h1>';
    echo '<br>';
    echo '<h2>Affichage des plutotos de la base de donnée :</h2>';
    echo '<br>';
    for($i=0;$i<count($array_all_plutoto);$i++){
      echo 'plutoto '.$array_all_plutoto[$i]['id'].'> nom ["'.$array_all_plutoto[$i]['name'].'"] , phrase ["'.$array_all_plutoto[$i]['sentence'].'"] , nombre de j\'aime ["'.$array_all_plutoto[$i]['nb_like'].'"]<br>';
    }

    echo '<h2>Récupération d\'un plutoto de la base :</h2>';
    echo 'plutoto '.$premier_plutoto['id'].'> nom ["'.$premier_plutoto['name'].'"] , phrase ["'.$premier_plutoto['sentence'].'"] , nombre de j\'aime ["'.$premier_plutoto['nb_like'].'"]<br>';

    echo '<h2>Insertion d\'un plutoto dans la base :</h2>';
    echo '<form action="index.php" method="POST">';
    echo '<label>Nom<label>';
    echo '<input type="text" name="plutoto_name_submit"/>';
    echo '<label>Phrase<label>';
    echo '<input type="text" name="plutoto_sentence_submit"/>';
    echo '<input type="submit" name="submit" value="Soumettre"/>';
    echo '</form>';
    echo Util_html::bottomGen();
  }


}