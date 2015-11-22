<?php

class Plutoto {
	private $name;
	private $sentence;
	private $nb_like;



	function __construct($n, $s, $l){
		$this->name = $n;
		$this->sentence = $s;
		$this->nb_like = $l;
		$l=0;
	}

	public function get_name(){
		return $this->name;
	}

	public function set_name($n){
		$this->name = $n;
	}

	public function get_sentence(){
		return $this->sentence;
	}

	public function set_sentence($s){
		$this->sentence = $s;
	}

	public function get_nb_like(){
		return $this->nb_like;
	}

	public function set_nb_like($n){
		$this->nb_like = $n;
	}

}


?>