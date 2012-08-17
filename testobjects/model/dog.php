<?php
class dog{
	public $sHungry='hell yeah!';// class variable
	public $sBreed='Lab';
	
	//constructor always this syntax "__construct"
	function __construct($sBreed){
		$this->sBreed=$sBreed;
	}
	
	// class method
	function eat($food){
			// global $sBreed will not work here since it must be global outside the class
			// changing the class variable value
			// nota: $food is not used in this function
			$food=','.$food.',';
			$this->sHungry=(strchr(',people,cats,iguanas,wolves,rats,douche bags,',$food))?'hell yeah! '.$this->sBreed.' likes it':'not so much! '.$this->sBreed.' no like it.';
	}
	
	function __destruct(){
		// this will destroy the instance of this object when going out of scope
		echo " in the destructor";
	}
}

?>