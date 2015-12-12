<?php

class Plutoto {
	private $id;
	private $name;
	private $sentence;
	private $nb_like;



	function __construct($i, $n, $s, $l){
		$this->id = $i;
		$this->name = $n;
		$this->sentence = $s;
		$this->nb_like = $l;
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

	public function get_id(){
		return $this->id;
	}

	public function set_id($n){
		$this->id = $n;
	}

}


?>