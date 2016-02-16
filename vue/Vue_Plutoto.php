<?php

require_once __DIR__."/Util_html.php";
require_once __DIR__."/../modele/Plutoto.php";

class Vue_Plutoto{



	function __construct(){

	}

	public function afficher_vue_all_plutoto($array_all_plutoto){
		echo Util_html::headerGen();
		echo Util_html::navbarGen();
		echo '
<!--pour gérer facebook-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>;
<div class="row">
  <div class="col-md-3 text-center pagination-centered" style="background-attachment: fixed;">
            <a class="twitter-timeline"  href="https://twitter.com/hashtag/Plutoto" data-width="300" data-widget-id="654351090713018368">#Plutoto Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>
<div class="col-md-6" style="height: 1500px">
  <div class="text-center pagination-centered">';

  echo Util_html::div_title(" Les nouveaux");
  echo Util_html::div_list();
   for($i=0;$i<count($array_all_plutoto);$i++){
      echo Util_html::div_plutoto($array_all_plutoto[$i]);
    }
  echo Util_html::div_list();
    echo '
    </div>
</div>
  <div class="col-md-3 text-center pagination-centered">
<div class="fb-page" data-href="https://www.facebook.com/Plutoto-596447807049170/" data-width="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="true"></div>
</div>';
  echo Util_html::bottomGen();
	}

  public function vue_afficher_soumission_plutoto(){
    echo Util_html::headerGen();
    echo Util_html::navbarGen();
    echo '
<!--pour gérer facebook-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>;
<div class="row">
  <div class="col-md-3 text-center pagination-centered" style="background-attachment: fixed;">
            <a class="twitter-timeline"  href="https://twitter.com/hashtag/Plutoto" data-width="300" data-widget-id="654351090713018368">#Plutoto Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>


  
<div class ="col-md-6">';
  echo Util_html::div_title(" Soumettre un Plutoto !");
  echo '<div class="text-center pagination-centered">';
     
echo '<div class="row" style="width : 100%;">';
echo '  <div class="col-md-6" style="padding-top: 10%; height: 1500px">
          <div class="text-center pagination-centered">
            <form action="index.php" method="GET">
              <div class="form-group">
                <label for="exampleInputPassword1">Phrase</label>
                <input type="text" class="form-control" name="phrase_submit" placeholder="Phrase">
              </div>';
      echo '  <div class="form-group">
                <label for="Plutoto">Plutoto</label>
                <input type="text" class="form-control" name="plutoto_submit" placeholder="Plutoto">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Lien de la video</label>
                <input type="text" class="form-control" value="#" name="video_submit" placeholder="Lien de la video">
              </div>
              <button type="submit" class="btn default">Soumettre</button>
            </form>
         </div>
      </div>
    </div>';
  }

  public function afficher_vue_randoms($array_all_plutoto){
    echo Util_html::headerGen();
    echo Util_html::navbarGen();
    echo '
<!--pour gérer facebook-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>;
<div class="row">
  <div class="col-md-3 text-center pagination-centered" style="background-attachment: fixed;">
            <a class="twitter-timeline"  href="https://twitter.com/hashtag/Plutoto" data-width="300" data-widget-id="654351090713018368">#Plutoto Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>
<div class="col-md-6" style="height: 1500px">
  <div class="text-center pagination-centered">';

  echo Util_html::div_title(" randoms");
  echo Util_html::div_list();
  $tab = $array_all_plutoto;
  shuffle($tab);
   for($i=0;$i<count($tab);$i++){
      echo Util_html::div_plutoto($tab[$i]);
    }
  echo Util_html::div_list();
    echo '
    </div>
</div>
  <div class="col-md-3 text-center pagination-centered">
<div class="fb-page" data-href="https://www.facebook.com/Plutoto-596447807049170/" data-width="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="true"></div>
</div>';
  echo Util_html::bottomGen();
  }

  public function afficher_vue_tops($array_top_plutoto){
    echo Util_html::headerGen();
    echo Util_html::navbarGen();
    echo '
<!--pour gérer facebook-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>;
<div class="row">
  <div class="col-md-3 text-center pagination-centered"
style="background-attachment: fixed;">
            <a class="twitter-timeline" 
href="https://twitter.com/hashtag/Plutoto" data-width="300"
data-widget-id="654351090713018368">#Plutoto Tweets</a>
            <script>!function(d,s,id){var
js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>
<div class="col-md-6" style="height: 1500px">
  <div class="text-center pagination-centered">';

  echo Util_html::div_title(" Les tops");
  echo Util_html::div_list();
   for($i=0;$i<count($array_top_plutoto);$i++){
      echo Util_html::div_plutoto($array_top_plutoto[$i]);
    }
  echo Util_html::div_list();
    echo '
    </div>
</div>
  <div class="col-md-3 text-center pagination-centered">
<div class="fb-page"
data-href="https://www.facebook.com/Plutoto-596447807049170/"
data-width="300" data-small-header="true"
data-adapt-container-width="true" data-hide-cover="false"
data-show-facepile="false" data-show-posts="true"></div>
</div>';
  echo Util_html::bottomGen();
  }

  public function afficher_vue_flops($array_flop_plutoto){
    echo Util_html::headerGen();
    echo Util_html::navbarGen();
    echo '
<!--pour gérer facebook-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>;
<div class="row">
  <div class="col-md-3 text-center pagination-centered"
style="background-attachment: fixed;">
            <a class="twitter-timeline" 
href="https://twitter.com/hashtag/Plutoto" data-width="300"
data-widget-id="654351090713018368">#Plutoto Tweets</a>
            <script>!function(d,s,id){var
js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>
<div class="col-md-6" style="height: 1500px">
  <div class="text-center pagination-centered">';

  echo Util_html::div_title(" Les flops");
  echo Util_html::div_list();
   for($i=0;$i<count($array_flop_plutoto);$i++){
      echo Util_html::div_plutoto($array_flop_plutoto[$i]);
    }
  echo Util_html::div_list();
    echo '
    </div>
</div>
  <div class="col-md-3 text-center pagination-centered">
<div class="fb-page"
data-href="https://www.facebook.com/Plutoto-596447807049170/"
data-width="300" data-small-header="true"
data-adapt-container-width="true" data-hide-cover="false"
data-show-facepile="false" data-show-posts="true"></div>
</div>';
  echo Util_html::bottomGen();
  }






}