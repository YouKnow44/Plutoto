<?php
class bd{
	$mysqli;

	//plutoto est le nom de l'utilisateur et le plutotoIUT est le mdp pour se connecter à la basse de donnée plutoto.
		
	public function __construct(){
		$this->mysqli = new mysqli("localhost", "plutoto", "plutotoIUT", "plutoto")
		if ($mysqli->connect_errno) {
    			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	function generePlutoto($i){
	return ("<div id=\"plutoto-content\">
    <div id=\"vote\" class=\"row\" style=\"background: black;\">
        <div class=\"col-xs-offset-0 col-sm-offset-1 col-md-offset-2 col-xs-4 col-sm-3 col-md-2\">
            <a class=\"button-vote\">NSF <span class=\"count\">1000</span></a>
        </div>
        <div class=\"col-sm-offset-1 col-md-offset-1 col-xs-4 col-sm-3 col-md-2\">
            <a class=\"button-vote\">NULL <span class=\"count\">145</span></a>
        </div>
        <div class=\"col-sm-offset-1 col-md-offset-1 col-xs-4 col-sm-3 col-md-2\">
            <a class=\"button-vote\" href=\"javascript:vote(4425, 2);\">FAKE <span class=\"count\">39</span></a>
        </div>
    </div>

    <a href=\"#\">
        <div class=\"row\" style=\"background: whitesmoke; padding-top: 10px;\">
            <div class=\"col-xs-2 col-sm-3 col-md-3\" style=\"color: #ba3963;\">
                <strong>#4425</strong>
            </div>
            <div class=\"col-xs-10 col-sm-9 col-md-9\" style=\"color: #ba3963; text-align: right;\">
                <i class=\"fa fa-calendar\"></i> 09/11/2015 | <i class=\"fa fa-clock-o\"></i> 13:11
            </div>
        </div>
    </a>

    <a href=\"http://www.nuitsansfolie.com/nsf/4425\">
        <div class=\"row\" style=\"background: whitesmoke; color: #ba3963; padding: 10px 0 10px 0; line-height: normal;\">
            <div class=\"col-xs-12 col-sm-12 col-md-12\" style=\"min-height: 50px;\">.$this->mysqli->query("select phrase from plutoto where id ==". $id <br />
Il dort encore et pour éviter un moment gênant je décide de partir discrètement. <br />
<br />
Ça aurait pu marcher si je n&#039;étais pas restée bloquée 4 heures dans son hall d&#039;entrée, condamnée à attendre qu&#039;il se réveille pour me délivrer. <br />
<br />
#NSF</div>
        </div>
    </a>

        <div class="row content_nsf_comment_share">
            <div class="col-xs-4">
                <a href="http://www.nuitsansfolie.com/nsf/4425"><i class="fa fa-comments"></i> 8</a>
            </div>

                    <div class="col-xs-8 social_share">
                <div class="pull-right twitter_share_area">
                    <a target="_blank" title="Twitter" href="https://twitter.com/share?url=http://www.nuitsansfolie.com/nsf/4425&text=Ce matin, je me réveille chez ma conquête de la veille. 
Il dort encore et pour éviter un moment gênant je décide de partir discrètement. 

Ça aurait pu marcher si je n&#039;étais pas restée bloquée 4 heures dans son hall d&#039;entrée, condamnée à attendre qu&#039;il se réveille pour me délivrer. 

#NSF" rel="nofollow"
                       onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;">
                        <i class="fa fa-twitter"></i> Twitter</a>
                </div>
                <div class="pull-right facebook_share_area">
                    <a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=http://www.nuitsansfolie.com/nsf/4425&t=Ce matin, je me réveille chez ma conquête de la veille. 
Il dort encore et pour éviter un moment gênant je décide de partir discrètement. 

Ça aurait pu marcher si je n&#039;étais pas restée bloquée 4 heures dans son hall d&#039;entrée, condamnée à attendre qu&#039;il se réveille pour me délivrer. 

#NSF" rel="nofollow"
                       onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;">
                        <i class="fa fa-facebook-square"></i> Facebook</a>
                </div>
            </div>

                </div>
</div>

	
$res = $mysqli->query("SELECT * from plutoto;");
for ($row_no = $res->num_rows - 1; $row_no >= 0; $row_no--){
	$res->data_seek($row_no);
	$row = $res->fetch_assoc();
	echo " id = ".$row['id'];
	echo " phrase = ".$row['phrase'];
	echo " plutoto = ".$row['plutoto'];
}

?>
