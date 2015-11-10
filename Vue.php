<?php
class Vue{

	//genere l'entête de la page Web
	//a utiliser pour toute les pages
	public static function headerGen(){

		return "<!DOCTYPE html>
			<html lang=\"en\">
			<head>
			<title>Plutoto Le Site des Plutotos</title>
			<meta charset=\"utf-8\">
			<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
			<link rel=\"stylesheet\" href=\"default.css\">
			<link rel=\"stylesheet\" href=\"bootstrap/css/bootstrap.css\">
			<link rel=\"stylesheet\" href=\"bootstrap/css/bootstrap-theme.css\">
			<script src=\"bootstrap/js/bootstrap.js\"></script>
<link rel=\"stylesheet\" href=\"default.css\">
</head>
<body>";
	}

	//permet de générer la barre de navigation
	//génére la bar de navigation

	public static function navbarGen(){
		return "<nav class=\"navbar navbar-inverse navbar-fixed-top \" style=\"background:black\">
			<div class=\"container-fluid\">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class=\"navbar-header\">
			<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
			<span class=\"sr-only\">Toggle navigation</span>
			<span class=\"icon-bar\"></span>
			<span class=\"icon-bar\"></span>
			<span class=\"icon-bar\"></span>
			</button>
			<p class=\"navbar-brand\" href=\"#\"><a href=\"default.html\"><img src=\"images/logo.png\" style=\"max-width:250px; margin-left: 40px; margin-top: -51px;\"/></a></p>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\" style=\"font-family:'lobster'; font-size: 17px;\" >
			<ul class=\"nav navbar-nav\">
			<li><button type=\" button\" class=\"navbar-btn btn btn-default\" style=\"marging-right:28%\"><a href=\"top.html\">Les Tops</a></button></li>
			<li><button type=\" button\" class=\"navbar-btn btn btn-default\"><a href=\"top.html\">Les Flops</a></button></li>
			<li><button type=\" button\" class=\"navbar-btn btn btn-default\"><a href=\"top.html\">Randoms</a></button></li>
			<li><button type=\" button\" class=\"navbar-btn btn btn-default\"><a href=\"top.html\">Vidéos</a></button></li>
			</ul>
			<ul class=\"nav navbar-nav navbar-right\">
			<li class=\"dropdown\">
			<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Contact<span class=\"caret\"></span></a>
			<ul class=\"dropdown-menu\">
			<li><a href=\"#\">A propos</a></li>
			<li><a href=\"#\">Suggestion</a></li>
			<li><a href=\"#\">Moderation</a></li>
			<li role=\"separator\" class=\"divider\"></li>
			<li><a href=\"#\">Separated link</a></li>
			</ul>
			</li>
			</ul>
			</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
			</nav>";
	}	

}
?>
