<?php

require_once __DIR__."/Util_html.php";
require_once __DIR__."/../modele/Plutoto.php";


class Vue_Admin{

  private $bd;

	function __construct(){
    $this->bd = new DAO_Plutoto();
	}

	public function afficher_vue_all_plutoto($array_all_plutoto){
		echo Util_html::headerGen();
		echo Util_html::navbarGenAdmin();
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
      echo Util_html::div_plutoto_admin($array_all_plutoto[$i]);
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
    echo Util_html::navbarGenAdmin();
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

  public function vue_afficher_parametre(){
    echo Util_html::headerGen();
    echo Util_html::navbarGenAdmin();
    echo '<div style="background-image: url(images/background.jpg); background-attachment: fixed;  width : 100%;">
<div class="row">

  <div class ="col-md-6">
    <div class="jumbotron" style="background:#B6C0B6; margin-top : 70px; margin-bottom: 3px; font-family: lobster; font-style: italic;">
    <div class="page-header">
      <h1>Tous<small>Les plutotos</small></h1>
    </div>
    </div>

    <div style=" text-align:center; padding-top: 5px; padding-bottom: 0px; margin: 0px; padding: 0px; ">
      <ul class="pagination"   >
        <li>
        <a href="#" aria-label="Previous" >
          <span aria-hidden="true">&laquo;</span>
        </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
        <a href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
        </li>
      </ul>
    </div>




    <div class="jumbotron" style="background:#E6E6E6; ">
      <div class="row">
        <div class="col-md-12" style="color: Black; text-align:left ">
          <p class="lead">Tous les plutotos !</p>
        </div>
        <div class="col-md-8">
        <form action="index.php" method="GET">
          <p class="lead">';
          
          $plutotos = $this->bd->get_all_plutoto_valide_nonValide();
          foreach ($plutotos as $result) {
            echo "[".$result->get_id()."]"." ".$result->get_name()." ".$result->get_sentence()."<input type=checkbox name=options[] value=".$result->get_id().">";
            echo "</br>";

          }
          echo '<input name="del" type="submit" value="Supprimer">';
          ?>
      
        </div>
        </form>
        
    </div>
    
    
    <div style=" text-align:center;">
      <ul class="pagination" class="text-center" style="" >
        <li>
        <a href="#" aria-label="Previous" >
          <span aria-hidden="true">&laquo;</span>
        </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
        <a href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="col-md-3 text-center pagination-centered">
<div class="fb-page" data-href="https://www.facebook.com/Plutoto-596447807049170/" data-width="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="true"></div>
</div>
</div>
</body>';
<?php
    
  }

    public function genereVueAuthentification()
  {
    ?>
    <!doctype html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="vue/css/authentification.css">
    </head>

    <body>    
    <h1>Authentification</h1>
    <br/><br/>
    
    <div align="middle">
    <img src="images/background.jpg" style="width: 300px" >
    </div>

    <h2 align="center"> Authentifiez vous !!! </h2>
    <br/>
    <br/>
  
  <form action="index.php" method="post">
    <table>
      
      <tr>
        <td> <p> Entrez votre login : </p>   </td>
        <td><input type="text"  name ="login" /> </td>
      </tr>

      <tr>
        <td> <p> Entrez votre mot de passe: </p>   </td>
        <td> <input type="password" name ="pass" /> </td>
      </tr>
      
      <tr>
        <td> <input type="submit"  align="center"  value="Envoyer"/></td>
      </tr>

      <tr>
        <td>   <a href="index.php?relogin=OK"> mot de pass oublié? </a></td>
      </tr>


</table>

    
    </form>

    </div>


    



    </body>
    </html>

    <?php

  }


   public function genereVueReinitMotDePasse()
  {
    ?>
    <!doctype html>
    <html>
    <head>
        <meta charset ="UTF-8">
        <link rel="stylesheet" type="text/css" href="vue/css/authentification.css">
    </head>

    <body>    
    <h1>mot de pass oublié</h1>
    <br/><br/>
    
    <div align="middle">
    <img src="images/background.jpg" style="width: 300px" >
    </div>

    <h2 align="center"> mot de pass oublié </h2>
    <br/>
    <br/>

    un mail vous sera envoyé avec un lien pour réinitialiser votre mot de passe
  
  <form action="index.php" method="post">
    <table>
      
      <tr>
        <td> <p> Entrez votre login : </p>   </td>
        <td><input type="text"  name ="loginRecup" /> </td>
      </tr>

      <tr>
        <td> <p> Entrez votre mot email: </p>   </td>
        <td> <input type="text" name ="mailRecup" /> </td>
      </tr>
      
      <tr>
        <td> <input type="submit"  align="center"  value="Envoyer"/></td>
      </tr>
</table>

    
    </form>

    </div>


    



    </body>
    </html>

    <?php

  }

  public function vue_afficher_validation()
  {
     echo Util_html::headerGen();
    echo Util_html::navbarGenAdmin();
    echo '<div style="background-image: url(images/background.jpg); background-attachment: fixed;  width : 100%;">
<div class="row">

  <div class ="col-md-6">
    <div class="jumbotron" style="background:#B6C0B6; margin-top : 70px; margin-bottom: 3px; font-family: lobster; font-style: italic;">
    <div class="page-header">
      <h1>Tous<small>Les plutotos</small></h1>
    </div>
    </div>

    <div style=" text-align:center; padding-top: 5px; padding-bottom: 0px; margin: 0px; padding: 0px; ">
      <ul class="pagination"   >
        <li>
        <a href="#" aria-label="Previous" >
          <span aria-hidden="true">&laquo;</span>
        </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
        <a href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
        </li>
      </ul>
    </div>




    <div class="jumbotron" style="background:#E6E6E6; ">
      <div class="row">
        <div class="col-md-12" style="color: Black; text-align:left ">
          <p class="lead">Les plutotos  non validés !</p>
        </div>
        <div class="col-md-8">
        <form action="index.php" method="GET">
          <p class="lead">';
          
          $plutotos = $this->bd->get_all_plutoto_nonValide();
          foreach ($plutotos as $result) {
            echo "[".$result->get_id()."]"." ".$result->get_name()." ".$result->get_sentence()."<input type=checkbox name=options[] value=".$result->get_id().">";
            echo "</br>";

          }
          echo '<input name="validation" type="submit" value="Valider">';
          ?>
      
        </div>
        </form>
        
    </div>
    
    
    <div style=" text-align:center;">
      <ul class="pagination" class="text-center" style="" >
        <li>
        <a href="#" aria-label="Previous" >
          <span aria-hidden="true">&laquo;</span>
        </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
        <a href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="col-md-3 text-center pagination-centered">
<div class="fb-page" data-href="https://www.facebook.com/Plutoto-596447807049170/" data-width="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="true"></div>
</div>
</div>
</body>';
<?php
  }



}